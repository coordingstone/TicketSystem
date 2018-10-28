import BaseView from './BaseView.js';
import AlertView from './AlertView.js';

export default BaseView.extend({

    tagName: 'tr',
    className: 'ticket-table-row',
    template: _.template($('#ticket-table-editor-row').html()),
    itemView: undefined,

    initialize: function(options) {
        // access your data here
        this.itemView = options.itemView;
    },

    events: {
        'click .btn-save': 'saveChanges',
        'click .btn-delete': 'deleteTicket',
        'click .btn-cancel': 'cancelEdit',
    },

    cancelEdit: function (e) {
        e.preventDefault();
        e.stopPropagation();
        this.$el.fadeOut();
    },

    deleteTicket: function (e) {
        e.preventDefault();
        e.stopPropagation();

        var self = this;

        self.model.destroy({
            success: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Success!', 'The ticket was deleted');
                self.itemView.$el.fadeOut({
                    complete: function () {
                        self.itemView.remove();
                    }
                });
                self.$el.fadeOut({
                    complete: function () {
                        self.unbind();
                        self.remove();
                    }
                });
            },
            error: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Error!', 'The ticket could not be deleted');
            },
            wait: true
        });
    },

    saveChanges: function (e) {
        e.preventDefault();
        e.stopPropagation();
        let self = this;
        let openerName = self.$el.find('input[name="openerNameInput"]').val();
        let issueDescription = self.$el.find('input[name="issueDescriptionInput"]').val();
        let closerName = self.$el.find('input[name="closerNameInput"]').val();
        let status = self.$el.find('input[name="statusInput"]').val();

        this.model.set('openerName', openerName);
        this.model.set('issueDescription', issueDescription);
        this.model.set('closerName', closerName);
        this.model.set('status', 'OPEN');

        this.model.save(null, {
            success: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Success!', 'The ticket was updated');
                let $html = $(self.itemView.template(self.itemView.model.toJSON()));
                self.itemView.$el.html($html.html());
                self.$el.fadeOut({
                    complete: function () {

                    }
                });
            },
            error: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Error!', 'Unknown error occured. Please try again');
            },
            wait: true
        });
    },

    render: function () {
        var self = this;
        var html = self.template({
            ticket: self.model.toJSON()
        });
        self.setElement($(html));
        return self;
    }

})