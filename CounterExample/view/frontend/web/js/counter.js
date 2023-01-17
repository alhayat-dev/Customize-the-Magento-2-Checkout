define(['ko', 'uiComponent'],

    function (ko, Component) {

        return Component.extend({
            initialize: function () {
                this._super(); // it is necessary to call base constructor
                this.counter = ko.observable(0); // this is observable variable which reacts dynamically
            },
            increment: function () {
                this.counter(this.counter() + 1);
            }
        });

    });
