<?php declare(strict_types=1);

namespace MageChamps\ContactInfoOnCheckoutChallenge\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
class StorePhoneNumberConfigProvider implements ConfigProviderInterface
{
    const XML_PATH_OF_STORE_PHONE_NUMBER = 'general/store_information/phone';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
    ) {
    }

    /**
     * @return string[]
     */
    public function getConfig(): array
    {
        return [
            'store_phone_number' => $this->getPhoneNumber()
        ];
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        $phoneNumber = $this->scopeConfig->getValue(
            self::XML_PATH_OF_STORE_PHONE_NUMBER,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if (is_null($phoneNumber)){
            return '';
        }
        return $phoneNumber;
    }
}
