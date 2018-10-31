import BaseView from './BaseView.js';
import TicketTableItemEditorView from './TicketTableItemEditorView.js';

export default BaseView.extend({
    tagName: 'tr',
    className: 'ticket-row',
    template: _.template($('#ticket-table-row').html()),

    ticketEditorView: undefined,

    initialize: function () {
        //this.listenTo(this.model, 'edit', this.editTicket());
    },

    events: {
        'click .edit-ticket' : 'editTicket'
    },

    ticketSaved: function () {
        let $html = $(this.template(this.model.toJSON()));
        this.$el.html($html.html());
        this.ticketEditorView.$el.fadeOut({
            complete: function () {

            }
        });
    },

    editTicket: function (event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }


        let model = this.model;
        let itemView = this;

        let selectedTicketRow = itemView.$el.closest('tr');

        if (typeof this.ticketEditorView !== "undefined") {
            this.ticketEditorView.remove();
        }

        let bgColor = $(selectedTicketRow).css('background-color');

        this.ticketEditorView = new TicketTableItemEditorView({model: model, itemView: itemView});

        var self = this;

        var promise1 = new Promise(function(resolve, reject) {
            self.ticketEditorView.render()
            resolve(self.ticketEditorView)
            console.log('this happens first');
        });

        promise1.then(function(value) {
            let ticketEditorView = value;
            let $tr = ticketEditorView.$el;
            $($tr).css('background-color', bgColor);
            $($tr).find('td').css('border-top', 'none');
            $(selectedTicketRow).after($tr).next().fadeIn();
        });
    },

    render: function () {
        let html = this.template(this.model.toJSON());
        this.setElement($(html));
        return this;
    }

});