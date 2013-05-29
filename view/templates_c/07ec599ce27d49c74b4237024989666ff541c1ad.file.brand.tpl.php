<?php /* Smarty version Smarty-3.1.11, created on 2012-09-12 11:09:22
         compiled from "view/templates/brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1258514908504bc801845c26-35794212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ec599ce27d49c74b4237024989666ff541c1ad' => 
    array (
      0 => 'view/templates/brand.tpl',
      1 => 1347428359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1258514908504bc801845c26-35794212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_504bc802d694d6_62190495',
  'variables' => 
  array (
    'base_url' => 0,
    'page' => 0,
    'cat' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504bc802d694d6_62190495')) {function content_504bc802d694d6_62190495($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ab-brand-wrap">
    <div class="ab-brand-container">
    	<div class="ab-brand-left">
    	<div class="ab-brand-right-top">
    	<div class="ab-brand-block-left">
      <div class="brand-logo">
            <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/images/brand_logo/<?php echo $_smarty_tpl->tpl_vars['page']->value->brand['name'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['page']->value->brand['name'];?>
" />
            </div>
        <div class="ab-brand-name-title"><span><?php echo $_smarty_tpl->tpl_vars['page']->value->brand['name'];?>
 Products</span> <span class="total-product-count"> (<?php echo $_smarty_tpl->tpl_vars['page']->value->brand['num_products'];?>
)</span></div>
        	
       
            
            
            
            </div>
           
            <div class="ab-brand-block-right">
            	<div class="ab-brand-block-right-head">Categories in <?php echo $_smarty_tpl->tpl_vars['page']->value->brand['name'];?>
</div>
            	<div>
            	<ul>
					<?php  $_smarty_tpl->tpl_vars['products'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['products']->_loop = false;
 $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value->results; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['products']->key => $_smarty_tpl->tpl_vars['products']->value){
$_smarty_tpl->tpl_vars['products']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->value = $_smarty_tpl->tpl_vars['products']->key;
?>
            		<li>
					 <a  href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
s?brand=<?php echo $_smarty_tpl->tpl_vars['page']->value->brand['name'];?>
">	<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
<span> (<?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
 )</span> </a>
					</li>
					<?php } ?>
            	</ul>
            	</div>
            </div>
            
            <div class="clr"></div>
             </div>
            <div class="ab-brand-products">
            <?php  $_smarty_tpl->tpl_vars['products'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['products']->_loop = false;
 $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page']->value->results; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['products']->key => $_smarty_tpl->tpl_vars['products']->value){
$_smarty_tpl->tpl_vars['products']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->value = $_smarty_tpl->tpl_vars['products']->key;
?>
           	 <div class="ab-category-products">
             	<div class="head-white"><span class="ab-category-title"> <?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
</span> <span class="category-product-count"> (<?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
)</span> <span class="brand-view-all"> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
s?brand=<?php echo $_smarty_tpl->tpl_vars['page']->value->brand['name'];?>
">View All</a><span></div>
                	<div class="ab-category-products-container">
                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                        <div class="ab-brand-product-box"> 
                            <div class="ab-brand-product-box-in">
                            <div class="product-image"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['_id'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
"/></div>
                          <div class="product-name">
                          <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['slug'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
                          </div>
                          
                          <div class="product-price"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">  <?php echo $_smarty_tpl->tpl_vars['product']->value['lowest_price']['price'];?>
</span></div>
        		   <a class="ab-brand-product-box-in-a-full" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value['slug'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['_id'];?>
"> </a>
        		 </div>
                     </div>
                        <?php } ?>
                     <div class="clr"></div>
                   </div>
           	 </div>
            
            <?php } ?>
            <div class="clr"></div>
            </div>
            </div>
            <div class="ab-brand-right">
            	<div class="ab-right-block">
            		<div class="head-white">
                <span class="box-head-title">New Additions</span>
                </div>
            	
            	
            	</div>
            </div>
             <div class="clr"></div>
        </div>
    
    
    </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>