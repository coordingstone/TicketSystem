import BaseModel from './BaseModel.js';
export default BaseModel.extend({
    idAttribute: 'ticketId',
    defaults: {
        "status" : 'OPEN',
    }
});
