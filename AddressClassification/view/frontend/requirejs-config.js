let config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'MageChamps_AddressClassification/js/action/set-shipping-information-mixin': true
            },
            'Magento_Checkout/js/view/billing-address': {
                'MageChamps_AddressClassification/js/view/billing-address-mixin': true
            }
        }
    }
};

