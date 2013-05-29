{include file="header.tpl"}

<div class="ab-item-wrap">
    	<div class="ab-item-page">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="{$base_url}">Home</a>
                    </li>
                    <li>
                        <a href="{$base_url}/{$page->type.name}s"> <span> » </span>{$page->type.name}</a>
                    </li>
                    <li>
                         <span> » </span> {$page->product_name}
                    </li>
                </ul>
                <div class="clr"></div>
                </div>
    		<div class="ab-item-left">
        	<div class="ab-item-block">
        		<div class="ab-item-feat">
            		<div class="ab-item-image-block">
                    	<div class="ab-item-image">
                        <img alt="{$page->product_name}" src="{$base_url}/image.php?id={$page->product_id}{if $page->upcoming eq 1}&upcoming=1{/if}" />
                		</div>
                       
                        
                    </div>
                	<div class="ab-item-details-block">
                    	<div class="ab-item-summry">
                   			<div class="ab-item-title">
                       			 <h2 title="sample title">{$page->product_name}</h2>
                                 {if isset($page->product_color)}
                       			 <span class="item-color">($page->product_color) </span>
                                 {/if}
                   			</div>
                            <div class="ab-item-summry">
                            <ul class="product-details-list">
                            {foreach $page->product_key_features as $kf}
                            <li class="ab-item-summery-top"><span>{$kf}</span></li>
                            {/foreach}
                           </ul>
                            </div>
                            
                        </div>
                        <div class="clr"></div>
                        <div class="ab-item-best-price">
                            
                        	<div class="item-price-block">
                             	<div>
                                
                                <span class="item-best-price">Best Price: </span>
                                {if $page->lowest_price.price > 0} <span class="item-best-price WebRupee"> Rs.</span>  <span class="item-best-price"> {$page->lowest_price['price']} {else} N/A{/if}</span>
                                </div>
                                
                                <div class="store-link">
                            		<a target="_blank" rel="nofollow" href="{$page->lowest_price['url']}"><span>Go to Store</span></a>
                            	</div>
                             </div>
                        	<div class="item-avail-block"> 
                                
                                <div class="stock-info">{if array_key_exists('availability', $page->lowest_price)}Available{else}Not Available{/if}</div>
                                
                                <div class="shipping-details">
                                {if array_key_exists('shipping', $page->lowest_price)}
                                    Delivered in <span class="bold-text"> {$page->lowest_price.shipping}</span><span> days </span>
                                {else}
                                    Delivery Time <span class="bold-text"> N/A </span>
                                {/if}
                                </div>
                                
                            </div>
                         <div class="clr"></div>   
                        </div>
                        <div class="clr"></div>
                        <div class="ab-visit-store">
                         	
                            <div class="ab-item-share-block">
                             <div class="item-gplus"><div class="g-plusone"></div></div>
                             <div class="item-fb-like"><div class="fb-like" data-href="{$page->canonical_url}" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div></div>
                             <div class="item-tweet"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
{literal}<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>{/literal}</div>
                        </div>
                        
                         </div>
                    
                	</div>
                </div>
                <div class="clr"></div>
                <div class="ab-store-heading">
                    <h3>
                        {$page->product_name} Price in India
                    </h3>
                    </div>
                {if $page->stores|count > 0}
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
                     {foreach $page->stores as $store}
                     <tr class="pricing-table">
                     <td><a target="_blank" rel="nofollow" href="{$store.url}"><img alt="{$store.name}.com" src="{$base_url}/images/store_logo/{$store.name}.png" /></a></td>
                     
                     {if array_key_exists('price', $store) && $store.price > 0}
                     <td><span class="ab-webrupee WebRupee">Rs.</span><span class="ab-webrupee"> {$store.price}</span> </td>
                     {else}
                     <td><span class="ab-webrupee">N/A</span> </td>
                     {/if}
                     
                     {if array_key_exists('shipping', $store)}
                     <td> {$store.shipping} days</td>
                     {else}
                         <td> N/A</td>
                     {/if}
                     
                     {if array_key_exists('availability', $store)}
                         {if $store.availability == 1}
                            <td> Available</td>
                         {else}
                            <td> Not Available</td>
                         {/if}
                     {else}
                         <td> Not Available</td>
                     {/if}
                     
                     <td> 
                     <div class="store-link">
                            <a target="_blank" rel="nofollow" href="{$store.url}"><span>Go to Store</span></a>
                     </div>
                     </td>
                     
                     </tr>
                     {/foreach}
                 </tbody>
                </table>
               </div>
                   
                
                </div>
                 {/if}
                 
                 {if $page->description != ''}
                <div class="ab-item-summery-box">
                
                <div class="head-white"><span class="box-head-title">Description of {$page->product_name}</span></div>
                {$page->description}
                 </div>
                 {/if}
                  <div class="ab-product-dec">
                	<ul>
                		<li><span><b>{$page->product_name}</b> price in india is {if $page->lowest_price.price > 0} <span class="WebRupee"> Rs.</span>   {$page->lowest_price['price']} {else} N/A{/if}, and is currently available on {foreach $page->stores as $store} {$store.name}, {/foreach}
                		
                		 </li>
                		<li> <span>The price mentioned above is valid in major cities like delhi, mumbai, chennai, bangalore, hyderabad, 
pune for cash on delivery availability check respective store with your area pin code.</span> </li>
                		<li><span>All the prices mentioned here are in INR.</span>  </li>
                		<li><span>Price of <b>{$page->product_name}</b>  was last updated on .</span>  </li>
                		
                	</ul>	
                	<div class="clr"></div>
                </div> 
                 
                {if count($page->specification) > 0}
                <div class="ab-item-specs-block">
                
                	<h3 class="item-specs-title-name"><b class="box-head-title">Specification of {$page->product_name}</b></h3></div>
               		<div class="ab-item-specs">
                    	<table class="item-specs-table" cellspacing="0">    
                        <tbody>
               		
                        {foreach $page->specification as $specs} 
                            {if gettype($specs)=='array' }
                                    
                    	<tr>
                    		<th class="ab-specs-grp-head">{$specs@key}</th>
                                </tr>
                                {foreach $specs as $spec}
                                   <tr> 
                                    <th class="specs-key">{$spec@key}</th>
                                    <td class="specs-vaule">{$spec}</td>
                                    {/foreach}
                                 </tr>
                   	
                            {else}
                        <tr>
                            <td class="specs-key">{$specs@key}</td>
                            <td class="specs-vaule">{$specs}</td>
                         </tr>   
                        
                        {/if}
                        {/foreach}
                        </tbody>
                        </table>
                        
                    
                
                
                
                </div>
               {/if}
              {if count($page->comments) > 0}
                <div id="comments">
                    {foreach $comments as $comment}
                        <div class="comment">
                            {$comment}
                           </div> 
                           {/foreach}
                </div>
                {/if}
                
              
                <div class="ab_extra_prices">
                <div class="ab-extra-prices-head">Similar Produts</div>
                    <ul>
                        <li class="similiar-price-list-brand"> <a href="{$base_url}/{$page->type.name}s?brand={$page->brand_name|lower}">{$page->brand_name} {$page->type.name} Price List in India</a> </li>
                        {for $i=0 to 4}
                            <li> <a href="{$base_url}/{$page->inPriceRangeProducts[$i].slug}">{$page->inPriceRangeProducts[$i].name} Price in India</a>
                   <span class="WebRupee lowest-price-small">Rs.</span> <span class="lowest-price-small"> {$page->inPriceRangeProducts[$i].lowest_price.price}</span>
                            </li>
                            {/for}
                    </ul>
                    </div>
         <div class="fb-comment">
         <fb:comments href="{$page->canonical_url}" num_posts="2" width="680"></fb:comments>
         </div>
           <div class="ab_extra_prices_1">
                        <div class="ab-extra-prices-head"><h3>Produts in Similar Price Range of {$page->product_name}</h3></div>
               <div class="extra-item-container">
                   {for $i=5 to 14}
                       <div class ="extra-item-bottom">
                    <div class="extra-item-bottom-img-container">    <img alt="{$page->inPriceRangeProducts[$i].name}" src="{$base_url}/image.php?id={$page->inPriceRangeProducts[$i]._id}{if $page->upcoming eq 1}&upcoming=1{/if}" /></div>
                       <a class="extra-item-a" href="{$page->inPriceRangeProducts[$i].slug}">{$page->inPriceRangeProducts[$i].name} </a>
                <div class="price-box"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price-small">Rs.</span> <span class="lowest-price-small">  {$page->inPriceRangeProducts[$i].lowest_price.price}</span></div>
                 
                         <a class="extra-item-full-a" href="{$page->inPriceRangeProducts[$i].slug}"></a>
                        </div>
                   {/for}
              <div class="clr"></div>
              </div>
         	</div>
           </div>
           </div>
        <div class="ab-item-right-block">
          {include file="upcoming.tpl"}
        	
                 <div class="ab-right-block">
                     <ul>
                     {foreach $page->topBrands as $brand}
                         <li class="similar-item-box">
                        <div class="side-bar-brand-logo-box">     <img class="side-bar-brand-logo" alt="{$brand.name|upper}" src="{$base_url}/images/brand_logo/{$brand.name}.png" /></div>
                          <div class="side-bar-brand-a-box">   <a  class="ab-brand-link-sidebar"href="{$base_url}/{$page->type.name}s?brand={$brand.name}">{$brand.name} {$page->type.name} Price List</a></div>
                              <a class="sidebar-full-a" href="{$base_url}/{$page->type.name}s?brand={$brand.name}"></a>
                             <div class="clr"></div>
                         </li>
                         {/foreach}
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

{include file="footer.tpl"}
