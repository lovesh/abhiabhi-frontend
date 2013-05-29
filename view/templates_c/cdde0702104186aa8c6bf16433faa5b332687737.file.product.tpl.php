<?php /* Smarty version Smarty-3.1.11, created on 2012-09-06 12:53:18
         compiled from "/var/www/abhiabhi/view/templates/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1516352988504821f74765a4-33929428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdde0702104186aa8c6bf16433faa5b332687737' => 
    array (
      0 => '/var/www/abhiabhi/view/templates/product.tpl',
      1 => 1346916189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1516352988504821f74765a4-33929428',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_504821f76c6799_57736122',
  'variables' => 
  array (
    'page' => 0,
    'kf' => 0,
    'store' => 0,
    'specs' => 0,
    'comments' => 0,
    'comment' => 0,
    'mostViewedProducts' => 0,
    'base_url' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504821f76c6799_57736122')) {function content_504821f76c6799_57736122($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="ab-item-wrap">
    	<div class="ab-item-page">
        	<div class="ab-item-block">
        		<div class="ab-item-feat">
            		<div class="ab-item-image-block">
                    	<div class="ab-item-image">
                        
                		</div>
                        <div class="ab-item-image-large">
                        <a id="large-image-link" href="">View Larger Image</a>
                        
                        </div>
                        
                    </div>
                	<div class="ab-item-details-block">
                    	<div class="ab-item-summry">
                   			<div class="ab-item-title">
                       			 <h1 title="sample title"><?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</h1>
                                 <?php if (isset($_smarty_tpl->tpl_vars['page']->value->product_color)){?>
                       			 <span class="item-color">($page->product_color) </span>
                                 <?php }?>
                   			</div>
                            <div class="ab-item-summry-extra">
                            <table>
                            <tbody>
                            <tr>
                            <?php  $_smarty_tpl->tpl_vars['kf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['kf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->product_key_features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['kf']->key => $_smarty_tpl->tpl_vars['kf']->value){
$_smarty_tpl->tpl_vars['kf']->_loop = true;
?>
                            <td style="vertical-align:top"><ul class="fk-ul-disc"><li><?php echo $_smarty_tpl->tpl_vars['kf']->value;?>
</li></ul></td>
                            <?php } ?>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            
                        </div>
                        <div class="clr"></div>
                        <div class="ab-item-best-price">
                            <?php if (property_exists($_smarty_tpl->tpl_vars['page']->value,'lowest_price')){?>
                        	<div class="item-price-block">
                             	<div>
                                
                                <span class="item-price-span">Price: </span>
                                <span class="item-best-price"> Rs.  <span> <?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['price'];?>
 </span></span>
                                </div>
                                <?php }?>
                                <div class="store-link">
                            		<a href="<?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['url'];?>
"><span>Go to Store</span></a>
                            	</div>
                             </div>
                        	<div class="item-avail-block"> 
                                <?php if (array_key_exists('availability',$_smarty_tpl->tpl_vars['page']->value->lowest_price)){?>
                            	<div class="stock-info">Available</div>
                                <?php }?>
                                <?php if (array_key_exists('shipping',$_smarty_tpl->tpl_vars['page']->value->lowest_price)){?>
                                <div class="shipping-details">
                                Delivered in <span class="bold-text"> <?php echo $_smarty_tpl->tpl_vars['page']->value->lowest_price['shipping'];?>
 </span>
                                </div>
                                <?php }?>
                            </div>
                         <div class="clr"></div>   
                        </div>
                        <div class="clr"></div>
                        <div class="ab-visit-store">
                         	
                            <div class="ab-item-share-block">
                             <div class="item-gplus"><div class="g-plusone"></div></div>
                             <div class="item-fb-like"></div>
                             <div class="item-tweet"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
                        </div>
                        
                         </div>
                    
                	</div>
                </div>
                <div class="clr"></div>
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
                     <td><img alt="<?php echo $_smarty_tpl->tpl_vars['store']->value['name'];?>
.com" src=""/></td>
                     
                     <?php if (array_key_exists('price',$_smarty_tpl->tpl_vars['store']->value)){?>
                     <td><span class="ab-webrupee">Rs. <?php echo $_smarty_tpl->tpl_vars['store']->value['price'];?>
</span> </td>
                     <?php }else{ ?>
                     <td><span class="ab-webrupee">N/A</span> </td>
                     <?php }?>
                     
                     <?php if (array_key_exists('shipping',$_smarty_tpl->tpl_vars['store']->value)){?>
                     <td> 2-3 days</td>
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
                            <a href="<?php echo $_smarty_tpl->tpl_vars['store']->value['url'];?>
"><span>Go to Store</span></a>
                     </div>
                     </td>
                     
                     </tr>
                     <?php } ?>
                 </tbody>
                </table>
               </div>
                   
                
                </div>
                 <div class="clr"></div>
                 <?php if ($_smarty_tpl->tpl_vars['page']->value->description!=''){?>
                <div class="ab-item-summery-box">
                
                <div class="head-white"><span class="box-head-title">Description of <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
</span></div>
                <?php echo $_smarty_tpl->tpl_vars['page']->value->description;?>

                 </div>
                 <?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['page']->value->specification)>0){?>
                <div class="ab-item-specs-block"><h3 class="item-specs-title-name"><b class="box-head-title">Specification of <?php echo $_smarty_tpl->tpl_vars['page']->value->product_name;?>
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
            <div class="ab-comment-box">
            	<div class="comment-head">
         			<span class="leave-a-comment">Leave a comment</span>
       				<p class="itemCommentsFormNotes">Make sure you enter the (*) required information where indicated.Basic HTML code is allowed.</p>
           		</div>
             
                 <form action="" method="get">
                 
                     Name *    
               <input type="text" onfocus="if(this.value=='enter your name...') this.value='';" onblur="if(this.value=='') this.value='enter your name...';" value="enter your name..."  name="userName" class="comment-inputbox">
           Email *   
               <input type="text" onfocus="if(this.value=='enter your e-mail address...') this.value='';" onblur="if(this.value=='') this.value='enter your e-mail address...';" value="enter your e-mail address..."  name="commentEmail" class="comment-inputbox">
               
          <div class="ab-comment-fields">   Message * <br/>
                <textarea name="commentText" onfocus="if(this.value=='enter your message here...') this.value='';" onblur="if(this.value=='') this.value='enter your message here...';" class="comment-inputbox message-box" cols="10" rows="20">enter your message here...</textarea></div>
       
       
       <div class="comment-captcha"> captcha goes here</div>
                </form>
               
            </div>
         	</div>
           
        <div class="ab-item-right-block">
        	<div class="ab-right-block">
        		<div class="head-white">
                <span class="box-head-title">You may Also Like</span>
                </div>
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mostViewedProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                <div class="right-block-body">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['i']->value['_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</a>
                    <span><?php echo $_smarty_tpl->tpl_vars['i']->value['lowest_price']['price'];?>
</span>
                </div>
                <?php } ?>
                
            </div>
        
        
   	 	</div>
     <div class="clr"></div>
    </div>
    <div class="clr"></div>
    </div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>