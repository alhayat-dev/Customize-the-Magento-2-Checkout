<?php declare(strict_types=1);

namespace MageChamps\HotDeals\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class DefaultConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    protected $productCollection;

    /**
     * @var \Magento\Catalog\Model\Category
     */
    protected $categoryFactory;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Catalog product visibility
     *
     * @var \Magento\Catalog\Model\Product\Visibility
     */
    protected $productVisibility;

    /**
     * Catalog config
     *
     * @var \Magento\Catalog\Model\Config
     */
    protected $catalogConfig;

    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    protected $priceHelper;

    /**
     * @param \Magento\Catalog\Model\ProductFactory $product
     * @param \Magento\Catalog\Model\CategoryFactory $categoryFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Catalog\Model\Product\Visibility $productVisibility
     * @param \Magento\Catalog\Model\Config $catalogConfig
     * @param \Magento\Framework\Pricing\Helper\Data $priceHelper
     */
    public function __construct(
        \Magento\Catalog\Model\ProductFactory $product,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,
        \Magento\Catalog\Model\Config $catalogConfig,
        \Magento\Framework\Pricing\Helper\Data $priceHelper
    ) {
        $this->productCollection = $product;
        $this->categoryFactory = $categoryFactory;
        $this->_storeManager = $storeManager;
        $this->productVisibility = $productVisibility;
        $this->catalogConfig = $catalogConfig;
        $this->priceHelper = $priceHelper;
    }

    public function getConfig(): array
    {
        $store = $this->_storeManager->getStore();
        $categoryId = 41;
        $category = $this->categoryFactory->create()->load($categoryId);
        $_products = $this->productCollection->create()->getCollection()
            ->setStoreId(
                $store->getId()
            )->addAttributeToSelect(
                $this->catalogConfig->getProductAttributes()
            )->addMinimalPrice()->addFinalPrice()->addTaxPercents()->addUrlRewrite(
                $categoryId
            )->addCategoryFilter(
                $category
            )->setVisibility(
                $this->productVisibility->getVisibleInCatalogIds()
            )->setCurPage(1)->setPageSize(10);

        $hotDealsProducts = [];
        foreach ($_products as $_product) {
            $hotDealsProducts[] = [
                'id' => $_product->getId(),
                'name' => $_product->getName(),
                'price' => $this->priceHelper->currency($_product->getFinalPrice(), true, false),
                'thumbnail' => $_product->getThumbnail()
            ];
        }

        return [
            'hot_deals_product' => $hotDealsProducts
        ];
    }
}
