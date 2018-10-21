var BaseModel = require('./BaseModel'),
    TicketsCollection = require('../collections/TicketsCollection');

var TicketModel = BaseModel.extend({
    idAttribute: 'ticketId',
    defaults: {
        "title" : 'N/A'
    }
})

module.exports = TicketModel;