import BaseView from './BaseView.js';

export default BaseView.extend({
    el: '#alert-message',
    template: _.template($('#alert-message-template').html()),

    initialize: function (opts) {
        if (typeof opts !== 'undefined') {
            if (typeof opts.el !== 'undefined') {
                this.el = opts.el;
            }
        }
    },

    render: function () {
        var html = this.template({shortDesc: this.shortDesc, text: this.text, type: this.type});
        this.$el.html(html);
        return this;
    },

    showSuccess: function (shortDesc, text, duration) {
        this.shortDesc = shortDesc;
        this.text = text;
        this.type = 'success';
        this.show(duration);
    },

    show: function (duration) {
        if (typeof duration === 'undefined') {
            duration = 5000;
        }
        this.render();
        this.$el.slideDown(400);
        this.$el.show();

        var self = this;
        setTimeout(function () {
            self.hide();
        }, duration);
    },

    hide: function () {
        this.$el.slideUp(500);
    }


});