{extends file="frontend/tickets/maintemplate.tpl"}
{block name=mainContent}
<div id="main-backbone">
    <div class="row">
        <div class="col-lg-2 col-md-2">
            <div id="sidebar-menu">
                <ul>
                    <li class="active" id="list-tickets-list-item"><a href="#list-tickets">All Tickets</a></li>
                    <li id="new-ticket-list-item"><a href="#new-ticket">New Ticket</a></li>
                </ul>
            </div>
        </div>
        <div id="app-content" class="col-lg-10 col-md-10 col-sm-10">
            <div id="new-ticket" style="display: none;">
                <h1 style="padding: 0; margin: 0;">Open new ticket</h1>

            </div>
            <div id="list-all-tickets" style="display: none;">
                <h1 style="padding: 0; margin: 0;">List all tickets</h1>
                <div id="list-all-tickets-table">
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
    <script type="text/template" id="tickets-table-row">
        <tr class="ticket-row" style="display: none">
            <td><%= issuer %></td>
            <td><%= title %></td>
            <td><%= createtime %></td>
            <td><%= closetime %></td>
            <td><%= closer %></td>
            <td><a href="#" class="edit-ticket">Edit</a></td>
        </tr>
    </script>

    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/vendors~common.js"></script>
    <script type="text/javascript" src="js/tickets.js"></script>
    <script type="text/javascript" src="js/vendors~common~tickets.js"></script>

{/block}