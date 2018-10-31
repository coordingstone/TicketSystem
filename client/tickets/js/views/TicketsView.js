import BaseView from './BaseView.js';
import TicketsTableView from './TicketsTableView.js';
import TicketsCollection from '../collections/TicketsCollection.js';

export default BaseView.extend({
    el: $('#tickets'),
    ticketsTableView: undefined,
    ticketsCollection: undefined,

    initialize: function () {

        this.ticketsCollection = new TicketsCollection();

        this.ticketsTableView = new TicketsTableView({collection: this.ticketsCollection});
    },

    render: function () {
        this.ticketsTableView.render();
        return this;
    }

})
