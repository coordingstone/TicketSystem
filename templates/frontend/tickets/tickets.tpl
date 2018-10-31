{extends file="frontend/tickets/maintemplate.tpl"}
{block name=mainContent}
<div id="main-backbone">
    <div class="row">
        <div class="col-lg-2 col-md-2">
            <div id="sidebar-menu">
                <ul>
                    <li class="active" id="list-tickets-list-item"><a href="#tickets">All Tickets</a></li>
                    <li id="new-ticket-list-item"><a href="#new-ticket">New Ticket</a></li>
                </ul>
            </div>
        </div>
        <div id="app-content" class="col-lg-10 col-md-10 col-sm-10">
            <div id="new-ticket" style="display: none;">
                <div id="new-ticket-table">

                </div>
            </div>
            <div id="tickets" style="display: none;">
                <h1 style="padding: 0; margin: 0;">List all tickets</h1>
                <div id="tickets-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Your Name</th>
                                <th>Issue</th>
                                <th>Closed by</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th> </th>
                                </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{/block}

{block name=afterBodyBlock}

    <script type="text/template" id="tickets-table-empty-row">
        <tr>
            <td colspan="5">No Tickets found</td>
        </tr>
    </script>

    <script type="text/template" id="ticket-table-row">
        <tr class="ticket-row">
            <td><%= openerName %></td>
            <td><%= issueDescription %></td>
            <td><%= closerName %></td>
            <td><%= status %></td>
            <td><%= createtime %></td>
            <td><a href="#" class="edit-ticket">Edit</a></td>
        </tr>
    </script>

    <script type="text/template" id="new-ticket-table-editor-row-template">
        <h1>Add new ticket</h1>
        <table class="table">
            <tr class="new-ticket-table-row">
                <td colspan="6">

                    <div class="row">
                        <div class="col-md-2">
                            <label>Your Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="openerNameInput" class="form-control" value="<%= ticket.openerName %>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Issue</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="issueDescriptionInput" class="form-control" value="<%= ticket.issueDescription %>">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <label>Closed by</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="closerNameInput" class="form-control" value="<%= ticket.closerName %>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Status</label>
                        </div>
                        <div class="col-md-4">
                            <select name="statusSelect" class="form-control">
                                <option value="OPEN">OPEN</option>
                                <option value="CLOSED">CLOSED</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-4 text-right">
                            <a href="#new-ticket" class="btn-save pull-right">Save</a>
                        </div>
                    </div>

                </td>
            </tr>
        </table>
    </script>

    <script type="text/template" id="ticket-table-editor-row">
        <tr class="ticket-table-row">
            <td colspan="6">

                <div class="row">
                    <div class="col-md-2">
                        <label>Your Name</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="openerNameInput" class="form-control" value="<%= ticket.openerName %>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Issue</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="issueDescriptionInput" class="form-control" value="<%= ticket.issueDescription %>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <label>Closed by</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="closerNameInput" class="form-control" value="<%= ticket.closerName %>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Status</label>
                    </div>
                    <div class="col-md-4">
                        <select name="statusSelect" class="form-control">
                            <option value="OPEN">OPEN</option>
                            <option value="CLOSED">CLOSED</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Attachment</label>
                    </div>
                    <div class="col-md-4">
                        <% if(ticket.ticketAttachmentUrl !== null && ticket.ticketAttachmentFileName !== null) { %>
                            <a href="<%= ticket.ticketAttachmentUrl %>"><%= ticket.ticketAttachmentFileName %></a>
                        <%}%>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input id="attachemnt-file" class="attachment-input" type="file" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-left">
                        <a href="#" class="btn-cancel">Cancel</a>
                    </div>
                    <div class="col-md-6 col-md-offset-4 text-right">
                        <a href="#" class="btn-save pull-right">Save</a>
                        <a href="#" class="btn-delete pull-right" style="margin-right: 15px;">Delete</a>
                    </div>
                </div>

            </td>
        </tr>
    </script>

    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/vendors.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/runtime.js"></script>
    <script type="text/javascript" src="js/tickets.js"></script>


{/block}