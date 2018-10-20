
Backbone.$ = $;
$(document).ready(function () {
    var TicketsViewRouter = Backbone.Router.extend({
        allTicketsView : undefined,
        newTicketView : undefined,
        routes: {
            "new-ticket":   'newTicket',
            "list-tickets": 'listTickets',
            '*path':        'defaultRoute'
        },

        newTicket: function () {
            $('#sidebar-menu').find('li').removeClass('active');
            $('#new-ticket-list-item').addClass('active');
        },

        listTickets: function () {
            $('#sidebar-menu').find('li').removeClass('active');
            $('#list-tickets-list-item').addClass('active');
        },

        defaultRoute: function () {
            this.newTicket();
        }

    });
    var router = new TicketsViewRouter();
    Backbone.history.start();
});