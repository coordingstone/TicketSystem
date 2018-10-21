var BaseView = require('./BaseView'),
    TicketModel = require('../models/TicketModel'),
    TicketTableItemEditorView = require('./TicketTableItemEditorView');

var TicketTableItemView = BaseView.extend({
    tagName: 'tr',
    className: 'ticket-row',
    template: _.template($('#ticket-table-row').html()),

    ticketEditorView: null,

    initialize: function () {
        this.listenTo(this.model, 'edit', this.editTicket());
    },

    events: {
        'click .edit-ticket' : 'editTicket'
    },

    ticketSaved: function () {
        var $html = $(this.template(this.model.toJSON()));
        this.$el.html($html.html());
        this.ticketEditorView.$el.fadeOut({
            complete: function () {

            }
        });
    },

    ticketDeleted: function () {
        var self = this;
        this.$el.fadeOut({
            complete: function () {
                self.remove();
            }
        });
        this.ticketEditorView.$el.fadeOut({
            complete: function () {
                self.ticketEditorView.unbind();
                self.ticketEditorView.remove();
            }
        });
    },

    editTicket: function (event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }

        model = this.model;
        itemView = this;

        var selectedTicketRow = itemView.$el.closest('tr');

        if (typeof this.ticketEditorView !== 'undefined') {
            this.ticketEditorView.remove();
        }

        var bgColor = $(selectedTicketRow).css('background-color');

        this.ticketEditorView = new TicketTableItemEditorView({model: model});
        this.listenTo(this.ticketEditorView, 'ticketSaved', this.ticketSaved());
        this.listenTo(this.ticketEditorView, 'ticketDeleted', this.ticketDeleted());

        this.ticketEditorView.render().then(function (ticketEditorView) {
            var $tr = ticketEditorView.$el;
            $($tr).css('background-color', bgColor);
            $($tr).find('td').css('border-top', 'none');
            $(selectedTicketRow).after($tr).next().fadeIn();
        })
    },

    render: function () {
        var html = this.template(this.model.toJSON());
        this.setElement($(html));
        return this;
    }

});

module.exports = TicketTableItemView;