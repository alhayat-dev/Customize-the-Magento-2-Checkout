define([
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function(
    wrapper,
    quote
) {
    'use strict';

    return function(setShippingInformationAction) {
        return wrapper.wrap(setShippingInformationAction, function(originalAction) {
            const shippingAddress = quote.shippingAddress();
            const attributeCode = 'address_classification';

            // check that if customAttributes and extension_attributes exists on the initial page load
            shippingAddress.customAttributes = shippingAddress.customAttributes || {};
            shippingAddress.extension_attributes = shippingAddress.extension_attributes || {};

            // check if 'address_classification' exists in customAttributes object
            const attribute = shippingAddress.customAttributes.find(el =>
                el.attribute_code === attributeCode
            );

            if (attribute) {
                shippingAddress.extension_attributes[attributeCode] = attribute.value;
            }

            console.log('shippingAddress', shippingAddress);
            return originalAction();
        });
    };
});
