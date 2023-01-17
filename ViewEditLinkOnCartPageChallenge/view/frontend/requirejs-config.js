let config = {
    deps: [
        'MageChamps_CustomCheckout/js/mask-telephone-inputs'
    ],
    map: {
        '*': {
            'Magento_Checkout/template/summary/cart-items.html':
                'MageChamps_ViewEditLinkOnCartPageChallenge/template/summary/cart-items.html'
        }
    }
};
