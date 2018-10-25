import BaseView from './BaseView.js';
import TicketsCollection from '../collections/TicketsCollection.js';
import TicketModel from "../models/TicketModel";
import AlertView from "./AlertView";

export default BaseView.extend({
    el: $('#new-ticket'),
    template: _.template($('#new-ticket-table-editor-row-template').html()),
    ticketModel: undefined,
    ticketsTableView: undefined,
    ticketsCollection: undefined,

    initialize: function () {
        console.log('init');

        this.ticketsCollection = new TicketsCollection();
        this.fetchTickets();

        let ticketModel = new TicketModel();
        this.ticketModel = ticketModel;

    },

    events: {
        'click .btn-save': 'saveChanges'
    },

    saveChanges: function (e) {
        e.preventDefault();
        e.stopPropagation();
        let self = this;
        this.ticketModel.set('issuer', 'Karl');
        this.ticketsCollection.add(this.ticketModel);
        this.ticketModel.save(null, {
            success: function () {
                let alertView = new AlertView();
                alertView.showSuccess('Success!', 'Ticket was saved');
                self.ticketModel = new TicketModel();
                self.render();
            },
            error: function () {
                let alertView = new AlertView();
                alertView.showSuccess('Error!', 'Unknown error occured whilst saving ticket');
                self.ticketModel = new TicketModel();
                self.render();
            },
            wait: true
        });
    },

    fetchTickets: function () {
        var self = this;
        this.ticketsCollection.reset();
        this.ticketsCollection.fetch();
    },

    render: function () {
        let self = this;
        self.$el.html(self.template({view: self, ticket: self.ticketModel.toJSON()}));
        return self;
    }

})
