<?php
/* Smarty version 3.1.33, created on 2018-10-30 22:46:02
  from '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/tickets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bd8df2aa41ef0_17653838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca69ef822a2965e7277970bf9912de82871bb61d' => 
    array (
      0 => '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/tickets.tpl',
      1 => 1540939510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bd8df2aa41ef0_17653838 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9162818365bd8df2aa28c43_29053365', 'mainContent');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6125159815bd8df2aa2c1f5_80049906', 'afterBodyBlock');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/tickets/maintemplate.tpl");
}
/* {block 'mainContent'} */
class Block_9162818365bd8df2aa28c43_29053365 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mainContent' => 
  array (
    0 => 'Block_9162818365bd8df2aa28c43_29053365',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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

<?php
}
}
/* {/block 'mainContent'} */
/* {block 'afterBodyBlock'} */
class Block_6125159815bd8df2aa2c1f5_80049906 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'afterBodyBlock' => 
  array (
    0 => 'Block_6125159815bd8df2aa2c1f5_80049906',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/template" id="tickets-table-empty-row">
        <tr>
            <td colspan="5">No Tickets found</td>
        </tr>
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/template" id="ticket-table-row">
        <tr class="ticket-row">
            <td><?php echo '<%';?>= openerName <?php echo '%>';?></td>
            <td><?php echo '<%';?>= issueDescription <?php echo '%>';?></td>
            <td><?php echo '<%';?>= closerName <?php echo '%>';?></td>
            <td><?php echo '<%';?>= status <?php echo '%>';?></td>
            <td><?php echo '<%';?>= createtime <?php echo '%>';?></td>
            <td><a href="#" class="edit-ticket">Edit</a></td>
        </tr>
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/template" id="new-ticket-table-editor-row-template">
        <h1>Add new ticket</h1>
        <table class="table">
            <tr class="new-ticket-table-row">
                <td colspan="6">

                    <div class="row">
                        <div class="col-md-2">
                            <label>Your Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="openerNameInput" class="form-control" value="<?php echo '<%';?>= ticket.openerName <?php echo '%>';?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Issue</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="issueDescriptionInput" class="form-control" value="<?php echo '<%';?>= ticket.issueDescription <?php echo '%>';?>">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <label>Closed by</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="closerNameInput" class="form-control" value="<?php echo '<%';?>= ticket.closerName <?php echo '%>';?>">
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
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/template" id="ticket-table-editor-row">
        <tr class="ticket-table-row">
            <td colspan="6">

                <div class="row">
                    <div class="col-md-2">
                        <label>Your Name</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="openerNameInput" class="form-control" value="<?php echo '<%';?>= ticket.openerName <?php echo '%>';?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Issue</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="issueDescriptionInput" class="form-control" value="<?php echo '<%';?>= ticket.issueDescription <?php echo '%>';?>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <label>Closed by</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="closerNameInput" class="form-control" value="<?php echo '<%';?>= ticket.closerName <?php echo '%>';?>">
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
                        <?php echo '<%';?> if(ticket.ticketAttachmentUrl !== null && ticket.ticketAttachmentFileName !== null) { <?php echo '%>';?>
                            <a href="<?php echo '<%';?>= ticket.ticketAttachmentUrl <?php echo '%>';?>"><?php echo '<%';?>= ticket.ticketAttachmentFileName <?php echo '%>';?></a>
                        <?php echo '<%';?>}<?php echo '%>';?>
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
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="js/vendor.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/vendors.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/common.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/runtime.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/tickets.js"><?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'afterBodyBlock'} */
}
