<?php /* Smarty version Smarty-3.1.11, created on 2012-09-23 12:52:04
         compiled from "view/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83191317550485e292afc36-20653983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a81fdf15fc09b4739749f8531a4b0ee1d8294263' => 
    array (
      0 => 'view/templates/header.tpl',
      1 => 1348384878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83191317550485e292afc36-20653983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50485e292f3af6_87881578',
  'variables' => 
  array (
    'page' => 0,
    'tag' => 0,
    'base_url' => 0,
    'root_categories' => 0,
    'root' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50485e292f3af6_87881578')) {function content_50485e292f3af6_87881578($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['page']->value->header_tags['title'];?>
</title>
<meta name="robots" contents="index no follow" />
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->header_tags['meta']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
    <meta name="<?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
" content="<?php echo $_smarty_tpl->tpl_vars['tag']->value['content'];?>
" />
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value->header_tags['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
    <link rel="<?php echo $_smarty_tpl->tpl_vars['tag']->value['rel'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['href'];?>
" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/css/dcverticalmegamenu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="rel="shortcut icon" href="/images/favicon.ico" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<?php if ($_smarty_tpl->tpl_vars['page']->value->type['type']=='category'||$_smarty_tpl->tpl_vars['page']->value->type['type']=='upcoming'){?>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/js/abab_ajax.js'></script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['page']->value->type['type']=='search results'){?>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/js/abab_search.js'></script>
<?php }?>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/js/jquery.dcverticalmegamenu.1.3.js'></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/js/effects.js"></script>


<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script type="text/javascript">
$(document).ready(function($){
	$('#mega-1').dcVerticalMegaMenu({
		rowItems: '3',
		speed: 'fast',
		effect: 'show',
		direction: 'right'
	});
	$('#mega-2').dcVerticalMegaMenu({
		rowItems: '3',
		speed: 'slow',
		effect: 'fade',
		direction: 'left'
	});
	$('#mega-3').dcVerticalMegaMenu({
		rowItems: '4',
		speed: 'slow',
		effect: 'slide',
		direction: 'right'
	});
	$('#mega-4').dcVerticalMegaMenu({
		rowItems: '3',
		speed: 'fast',
		effect: 'slide',
		direction: 'left'
	});

});
</script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34904375-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=125734720842645";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="pageWrapper">


	<div class="headerContainer">
    	<div class="headers">
            
            
        	<div class="nav">
            	<div class="nav-logo">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><div class="abhiabhi-logo"></div></a>
                    <div class="global-menu">
                    <ul class="g-m-tabs">
                    <li class="gm-tab sign-in-tab"><a class="gm-tab-a">Sign In</a>
                    	<div class="sign-in-box">
                    	         <form action="" method="post">
                    		 <div class="ab-form-feilds">   Username<br/>   
               <input type="text"  name="userName" class="comment-inputbox textbox-right-align"></div> 
                    		<div class="ab-form-feilds">          Password <br/> 
               <input type="password"  value=""  name="password" class="comment-inputbox textbox-right-align"></div>
               
                    		<div class="sign-in-bttn"><input name="submit" type="button" value="Login" /></div>
                    		</form>
                    		<br/>
                    		<div class="forget-pass">
                    		
                    			<a href="#">Lost Password?</a><br/>
                    			<a href="#">Create an Account!</a>
                    		<div class="clr"></div>
                    		</div>
                    		
                    	</div>
                    
                    </li>
                   
                    
                    </ul>
                    </div>
                	<span class="share-ico">
                    	<a target="_blank" class="fb-icon block-link" href="http://www.facebook.com/abhiabhiPC">Visit the abhiabhi Facebook page</a>
                        <a target="_blank" class="twitter-icon block-link" href="https://twitter.com/abhiabhPC">Visit the abhiabhi Twitter page</a>
                        
                    </span>
                
                </div>
                <div class="nav-search">
                <div class="nav-menu">
                <div class="cat-root"> <span class="cate-root-title">All Categories</span></div>
                	<div class="menu-root">
                	  <ul id="mega-1" class="mega-menu">
                          <?php  $_smarty_tpl->tpl_vars['root'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['root']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['root_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['root']->key => $_smarty_tpl->tpl_vars['root']->value){
$_smarty_tpl->tpl_vars['root']->_loop = true;
?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['root']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['root']->value['name'];?>
</a></li>
                        <?php } ?>
                        <li class="browse-by-brand"><a href="/brands">Browse By Brand</a>
                        
                        	
                      	</li>   
                      </ul>

</div>
                	
                
                </div>
                <div class="search-container">
                <form action="/search" method="get">
             <div class="search-in"> 
       <input name="q" type="text" name="query" onfocus="if(this.value=='Search for items') { this.value='';}" onblur="if(this.value=='') {this.value='Search for items';}" value="<?php if (isset($_smarty_tpl->tpl_vars['page']->value->query)){?><?php echo $_smarty_tpl->tpl_vars['page']->value->query;?>
<?php }else{ ?>Search for items<?php }?>"/>
      			<div class="search-bttn">
                <input  type="submit" value=""/>
      			</div>
       		</div>
      
                </form>
                </div>
                
                <div class="sign-in-bttn">
               <a>Sign Up</a>
                </div>
                </div>
                </div>
            
            </div>
        	
        
        </div>
        
        <div class="vertical-menu-wrap">
          
          <div class="vertical-menu-container">
          
          		<ul class="vertical-menu">
                        <li class="coming-soon-li"><a class="coming-soon-a" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/comingsoon">Coming soon!</a></li>
                          <?php  $_smarty_tpl->tpl_vars['root'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['root']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['root_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['root']->key => $_smarty_tpl->tpl_vars['root']->value){
$_smarty_tpl->tpl_vars['root']->_loop = true;
?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['root']->value['slug'];?>
"><?php echo $_smarty_tpl->tpl_vars['root']->value['name'];?>
</a></li>
                        
                        <?php } ?>
                         <div class="clr"></div>
                      </ul>
                             
        </div>

        </div>
        
<?php }} ?>