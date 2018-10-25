import TicketModel from '../models/TicketModel.js';
export default Backbone.Collection.extend({
    model: TicketModel,

    url: function () {
        return '/tickets/rest/tickets'
    }

});
