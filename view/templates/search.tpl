{include file="header.tpl"}
<div class="ab-search-wrap">
        	<div class="ab-search-result-container">
        	<div class="search-result-left">
        	<div class="browse-by">Filter By</div>
        	<div class="ab-category-filters">
        	
        		  <div class="ab-category-filter">
                    	<div class="filter-head"> <span class="filter-head-title">Category </span></div>
                        <div class="filters">
                        	<ul>
                               
                            	{foreach $root_categories as $root}
                                    <li class="filter-list"><a href="{$base_url}/search-product?q={$page->query}&category={$root.slug|substr:0:-1}">{$root.name}</a></li>
                                {/foreach} 
                                
                            </ul>
                        </div>
                        
                        </div>
                       </div>
        	</div>
        	 </div>
            	<div class="search-result-right"> 
                	
                    
            <div class="ab-brand-name-title"><span class="search-result-for">Search Results for </span><span class="search-result-count">{$page->query}</span> </div>
            	<div class="ab-category-view-change">
                	<div class="ab-result-count"> Showing  <span class="current-product-count">{$page->num_results}</span> of <span class="total-product-count">{$page->total_results}</span> Results</div>
                   
                  <div class="ab-sort-by"><select class="comment-inputbox" name="sortby">
                  
                		<option value="price">Sort by Price</option>
  						<option value="date">Sort by Date</option>
  					  
                  </select></div>
                  
                 
                    <div class="clr"></div>
                </div>
              
                <div class="ab-product-list-view">
                
                  {foreach $page->results as $result}
                	<div class="ab-search-product-box">
                	<div class="ab-search-product-box-in">	
                    	<div class="ab-search-product-image"> <img alt="{$result.name}" src="{$base_url}/image.php?id={$result.id}{if $result.upcoming gt 0}&upcoming=1{/if}" /></div>
                        <div class="ab-search-product-name"><a href="{$result.url}">{$result.name}</a></div>
                      
                        
                        	<div class="product-price"> 
                        	 <span class="as-low-as">as low as </span>
                                <span class="lowest-price WebRupee"> Rs.</span>  <span class="lowest-price"> {$result.lowest_price.price}</span></div>
                           <a  class="ab-brand-product-box-in-a-full" href="{$result.url}" title="{$result.name}"></a>
                       
                        </div>
                        
                  
                    <div class="clr"></div>
                    
                    </div>
                    
                {/foreach}
                
               
                
               
               
            
            
                    <div class="clr"></div>
                
                </div>
              	 <div class="clr"></div> 
                </div>
            	    <div class="clr"></div>   
             </div>
             
            </div>

  {include file="footer.tpl"}
