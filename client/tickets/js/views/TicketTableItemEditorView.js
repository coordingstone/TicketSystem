import BaseView from './BaseView.js';
import AlertView from './AlertView.js';

export default BaseView.extend({

    tagName: 'tr',
    className: 'ticket-table-row',
    template: _.template($('#ticket-table-editor-row').html()),
    itemView: undefined,

    initialize: function(options) {
        // access your data here
        this.itemView = options.itemView;
    },

    events: {
        'click .btn-save': 'getBase64',
        'click .btn-delete': 'deleteTicket',
        'click .btn-cancel': 'cancelEdit',
    },

    getBase64: function() {
        var self = this;
        let numberOfAttachemnts = document.getElementById("attachemnt-file").files.length;
        if (numberOfAttachemnts > 0) {
            let file = document.getElementById("attachemnt-file").files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                let result = reader.result;
                self.saveChanges(result);
            };
            reader.onerror = function (error) {
                self.saveChanges();
            };
        } else {
            self.saveChanges();
        }

    },

    cancelEdit: function (e) {
        e.preventDefault();
        e.stopPropagation();
        this.$el.fadeOut();
    },

    deleteTicket: function (e) {
        e.preventDefault();
        e.stopPropagation();

        var self = this;

        self.model.destroy({
            success: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Success!', 'The ticket was deleted');
                self.itemView.$el.fadeOut({
                    complete: function () {
                        self.itemView.remove();
                    }
                });
                self.$el.fadeOut({
                    complete: function () {
                        self.unbind();
                        self.remove();
                    }
                });
            },
            error: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Error!', 'The ticket could not be deleted');
            },
            wait: true
        });
    },

    saveChanges: function (results) {

        let self = this;

        let openerName = self.$el.find('input[name="openerNameInput"]').val();
        let issueDescription = self.$el.find('input[name="issueDescriptionInput"]').val();
        let closerName = self.$el.find('input[name="closerNameInput"]').val();
        let status = self.$el.find('select[name="statusSelect"]').val();
        console.log(status);

        this.model.set('openerName', openerName);
        this.model.set('issueDescription', issueDescription);
        this.model.set('closerName', closerName);
        this.model.set('status', status);
        this.model.set('ticketAttachmentFileName', filename);
        var fileAsBase64 = results;
        var filename = $('input[type=file]').val().replace(/.*(\/|\\)/, '');
        if (fileAsBase64 != null) {
            let data = {
                attachment: fileAsBase64,
                fileName: filename
            }
            self.model.set('ticketAttachmentRequest', data);
        }


        this.model.save(null, {
            success: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Success!', 'The ticket was updated');
                let $html = $(self.itemView.template(self.itemView.model.toJSON()));
                self.itemView.$el.html($html.html());
                self.$el.fadeOut({
                    complete: function () {

                    }
                });
            },
            error: function () {
                var alertView = new AlertView();
                alertView.showSuccess('Error!', 'Unknown error occured. Please try again');
            },
            wait: true
        });
    },

    render: function () {
        var self = this;
        var html = self.template({
            ticket: self.model.toJSON()
        });
        self.setElement($(html));
        return self;
    }

})