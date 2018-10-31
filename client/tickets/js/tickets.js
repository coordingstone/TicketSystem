import TicketsView from './views/TicketsView.js';
import NewTicketTableView from './views/NewTicketTableView.js';



Backbone.$ = $;
$(document).ready(function () {
    var TicketsViewRouter = Backbone.Router.extend({
        ticketsView : new TicketsView(),
        newTicketView : new NewTicketTableView(),
        activeView: undefined,
        routes: {
            "new-ticket":   'newTicket',
            "tickets": 'listTickets',
            '*path':        'defaultRoute'
        },

        newTicket: function () {
            $('#sidebar-menu').find('li').removeClass('active');
            $('#new-ticket-list-item').addClass('active');

            this.hideActiveView();

            if (typeof this.newTicketView == null || typeof this.newTicketView === "undefined") {
                this.newTicketView = new NewTicketTableView();
            }
            this.newTicketView.render();
            this.newTicketView.$el.show();
            this.activeView = this.newTicketView;
        },

        listTickets: function () {
            $('#sidebar-menu').find('li').removeClass('active');
            $('#list-tickets-list-item').addClass('active');
            self = this;


            if (typeof this.ticketsView == null || typeof this.ticketsView === 'undefined') {
                this.ticketsView = new TicketsView();
            }

            this.ticketsView.ticketsCollection.fetch({
                success: function (model, response) {
                    self.hideActiveView();
                    self.ticketsView.render();
                    self.ticketsView.$el.show();
                    self.activeView = self.ticketsView;
                },
                error: function () {

                }
            });
        },

        hideActiveView: function() {
            if (typeof this.activeView !== "undefined") {
                this.activeView.$el.hide();
            }
        },

        defaultRoute: function () {
            this.listTickets();
        }



    });
    var router = new TicketsViewRouter();
    Backbone.history.start();
});