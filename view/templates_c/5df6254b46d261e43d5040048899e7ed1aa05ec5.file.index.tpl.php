<?php /* Smarty version Smarty-3.1.11, created on 2012-09-19 18:31:26
         compiled from "view/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13775307835049a266403b39-12569445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5df6254b46d261e43d5040048899e7ed1aa05ec5' => 
    array (
      0 => 'view/templates/index.tpl',
      1 => 1348059680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13775307835049a266403b39-12569445',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5049a2664f8286_05418292',
  'variables' => 
  array (
    'page' => 0,
    'fp' => 0,
    'base_url' => 0,
    'pp' => 0,
    'rp' => 0,
    'camera' => 0,
    'price_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5049a2664f8286_05418292')) {function content_5049a2664f8286_05418292($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        
        <div class="ab-landing-wrap">
        	<div class="ab-home-cantainer">
            	<div class="ab-home-top">
                	<div class="ab-home-top-left">
                    	<div class="ab-third-box-head">
                    Best Seller
                    </div>
                        <div class="ab-top-seller-body">
                       
                    
                    <?php  $_smarty_tpl->tpl_vars['fp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->best_seller_products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fp']->key => $_smarty_tpl->tpl_vars['fp']->value){
$_smarty_tpl->tpl_vars['fp']->_loop = true;
?>
                        <div class="ab-best-seller-box">
                    	<div class="ab-best-seller-image"> <img alt="<?php echo $_smarty_tpl->tpl_vars['fp']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['fp']->value['_id'];?>
" /></a></div>
                        <div class="ab-best-seller-name"><a href="<?php echo $_smarty_tpl->tpl_vars['fp']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['fp']->value['name'];?>
</a></div>
                        <div class="ab-product-price">
                        
                        	<div class="price-box"><span class="as-low-as">as low as</span>  <span class="WebRupee lowest-price">Rs.</span>  <span class="lowest-price"> <?php echo $_smarty_tpl->tpl_vars['fp']->value['lowest_price']['price'];?>
</span></div>
                        	
                        
                        </div>
                      <a class="ab-popular-home-full-a" href="<?php echo $_smarty_tpl->tpl_vars['fp']->value['slug'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['fp']->value['name'];?>
"></a>
                     
                    <div class="clr"></div>
                    
                    </div>
                     <?php } ?>
                        </div>
                    </div>
                    <div class="ab-home-top-right">
                  
               	   <div class="coming-Soon-home">
               	   <?php echo $_smarty_tpl->getSubTemplate ("upcoming.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

               	   </div>
             		
                    </div>
                    <div class="clr"></div>
                </div>
            	
                
                <div class="ab-home-second-top">
            	<div class="ab-brands-block">
                	<div class="ab-brands-block-head"> <span> Popular Products </span></div>
                	<div class="ab-brands-container">
                    <?php  $_smarty_tpl->tpl_vars['pp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->most_viewed_products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pp']->key => $_smarty_tpl->tpl_vars['pp']->value){
$_smarty_tpl->tpl_vars['pp']->_loop = true;
?>
                    	<div class="ab-products-home">
                        		<div class="ab-products-logo-home"><img alt="<?php echo $_smarty_tpl->tpl_vars['pp']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['pp']->value['_id'];?>
" /></div>
                           		<div class="ab-products-name-home"><span> <a class="popular-product-a" href="<?php echo $_smarty_tpl->tpl_vars['pp']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['pp']->value['name'];?>
</a></span><div><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price"> <?php echo $_smarty_tpl->tpl_vars['pp']->value['lowest_price']['price'];?>
</span> </div></div>
                           		<a  class="ab-popular-home-full-a" href="<?php echo $_smarty_tpl->tpl_vars['pp']->value['slug'];?>
" title= "<?php echo $_smarty_tpl->tpl_vars['pp']->value['name'];?>
"></a>
                        </div>
                    	<?php } ?>	
                        <div class="clr"></div>	
                    </div>
                	
                
                </div>
                
                <div class="ab-brands-block">
                	<div class="ab-brands-block-head"> <span> New Additions </span></div>
                	<div class="ab-brands-container">
                    <?php  $_smarty_tpl->tpl_vars['rp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->recent_products; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rp']->key => $_smarty_tpl->tpl_vars['rp']->value){
$_smarty_tpl->tpl_vars['rp']->_loop = true;
?>
                    	<div class="ab-products-home">
                        		<div class="ab-products-logo-home"><img alt="<?php echo $_smarty_tpl->tpl_vars['rp']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['rp']->value['_id'];?>
" /></div>
                           		<div class="ab-products-name-home"><span> <a  class="popular-product-a" href="<?php echo $_smarty_tpl->tpl_vars['rp']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['rp']->value['name'];?>
</a></span><div> <span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price"><?php echo $_smarty_tpl->tpl_vars['rp']->value['lowest_price']['price'];?>
</span></div></div>
                           	<a  class="ab-popular-home-full-a" href="<?php echo $_smarty_tpl->tpl_vars['rp']->value['slug'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['rp']->value['name'];?>
"></a>	
                        </div>
                    	<?php } ?>	
                        <div class="clr"></div>	
                    </div>
                	
                
                </div>
            
            </div>
            <div class="ab-home-third-box">
            	<div class="ab-third-box-left">
                	<div class="ab-third-box-head">
                    Best Selling Cameras
                    </div>
                    <div class="ab-third-box-body">
                        <?php  $_smarty_tpl->tpl_vars['camera'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['camera']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->best_cameras; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['camera']->key => $_smarty_tpl->tpl_vars['camera']->value){
$_smarty_tpl->tpl_vars['camera']->_loop = true;
?>
                        <div class="ab-products-home">
                        		<div class="ab-products-logo-home"><img alt="<?php echo $_smarty_tpl->tpl_vars['camera']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['camera']->value['_id'];?>
" /></div>
                           		<div class="ab-products-name-home"><span> <a  class="popular-product-a" href="<?php echo $_smarty_tpl->tpl_vars['camera']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['camera']->value['name'];?>
</a></span><div> <span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price"><?php echo $_smarty_tpl->tpl_vars['camera']->value['lowest_price']['price'];?>
</span></div></div>
                           	<a  class="ab-popular-home-full-a" href="<?php echo $_smarty_tpl->tpl_vars['camera']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['camera']->value['name'];?>
"></a>	
                        </div>
                        <?php } ?>
                        <div class="clr"></div>
                    </div>
                </div>
                <div class="ab-third-box-right">
              		  <div class="head-white">
              			  <span class="box-head-title">Mobile Price List</span>
               		 </div>
                    
               		<ul>
                         <?php  $_smarty_tpl->tpl_vars['price_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['price_list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->price_lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['price_list']->key => $_smarty_tpl->tpl_vars['price_list']->value){
$_smarty_tpl->tpl_vars['price_list']->_loop = true;
?>
               		 <li class="similar-item-box">
                        <div class="side-bar-brand-logo-box">     <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/images/brand_logo/<?php echo $_smarty_tpl->tpl_vars['price_list']->value['name'];?>
.png" class="side-bar-brand-logo"></div>
                          <div class="side-bar-brand-a-box">   <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/mobiles?brand=<?php echo $_smarty_tpl->tpl_vars['price_list']->value['name'];?>
" class="ab-brand-link-sidebar"><?php echo $_smarty_tpl->tpl_vars['price_list']->value['name'];?>
 Mobiles Price List</a></div>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/mobiles?brand=<?php echo $_smarty_tpl->tpl_vars['price_list']->value['name'];?>
" class="sidebar-full-a"></a>
                             <div class="clr"></div>
                         </li>
                         <?php } ?>
                         </ul>
               		 
               
                </div>
                <div class="clr"></div>	
            </div>
            
            </div>
            
            
            
        	<div class="clr"></div>
        </div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>