var AlertView = require('./views/AlertView'),
    TicketsView = require('./views/TicketsView');


Backbone.$ = $;
$(document).ready(function () {
    var TicketsViewRouter = Backbone.Router.extend({
        ticketsView : new TicketsView(),
        newTicketView : 'undefined',
        routes: {
            "new-ticket":   'newTicket',
            "tickets": 'listTickets',
            '*path':        'defaultRoute'
        },

        newTicket: function () {
            $('#sidebar-menu').find('li').removeClass('active');
            $('#new-ticket-list-item').addClass('active');
        },

        listTickets: function () {
            $('#sidebar-menu').find('li').removeClass('active');
            $('#list-tickets-list-item').addClass('active');

            if (typeof this.ticketsView == null || typeof this.ticketsView === 'undefined') {
                console.log(this.ticketsView);
                this.ticketsView = new TicketsView();
                console.log(this.ticketsView);
            }
            this.ticketsView.render();
            this.ticketsView.$el.show();

        },

        defaultRoute: function () {
            this.newTicket();
        }

    });
    var router = new TicketsViewRouter();
    Backbone.history.start();
});