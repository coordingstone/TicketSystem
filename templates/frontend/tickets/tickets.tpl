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
                <h1 style="padding: 0; margin: 0;">Open new ticket</h1>

            </div>
            <div id="tickets" style="display: none;">
                <h1 style="padding: 0; margin: 0;">List all tickets</h1>
                <div id="tickets-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Issuer</th>
                                <th>Title</th>
                                <th>Create time</th>
                                <th>Close time</th>
                                <th>Closed by</th>
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
            <td><%= issuer %></td>
            <td><%= title %></td>
            <td><%= createtime %></td>
            <td><%= closetime %></td>
            <td><%= closer %></td>
            <td><a href="#" class="edit-ticket">Edit</a></td>
        </tr>
    </script>

    <script type="text/template" id="ticket-table-editor-row">
        <tr class="ticket-table-editor-row">
            <td colspan="5">

                <div class="row">
                    <div class="col-md-2">
                        <label>Issuer</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="issuerName" class="form-control" value="<%= ticket.issuer %>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Title</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="titleName" class="form-control" value="<%= ticket.name %>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <label>Issue</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="issueName" class="form-control" value="<%= ticket.issue %>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-left">
                        <a href="#" class="button-delete">Delete</a>
                    </div>
                    <div class="col-md-6 col-md-offset-4 text-right">
                        <a href="#" class="button-save pull-right">Save</a>
                        <a href="#" class="button-cancel pull-right" style="margin-right: 15px;">Delete</a>
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