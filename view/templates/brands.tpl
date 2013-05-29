{include file="header.tpl"}
<div class="ab-brands-wrap">
        	<div class="ab-brands-page">
        	<div class="ab-brands-left">
            {foreach $page->categories as $category}
            	<div class="ab-brands-block">
            	
                	<div class="ab-brands-block-head"> <span> Brands in {$category@key} </span></div>
                	<div class="ab-brands-container">
                     {foreach $category as $brand}
                    	<div class="ab-brands">
                        		<div class="ab-brands-logo"><img src="{$base_url}/images/brand_logo/{$brand.name}.png" alt="{$brand.name}" /></div>
                           		<div class="ab-brands-name"><span> {$brand.name}</span> <span> ({$brand.num_products})</span></div>
                        </div>
                    	{/foreach}	
                        <div class="clr"></div>	
                    </div>
                	
                
                </div>
                        {/foreach}
            </div>
            <div class="ab-brands-right">
            	
            {include file="upcoming.tpl"}
            
            </div>
            <div class="clr"></div>
            
            </div>
            
        </div>
{include file="footer.tpl"}