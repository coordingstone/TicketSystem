import BaseView from './BaseView.js';
import TicketTableItemView from './TicketTableItemView.js';
import TicketTableItemEditorView from './TicketTableItemEditorView.js';


export default BaseView.extend({

    el: $('#tickets-table'),
    selectedRowForEdit: undefined,
    ticketEditorView: undefined,
    ticketEditorViews: undefined,

    initialize: function () {
        //this.listenTo(this.collection, 'reset add', this.render(), this);
    },

    ticketSaved: function () {
        var self = this;
        if (typeof this.ticketEditorView !== 'undefined' && this.ticketEditorView != null) {
            this.ticketEditorView.$el.fadeOut({
                complete: function() {
                    self.render();
                }
            });
        }
    },

    ticketDeleted: function () {
        var self = this;
        if (typeof this.ticketEditorView !== 'undefined' && this.ticketEditorView != null) {
            this.ticketEditorView.$el.fadeOut({
                complete: function() {
                    self.render();
                }
            });
        }
    },

    cancelEdit: function () {
        if (typeof this.ticketEditorView !== 'undefined'){
            this.ticketEditorView.$el.fadeOut();
        }
    },

    editTicket: function (model, itemView) {
        var self = this;
        var selectedTicketRow = itemView.$el.closest('tr');

        if (typeof this.ticketEditorView !== 'undefined') {
            this.ticketEditorView.remove();
        }

        var bgColor = $(selectedTicketRow).css('background-color');
        this.ticketEditorView = new TicketTableItemEditorView({model: model});
        //this.listenToOnce(this.ticketEditorView, 'ticketSaved', this.ticketSaved());
        //this.listenToOnce(this.ticketEditorView, 'ticketDeleted', this.ticketDeleted());
        this.ticketEditorView.render().then(function (ticketEditorView) {
            var $tr = ticketEditorView.$el;
            $($tr).css('background-color', bgColor);
            $($tr).find('td').css('border-top', 'none');
            $(selectedTicketRow).after($tr).next().fadeIn();
        })

    },

    render: function () {
        var self = this;
        this.$el.find('tbody').fadeOut({
            complete: function () {
                self.$el.find('tbody').empty();
                var isEven = false;
                console.log(self.collection);
                if (self.collection.size() === 0) {
                    var emptyRowTemplate = $('#tickets-table-empty-row').html();
                    console.log(emptyRowTemplate);
                    self.$el.find('tbody').html(emptyRowTemplate);
                    self.$el.find('tbody').show();
                    return self;
                }

                self.collection.each(function (ticket) {
                    console.log('TICKET ADDED');
                    console.log(ticket);
                    var itemView = new TicketTableItemView({model: ticket});
                    var $tr = itemView.render().$el;
                    if (isEven) $($tr).addClass('even');
                    else $($tr).addClass('odd');

                    self.$el.find('tbody').append($tr);
                    isEven = !isEven;
                }, self);
                self.$el.find('tbody').fadeIn();
                return self;
            }
        })
    }

})