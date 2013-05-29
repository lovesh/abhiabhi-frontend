{include file="header.tpl"}

        
        <div class="ab-landing-wrap">
        	<div class="ab-home-cantainer">
            	<div class="ab-home-top">
                	<div class="ab-home-top-left">
                    	<div class="ab-third-box-head">
                    Best Seller
                    </div>
                        <div class="ab-top-seller-body">
                       
                    
                    {foreach $page->best_seller_products as $fp}
                        <div class="ab-best-seller-box">
                    	<div class="ab-best-seller-image"> <img alt="{$fp.name}" src="{$base_url}/image.php?id={$fp._id}" /></a></div>
                        <div class="ab-best-seller-name"><a href="{$fp.slug}">{$fp.name}</a></div>
                        <div class="ab-product-price">
                        
                        	<div class="price-box"><span class="as-low-as">as low as</span>  <span class="WebRupee lowest-price">Rs.</span>  <span class="lowest-price"> {$fp.lowest_price.price}</span></div>
                        	
                        
                        </div>
                      <a class="ab-popular-home-full-a" href="{$fp.slug}" title="{$fp.name}"></a>
                     
                    <div class="clr"></div>
                    
                    </div>
                     {/foreach}
                        </div>
                    </div>
                    <div class="ab-home-top-right">
                  
               	   <div class="coming-Soon-home">
               	   {include file="upcoming.tpl"}
               	   </div>
             		
                    </div>
                    <div class="clr"></div>
                </div>
            	
                
                <div class="ab-home-second-top">
            	<div class="ab-brands-block">
                	<div class="ab-brands-block-head"> <span> Popular Products </span></div>
                	<div class="ab-brands-container">
                    {foreach $page->most_viewed_products as $pp}
                    	<div class="ab-products-home">
                        		<div class="ab-products-logo-home"><img alt="{$pp.name}" src="{$base_url}/image.php?id={$pp._id}" /></div>
                           		<div class="ab-products-name-home"><span> <a class="popular-product-a" href="{$pp.slug}">{$pp.name}</a></span><div><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price"> {$pp.lowest_price.price}</span> </div></div>
                           		<a  class="ab-popular-home-full-a" href="{$pp.slug}" title= "{$pp.name}"></a>
                        </div>
                    	{/foreach}	
                        <div class="clr"></div>	
                    </div>
                	
                
                </div>
                
                <div class="ab-brands-block">
                	<div class="ab-brands-block-head"> <span> New Additions </span></div>
                	<div class="ab-brands-container">
                    {foreach $page->recent_products as $rp}
                    	<div class="ab-products-home">
                        		<div class="ab-products-logo-home"><img alt="{$rp.name}" src="{$base_url}/image.php?id={$rp._id}" /></div>
                           		<div class="ab-products-name-home"><span> <a  class="popular-product-a" href="{$rp.slug}">{$rp.name}</a></span><div> <span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">{$rp.lowest_price.price}</span></div></div>
                           	<a  class="ab-popular-home-full-a" href="{$rp.slug}" title="{$rp.name}"></a>	
                        </div>
                    	{/foreach}	
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
                        {foreach $page->best_cameras as $camera}
                        <div class="ab-products-home">
                        		<div class="ab-products-logo-home"><img alt="{$camera.name}" src="{$base_url}/image.php?id={$camera._id}" /></div>
                           		<div class="ab-products-name-home"><span> <a  class="popular-product-a" href="{$camera.url}">{$camera.name}</a></span><div> <span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">{$camera.lowest_price.price}</span></div></div>
                           	<a  class="ab-popular-home-full-a" href="{$camera.url}" title="{$camera.name}"></a>	
                        </div>
                        {/foreach}
                        <div class="clr"></div>
                    </div>
                </div>
                <div class="ab-third-box-right">
              		  <div class="head-white">
              			  <span class="box-head-title">Mobile Price List</span>
               		 </div>
                    
               		<ul>
                         {foreach $page->price_lists as $price_list}
               		 <li class="similar-item-box">
                        <div class="side-bar-brand-logo-box">     <img src="{$base_url}/images/brand_logo/{$price_list.name}.png" class="side-bar-brand-logo"></div>
                          <div class="side-bar-brand-a-box">   <a href="{$base_url}/mobiles?brand={$price_list.name}" class="ab-brand-link-sidebar">{$price_list.name} Mobiles Price List</a></div>
                              <a href="{$base_url}/mobiles?brand={$price_list.name}" class="sidebar-full-a"></a>
                             <div class="clr"></div>
                         </li>
                         {/foreach}
                         </ul>
               		 
               
                </div>
                <div class="clr"></div>	
            </div>
            
            </div>
            
            
            
        	<div class="clr"></div>
        </div>
{include file="footer.tpl"}