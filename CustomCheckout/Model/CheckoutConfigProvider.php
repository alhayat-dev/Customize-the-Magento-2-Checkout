<?php declare(strict_types=1);

namespace MageChamps\CustomCheckout\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    /**
     * @var $fulfillmentStatus
     */
    private $fulfillmentStatus;

    public function __construct(
        private LayoutInterface $layout
    ) {
        $this->fulfillmentStatus = $layout->createBlock('Magento\Cms\Block\Block')
            ->setBlockId('fulfillment_status')
            ->toHtml();
    }

    public function getConfig(): array
    {
        return [
            'fulfillment_status' => $this->fulfillmentStatus
        ];
    }
}
