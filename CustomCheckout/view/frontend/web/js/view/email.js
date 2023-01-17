define([
    'jquery',
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/step-navigator',
    'mage/translate',
    'underscore',
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/model/customer-email-validator'
], function (
    $,
    Component,
    ko,
    stepNavigator,
    $t,
    _,
    quote,
    customer,
    customerEmailValidator
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'MageChamps_CustomCheckout/email',
            isVisible: ko.observable(false),
            stepCode: 'email',
            stepTitle: $t('Email')
        },
        quoteIsVirtual: quote.isVirtual(),
        initialize: function () {
            this._super();

            stepNavigator.registerStep(
                this.stepCode,
                null,
                this.stepTitle,
                this.isVisible,
                _.bind(this.navigate, this),
                this.sortOrder
            );

            return this;
        },
        navigate: function () {
            this.isVisible(true);
        },
        navigateToNextStep: function() {
            if (customerEmailValidator.validate()) {
                stepNavigator.next();
            }
        },
        validateEmail: function () {
            const loginFormSelector = 'form[data-role=email-with-possible-login]';
            let emailValidationResult = customer.isLoggedIn();
            if (!customer.isLoggedIn()) {
                $(loginFormSelector).validation();
                emailValidationResult = Boolean($(loginFormSelector + ' input[name=username]').valid());
            }
            return emailValidationResult;
        }
    });
})
