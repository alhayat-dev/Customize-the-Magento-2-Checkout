define([
        'ko',
        'uiComponent',
        'Magento_Customer/js/model/customer'
    ],
    function (
        ko,
        Component,
        customer
    ) {
        return Component.extend({
            defaults: {
                template: 'MageChamps_ContactInfoOnCheckoutChallenge/contact-information'
            },
            isCustomerLoggedIn: customer.isLoggedIn,
            initialize: function () {
                this._super(); // it is necessary to call base constructor
                console.log('testing contact information');
            },
            showMessage: function () {
                if (customer.isLoggedIn) {
                    let firstName = customer.customerData.firstname;
                    let storePhoneNumber = this.getStorePhoneNumber();
                    return 'Welcome ' + firstName + '! Need help? call us at ' + storePhoneNumber;
                }
            },
            getStorePhoneNumber: function () {
                return window.checkoutConfig.store_phone_number;
            }
        });

    });
