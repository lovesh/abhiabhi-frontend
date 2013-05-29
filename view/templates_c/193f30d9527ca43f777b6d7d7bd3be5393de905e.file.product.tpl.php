<?php /* Smarty version Smarty-3.1.11, created on 2012-09-20 23:42:53
         compiled from "view/templates/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29063571650485e29115806-23566538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '193f30d9527ca43f777b6d7d7bd3be5393de905e' => 
    array (
      0 => 'view/templates/product.tpl',
      1 => 1348164741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29063571650485e29115806-23566538',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50485e292aa570_95261184',
  'variables' => 
  array (
    'base_url' => 0,
    'page' => 0,
    'kf' => 0,
    'store' => 0,
    'specs' => 0,
    'spec' => 0,
    'comments' => 0,
    'comment' => 0,
    'i' => 0,
    'brand' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50485e292aa570_95261184')) {function content_50485e292aa570_95261184($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="ab-item-wrap">
    	<div class="ab-item-page">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
s"> <span> » </span><?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
</a>
                    </li>
                    <li>
                         <span> » </span> <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>

                    </li>
                </ul>
                <div class="clr"></div>
                </div>
    		<div class="ab-item-left">
        	<div class="ab-item-block">
        		<div class="ab-item-feat">
            		<div class="ab-item-image-block">
                    	<div class="ab-item-image">
                        <img alt="<?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['page']->value->product_id;?>
<?php if ($_smarty_tpl->tpl_vars['page']->value->upcoming==1){?>&upcoming=1<?php }?>" />
                		</div>
                       
                        
                    </div>
                	<div class="ab-item-details-block">
                    	<div class="ab-item-summry">
                   			<div class="ab-item-title">
                       			 <h2 title="sample title"><?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</h2>
                                 <?php if (isset($_smarty_tpl->tpl_vars['page']->value->product_color)){?>
                       			 <span class="item-color">($page->product_color) </span>
                                 <?php }?>
                   			</div>
                            <div class="ab-item-summry">
                            <ul class="product-details-list">
                            <?php  $_smarty_tpl->tpl_vars['kf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->product_key_features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kf']->key => $_smarty_tpl->tpl_vars['kf']->value){
$_smarty_tpl->tpl_vars['kf']->_loop = true;
?>
                            <li class="ab-item-summery-top"><span><?php echo $_smarty_tpl->tpl_vars['kf']->value;?>
</span></li>
                            <?php } ?>
                           </ul>
                            </div>
                            
                        </div>
                        <div class="clr"></div>
                        <div class="ab-item-best-price">
                            
                        	<div class="item-price-block">
                             	<div>
                                
                                <span class="item-best-price">Best Price: </span>
                                <?php if ($_smarty_tpl->tpl_vars['page']->value->lowest_price['price']>0){?> <span class="item-best-price WebRupee"> Rs.</span>  <span class="item-best-price"> <?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['price'];?>
 <?php }else{ ?> N/A<?php }?></span>
                                </div>
                                
                                <div class="store-link">
                            		<a target="_blank" rel="nofollow" href="<?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['url'];?>
"><span>Go to Store</span></a>
                            	</div>
                             </div>
                        	<div class="item-avail-block"> 
                                
                                <div class="stock-info"><?php if (array_key_exists('availability',$_smarty_tpl->tpl_vars['page']->value->lowest_price)){?>Available<?php }else{ ?>Not Available<?php }?></div>
                                
                                <div class="shipping-details">
                                <?php if (array_key_exists('shipping',$_smarty_tpl->tpl_vars['page']->value->lowest_price)){?>
                                    Delivered in <span class="bold-text"> <?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['shipping'];?>
</span><span> days </span>
                                <?php }else{ ?>
                                    Delivery Time <span class="bold-text"> N/A </span>
                                <?php }?>
                                </div>
                                
                            </div>
                         <div class="clr"></div>   
                        </div>
                        <div class="clr"></div>
                        <div class="ab-visit-store">
                         	
                            <div class="ab-item-share-block">
                             <div class="item-gplus"><div class="g-plusone"></div></div>
                             <div class="item-fb-like"><div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['page']->value->canonical_url;?>
" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div></div>
                             <div class="item-tweet"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
                        </div>
                        
                         </div>
                    
                	</div>
                </div>
                <div class="clr"></div>
                <div class="ab-store-heading">
                    <h3>
                        <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
 Price in India
                    </h3>
                    </div>
                <?php if (count($_smarty_tpl->tpl_vars['page']->value->stores)>0){?>
                <div class="store-table">
                	<div class="ab-compare-price"> 
                  <table class="ab-pricing-table" cellspacing="0" cellpadding="0">
                 	 <thead class="table-head">
                  		<tr class="section">
                        	<td >Seller</td>
                            <td>Price</td>
                            <td>Delivery Time</td>
                            <td>Availability</td>
                            <td>Details</td>
                  		</tr>
                 	 </thead>
                     <tbody>
                     <?php  $_smarty_tpl->tpl_vars['store'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['store']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->stores; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['store']->key => $_smarty_tpl->tpl_vars['store']->value){
$_smarty_tpl->tpl_vars['store']->_loop = true;
?>
                     <tr class="pricing-table">
                     <td><a target="_blank" rel="nofollow" href="<?php echo $_smarty_tpl->tpl_vars['store']->value['url'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['store']->value['name'];?>
.com" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/images/store_logo/<?php echo $_smarty_tpl->tpl_vars['store']->value['name'];?>
.png" /></a></td>
                     
                     <?php if (array_key_exists('price',$_smarty_tpl->tpl_vars['store']->value)&&$_smarty_tpl->tpl_vars['store']->value['price']>0){?>
                     <td><span class="ab-webrupee WebRupee">Rs.</span><span class="ab-webrupee"> <?php echo $_smarty_tpl->tpl_vars['store']->value['price'];?>
</span> </td>
                     <?php }else{ ?>
                     <td><span class="ab-webrupee">N/A</span> </td>
                     <?php }?>
                     
                     <?php if (array_key_exists('shipping',$_smarty_tpl->tpl_vars['store']->value)){?>
                     <td> <?php echo $_smarty_tpl->tpl_vars['store']->value['shipping'];?>
 days</td>
                     <?php }else{ ?>
                         <td> N/A</td>
                     <?php }?>
                     
                     <?php if (array_key_exists('availability',$_smarty_tpl->tpl_vars['store']->value)){?>
                         <?php if ($_smarty_tpl->tpl_vars['store']->value['availability']==1){?>
                            <td> Available</td>
                         <?php }else{ ?>
                            <td> Not Available</td>
                         <?php }?>
                     <?php }else{ ?>
                         <td> Not Available</td>
                     <?php }?>
                     
                     <td> 
                     <div class="store-link">
                            <a target="_blank" rel="nofollow" href="<?php echo $_smarty_tpl->tpl_vars['store']->value['url'];?>
"><span>Go to Store</span></a>
                     </div>
                     </td>
                     
                     </tr>
                     <?php } ?>
                 </tbody>
                </table>
               </div>
                   
                
                </div>
                 <?php }?>
                 
                 <?php if ($_smarty_tpl->tpl_vars['page']->value->description!=''){?>
                <div class="ab-item-summery-box">
                
                <div class="head-white"><span class="box-head-title">Description of <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</span></div>
                <?php echo $_smarty_tpl->tpl_vars['page']->value->description;?>

                 </div>
                 <?php }?>
                  <div class="ab-product-dec">
                	<ul>
                		<li><span><b><?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</b> price in india is <?php if ($_smarty_tpl->tpl_vars['page']->value->lowest_price['price']>0){?> <span class="WebRupee"> Rs.</span>   <?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['price'];?>
 <?php }else{ ?> N/A<?php }?>, and is currently available on <?php  $_smarty_tpl->tpl_vars['store'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['store']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->stores; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['store']->key => $_smarty_tpl->tpl_vars['store']->value){
$_smarty_tpl->tpl_vars['store']->_loop = true;
?> <?php echo $_smarty_tpl->tpl_vars['store']->value['name'];?>
, <?php } ?>
                		
                		 </li>
                		<li> <span>The price mentioned above is valid in major cities like delhi, mumbai, chennai, bangalore, hyderabad, 
pune for cash on delivery availability check respective store with your area pin code.</span> </li>
                		<li><span>All the prices mentioned here are in INR.</span>  </li>
                		<li><span>Price of <b><?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</b>  was last updated on .</span>  </li>
                		
                	</ul>	
                	<div class="clr"></div>
                </div> 
                 
                <?php if (count($_smarty_tpl->tpl_vars['page']->value->specification)>0){?>
                <div class="ab-item-specs-block">
                
                	<h3 class="item-specs-title-name"><b class="box-head-title">Specification of <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</b></h3></div>
               		<div class="ab-item-specs">
                    	<table class="item-specs-table" cellspacing="0">    
                        <tbody>
               		
                        <?php  $_smarty_tpl->tpl_vars['specs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['specs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->specification; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['specs']->key => $_smarty_tpl->tpl_vars['specs']->value){
$_smarty_tpl->tpl_vars['specs']->_loop = true;
?> 
                            <?php if (gettype($_smarty_tpl->tpl_vars['specs']->value)=='array'){?>
                                    
                    	<tr>
                    		<th class="ab-specs-grp-head"><?php echo $_smarty_tpl->tpl_vars['specs']->key;?>
</th>
                                </tr>
                                <?php  $_smarty_tpl->tpl_vars['spec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['spec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['specs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['spec']->key => $_smarty_tpl->tpl_vars['spec']->value){
$_smarty_tpl->tpl_vars['spec']->_loop = true;
?>
                                   <tr> 
                                    <th class="specs-key"><?php echo $_smarty_tpl->tpl_vars['spec']->key;?>
</th>
                                    <td class="specs-vaule"><?php echo $_smarty_tpl->tpl_vars['spec']->value;?>
</td>
                                    <?php } ?>
                                 </tr>
                   	
                            <?php }else{ ?>
                        <tr>
                            <td class="specs-key"><?php echo $_smarty_tpl->tpl_vars['specs']->key;?>
</td>
                            <td class="specs-vaule"><?php echo $_smarty_tpl->tpl_vars['specs']->value;?>
</td>
                         </tr>   
                        
                        <?php }?>
                        <?php } ?>
                        </tbody>
                        </table>
                        
                    
                
                
                
                </div>
               <?php }?>
              <?php if (count($_smarty_tpl->tpl_vars['page']->value->comments)>0){?>
                <div id="comments">
                    <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                        <div class="comment">
                            <?php echo $_smarty_tpl->tpl_vars['comment']->value;?>

                           </div> 
                           <?php } ?>
                </div>
                <?php }?>
                
              
                <div class="ab_extra_prices">
                <div class="ab-extra-prices-head">Similar Produts</div>
                    <ul>
                        <li class="similiar-price-list-brand"> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
s?brand=<?php echo mb_strtolower($_smarty_tpl->tpl_vars['page']->value->brand_name, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value->brand_name;?>
 <?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
 Price List in India</a> </li>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - (0) : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                            <li> <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
 Price in India</a>
                   <span class="WebRupee lowest-price-small">Rs.</span> <span class="lowest-price-small"> <?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['lowest_price']['price'];?>
</span>
                            </li>
                            <?php }} ?>
                    </ul>
                    </div>
         <div class="fb-comment">
         <fb:comments href="<?php echo $_smarty_tpl->tpl_vars['page']->value->canonical_url;?>
" num_posts="2" width="680"></fb:comments>
         </div>
           <div class="ab_extra_prices_1">
                        <div class="ab-extra-prices-head"><h3>Produts in Similar Price Range of <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</h3></div>
               <div class="extra-item-container">
                   <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 14+1 - (5) : 5-(14)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 5, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                       <div class ="extra-item-bottom">
                    <div class="extra-item-bottom-img-container">    <img alt="<?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/image.php?id=<?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['_id'];?>
<?php if ($_smarty_tpl->tpl_vars['page']->value->upcoming==1){?>&upcoming=1<?php }?>" /></div>
                       <a class="extra-item-a" href="<?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
 </a>
                <div class="price-box"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price-small">Rs.</span> <span class="lowest-price-small">  <?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['lowest_price']['price'];?>
</span></div>
                 
                         <a class="extra-item-full-a" href="<?php echo $_smarty_tpl->tpl_vars['page']->value->inPriceRangeProducts[$_smarty_tpl->tpl_vars['i']->value]['slug'];?>
"></a>
                        </div>
                   <?php }} ?>
              <div class="clr"></div>
              </div>
         	</div>
           </div>
           </div>
        <div class="ab-item-right-block">
          <?php echo $_smarty_tpl->getSubTemplate ("upcoming.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        	
                 <div class="ab-right-block">
                     <ul>
                     <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->topBrands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value){
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                         <li class="similar-item-box">
                        <div class="side-bar-brand-logo-box">     <img class="side-bar-brand-logo" alt="<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['brand']->value['name'], 'UTF-8');?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/images/brand_logo/<?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
.png" /></div>
                          <div class="side-bar-brand-a-box">   <a  class="ab-brand-link-sidebar"href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
s?brand=<?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
 Price List</a></div>
                              <a class="sidebar-full-a" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value->type['name'];?>
s?brand=<?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
"></a>
                             <div class="clr"></div>
                         </li>
                         <?php } ?>
                         </ul>
                     </div>
        <div class="sidebar-fb-like">
         <fb:like-box href="http://www.facebook.com/abhiabhipc" width="300" height="260" show_faces="true" stream="false" header="false"></fb:like-box>
        
   	 	</div>
     <div class="clr"></div>
    </div>
    <div class="clr"></div>
    </div>
  </div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>