<?php /* Smarty version Smarty-3.1.11, created on 2012-09-06 10:24:02
         compiled from "/var/www/abhiabhi/view/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:626518172504821f76cd0f7-47747660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7448944991691691cf6a4f8561e441d40410aa13' => 
    array (
      0 => '/var/www/abhiabhi/view/templates/header.tpl',
      1 => 1346907162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '626518172504821f76cd0f7-47747660',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_504821f7739907_47134779',
  'variables' => 
  array (
    'page' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_504821f7739907_47134779')) {function content_504821f7739907_47134779($_smarty_tpl) {?><!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['page']->value->header_tags['title'];?>
</title>

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

<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/dcverticalmegamenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcverticalmegamenu.1.3.js'></script>
<script type="text/javascript" src="js/effects.js"></script>

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

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=191446117584040";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


</head>
<body>
<div class="pageWrapper">


	<div class="headerContainer">
    	<div class="headers">
            
            
        	<div class="nav">
            	<div class="nav-logo">
                	<div class="abhiabhi-logo"></div>
                    <div class="global-menu">
                    <ul class="g-m-tabs">
                    <li class="gm-tab"><a>Sign up</a></li>
                    <li class="gm-tab"><a>Coupans</a></li>
                    <li class="gm-tab"><a>Deals</a></li>
                    
                    </ul>
                    </div>
                	<span class="share-ico">
                    	<a target="_blank" class="fb-icon block-link" href="#">Visit the abhiabhi Facebook page</a>
                        <a target="_blank" class="twitter-icon block-link" href="#">Visit the abhiabhi Twitter page</a>
                        
                    </span>
                
                </div>
                <div class="nav-search">
                <div class="nav-menu">
                <div class="cat-root"> <span class="cate-root-title">All Categories</span></div>
                	<div class="menu-root">
                	  <ul id="mega-1" class="mega-menu">
  <li><a href="#">Menu Item A</a>
<ul>
<li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
</ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
</ul></li>
<li><a href="#">Sub-Header 3</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
</ul></li>
<li><a href="#">Sub-Header 4</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 5</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 6</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li></ul></li>
<li><a href="#">Menu Item B</a>
<ul>
<li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
</ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
</ul></li>
<li><a href="#">Sub-Header 3</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
</ul></li>
</ul></li>
<li><a href="#">Menu Item C</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 3</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 4</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 5</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 6</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 7</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li></ul></li>
<li><a href="#">Menu Item D</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 3</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 4</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 5</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 6</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li></ul></li></ul></li>
<li><a href="#">Menu Item E</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li></ul></li>
</ul></li>
<li><a href="#">Menu Item F</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 3</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 4</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 5</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 6</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 7</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li></ul></li>
<li><a href="#">Menu Item G</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 3</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 4</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 5</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 6</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li></ul></li>
<li><a href="#">Menu Item H</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>

<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li></ul></li>
<li><a href="#">Menu Item I</a>
<ul><li><a href="#">Sub-Header 1</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
<li><a href="#">Sub-Header 2</a>
<ul><li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li>
<li><a href="#">Menu Link</a></li></ul></li>
</ul></li></ul>

</div>
                	
                
                </div>
                <div class="search-container">
                <form action="" method="post">
             <div class="search-in"> 
       <input name="search-box" type="text" name="query" onfocus="if(this.value=='Search for items') { this.value='';}" onblur="if(this.value=='') {this.value='Search for items';}" value="Search for items" />
      			<div class="search-bttn">
                <input name="submit" type="button" value="" />
      			</div>
       		</div>
      
                </form>
                </div>
                
                <div class="sign-in-bttn">
               <a>Sign In</a>
                </div>
                </div>
                </div>
            
            </div>
        	
        
        </div>
<?php }} ?>