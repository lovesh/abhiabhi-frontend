$(function() {
    product_template = ['<div class="ab-search-product-box">',
            '<div class="ab-search-product-box-in">',
                '<div class="ab-search-product-image">',
                    '<img alt="',
                    '',         //product name
                    '" src="/image.php?id=',
                    '',         //product id
                    '"></div>',
                    '<div class="ab-search-product-name"><a href="',
                    '',         //product url
                    '">',
                    '',         //product name
                    '</a></div>',
                    '<div class="ab-product-price">',
                    '<div class="price-box"><span class="as-low-as">as low as</span> <span class="WebRupee lowest-price">Rs.</span> <span class="lowest-price">  ',
                    '',         //lowest price
                    '</span></div>',
                    '<a class="ab-brand-product-box-in-a-full" href="',
                    '',         //product url
                    '"></a>',
                    '</div>',
                    '</div>',
                    '<div class="clr"></div>',
                    '</div>'
                ];
                
        var query = location.search.slice(1).split('=')[1];

       filters = {
           'q' : query,
           'page' : 1
       };
       more = true;            // whether there is more content to be loaded
    
       loading = false;        // where some content is being loaded or DOM is being built by that content
       
       $('.filters ul li a').on('click', function(event){
        event.preventDefault();
        loading = true;
        var url = $(this).attr('href');
        var filter = url.split('?')[1].split('&')[1].split('=');
        var filter_type = filter[0];
        var filter_value = filter[1];
        var filter_block = $(this).parent().parent();       // filter_block is the <ul> of the list
        
        
        if ($(this).is('.selected')) {
            $.each($(filter_block).find('li a'), function(){
                $(this).removeClass('selected')
            });
            delete filters[filter_type];
            }
        else {
            $.each($(filter_block).find('li a'), function(){
                $(this).removeClass('selected')
            });
            $(this).addClass('selected');
            filters[filter_type] = filter_value;
         }
        filters['page'] = 1;
        
        more = true;                //ther is more content to be loaded
        
        var query_string = '';
        for (f in filters)
            query_string += f+'='+filters[f]+'&';
        query_string = query_string.slice(0,-1);
            
        $.ajax({
            type: 'get',
            dataType: 'text',
            url: '/search-product?'+query_string,
            success: function(res){
                $('.ab-product-list-view').html('');
                var response = JSON.parse(res);
                var products = response['products'];
                var count = response['count'];
                html_res = '';
                if (products.length == 0)
                        more = false;
                for (var i = 0;i < products.length;i++) {
                    product_template[4] = products[i]['name'];
                    product_template[6] = products[i]['id'];
                    product_template[9] = products[i]['url'];
                    product_template[11] = products[i]['name'];
                    if ('lowest_price' in products[i]) {
                        if ('price' in products[i]['lowest_price']) {
                            product_template[15] = products[i]['lowest_price']['price'];
                        }
                        else
                            product_template[15] = 'N/A';
                    }
                    else
                        product_template[15] = 'N/A';
                    
                    product_template[18] = products[i]['url'];
                    html_res = html_res + product_template.join('');
                }
                $('.current-product-count').html(products.length);
                $('.total-product-count').html(count);
                $('.ab-product-list-view').html('<div class="ab-product-list-view">'+html_res+'<div class="clr"></div>');
                loading = false;
                }
            });
         });
       
       function checkScrollPosition() {
            var distance = $(window).scrollTop() + $(window).height();
            if ((distance >= $('.ab-product-list-view').height()) && more && !loading) {         // load content when scrollbar hits bottom and there is more content to load and there is no content being loaded at the moment
                filters['page'] = filters['page'] + 1;
                var query_string = '';
                for (f in filters)
                    query_string += f+'='+filters[f]+'&';
                query_string = query_string.slice(0,-1);        //remove the trailing &
                
                loading = true;                 // now loading new content
                
                $.ajax({
                    type: 'get',
                    dataType: 'text',
                    url: '/search-product?'+query_string,
                    success: function(res){
                        var response = JSON.parse(res);
                        products = response['products'];
						if (products.length == 0)
							more = false;
                        html_res = '';
                        for (var i = 0;i < products.length;i++) {
                            product_template[4] = products[i]['name'];
                            product_template[6] = products[i]['id'];
                            product_template[9] = products[i]['url'];
                            product_template[11] = products[i]['name'];
                            if ('lowest_price' in products[i]) {
                                if ('price' in products[i]['lowest_price']) {
                                    product_template[15] = products[i]['lowest_price']['price'];
                                }
                                else
                                    product_template[15] = 'N/A';
                            }
                            else
                                product_template[15] = 'N/A';
                            product_template[18] = products[i]['url'];
                            html_res = html_res + product_template.join('') + '';
                        }
                        
						prev_count = Number($('.current-product-count').html());
                    	$('.current-product-count').html(prev_count + products.length);
                        prev_html = $('.ab-product-list-view').html();
                        $('.ab-product-list-view').html(prev_html+html_res+'<div class="clr"></div>');
                        
                        loading = false;            //content loaded
                        
                    }
                });
            }
        }

        $(window).scroll(checkScrollPosition).scroll();
                
});           
