<?php /* Smarty version Smarty-3.1.11, created on 2012-09-19 14:49:50
         compiled from "view/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1357833047504b03c3a498e5-37765858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25917c32a80396ec34e6dc830b0bf07e37307e70' => 
    array (
      0 => 'view/templates/search.tpl',
      1 => 1348046364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1357833047504b03c3a498e5-37765858',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_504b03c3afe381_71883891',
  'variables' => 
  array (
    'root_categories' => 0,
    'base_url' => 0,
    'page' => 0,
    'root' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504b03c3afe381_71883891')) {function content_504b03c3afe381_71883891($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ab-search-wrap">
        	<div class="ab-search-result-container">
        	<div class="search-result-left">
        	<div class="browse-by">Filter By</div>
        	<div class="ab-category-filters">
        	
        		  <div class="ab-category-filter">
                    	<div class="filter-head"> <span class="filter-head-title">Category </span></div>
                        <div class="filters">
                        	<ul>
                               
                            	<?php  $_smarty_tpl->tpl_vars['root'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['root']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['root_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['root']->key => $_smarty_tpl->tpl_vars['root']->value){
$_smarty_tpl->tpl_vars['root']->_loop = true;
?>
                                    <li class="filter-list"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/search-product?q=<?php echo $_smarty_tpl->tpl_vars['page']->value->query;?>
&category=<?php echo substr($_smarty_tpl->tpl_vars['root']->value['slug'],0,-1);?>
"><?php echo $_smarty_tpl->tpl_vars['root']->value['name'];?>
</a></li>
                                <?php } ?> 
                                
                            </ul>
                        </div>
                        
                        </div>
                       </div>
        	</div>
        	 </div>
            	<div class="search-result-right"> 
                	
                    
            <div class="ab-brand-name-title"><span class="search-result-for">Search Results for </span><span class="search-result-count"><?php echo $_smarty_tpl->tpl_vars['page']->value->query;?>
</span> </div>
            	<div class="ab-category-view-change">
                	<div class="ab-result-count"> Showing  <span class="current-product-count"><?php echo $_smarty_tpl->tpl_vars['page']->value->num_results;?>
</span> of <span class="total-product-count"><?php echo $_smarty_tpl->tpl_vars['page']->value->total_results;?>
</span> Results</div>
                   
                  <div class="ab-sort-by"><select class="comment-inputbox" name="sortby">
                  
                		<option value="price">Sort by Price</option>
  						<option value="date">Sort by Date</option>
  					  
                  </select></div>
                  
                 
                    <div class="clr"></div>
                </div>
              
                <div class="ab-product-list-view">
                
                  <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['result']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->results; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
$_smarty_tpl->tpl_vars['result']->_loop = true;
?>
                	<div class="ab-search-product-box">
                	<div class="ab-search-product-box-in">	
                    	<div class="ab-search-product-image"> <img alt="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
<?php if ($_smarty_tpl->tpl_vars['result']->value['upcoming']>0){?>&upcoming=1<?php }?>" /></div>
                        <div class="ab-search-product-name"><a href="<?php echo $_smarty_tpl->tpl_vars['result']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</a></div>
                      
                        
                        	<div class="product-price"> 
                        	 <span class="as-low-as">as low as </span>
                                <span class="lowest-price WebRupee"> Rs.</span>  <span class="lowest-price"> <?php echo $_smarty_tpl->tpl_vars['result']->value['lowest_price']['price'];?>
</span></div>
                           <a  class="ab-brand-product-box-in-a-full" href="<?php echo $_smarty_tpl->tpl_vars['result']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
"></a>
                       
                        </div>
                        
                  
                    <div class="clr"></div>
                    
                    </div>
                    
                <?php } ?>
                
               
                
               
               
            
            
                    <div class="clr"></div>
                
                </div>
              	 <div class="clr"></div> 
                </div>
            	    <div class="clr"></div>   
             </div>
             
            </div>

  <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>