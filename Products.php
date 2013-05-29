<?php

require_once 'utils/Inflector.php';

class Products extends Model {

    public $id;

    /**
     *  integer inidicating whether a product is active or inactive. 1 means active and 0 means inactive
     */
    public $status;
    public $name;

    /**
     *  string if the product has a admin defined slug otherwise false
     */
    public $slug;
    public $brand_id;
    public $brand_name;
    public $header_tags = false;

    /**
     *  array of scraped product ids which are related to this product
     */
    public $scraped_product_ids = [];

    /**
     *  Array containing data about the product at different stores. Each element is an itself an associative array
     *  having keys store_id,store_name,store_price,store_shipping_duration,product_url,datetime at which this info was gathered 
     */
    public $stores;

    /**
     *  Associative array containing data about the lowest price of product at present, having keys store and price 
     */
    public $lowest_price;

    /**
     *  Array containing data about the lowest price of product at different times in history. Each element is an itself an associative array
     *  having keys store_id,store_name,price,store_shipping_duration,datetime at which this info was gathered 
     */
    public $price_history;

    /**
     *  string inidicating what is the root category of product like mobile,book,laptop,etc
     */
    public $root_category;

    /**
     *  array of category_ids where the first element is the root category_id and then the descenants follow
     */
    public $categories;

    /**
     *   datetime when the product was added to the catalogue
     */
    public $added_datetime;

    /**
     *  last datetime when the product was updated from the scraped data
     */
    public $last_updated_datetime;
    public $views_count;

    /**
     *  number of users who have kept it on their watchlist
     */
    public $watchlist_count;

    /**
     *  array of comments where each comment contains the commenter's name,email,user_id(if commented by a user),session_id of the commenter,ip of the commenter,datetime of the comment and comment's data
     */ 
    public $comments = [];

    /**
     *  associative array of details of the product
     */
    public $specification;

    /**
     *  associative array of key features of the product
     */
    public $key_features;
    
    /**
     *  string for essential description
     */
    public $essential_description;

    /**
     *  boolean indicating if product is featured or not
     */
    public $featured;
    
    /**
     *  boolean indicating if product is upcoming or not
     */
    public $upcoming;
    

    public function __construct($mongoId = false) {
        if ($mongoId) {
            $product = static::find([
                        'conditions' => [
                            '_id' => $mongoId,
                            'status' => 1
                            ],
                        'limit' => 1
                    ]);
            //var_dump($product);die;
            
            if (empty($product)) {
                $product = Products::find([
                        'conditions' => [
                            '_id' => $mongoId,
                            'status' => 1
                            ],
                        'limit' => 1
                    ], Registry::$dbConnections['books']);
                if (empty($product))
                    return null;
            }
                
            $product = $product[0];
            $this->id = $product['_id'];
            $this->root_category = $product['root_category'];
            $this->name = static::buildProductName($this->root_category, $product);
            $this->key_features = $product['key_features'];
            $this->essential_description = $this->getEssentialDescription();
            if (array_key_exists('header_tags', $product))
                $this->header_tags = $product['header_tags'];
            if (!array_key_exists('price', $product['lowest_price']))
                $product['lowest_price']['price'] = -1; 
            $this->lowest_price = $product['lowest_price'];
            $this->slug = static::getSlugFromProduct($product);
            foreach ($product['stores'] as $k => $store)
                if (!array_key_exists('price', $store))
                     $product['stores'][$k]['price'] = -1;   
            $this->stores = $product['stores'];
            $this->store_count = count($this->stores);
            $this->description = $this->getDescription($product['description']);
            if (array_key_exists('comments', $product))
                $this->comments = $product['comments'];
            if (array_key_exists('views_count', $product))
            $this->views_count = $product['views_count'];
            foreach ($product['scraped_product_ids'] as $id) {
                array_push($this->scraped_product_ids, $id);
            }
            
            if (isset($product['upcoming']) && $product['upcoming'] == 1)
                $this->upcoming = 1;
            else
                $this->upcoming = 0;
            
            if ($this->root_category != 'book') {
                $this->brand_name = static::getBrandName($product['brand']);
                $this->specification = $this->getSpecification($product);
            }
            
        }
    }

    public static function buildProductName($rootCategory, $product) {
        $name = '';
        $name = $product['name'];
        if ($rootCategory == 'laptop') {
            $name_extra = '';
            if (in_array('processor', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['processor']}, ";
            if (in_array('ram', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['ram']}, ";
            if (in_array('storage capacity', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['storage capacity']}, ";
            if (in_array('os', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['os']}, ";
            if (in_array('screen size', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['screen size']}";
            $name_extra = rtrim($name_extra, ', ');
            if ($name_extra != '')
                $name = "{$name} ({$name_extra})";
        }

        if ($rootCategory == 'tablet') {
            $name_extra = '';
            if (in_array('ram', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['ram']}, ";
            if (in_array('storage', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['storage']}, ";
            if (in_array('os', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['os']}";
            $name_extra = rtrim($name_extra, ', ');
            if ($name_extra != '')
                $name = "{$name} ({$name_extra})";
        }

        if ($rootCategory == 'harddisk') {
            $name_extra = '';
            if (in_array('capacity', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['capacity']}, ";
            if (in_array('interface', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['interface']}, ";
            if (in_array('size', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['size']}";
            $name_extra = rtrim($name_extra, ', ');
            if ($name_extra != '')
                $name = "{$name} ({$name_extra})";
        }

        if ($rootCategory == 'pendrive') {
            $name_extra = '';
            if (in_array('capacity', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['capacity']}, ";
            if (in_array('interface', $product['key_features']))
                $name_extra = "{$name_extra}{$product['key_features']['interface']}";
            $name_extra = rtrim($name_extra, ', ');
            if ($name_extra != '')
                $name = "{$name} ({$name_extra})";
        }

        return $name;
    }

    /**
     * Creates slug by using the product data
     * @param array $product
     * @return string slug for product
     */
    public static function getSlugFromProduct($product) {

        $name = $product['name'];

        if ($product['root_category'] == 'book') {
            if (array_key_exists('isbn13', $product['key_features'])) {
                $slug = "{$name}-{$product['key_features']['isbn13']}";
                return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
            }

            if (array_key_exists('isbn', $product['key_features'])) {
                $slug = "{$name}-{$product['key_features']['isbn']}";
                return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
            }
            return rawurlencode(str_replace(' ', '-', $name));
        }

        if ($product['root_category'] == 'mobile') {
            $slug = $name;
            return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
        }
        
        if ($product['root_category'] == 'camera') {
            $slug = $name;
            return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
        }

        if ($product['root_category'] == 'laptop') {
            $slug = $name;
            if (array_key_exists('processor', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['processor']}";
            if (array_key_exists('ram', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['ram']}";
            if (array_key_exists('storage capacity', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['storage capacity']}";
            return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
        }

        if ($product['root_category'] == 'tablet') {
            $slug = $name;
            if (array_key_exists('ram', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['ram']}";
            if (array_key_exists('storage', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['storage']}";
            if (array_key_exists('os', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['os']}";
            return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
        }

        if (in_array($product['root_category'], array('pendrive', 'harddisk'))) {
            $slug = $name;
            if (array_key_exists('capacity', $product['key_features']))
                $slug = "{$slug}-{$product['key_features']['capacity']}";
            if (array_key_exists('interface', $product['key_features'])){
                if (gettype($product['key_features']['interface']) == 'string')
                    $slug = "{$slug}-{$product['key_features']['interface']}";
                if (gettype($product['key_features']['interface']) == 'array')
                    $slug = "{$slug}-".implode(', ',$product['key_features']['interface']);
            }
            return rawurlencode(str_replace(' ', '-', Inflector::slug($slug)));
        }
    }

    private function getDescription($desc) {
        foreach (Registry::$constants['site_preference'] as $site)
            if (in_array($site, $desc))
                if (strlen($desc[$site]))
                    return $desc[$site];
        return '';
    }

    private function getSpecification($product) {
        $product_type = $this->root_category;
        $specification = [];

        if ($product_type === 'book') {
            $specification['name'] = $this->name;
            $details = $product['key_features'];

            if (array_key_exists('isbn', $details))
                $specification['ISBN 10'] = $details['isbn'];
            if (array_key_exists('isbn13', $details))
                $specification['ISBN 13'] = $details['isbn13'];
            if (array_key_exists('publisher', $details))
                $specification['Publisher'] = $details['publisher'];
            if (array_key_exists('num_pages', $details))
                $specification['Number of Pages'] = $details['num_pages'];
            if (array_key_exists('author', $details))
                $specification['Author'] = $details['author'];
            if (array_key_exists('language', $details))
                $specification['Language'] = $details['language'];
            if (array_key_exists('format', $details))
                $specification['Format'] = $details['format'];
            if (array_key_exists('edition', $details))
                $specification['Edition'] = $details['edition'];
            if (array_key_exists('pubdate', $details))
                $specification['Publishing Date'] = \DateTime::setTimestamp($details['pubdate']->sec);
            if (array_key_exists('description', $details))
                $specification['Description'] = $details['description'];

            return $specification;
        }

        foreach (Registry::$constants['site_preference'] as $site) { 
            if (isset($product['upcoming']))
                return $product['specification'];
            
            if (array_key_exists($site, $product['specification'])) {
                    
                if (!empty($product['specification'][$site])) {
                    
                    return $product['specification'][$site];
                }
            }
        }
    }

    public static function getMostViewedProducts($rootCategory = false, $limit = 5, $page = 1) {
        if ($rootCategory) {
            if ($rootCategory == 'book')
                $connection = Registry::$dbConnections['books'];
            else
                $connection = [];
            $products = static::find([
                        'conditions' => [
                            'lowest_price.price' => [
                                '$exists' => true
                            ],
                            'status' => 1,
                            'root_category' => $rootCategory
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['views_count' => -1, 'added_datetime' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ], $connection);
        }
        else
            $products = static::find([
                        'conditions' => [
                            'lowest_price.price' => [
                                '$exists' => true
                            ],
                            'status' => 1
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['views_count' => -1, 'added_datetime' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ]);
        
        foreach ($products as $k => $v) {
            $products[$k]['slug'] = "http://".Registry::$host.'/'.Products::getSlugFromProduct($v)."_{$v['_id']}";
            #$products[$k]['store_count'] = Products::getStoreCount($v);
        }
        return $products;
    }
    
    public static function getFeaturedProducts($rootCategory = false, $limit = 5, $page = 1) {
        if ($rootCategory) {
            
            if ($rootCategory == 'book')
                $connection = Registry::$dbConnections['books'];
            else
                $connection = [];
            
            $products = static::find([
                        'conditions' => [
                            'root_category' => $rootCategory,
                            'featured' => 1,
                            'status' => 1,
                            'lowest_price.price' => [
                                '$exists' => true
                            ]
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['views_count' => -1, 'added_datetime' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ], $connection);
        }
        else
            $products = static::find([
                        'conditions' => [
                            'featured' => 1,
                            'status' => 1,
                            'lowest_price.price' => [
                                '$exists' => true
                            ]
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['views_count' => -1, 'added_datetime' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ]);
        
        foreach ($products as $k => $v) {
            $products[$k]['slug'] = "http://".Registry::$host.'/'.Products::getSlugFromProduct($v)."_{$v['_id']}";
            #$products[$k]['store_count'] = Products::getStoreCount($v);
        }
        return $products;
    }
    
    public static function getBestSellerProducts($rootCategory = false, $limit = 5, $page = 1) {
        if ($rootCategory) {
            
            if ($rootCategory == 'book')
                $connection = Registry::$dbConnections['books'];
            else
                $connection = [];
            
            $products = static::find([
                        'conditions' => [
                            'root_category' => $rootCategory,
                            'best_seller' => 1,
                            'status' => 1,
                            'lowest_price.price' => [
                                '$exists' => true
                            ]
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['views_count' => -1, 'added_datetime' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ], $connection);
        }
        else
            $products = static::find([
                        'conditions' => [
                            'best_seller' => 1,
                            'status' => 1,
                            'lowest_price.price' => [
                                '$exists' => true
                            ]
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['views_count' => -1, 'added_datetime' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ]);
        
        foreach ($products as $k => $v) {
            $products[$k]['slug'] = "http://".Registry::$host.'/'.Products::getSlugFromProduct($v)."_{$v['_id']}";
            #$products[$k]['store_count'] = Products::getStoreCount($v);
        }
        return $products;
    }
    
    public static function getRecentProducts($rootCategory = false, $limit = 5, $added = 0, $page = 1) {
        
        $added = Utils::getMongoDate($added);
        
        if ($rootCategory) {
            
            if ($rootCategory == 'book')
                $connection = Registry::$dbConnections['books'];
            else
                $connection = [];
            
            $products = static::find([
                        'conditions' => [
                            'root_category' => $rootCategory,
                            /*'added_datetime' => [
                                '$gte' => $added
                            ],*/
                            'status' => 1,
                            'lowest_price.price' => [
                                '$exists' => true
                            ]
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category'],
                        'order' => ['added_datetime' => -1, 'views_count' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ], $connection);
        }
        else
            $products = static::find([
                        'conditions' => [
                            /*'added_datetime' => [
                                '$gte' => $added
                            ],*/
                            'status' => 1,
                            'lowest_price.price' => [
                                '$exists' => true
                            ]
                        ],
                        'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category', 'added_datetime'],
                        'order' => ['added_datetime' => -1, 'views_count' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ]);
        
        foreach ($products as $k => $v) {
            $products[$k]['slug'] = "http://".Registry::$host.'/'.Products::getSlugFromProduct($v)."_{$v['_id']}";
            #$products[$k]['store_count'] = Products::getStoreCount($v);
        }
        //var_dump($products);die;
        return $products;
    }
    
    public static function getProductsInPriceRange($rootCategory = false, $min=0,$max=false,$limit=20,$page=1) {
        if ($rootCategory) {
            
            if ($rootCategory == 'book')
                $connection = Registry::$dbConnections['books'];
            else
                $connection = [];
            
            $products = static::find([
                'conditions' => [
                    'lowest_price.price' => [
                        '$lte' => $max,
                        '$gte' => $min
                        ],
                    'status' => 1,
                    'root_category' => $rootCategory,
                 ],
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'order' => ['store_count' => -1, 'lowest_price.price' => -1, 'last_updated_datetime' => -1],
                'limit' => $limit,
                'page' => $page
            ], $connection);
        }
        else
            $products = static::find([
                'conditions' => [
                    'status' => 1,
                    'lowest_price.price' => [
                        '$lte' => $max,
                        '$gte' => $min
                    ],
                ],
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'order' => ['store_count' => -1, 'lowest_price.price' => -1, 'last_updated_datetime' => -1],
                'limit' => $limit,
                'page' => $page
            ]);
        
        foreach ($products as $k => $v) {
            $products[$k]['slug'] = "http://".Registry::$host.'/'.Products::getSlugFromProduct($v)."_{$v['_id']}";
            #$products[$k]['store_count'] = Products::getStoreCount($v);
        }
        return $products;
    }
    
    public static function getUpcomingProducts($rootCategory = false, $shuffle = false, $limit = 20, $page = 1) {
        if ($rootCategory) {
            $limit = static::count(['upcoming' => 1, 'root_category' => $rootCategory]);
            
            if ($rootCategory == 'book')
                $connection = Registry::$dbConnections['books'];
            else
                $connection = [];
            $products = static::find([
                        'conditions' => [
                            'upcoming' => 1,
                            'status' => 1,
                            'root_category' => $rootCategory
                        ],
                        'fields' => ['_id', 'name', 'root_category', 'upcoming', 'brand'],
                        'order' => ['added_datetime' => -1, 'views_count' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ], $connection);
        }
        else
        {
            $limit = static::count(['upcoming' => 1]);
            $products = static::find([
                        'conditions' => [
                            'upcoming' => 1,
                            'status' => 1
                        ],
                        'fields' => ['_id', 'name', 'root_category', 'upcoming', 'brand'],
                        'order' => ['added_datetime' => -1, 'views_count' => -1],
                        'limit' => $limit,
                        'page' => $page
                    ]);
            
        }
        
        if ($shuffle)
            shuffle($products);
        
        foreach ($products as $k => $v) {
            $products[$k]['url'] = "http://".Registry::$host.'/'.Products::getSlugFromProduct($v)."_{$v['_id']}";
            $products[$k]['id'] = $v['_id'];
            //$products[$k]['store_count'] = Products::getStoreCount($v);
        }
        return $products;
        
    }
    
    public static function getStoreCount($product) {
        $store_names = [];
        foreach ($product['stores'] as $store)
            if (!in_array($store['name'], $store_names))
                 $store_names[] = $store['name'];
        return count($store_names);
    }
    
    private function getEssentialDescription() {
        $str = '';
        if (!$this->key_features)
            return $str;
        foreach ($this->key_features as $k => $v) {
            if (gettype($v) == 'object')
                if (get_class($v) == 'DateTime')
                    continue;
            if (gettype($v) != 'array')
                $str = $str.' '.$k.' of '.$v;
            else 
                $str = $str.' '.$k.' of '.implode(', ',$v);
            
        } 
        return $str;
    }

    public static function getBrandName($brand) {
        if ($brand == 'iball')
            return 'iBall';
        if (in_array($brand, ['hp', 'lg', 'htc', 'hcl','lava']))
            return strtoupper($brand);   
        if ($brand == 't-series')
            return 'T-Series';
        if ($brand == 'gfive')
            return 'G-Five';
        return ucwords($brand);
    }
    
    
}
