var BaseView  = require('./BaseView'),
    mediator  = require('../lib/mediator'),
    TicketsTableView = require('./TicketsTableView'),
    TicketsCollection = require('../collections/TicketsCollection'),
    TicketsModel = require('../models/TicketModel');

var TicketsView = BaseView.extend({
    el: $('#tickets'),
    ticketsTableView: undefined,
    ticketsCollection: undefined,

    initialize: function () {
        this.ticketsCollection = new TicketsCollection();
        this.ticketsTableView = new TicketsTableView({collection: this.ticketsCollection});

        this.fetchTickets();
    },

    fetchTickets: function () {
        var self = this;
        this.ticketsCollection.reset();
        this.ticketsCollection.fetch();
    },

    render: function () {
        this.ticketsTableView.render();
        return this;
    }

})

module.exports = TicketsView;

