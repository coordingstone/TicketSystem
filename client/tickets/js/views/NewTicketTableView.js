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
        let openerName = self.$el.find('input[name="openerNameInput"]').val();
        let issueDescription = self.$el.find('input[name="issueDescriptionInput"]').val();
        let closerName = self.$el.find('input[name="closerNameInput"]').val();
        let status = self.$el.find('input[name="statusInput"]').val();

        this.ticketModel.set('openerName', openerName);
        this.ticketModel.set('issueDescription', issueDescription);
        this.ticketModel.set('closerName', closerName);
        this.ticketModel.set('status', 'OPEN');

        console.log(this.ticketModel);

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
