<?php

require_once 'Products.php';

class Brands extends Model {
    
    public $name;
    
    public $id;
    
    public $categories;
    
    public function __construct($brand = []) {
        
    }
    
    public static function getAllBrands($category = false, $limit = 20, $page = 1) {
        $result = [];
        
        if ($category) {
            $brands=Brands::find([
                'conditions' => [
                 "categories.{$category}" => [
                     '$exists' => true
                        ]
                    ],
                'fields' => ['_id','name','lowest_price', 'categories', 'highest_price', 'num_products'],
                'order' => ["categories.{$category}.num_products" => -1],
                'limit' => $limit,
                'page' => $page
                ]);
                 
            foreach($brands as $brand) {
                $r=[];
                $r['name']=$brand['name'];
                $r['num_products']=$brand['categories'][$category]['num_products'];
                $result[] = $r;
            }
            
            return $result;
        }
        
        $brands=Brands::find([
            'conditions' => [],
            'fields' => ['_id', 'num_products', 'name', 'categories'],
            'order' => ['added_datetime' => -1,'lowest_price.price' => -1],
            'limit' => $limit,
            'page' => $page
        ]);
        
        foreach($brands as $brand) {
            foreach($brand['categories'] as $cat) {
                if (!array_key_exists($cat,$result))
                    $result[$cat]=[];
                $r=[];
                $r['name']=$brand['name'];
                $r['num_products']=$brand['categories'][$cat];
                $result[$cat][] = $r;
            }
        }
        return $result;
    }
    
    public static function getProductsOfBrand($brand_name, $category=false, $limit=6, $page=1) {
        if ($category) {
            $products=Products::find([
                'conditions' => [
                 "root_category" => $category,
                 'brand' => $brand_name
                    ],
                'fields' =>['_id','name', 'lowest_price.price', 'key_features', 'root_category'],
                'order' => ['added_dateime' => -1, 'lowest_price.price' => -1],
                'limit' => $limit,
                'page' => $page
                ]);
            return $products;
        }
        else {
            $products=Products::find([
                'conditions' => [
                 'brand' => $brand_name
                    ],
                'fields' =>['_id','name', 'lowest_price.price', 'root_category', 'key_features'],
                'order' => ['added_dateime' => -1, 'lowest_price.price' => -1],
                'limit' => $limit,
                'page' => $page
                ]);
            
            foreach ($products as $k => $product) {
                $products[$k]['slug'] = Products::getSlugFromProduct($product);
                $products[$k]['store_count'] = Products::getStoreCount($product);
            }
            
            $productsByCategory=Utils::groupArrayByKey($products,'root_category');
            return $productsByCategory;
        }
    }
    
}
