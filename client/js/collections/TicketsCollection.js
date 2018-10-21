var TicketModel = require('../models/TicketModel');

var TicketsCollection = Backbone.Collection.extend({
    model: TicketModel,

    url: function () {
        return 'ticketssystem/rest/tickets'
    },

    comparator: function (ticket) {
        return ticket.getTicketId();
    }

});

module.exports = TicketsCollection;