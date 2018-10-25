import BaseView from './BaseView.js';
import TicketsTableView from './TicketsTableView.js';
import TicketsCollection from '../collections/TicketsCollection.js';

export default BaseView.extend({
    el: $('#tickets'),
    ticketsTableView: undefined,
    ticketsCollection: undefined,

    initialize: function () {
        console.log('init');

        this.ticketsCollection = new TicketsCollection();
        console.log(this.ticketsCollection);

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
