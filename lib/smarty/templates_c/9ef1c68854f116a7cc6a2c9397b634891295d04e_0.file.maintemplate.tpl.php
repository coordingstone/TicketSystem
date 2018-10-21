<?php
/* Smarty version 3.1.33, created on 2018-10-21 18:20:00
  from '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/maintemplate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bccc350cbc065_57509854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ef1c68854f116a7cc6a2c9397b634891295d04e' => 
    array (
      0 => '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/maintemplate.tpl',
      1 => 1540145608,
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
function content_5bccc350cbc065_57509854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/html">

<head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_50886745bccc350c79137_06436540', 'head');
?>



</head>
<body>
    <div id="alert-message" style="display: none;">

    </div>

    <div id="container" class="container-fluid">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4145737585bccc350cac361_15352332', 'menu');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19105223565bccc350cb0da3_05783266', 'mainContent');
?>

    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15611587255bccc350cb32a3_90614739', 'footer');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18785917885bccc350cba155_05349407', 'afterBodyBlock');
?>

</html><?php }
/* {block 'head'} */
class Block_50886745bccc350c79137_06436540 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_50886745bccc350c79137_06436540',
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
class Block_4145737585bccc350cac361_15352332 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_4145737585bccc350cac361_15352332',
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
class Block_19105223565bccc350cb0da3_05783266 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mainContent' => 
  array (
    0 => 'Block_19105223565bccc350cb0da3_05783266',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php
}
}
/* {/block 'mainContent'} */
/* {block 'footer'} */
class Block_15611587255bccc350cb32a3_90614739 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_15611587255bccc350cb32a3_90614739',
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
class Block_18785917885bccc350cba155_05349407 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'afterBodyBlock' => 
  array (
    0 => 'Block_18785917885bccc350cba155_05349407',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


      <?php
}
}
/* {/block 'afterBodyBlock'} */
}
