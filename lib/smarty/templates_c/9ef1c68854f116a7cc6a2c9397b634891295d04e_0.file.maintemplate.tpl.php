<?php
/* Smarty version 3.1.33, created on 2018-10-24 19:50:39
  from '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/maintemplate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bd0cd0f6cb5b4_67443055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ef1c68854f116a7cc6a2c9397b634891295d04e' => 
    array (
      0 => '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/maintemplate.tpl',
      1 => 1540410623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.tpl' => 1,
    'file:./menu.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_5bd0cd0f6cb5b4_67443055 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/html">

<head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_972622465bd0cd0f6a4d29_65702801', 'head');
?>


</head>
<body>
    <div id="alert-message" style="display: none;">

    </div>

    <div id="container" class="container-fluid">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15917966145bd0cd0f6b73d0_53383175', 'menu');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5223569455bd0cd0f6bb3e2_33962698', 'mainContent');
?>

    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13725536005bd0cd0f6bd5e4_05734226', 'footer');
?>

</body>
<?php echo '<script'; ?>
 type="text/template" id="alert-message-template">
    <div id="alert-message">
        <div style="padding: 5px;">
            <div class="alert alert-<?php echo '<%';?>=type<?php echo '%>';?> alert-dismissible" role="alert">
                <strong><?php echo '<%';?>= shortDesc <?php echo '%>';?></strong>&nbsp;<?php echo '<%';?>=text<?php echo '%>';?>
            </div>
        </div>
    </div>
<?php echo '</script'; ?>
>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6010442635bd0cd0f6c93c3_85007725', 'afterBodyBlock');
?>

</html><?php }
/* {block 'head'} */
class Block_972622465bd0cd0f6a4d29_65702801 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_972622465bd0cd0f6a4d29_65702801',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender("file:./header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'head'} */
/* {block 'menu'} */
class Block_15917966145bd0cd0f6b73d0_53383175 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_15917966145bd0cd0f6b73d0_53383175',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender("file:./menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php
}
}
/* {/block 'menu'} */
/* {block 'mainContent'} */
class Block_5223569455bd0cd0f6bb3e2_33962698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mainContent' => 
  array (
    0 => 'Block_5223569455bd0cd0f6bb3e2_33962698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php
}
}
/* {/block 'mainContent'} */
/* {block 'footer'} */
class Block_13725536005bd0cd0f6bd5e4_05734226 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_13725536005bd0cd0f6bd5e4_05734226',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php $_smarty_tpl->_subTemplateRender("file:./footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'footer'} */
/* {block 'afterBodyBlock'} */
class Block_6010442635bd0cd0f6c93c3_85007725 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'afterBodyBlock' => 
  array (
    0 => 'Block_6010442635bd0cd0f6c93c3_85007725',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


      <?php
}
}
/* {/block 'afterBodyBlock'} */
}
