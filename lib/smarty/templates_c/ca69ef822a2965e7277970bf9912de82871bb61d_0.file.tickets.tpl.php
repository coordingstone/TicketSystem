<?php
/* Smarty version 3.1.33, created on 2018-10-20 22:28:14
  from '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/tickets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bcbabfe300823_39350337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca69ef822a2965e7277970bf9912de82871bb61d' => 
    array (
      0 => '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/tickets.tpl',
      1 => 1540074493,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bcbabfe300823_39350337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18071669925bcbabfe2f4d85_39969768', 'mainContent');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13542283495bcbabfe2f7d47_40409317', 'afterBodyBlock');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/tickets/maintemplate.tpl");
}
/* {block 'mainContent'} */
class Block_18071669925bcbabfe2f4d85_39969768 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mainContent' => 
  array (
    0 => 'Block_18071669925bcbabfe2f4d85_39969768',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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

<?php
}
}
/* {/block 'mainContent'} */
/* {block 'afterBodyBlock'} */
class Block_13542283495bcbabfe2f7d47_40409317 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'afterBodyBlock' => 
  array (
    0 => 'Block_13542283495bcbabfe2f7d47_40409317',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/template" id="tickets-table-row">
        <tr class="ticket-row" style="display: none">
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
 type="text/javascript" src="js/common.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/vendors~common.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/tickets.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/vendors~common~tickets.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'afterBodyBlock'} */
}
