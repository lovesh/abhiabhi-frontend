<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf-8" />
<title>{$page->header_tags.title}</title>
<meta name="robots" contents="index no follow" />
{foreach $page->header_tags.meta as $tag}
    <meta name="{$tag.name}" content="{$tag.content}" />
{/foreach}

{foreach $page->header_tags.link as $tag}
    <link rel="{$tag.rel}" href="{$tag.href}" />
{/foreach}
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link href="{$base_url}/css/layout.css" rel="stylesheet" type="text/css" />
<link href="{$base_url}/css/dcverticalmegamenu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="rel="shortcut icon" href="/images/favicon.ico" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
{if $page->type.type == 'category' or $page->type.type == 'upcoming'}
<script type='text/javascript' src='{$base_url}/js/abab_ajax.js'></script>
{/if}
{if $page->type.type == 'search results'}
<script type='text/javascript' src='{$base_url}/js/abab_search.js'></script>
{/if}
<script type='text/javascript' src='{$base_url}/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='{$base_url}/js/jquery.dcverticalmegamenu.1.3.js'></script>
<script type="text/javascript" src="{$base_url}/js/effects.js"></script>

{literal}
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
{/literal}
{literal}
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
{/literal}
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
                	<a href="{$base_url}"><div class="abhiabhi-logo"></div></a>
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
                          {foreach $root_categories as $root}
                        <li><a href="{$base_url}/{$root.slug}">{$root.name}</a></li>
                        {/foreach}
                        <li class="browse-by-brand"><a href="/brands">Browse By Brand</a>
                        
                        	
                      	</li>   
                      </ul>

</div>
                	
                
                </div>
                <div class="search-container">
                <form action="/search" method="get">
             <div class="search-in"> 
       <input name="q" type="text" name="query" onfocus={literal}"if(this.value=='Search for items') { this.value='';}" onblur="if(this.value=='') {this.value='Search for items';}"{/literal} value="{if isset($page->query)}{$page->query}{else}Search for items{/if}"/>
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
                        <li class="coming-soon-li"><a class="coming-soon-a" href="{$base_url}/comingsoon">Coming soon!</a></li>
                          {foreach $root_categories as $root}
                        <li><a href="{$base_url}/{$root.slug}">{$root.name}</a></li>
                        
                        {/foreach}
                         <div class="clr"></div>
                      </ul>
                             
        </div>

        </div>
        
