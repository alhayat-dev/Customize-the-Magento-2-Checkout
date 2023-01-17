define([], function() {
    'use strict';

    return function(subject) {
        return subject.extend({
            defaults: {
                detailsTemplate: 'MageChamps_AddressClassification/billing-address/details'
            }
        });
    };
});
