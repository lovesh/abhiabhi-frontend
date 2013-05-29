<?php /* Smarty version Smarty-3.1.11, created on 2012-09-19 18:04:55
         compiled from "view/templates/upcoming.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161764432850546ef614ba17-42034067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc0127cf979440e9d957c1322e5afeab2c45452f' => 
    array (
      0 => 'view/templates/upcoming.tpl',
      1 => 1348058091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161764432850546ef614ba17-42034067',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50546ef6173070_02566923',
  'variables' => 
  array (
    'upcoming' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50546ef6173070_02566923')) {function content_50546ef6173070_02566923($_smarty_tpl) {?><div class="coming-soon">
                    <div class="upcoming-image">	 <img alt="<?php echo $_smarty_tpl->tpl_vars['upcoming']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['upcoming']->value['_id'];?>
&upcoming=1"></div>
               <div class="upcoming-title">    <a href="<?php echo $_smarty_tpl->tpl_vars['upcoming']->value['url'];?>
" ><?php echo $_smarty_tpl->tpl_vars['upcoming']->value['name'];?>
</a></div>
                     
                      
                        	
                        <a class="upcoming-full-a" href="<?php echo $_smarty_tpl->tpl_vars['upcoming']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['upcoming']->value['name'];?>
"></a>
                      
                  
                    <div class="clr"></div>
                    </div>
                    
                    <?php }} ?>