var BaseView = Backbone.View.extend({

    empty: function () {
        this.$el.empty();
    },

    close: function (removeView) {
        if (typeof removeView != 'undefined') {
            if (removeView) {
                this.remove();
            }
        }
        this.unbind();
    }

});

module.exports = BaseView;