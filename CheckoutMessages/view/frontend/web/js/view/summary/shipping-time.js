define(['uiComponent'], function(Component) {
    'use strict';

    return Component.extend({
        initialize: function() {
            this._super();
            console.log('shippingTime initialized');
        },
        defaults: {
            tracks: {
                countryId: true
            },
            listens: {
                '${ $.shippingAddressProvider }.country_id': 'countryId',
                '${ $.shippingAddressProvider }.region_id': 'handleRegionChange'
            }
        },
        handleRegionChange: function (newRegionId){
            console.log('Region Id is ' + newRegionId);
        },
        showMessage: function() {
            return this.countryId === 'US';
        }
    });
});
