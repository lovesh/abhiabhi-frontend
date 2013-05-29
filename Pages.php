<?php

require_once 'Products.php';
require_once 'Categories.php';
require_once 'Brands.php';
require_once 'Search.php';

class Pages {
    /**
        *  Associative array of html tags where each key is a html tag and its value might be an array of 
         * associative arrays or just an associative array containing values in this form 
         * $header_tags=array(
         * 'meta'=>array(
         *      array('name'>='Description','content'=>'Buy Sony... '),
         *      array('name'=>'Keywords', 'content'=>'Sony ...' )
         *      ),
         * 'link'=>array(
         *      array('rel'=>'shortcut icon','href'=>'http://...'),
         *      array(...)
         *      ),
         * .....
         * );
        */
        public $header_tags = ['meta' => [], 'link' => []];
        
        /**
	 * Array of names(or urls) of css files.
	 */
        public $css_scripts;
        
        /**
	 * Array of names(or urls) of css files.
	 */
        public $js_scripts;
           
        /**
         * Type of page. Can be a product page,category page,brand page,brand list page,search results page,user account page,user registration page,home page or a static page(about,jobs,team,etc)
         * 
         * If a product page then $type should indicate what type of product it is like camera,book,mobile,etc
         * eg
         *      $type=array('type'=>'product','name'=>'mobile')
         * 
         * If a category page then $type should indicate what type of category it is like camera,book,mobile,etc
         * eg
         *      $type=array('type'=>'category','name'=>'mobile')
         * 
         * If a brand page then $type should indicate which brand it is like sony,nokia,dell,etc
         * eg
         *      $type=array('type'=>'brand list')
         *      $type=array('type'=>'brand','name'=>'sony')
         * 
         * Or like these
         *      $type='signup'
         *      $type=array('type'=>'static','name'=>'about us')
         *      $type='search results'
	 */  
        public $type;
        
        public $lowest_price=array();
        
        public function __construct($type, $param = false) {
                $this->type['type']=$type;
                //var_dump($param);//extract($param);
                
                if ($this->type['type'] == 'home') {
                    $this->buildHomePage();
                }
                
                if ($this->type['type'] == 'product') {
                    //echo $mongoId;
                    $this->buildProductPage($param);
                }
                
                if ($this->type['type'] == 'category') {
                    $this->buildCategoryPage($param);
                }
                
                if ($this->type['type'] == 'brand list') {
                    $this->buildBrandListPage();
                }
                
                if ($this->type['type'] == 'brand') {
                    $this->buildBrandPage($param);
                }
                
                if ($this->type['type'] == 'search results') {
                    $this->buildSearchResultsPage($param);
                }
                
                if ($this->type['type'] == 'upcoming') {
                    $this->buildUpcomingPage($param);
                }
                
                if ($this->type['type'] == 'static') {
                    
                }
                
                if ($this->type['type'] == 'signup') {
                    
                }
                
             }
        
        
        public function buildProductPage($mongoId) {
             $product=new Products($mongoId);
            
             if (is_null($product->id))
                 Router::redirect('/NotFound.html',404);//var_dump($product);
             
             $this->product_id = $product->id;
                
             $this->type=array('type' => 'product','name' => $product->root_category);
             
             $this->product_key_features=$product->key_features;

             $this->product_name = $product->name;
             
             $this->brand_name = $product->brand_name;
             
             $this->upcoming = $product->upcoming;
             
             if ($product->header_tags)  
                    $this->header_tags=$product->header_tags;

             if (!array_key_exists('title',$this->header_tags)) 
                 $this->header_tags['title']="{$this->product_name} Prices In India";

             $kw=false;
             $desc=false;    

             if (array_key_exists('meta',$this->header_tags))
                     foreach ($this->header_tags['meta'] as $tag) {
                         if (array_key_exists('name',$tag))
                            if ($tag['name']=='Keywords')  {  
                                $kw=true;
                                continue;
                            }
                         if (array_key_exists('name',$tag))
                            if ($tag['name']=='Description')
                                 $desc=true;
                     }

             if (!$kw)
                array_push($this->header_tags['meta'],array(
                    'name' => 'Keywords',
                    'content' => "{$product->name}, Buy {$product->name}, {$product->name} price, {$product->name} price in India, {$product->brand_name} {$product->root_category}"
                    )); 

             if (!$desc)
                array_push($this->header_tags['meta'],array(
                    'name' => 'Description',
                    'content' => "Buy {$product->name} for as low as {$product->lowest_price['price']} in India, {$product->name} with {$product->essential_description}"
                    )); 

             $this->canonical_url = "http://".Registry::$host."/{$product->slug}_{$product->id}";       
                 
             $canonical=false;
                
             if (array_key_exists('link',$this->header_tags))
                     foreach ($this->header_tags['link'] as $tag)
                         if (array_key_exists('rel',$tag))
                            if ($tag['rel']=='canonical') {    
                                $canonical=1;
                                break;
                            }

             if (!$canonical) {
                 $slug=$product->slug;
                 array_push($this->header_tags['link'],array(
                    'rel' => 'canonical',
                    'href' => $this->canonical_url
                    ));
             }
             
             $sorted_stores=Utils::sortArrayByKey($product->stores, 'price');
             $stores=array();
             foreach($sorted_stores as $store) {
                $current=array();

                $current['name']=$store['name'];
                $current['url']=$store['url'];

                if (array_key_exists('shipping',$store)) {
                    if (count($store['shipping']) == 2)
                        $shipping="{$store['shipping'][0]}-{$store['shipping'][1]}";
                    if (count($store['shipping']) == 1)
                        $shipping="{$store['shipping'][0]}";
                    $current['shipping']=$shipping;
                }

                if (array_key_exists('availability',$store)) {
                    $availability=$store['availability'];
                    $current['availability']=$availability;
                }
                
                if (array_key_exists('offer',$store)) {
                    $offer=$store['offer'];
                    $current['offer']=$offer;
                }

                if (array_key_exists('price',$store)) {
                    $price=$store['price'];
                    $current['price']=$price;
                }

                if (array_key_exists($current['name'],$stores))
                    array_push($stores[$current['name']],$stores);
                else
                    $stores[$current['name']] = $current;
             }
             
             $this->lowest_price = current($stores);  // gets the first element of stores which is a sorted array
             $this->stores = $stores;
             $this->description = $product->description;
             $this->specification = $product->specification;
             $this->comments = [];
             foreach ($product->comments as $comment) 
                 array_push($this->comments,array('name' => $comment['name'],'email' => $comment['email'],'comment' => $comment['comment']));
             //var_dump($this);die;
             
             if ($this->type['name'] != 'book') {
                $mostViewed = Products::getMostViewedProducts($this->type['name'],6);
                $mostViewedProducts = [];
                foreach ($mostViewed as $mwp) {
                   if ($mwp['_id'] != $this->product_id)
                       $mostViewedProducts[] = $mwp;
                   if (count($mostViewedProducts) == 5)
                       break;
                   }
                $this->mostViewedProducts = $mostViewedProducts;
             }
             if (!$this->upcoming) {
                $priceRange = [($this->lowest_price['price'] * .9), ($this->lowest_price['price'] * 1.1)];
                $inPriceRange = Products::getProductsInPriceRange($this->type['name'], $priceRange[0], $priceRange[1], 16);

                if (count($inPriceRange) < 15) {
                    $priceRange = [($this->lowest_price['price'] * .8), ($this->lowest_price['price'] * 1.2)];
                    $inPriceRange = Products::getProductsInPriceRange($this->type['name'], $priceRange[0], $priceRange[1], 16);
                }

                if (count($inPriceRange) < 15) {
                    $priceRange = [($this->lowest_price['price'] * .7), ($this->lowest_price['price'] * 1.3)];
                    $inPriceRange = Products::getProductsInPriceRange($this->type['name'], $priceRange[0], $priceRange[1], 16);
                }

                if (count($inPriceRange) < 15) {
                    $priceRange = [($this->lowest_price['price'] * .6), ($this->lowest_price['price'] * 1.4)];
                    $inPriceRange = Products::getProductsInPriceRange($this->type['name'], $priceRange[0], $priceRange[1], 16);
                }

                if (count($inPriceRange) < 15) {
                    $priceRange = [($this->lowest_price['price'] * .5), ($this->lowest_price['price'] * 1.5)];
                    $inPriceRange = Products::getProductsInPriceRange($this->type['name'], $priceRange[0], $priceRange[1], 16);
                }

                $inPriceRangeProducts = [];

                foreach ($inPriceRange as $ipp) {
                   if ($ipp['_id'] != $this->product_id)
                       $inPriceRangeProducts[] = $ipp;
                   if (count($inPriceRangeProducts) == 15)
                       break;
                }
             }
             else {
                 $upcoming = Products::getUpcomingProducts('mobile', 16);
                 $inPriceRangeProducts = $upcoming;
             }
             
             $this->inPriceRangeProducts = $inPriceRangeProducts;
             //var_dump($inPriceRangeProducts);die;
             
             
             if ($this->type['name'] != 'book') {
                $topBrands = Brands::getAllBrands($this->type['name'], 6);
                $this->topBrands = $topBrands;
             }
             return $this;
             
        }
        
        public function buildCategoryPage($data) {
            //extract($data);
            //if (empty($subcats))
                $category=new Categories($data);
            /*else {
                $category=new Categories(end($subcats));
                $chain=$subcats;
                array_unshift($chain,$rootCategory);
                if ($chain!=$category->nameChain)
                    $this->redirect('/NotFound');
            }*/
            $queryParams = Registry::$query;
            $queryKeys = array_keys($queryParams);
            
            $filters = [];
            
            if (in_array('price', $queryKeys)) {
                $price_parts = explode('-', $queryParams['price']);
                $min_price = (int)trim($price_parts[0]);
                $max_price = (int)trim($price_parts[1]);
                if ($max_price) {
                    $filters['lowest_price.price'] = [
                    '$gte' => $min_price,
                    '$lte' => $max_price
                    ];
                }
                else
                    $filters['lowest_price.price'] = [
                    '$gte' => $min_price
                        ];
            }
            
            if (in_array('brand', $queryKeys))
                $filters['brand'] = $queryParams['brand'];
            
            $this->category = $category;
            $title = "{$this->category->name} Prices in India - abhiabhi.com";
            $this->header_tags['title'] = ucwords($title);
            $this->header_tags['meta'][] = ['name' => 'Description', 'content' => ucwords("Get the best {$this->category->name} Prices in India")];
            $this->header_tags['meta'][] = ['name' => 'Keywords', 'content' => ucwords("{$this->category->name} Price List in India, {$this->category->name} Price List, Compare {$this->category->name} Prices in India")];
            $this->header_tags['link'][] = ['rel' => 'canonical', 'href' => "http://".Registry::$host."/{$this->category->name}s"];
            
            
            $products = $category->getFreshProductsSortedByPrice($filters);
            $this->products = [];
            if ($category->name != 'book') {
                $brands = Brands::getAllBrands($category->name);
                $this->brands = Utils::sortArrayByKey($brands, 'num_products', false);
                foreach ($this->brands as $k => $v) {
                    $this->brands[$k]['url'] = "http://".Registry::$host."/{$category->name}s?brand={$v['name']}";
                    $this->brands[$k]['name'] = Products::getBrandName($v['name']);        
                }
            }
            //var_dump($this->brands);die;
            foreach ($products as $product) {
                $p=array();
                $p['id'] = $product['_id'];
                $p['name'] = Products::buildProductName($this->category->name,$product);
                $p['lowest_price'] = $product['lowest_price'];
                $p['store_count'] = $product['store_count'];
                $p['url']="http://".Registry::$host.'/'.Products::getSlugFromProduct($product)."_{$product['_id']}";
                $this->products[] = $p;
            }
            
            $this->products = Utils::sortArrayByKey($this->products, 'store_count', false);
            
            /*$price_difference = ($category->highestPrice - $category->lowestPrice);
            $offset = (int)$price_difference/Registry::$numPriceFilters;
            $price_filters = [];
            $left = $category->lowestPrice;
            $i = 0;
             while ($i < Registry::$numPriceFilters){
                $right = $left + $offset;
                $price_filters[] = ["{$left} - {$right}", [$left, $right]];
                $left = $right + 1;
                $i +=1 ;
            }
                $this->priceFilters = $price_filters;*/
            
            $this->priceFilters = Categories::getPriceFilters($this->category->name);
        }
        
        public function buildHomePage($ago = -86400) {
            
            $this->header_tags['title'] = 'Get Value for Your Money - abhiabhi.com';
            $this->header_tags['link'][] = ['rel' => 'canonical', 'href' => "http://".Registry::$host];
            $this->header_tags['meta'][] = ['name' => 'Keywords', 'content' => 'Pricelist in india, compare online, check prices, check price in india, coupons, online prices'];
            $this->header_tags['meta'][] = ['name' => 'Description', 'content' => 'Get lowest prices on Mobiles, Cameras, Books, Laptops, Tablet pc, and more. Always get the best vaule for your money.'];
            
            #$this->featured_products = Products::getFeaturedProducts(false, 4);
            
            #$this->most_viewed_products = Products::getMostViewedProducts('mobile', 6);
            $this->price_lists = Brands::getAllBrands('mobile', 8);
            $this->recent_products = [];
            $this->most_viewed_products = [];
            $this->best_seller_products = Products::getBestSellerProducts(false, 4);
            $rootCategories = Categories::getRootCategories();
            foreach ($rootCategories as $rc)
                if ($rc['name'] != 'book') {
                    $this->recent_products[] = Products::getRecentProducts($rc['name'], 1, $ago)[0];
                    $this->most_viewed_products[] = Products::getFeaturedProducts($rc['name'], 1)[0];
                    }
            $cameras = Products::find([
                'conditions' => ['root_category' => 'camera', 'status' => 1],
                 'fields' => ['_id', 'name', 'lowest_price', 'store_count', 'root_category'],
                 'order' => ['store_count' => -1, 'lowest_price.price' => -1],
                'limit' => 8
            ]);
            
            $best_cameras = [];
            foreach ($cameras as $camera) {
                $c = $camera;
                $slug = Products::getSlugFromProduct($camera);
                $c['url'] = 'http://'.Registry::$host."/{$slug}_{$camera['_id']}";
                $best_cameras[] = $c;
            }
            
            $this->best_cameras = $best_cameras;
            //var_dump($this->most_viewed_products;var_dump($this->recent_products);die;
            return $this;
            
        }
        
        public function buildSearchResultsPage($query) {
            $criteria['query'] = $query;
            $results = Search::query($criteria);
            $num_results = count($results[0]);
            $this->query = trim($query);
            $this->header_tags['title'] = "Search results for {$query}. {$results[1]} results found";
            $this->header_tags['meta'][] = ['name' => 'Keywords', 'content' => "{$query}, {$query} Prices in India"];
            $this->header_tags['meta'][] = ['name' => 'Description', 'content' => "Search results for {$query}. {$results[1]}"];
            $this->results = $results[0];
            $this->num_results = $num_results;
            $this->total_results = $results[1];
        }
        
        public function buildBrandListPage($limit = 4, $page = 1) {
            $cats = Categories::getRootCategories();
            $results = [];
            foreach ($cats as $c) {
                if ($c['name'] == 'book')
                    continue;
                $brands = Brands::getAllBrands($c['name'], $limit, $page);
                $results[$c['name']] = $brands;
            }
            $this->categories = $results;
            $this->header_tags['title'] = "Brands List";
            $this->header_tags['meta'][] = ['name' => 'Keywords', 'content' => "Mobile brands, Laptop Brands, Tablet Brands, Camera Brands, Pendrive Brands, Hard Disk Brands"];
            $this->header_tags['meta'][] = ['name' => 'Description', 'content' => "Mobile brands, Laptop Brands, Tablet Brands, Camera Brands, Pendrive Brands, Hard Disk Brands"];
        }
    
        public function buildBrandPage($brand_name, $limit = 4, $page = 1) {
            //$products = Brands::getProductsOfBrand($brand_name, false, $limit, $page);
            $brand = Brands::find([
                'conditions' => [
                    'name' => $brand_name
                ],
                'limit' => 1
            ])[0];
            if (!$brand)
                Router::redirect('/NotFound.html', 404);
            $results = [];
            
            foreach ($brand['categories'] as $cat => $p) {
                $products = Brands::getProductsOfBrand($brand_name, $cat, $limit, $page);
                foreach ($products as $k => $v) {
                    $products[$k]['slug'] = Products::getSlugFromProduct($v);
                }
                $results[$cat] = $products;
            }
            $this->brand = $brand;
            $this->results = $results;
            $this->header_tags['title'] = Products::getBrandName($brand_name)." Brand Page";
            $this->header_tags['meta'][] = ['name' => 'Keywords', 'content' => "Mobile brands, Laptop Brands, Tablet Brands, Camera Brands, Pendrive Brands, Hard Disk Brands"];
            $this->header_tags['meta'][] = ['name' => 'Description', 'content' => "Mobile brands, Laptop Brands, Tablet Brands, Camera Brands, Pendrive Brands, Hard Disk Brands"];
        }
        
        public function buildUpcomingPage($data) {
            $products = Products::getUpcomingProducts($data);
            $this->products = $products;
            $brands = [];
            foreach ($products as $product) {
                $brands[$product['brand']] = ['url' => "http://".Registry::$host."/mobiles?brand={$product['brand']}&upcoming=1", 'name' => Products::getBrandName($product['brand'])];
                //$brands[] = ['name'] = Products::getBrandName($product['brand']);
            }
            $this->brands = array_values($brands);
            $this->header_tags['title'] = "Products to be launched soon ...";
            $this->header_tags['meta'][] = ['name' => 'Keywords', 'content' => "Mobile brands, Laptop Brands, Tablet Brands, Camera Brands, Pendrive Brands, Hard Disk Brands"];
            $this->header_tags['meta'][] = ['name' => 'Description', 'content' => "Mobile brands, Laptop Brands, Tablet Brands, Camera Brands, Pendrive Brands, Hard Disk Brands"];
        }
}       
