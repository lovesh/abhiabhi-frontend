{include file="header.tpl"}
<div class="ab-brand-wrap">
    <div class="ab-brand-container">
    	<div class="ab-brand-left">
    	<div class="ab-brand-right-top">
    	<div class="ab-brand-block-left">
      <div class="brand-logo">
            <img src="{$base_url}/images/brand_logo/{$page->brand.name}.png" alt="{$page->brand.name}" />
            </div>
        <div class="ab-brand-name-title"><span>{$page->brand.name} Products</span> <span class="total-product-count"> ({$page->brand.num_products})</span></div>
        	
       
            
            
            
            </div>
           
            <div class="ab-brand-block-right">
            	<div class="ab-brand-block-right-head">Categories in {$page->brand.name}</div>
            	<div>
            	<ul>
					{foreach $page->results as $cat => $products}
            		<li>
					 <a  href="{$base_url}/{$cat}s?brand={$page->brand.name}">	{$cat}<span> ({$products|count} )</span> </a>
					</li>
					{/foreach}
            	</ul>
            	</div>
            </div>
            
            <div class="clr"></div>
             </div>
            <div class="ab-brand-products">
            {foreach $page->results as $cat => $products}
           	 <div class="ab-category-products">
             	<div class="head-white"><span class="ab-category-title"> {$cat}</span> <span class="category-product-count"> ({$products|count})</span> <span class="brand-view-all"> <a href="{$base_url}/{$cat}s?brand={$page->brand.name}">View All</a><span></div>
                	<div class="ab-category-products-container">
                        {foreach $products as $product}
                        <div class="ab-brand-product-box"> 
                            <div class="ab-brand-product-box-in">
                            <div class="product-image"><img src="{$base_url}/image.php?id={$product._id}" alt="{$product.name}"/></div>
                          <div class="product-name">
                          <a href="{$base_url}/{$product.slug}_{$product._id}"> {$product.name}</a>
                          </div>
                          
                          <div class="product-price"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">  {$product.lowest_price.price}</span></div>
        		   <a class="ab-brand-product-box-in-a-full" href="{$base_url}/{$product.slug}_{$product._id}"> </a>
        		 </div>
                     </div>
                        {/foreach}
                     <div class="clr"></div>
                   </div>
           	 </div>
            
            {/foreach}
            <div class="clr"></div>
            </div>
            </div>
            <div class="ab-brand-right">
            	<div class="ab-right-block">
            		<div class="head-white">
                <span class="box-head-title">New Additions</span>
                </div>
            	
            	
            	</div>
            </div>
             <div class="clr"></div>
        </div>
    
    
    </div>
    </div>
{include file="footer.tpl"}
