var BaseView = require('./BaseView'),
    TicketModel = require('../models/TicketModel'),
    AlertView = require('./AlertView');

var TicketTableItemEditorView = BaseView.extend({

    tagName: 'tr',
    className: 'ticket-editor-row',
    template: _.template($('#ticket-table-editor-row').html()),

    initialize: function () {

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
                self.trigger('ticketDeleted');
            },
            error: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Error!', 'The ticket could not be deleted');
            },
            wait: true
        });
        this.teardown();
    },

    saveChanges: function (e) {
        e.preventDefault();
        e.stopPropagation();
        var self = this;
        this.model.set('title', 'Bug#1');
        this.model.save(null, {
            success: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Success!', 'The ticket was updated');
                self.trigger('ticketSaved');
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

module.exports = TicketTableItemEditorView;