<?php /* Smarty version Smarty-3.1.11, created on 2012-09-15 21:11:39
         compiled from "view/templates/brands.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1732229972504baaff879aa7-69196432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a996cfe888bf887516e3d8391f0140eb250baf16' => 
    array (
      0 => 'view/templates/brands.tpl',
      1 => 1347723694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1732229972504baaff879aa7-69196432',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_504baaffa340c7_04149034',
  'variables' => 
  array (
    'page' => 0,
    'category' => 0,
    'base_url' => 0,
    'brand' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504baaffa340c7_04149034')) {function content_504baaffa340c7_04149034($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ab-brands-wrap">
        	<div class="ab-brands-page">
        	<div class="ab-brands-left">
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->categories; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            	<div class="ab-brands-block">
            	
                	<div class="ab-brands-block-head"> <span> Brands in <?php echo $_smarty_tpl->tpl_vars['category']->key;?>
 </span></div>
                	<div class="ab-brands-container">
                     <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value){
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                    	<div class="ab-brands">
                        		<div class="ab-brands-logo"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/images/brand_logo/<?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
" /></div>
                           		<div class="ab-brands-name"><span> <?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
</span> <span> (<?php echo $_smarty_tpl->tpl_vars['brand']->value['num_products'];?>
)</span></div>
                        </div>
                    	<?php } ?>	
                        <div class="clr"></div>	
                    </div>
                	
                
                </div>
                        <?php } ?>
            </div>
            <div class="ab-brands-right">
            	
            <?php echo $_smarty_tpl->getSubTemplate ("upcoming.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            
            </div>
            <div class="clr"></div>
            
            </div>
            
        </div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>