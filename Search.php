<?php

require_once 'Products.php';

class Search {
    
    public $query = '';
    
    public $num_results = 0;
    
    public static $equivalents = [
        'mobile' => ['mobile', 'phone', 'cell'],
        'laptop' => ['laptop', 'notebook', 'netbook', 'pc', 'computer'],
        'tablet' => ['tablet', 'tab'],
        'camera' => ['point and shoot', 'point & shoot', 'digicam', 'slr', 'dslr', 'camcorder'],
        'pendrive' => ['pen drive', 'storage', 'pd', 'usb', 'drive'],
        'harddisk' => ['hard disk', 'hard drive', 'storage', 'hdd', 'usb', 'drive'],
        'book' => ['book', 'reading']
    ];
    
    
    public static function guessProductCategory($query) {
        $cats = [];
        foreach (static::$equivalents as $cat => $equivalent) {
            foreach ($equivalent as $e) {
                if (preg_match("/{$e}/i", $query)) {
                    $cats[] = $cat;
                    break;
                }
            }
        }
        return $cats;
    }
    
    public static function removeJunk($query) {
        
        $junk = ['mobile', 'phone', 'laptop', 'notebook', 'netbook', 'tablet', 'pendrive', 'hard disk', 'cellphone', 'camera'];
        foreach ($junk as $j) {
            $query = preg_replace("/$j/i", '', $query);
        }
        return $query;
    }
    
    public static function queryProductCategories($criteria, $limit = 20, $page = 1, $count = false) {
        $cats = static::guessProductCategory($criteria['query']);
        $r = Products::find([
            'conditions' => [
                'root_category' => [
                    '$in' => $cats
                ],
                'status' => 1
            ],
            'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'upcoming'],
            'limit' => $limit,
            'page' => $page
        ]);
        
        $c = Products::count([
            'root_category' => [
                    '$in' => $cats
                ],
            'status' => 1
            ]);
        
		return [$r, $c];
    }
    
    public static function queryBrands($criteria, $limit = 20, $page = 1, $count = false) {
        $query = trim($criteria['query']);
        $regex = new MongoRegex("/{$query}/i");//var_dump($criteria);
        unset($criteria['query']);
        $criteria['brand'] = $regex;
        $criteria['status'] = 1;
        $r = Products::find([
            'conditions' => $criteria,
            'fields' => ['_id', 'name', 'lowest_price', 'key_features', 'root_category', 'upcoming'],
            'limit' => $limit,
            'page' => $page
        ]);
        
        $c = Products::count($criteria);

        return [$r, $c];
    }
    
    public static function _query($criteria, $limit = 20, $page = 1, $count = false) {
        $query = $criteria['query'];
        $query_words = explode(' ', $query);
        if (count($query_words) == 1) {
            
            $result = static::queryBrands($criteria, $limit, $page, $count);
            if (count($result[0]) > 3) {
                return $result;
            }
            
            $result = static::queryProductCategories($criteria, $limit, $page, $count);
            if (count($result[0]) > 3) {
                return $result;
            }
            
        }
        
        $query = static::removeJunk($query);
        $regex = new MongoRegex("/{$query}/i");
        unset($criteria['query']);
        $criteria['name'] = $regex;
        $criteria['status'] = 1;
        $r = Products::find([
            'conditions' => $criteria,
            'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'upcoming'],
            'limit' => $limit,
            'page' => $page
        ]); 
        
        $c = Products::count($criteria);
        
        return [$r, $c];
    }
    
    public static function query($criteria, $limit = 20, $page = 1, $count = false) {
        $results = static::_query($criteria, $limit, $page, $count);//var_dump($results);die;
        $prods = [];
        foreach ($results[0] as $product) {
            $p=array();
            $p['id'] = $product['_id'];
            if ($product['upcoming'])
                $p['upcoming'] = $product['upcoming'];
            else
                $p['upcoming'] = 0;
            $p['name']=Products::buildProductName($product['root_category'], $product);
            $p['lowest_price']=$product['lowest_price'];
            $p['url']="http://".Registry::$host.'/'.Products::getSlugFromProduct($product)."_{$product['_id']}";
            $prods[] = $p;
            }
        return [$prods, $results[1]]; 
    }
}
