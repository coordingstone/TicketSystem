<?php
/* Smarty version 3.1.33, created on 2018-10-21 20:33:05
  from '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/tickets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bcce281d62bc1_39527063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca69ef822a2965e7277970bf9912de82871bb61d' => 
    array (
      0 => '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/tickets.tpl',
      1 => 1540153954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bcce281d62bc1_39527063 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11600902155bcce281d50519_23607128', 'mainContent');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11890128075bcce281d537a8_68191512', 'afterBodyBlock');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/tickets/maintemplate.tpl");
}
/* {block 'mainContent'} */
class Block_11600902155bcce281d50519_23607128 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mainContent' => 
  array (
    0 => 'Block_11600902155bcce281d50519_23607128',
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

<?php
}
}
/* {/block 'mainContent'} */
/* {block 'afterBodyBlock'} */
class Block_11890128075bcce281d537a8_68191512 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'afterBodyBlock' => 
  array (
    0 => 'Block_11890128075bcce281d537a8_68191512',
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
            <td><?php echo '<%';?>= issuer <?php echo '%>';?></td>
            <td><?php echo '<%';?>= title <?php echo '%>';?></td>
            <td><?php echo '<%';?>= createtime <?php echo '%>';?></td>
            <td><?php echo '<%';?>= closetime <?php echo '%>';?></td>
            <td><?php echo '<%';?>= closer <?php echo '%>';?></td>
            <td><a href="#" class="edit-ticket">Edit</a></td>
        </tr>
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/template" id="ticket-table-editor-row">
        <tr class="ticket-table-editor-row">
            <td colspan="5">

                <div class="row">
                    <div class="col-md-2">
                        <label>Issuer</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="issuerName" class="form-control" value="<?php echo '<%';?>= ticket.issuer <?php echo '%>';?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Title</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="titleName" class="form-control" value="<?php echo '<%';?>= ticket.name <?php echo '%>';?>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <label>Issue</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="issueName" class="form-control" value="<?php echo '<%';?>= ticket.issue <?php echo '%>';?>">
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
