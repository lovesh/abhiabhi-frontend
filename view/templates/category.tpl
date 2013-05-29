{include file="header.tpl"}
<div class="ab-category-wrap">
    	<div class="ab-category-container">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="{$base_url}">Home</a>
                    </li>
                    <li>
                       <span>  » </span> {$page->category->name}s
                    </li>
                    
                </ul>
                <div class="clr"></div>
                </div>
                    
        	<div class="ab-category-left">
        		<div class="browse-by">
        			Browse By
        		
        		</div>
            
            	<div class="ab-category-filters">
                	
                    {if $page->type.type ne 'upcoming'}
                    <div class="ab-category-filter">
                    	<div class="filter-head"> <span class="filter-head-title">Prices </span></div>
                        <div class="filters">
                        	<ul>
                                {foreach $page->priceFilters as $pf}
                            	<li class="filter-list"><a href="{$base_url}/{$page->category->name}s?price={$pf[1][0]}-{if count($pf[1]) > 1}{$pf[1][1]}{/if}">{$pf[0]}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                    
                    </div>
                    {/if}
                    <div class="ab-category-filter">
                    	<div class="filter-head"> <span class="filter-head-title">Brands </span></div>
                        <div class="filters">
                        	<ul>
                                {foreach $page->brands as $brand}
                            	<li class="filter-list"><a href="{$brand.url}">{$brand.name}{if $page->type.type ne 'upcoming'}<span class="category_num_count"> ({$brand.num_products}) </span>{/if}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                    
                    </div>
                </div>
               
               
                	
                
            </div>
            <div class="ab-category-content">
           
            	<div class="ab-category-view-change">
                	
                    <div class="ab-category-result-count">Showing  <span class="current-product-count">{$page->products|count}</span> of  <span class="total-product-count"> {$page->category->numProducts}</span></div>
                  <div class="ab-sort-by"><select class="comment-inputbox" name="sortby">
                                 <option value="sort_by" selected="selected">Sort by</option>
                		<option value="price_dsc">Price: High to Low</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="date">Newly Added First</option>
  					  
                  </select></div>
                  
                   <ul class="ab-view-change">
                    	<li class="ab-category-list-view"><span>List View </span> </li> 
                        <li class="ab-category-gird-view"><span>Grid View</span></li>
                    </ul>
                    <div class="clr"></div>
                </div>
                
                <div class="ab-product-list-view">
                    {foreach $page->products as $p}
                	
                	<div class="ab-product-box">
                	<div class="ab-product-box-in">
                    	<div class="ab-product-image"> <img alt="{$p.name}" src="{$base_url}/image.php?id={$p.id}{if $page->type.type eq 'upcoming'}&upcoming=1{/if}"></div>
                        <div class="ab-product-name"><a href="{$p.url}" >{$p.name}</a></div>
                     
                        <div class="ab-product-price">
                        	<div class="price-box"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">  {$p.lowest_price.price}</span></div>
                        	<div class="store-count"><span>(on {$p.store_count} store)</span></div>
                        <a class="full-box-a" href="{$p.url}" title="{$p.name}"></a>
                        </div>
                       </div>
                  
                    <div class="clr"></div>
                    
                    </div>
                    
                {/foreach}
                
                 <div class="clr"></div>
                
                
                <div class="category-page-no" style="display:none;"><img src="/images/auto-loader.gif" />Loading more results </div>
                </div>
                
            
            </div>
            
        
        
        </div>
    <div class="clr"></div>
    </div>
{include file="footer.tpl"}
