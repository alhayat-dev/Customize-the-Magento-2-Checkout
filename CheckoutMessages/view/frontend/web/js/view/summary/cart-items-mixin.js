define([], function() {
    'use strict';

    return function (Component) {
        return Component.extend({
            defaults: {
                exports: {
                    'totals.subtotal': 'checkout.sidebar.guarantee:subtotal'
                }
            }
        });
    };
});
