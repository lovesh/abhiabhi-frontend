<?php

require_once 'utils/Utils.php';
require_once 'Products.php';

class Categories extends Model {
    
    public $name;
    
    public $id;
    
    public $isRoot;
    
    public $idChain = array();
    
    public $nameChain = array();
    
    public $lowestPrice;
    
    public $highestPrice;
    
    public $numProducts;
    
    public function __construct($cat_name) {
        if ($cat_name == 'book')
                $this->connection = Registry::$dbConnections['books'];
            else
                $this->connection = [];
            
        $category = static::find([
            'conditions' => [
                'name' => $cat_name,
                'status' => 1
            ],
            'limit' => 1
        ], $this->connection)[0];
        
        if (!$category)
            Router::redirect('/NotFound.html',404);
        $this->name=$category['name'];
        $this->id=$category['_id'];
        $this->isRoot=$category['is_root'];
        //$this->idChain=$category['id_chain'];
        $this->nameChain=$category['name_chain'];
        $this->rootCategory=$this->nameChain[0];
        $this->lowestPrice=$category['lowest_price'];
        $this->highestPrice=$category['highest_price'];
        $this->numProducts=$category['num_products'];
    }
    
    /**
     * Get Products that were last updated in the given seconds 
     * eg get products last updated in 60 seconds
	 * @param integer the number of seconds
     * @param integer the number of products to be retrieved
     * @param integer the pagination number, dafaults to 1
     * @return array products  
	*/
    public function getProductsLastUpdatedIn($filters, $seconds,$limit=20,$page=1) {
        
        $conditions = ['categories' => $this->name, 'status' => 1];
        $conditions = array_merge($conditions, $filters);
        
        $seconds_ago = Utils::getMongoDate(-$seconds);//var_dump($seconds_ago);
        $products=Products::find([
                'conditions' => $conditions,
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'order' => ['store_count' => -1, 'last_updated_datetime' => -1,'lowest_price.price' => -1],
                'limit' => $limit,
                'page' => $page
            ], $this->connection);
        #foreach ($products as $k => $v)
         #   $products[$k]['store_count'] = Products::getStoreCount($v);
        return $products;
    }
    
    /**
	 * A fresh product is a product that has been been added in the last two days.
     * If less than $limit products are found a fallback strategy is used
     * Fallback strategy is that fetch products that have been updated in last 2 days and even if that does not make `$limit` products, fetch products that have been updated in the last 4 days and even if that does not suffice fetch products without worrying for update date 
	 * @param integer the number of products to be retrieved
     * @param integer the pagination number, dafaults to 1
     * @return array products  
	*/
    public function getFreshProductsSortedByPrice($filters = [], $limit=20, $page=1) {
        //$two_days_ago=Utils::getMongoDate(-60*60*24*2);
        
        $conditions = ['categories' => $this->name, 'status' => 1];
        $conditions = array_merge($filters, $conditions);//var_dump($conditions);die;
        
        $two_days_ago = -60*60*24*2;
        
        $products=Products::find([
            'conditions' => $conditions,
            'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
            'order' => ['store_count' => -1, 'added_datetime' => -1,'lowest_price.price' => -1],
            'limit' => $limit,
            'page' => $page
        ], $this->connection);
        //var_dump($products);
        if (count($products) < $limit) {
           $fallback_prods = $this->getProductsLastUpdatedIn($filters, $two_days_ago, $limit-count($products),$page);
           $products = Utils::mergeProducts($products,$fallback_prods);
        }
        
        if (count($products) < $limit) {
            //$four_days_ago=Utils::getMongoDate(-60*60*24*4);
            $four_days_ago = -60*60*24*4;
            $fallback_prods = $this->getProductsLastUpdatedIn($filters, $four_days_ago, $limit-count($products),$page);
            $products = Utils::mergeProducts($products,$fallback_prods);
        }
        
        if (count($products)<$limit) {
            $fallback_prods = Products::find([
                'conditions' => $conditions,
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'order' => ['store_count' => -1, 'last_updated_datetime' => -1,'lowest_price.price' => -1],
                'limit' => $limit-count($products),
                'page' => $page
            ], $this->connection);
            $products = Utils::mergeProducts($products,$fallback_prods);
        }
        #foreach ($products as $k => $v)
         #   $products[$k]['store_count'] = Products::getStoreCount($v);
        
        return $products;
    }
    
    /**
     * Get Products of the category in the given price range
	 * @param mixed the minimum price
     * @param mixed the maximum price
     * @param integer the number of products to be retrieved
     * @param integer the pagination number, dafaults to 1
     * @return array products  
	*/
    public function getProductsInPriceRange($min=0,$max=false,$limit=20,$page=1) {
        if ($max) {
            $products=Products::find([
                'conditions' => [
                    'lowest_price.price' => [
                        '$lte' => $max,
                        '$gte' => $min
                    ],
                    'status' => 1,
                    'categories' => $this->name
                ],
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'order' => ['store_count' => -1, 'lowest_price.price' => -1, 'last_updated_datetime' => -1],
                'limit' => $limit,
                'page' => $page
            ], $this->connection);
            return $products;
        }
        
        $products=Products::find([
                'conditions' => [
                    'categories' => $this->name,
                    'status' => 1,
                    'lowest_price.price' => [
                        '$gte' => $min
                    ],
                ],
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'order' => ['store_count' => -1, 'lowest_price.price' => -1, 'last_updated_datetime' => -1],
                'limit' => $limit,
                'page' => $page
            ], $this->connection);
        #foreach ($products as $k => $v)
         #   $products[$k]['store_count'] = Products::getStoreCount($v);
        
        return $products;
    }
    
    public static function getRootCategories() {
        $roots = static::find([
            'conditions' => [
                'is_root' => true
            ],
            'fields' => ['_id','name','lowest_price','highest_price','num_products'],
        ]);
        $books = static::find([
            'conditions' => [
                'is_root' => true
            ],
            'fields' => ['_id','name','lowest_price','highest_price','num_products'],
        ], Registry::$dbConnections['books']);
        
        return array_merge($roots, $books);
    }
    
    public function getProductsOfBrand($brand,$limit=20,$page=1) {
        $products=Products::find([
                'conditions' => [
                    'categories' => $this->name,
                    'brand' => $brand,
                    'status' => 1
                ],
                'fields' => ['_id','name','lowest_price','key_features', 'root_category'],
                'order' => ['last_updated_datetime' => -1,'lowest_price.price' => -1],
                'limit' => $limit,
                'page' => $page
            ], $this->connection);
        
        return $products;
    }
    
    public static function getPriceFilters($cat_name) {
        $price_filters = [];
        
        if ($cat_name == 'book') {
            $price_filters[] = ['1 - 500', [1, 500]];
            $price_filters[] = ['501 - 1000', [501, 1000]];
            $price_filters[] = ['1001 - 1500', [1001, 1500]];
            $price_filters[] = ['1501 - 2000', [1501, 2000]];
            $price_filters[] = ['2000 - 3000', [2000, 3000]];
            $price_filters[] = ['3000 - 5000', [3000, 5000]];
            $price_filters[] = ['5000 - more', [5000, ]];
            return $price_filters;
        }
        
        if ($cat_name == 'mobile') {
            $price_filters[] = ['1 - 2000', [1, 2000]];
            $price_filters[] = ['2001 - 4000', [2001, 4000]];
            $price_filters[] = ['4001 - 7000', [4001, 7000]];
            $price_filters[] = ['7001 - 10000', [7001, 10000]];
            $price_filters[] = ['10001 - 15000', [10001, 15000]];
            $price_filters[] = ['15001 - 20000', [15001, 20000]];
            $price_filters[] = ['20001 - 30000', [20001, 30000]];
            $price_filters[] = ['30001 - more', [30001, ]];
            return $price_filters;
        }
        
        if ($cat_name == 'camera') {
            $price_filters[] = ['1 - 5000', [1, 5000]];
            $price_filters[] = ['5001 - 10000', [5001, 10000]];
            $price_filters[] = ['10001 - 15000', [10001, 15000]];
            $price_filters[] = ['15001 - 20000', [15001, 20000]];
            $price_filters[] = ['20001 - 25000', [20001, 25000]];
            $price_filters[] = ['25001 - 30000', [25001, 30000]];
            $price_filters[] = ['30001 - 50000', [30001, 50000]];
            $price_filters[] = ['50001 - 70000', [50001, 70000]];
            $price_filters[] = ['70001 - more', [70001, ]];
            return $price_filters;
        }
        
        if ($cat_name == 'laptop') {
            $price_filters[] = ['1 - 20000', [1, 20000]];
            $price_filters[] = ['20001 - 30000', [20001, 30000]];
            $price_filters[] = ['30001 - 35000', [30001, 35000]];
            $price_filters[] = ['35001 - 40000', [35001, 40000]];
            $price_filters[] = ['40001 - 45000', [40001, 45000]];
            $price_filters[] = ['45001 - 50000', [45001, 50000]];
            $price_filters[] = ['50001 - 70000', [50001, 70000]];
            $price_filters[] = ['70001 - 80000', [70001, 80000]];
            $price_filters[] = ['80001 - 90000', [80001, 90000]];
            $price_filters[] = ['90001 - more', [90001, ]];
            return $price_filters;
        }
        
        if ($cat_name == 'tablet') {
            $price_filters[] = ['1 - 7000', [1, 7000]];
            $price_filters[] = ['7001 - 10000', [70001, 10000]];
            $price_filters[] = ['10001 - 15000', [10001, 15000]];
            $price_filters[] = ['20001 - 25000', [20001, 25000]];
            $price_filters[] = ['25001 - more', [25001, ]];
            return $price_filters;
        }
        
        if ($cat_name == 'pendrive') {
            $price_filters[] = ['1 - 300', [1, 300]];
            $price_filters[] = ['301 - 500', [301, 500]];
            $price_filters[] = ['501 - 1000', [501, 1000]];
            $price_filters[] = ['1001 - 1500', [1001, 1500]];
            $price_filters[] = ['1501 - more', [1501, ]];
            return $price_filters;
        }
        
        if ($cat_name == 'harddisk') {
            $price_filters[] = ['1 - 4000', [1, 4000]];
            $price_filters[] = ['4001 - 8000', [4001, 8000]];
            $price_filters[] = ['8001 - 10000', [8001, 10000]];
            $price_filters[] = ['10001 - 12000', [10001, 12000]];
            $price_filters[] = ['12001 - more', [12001, ]];
            return $price_filters;
        }
    }
}

