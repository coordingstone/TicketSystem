<?php
/* Smarty version 3.1.33, created on 2018-10-20 22:08:59
  from '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/maintemplate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bcba77bbf1f02_31001382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ef1c68854f116a7cc6a2c9397b634891295d04e' => 
    array (
      0 => '/Users/joelsvensson/Documents/development/TicketSystem/templates/frontend/tickets/maintemplate.tpl',
      1 => 1540073330,
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
function content_5bcba77bbf1f02_31001382 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/html">

<head>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11399114235bcba77bbdad04_82717002', 'head');
?>



</head>
<body>
    <div id="alert-message" style="display: none;">

    </div>

    <div id="container" class="container-fluid">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10648425565bcba77bbe5e55_77195138', 'menu');
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13448354945bcba77bbea0d3_13470155', 'mainContent');
?>

    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18189389065bcba77bbec2e3_44034904', 'footer');
?>

</body>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7648179785bcba77bbf0559_70869222', 'afterBodyBlock');
?>

</html><?php }
/* {block 'head'} */
class Block_11399114235bcba77bbdad04_82717002 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_11399114235bcba77bbdad04_82717002',
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
class Block_10648425565bcba77bbe5e55_77195138 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'menu' => 
  array (
    0 => 'Block_10648425565bcba77bbe5e55_77195138',
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
class Block_13448354945bcba77bbea0d3_13470155 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'mainContent' => 
  array (
    0 => 'Block_13448354945bcba77bbea0d3_13470155',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php
}
}
/* {/block 'mainContent'} */
/* {block 'footer'} */
class Block_18189389065bcba77bbec2e3_44034904 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_18189389065bcba77bbec2e3_44034904',
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
class Block_7648179785bcba77bbf0559_70869222 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'afterBodyBlock' => 
  array (
    0 => 'Block_7648179785bcba77bbf0559_70869222',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


      <?php
}
}
/* {/block 'afterBodyBlock'} */
}
