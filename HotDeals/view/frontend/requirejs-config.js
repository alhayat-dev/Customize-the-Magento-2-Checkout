var config = {
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'MageChamps_HotDeals/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'MageChamps_HotDeals/js/view/shipping-payment-mixin': true
            }
        }
    }
}
