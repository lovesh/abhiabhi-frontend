<?php /* Smarty version Smarty-3.1.11, created on 2012-09-19 17:29:26
         compiled from "view/templates/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1721824001504a7bfcd93723-18458161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '131ec7134c452e49ee143e3d5a0d6161ec9bb78e' => 
    array (
      0 => 'view/templates/category.tpl',
      1 => 1348055963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1721824001504a7bfcd93723-18458161',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_504a7bfe123d03_95280581',
  'variables' => 
  array (
    'base_url' => 0,
    'page' => 0,
    'pf' => 0,
    'brand' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504a7bfe123d03_95280581')) {function content_504a7bfe123d03_95280581($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ab-category-wrap">
    	<div class="ab-category-container">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Home</a>
                    </li>
                    <li>
                       <span>  » </span> <?php echo $_smarty_tpl->tpl_vars['page']->value->category->name;?>
s
                    </li>
                    
                </ul>
                <div class="clr"></div>
                </div>
                    
        	<div class="ab-category-left">
        		<div class="browse-by">
        			Browse By
        		
        		</div>
            
            	<div class="ab-category-filters">
                	
                    <?php if ($_smarty_tpl->tpl_vars['page']->value->type['type']!='upcoming'){?>
                    <div class="ab-category-filter">
                    	<div class="filter-head"> <span class="filter-head-title">Prices </span></div>
                        <div class="filters">
                        	<ul>
                                <?php  $_smarty_tpl->tpl_vars['pf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->priceFilters; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pf']->key => $_smarty_tpl->tpl_vars['pf']->value){
$_smarty_tpl->tpl_vars['pf']->_loop = true;
?>
                            	<li class="filter-list"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->category->name;?>
s?price=<?php echo $_smarty_tpl->tpl_vars['pf']->value[1][0];?>
-<?php if (count($_smarty_tpl->tpl_vars['pf']->value[1])>1){?><?php echo $_smarty_tpl->tpl_vars['pf']->value[1][1];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['pf']->value[0];?>
</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    
                    </div>
                    <?php }?>
                    <div class="ab-category-filter">
                    	<div class="filter-head"> <span class="filter-head-title">Brands </span></div>
                        <div class="filters">
                        	<ul>
                                <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->brands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value){
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                            	<li class="filter-list"><a href="<?php echo $_smarty_tpl->tpl_vars['brand']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['page']->value->type['type']!='upcoming'){?><span class="category_num_count"> (<?php echo $_smarty_tpl->tpl_vars['brand']->value['num_products'];?>
) </span><?php }?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    
                    </div>
                </div>
               
               
                	
                
            </div>
            <div class="ab-category-content">
           
            	<div class="ab-category-view-change">
                	
                    <div class="ab-category-result-count">Showing  <span class="current-product-count"><?php echo count($_smarty_tpl->tpl_vars['page']->value->products);?>
</span> of  <span class="total-product-count"> <?php echo $_smarty_tpl->tpl_vars['page']->value->category->numProducts;?>
</span></div>
                  <div class="ab-sort-by"><select class="comment-inputbox" name="sortby">
                                 <option value="sort_by" selected="selected">Sort by</option>
                		<option value="price_dsc">Price: High to Low</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="date">Newly Added First</option>
  					  
                  </select></div>
                  
                   <ul class="ab-view-change">
                    	<li class="ab-category-list-view"><span>List View </span> </li> 
                        <li class="ab-category-gird-view"><span>Grid View</span></li>
                    </ul>
                    <div class="clr"></div>
                </div>
                
                <div class="ab-product-list-view">
                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                	
                	<div class="ab-product-box">
                	<div class="ab-product-box-in">
                    	<div class="ab-product-image"> <img alt="<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
<?php if ($_smarty_tpl->tpl_vars['page']->value->type['type']=='upcoming'){?>&upcoming=1<?php }?>"></div>
                        <div class="ab-product-name"><a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['url'];?>
" ><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</a></div>
                     
                        <div class="ab-product-price">
                        	<div class="price-box"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">  <?php echo $_smarty_tpl->tpl_vars['p']->value['lowest_price']['price'];?>
</span></div>
                        	<div class="store-count"><span>(on <?php echo $_smarty_tpl->tpl_vars['p']->value['store_count'];?>
 store)</span></div>
                        <a class="full-box-a" href="<?php echo $_smarty_tpl->tpl_vars['p']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
"></a>
                        </div>
                       </div>
                  
                    <div class="clr"></div>
                    
                    </div>
                    
                <?php } ?>
                
                 <div class="clr"></div>
                
                
                <div class="category-page-no" style="display:none;"><img src="/images/auto-loader.gif" />Loading more results </div>
                </div>
                
            
            </div>
            
        
        
        </div>
    <div class="clr"></div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>