<?php

require_once 'Products.php';
require_once 'Search.php';

class ProductsController {
    
    public static function getProducts($limit = 20, $page = 1) {
        $queryParams = Registry::$query;
        $queryKeys = array_keys($queryParams);
        
        $criteria = ['status' => 1];
        
        if (in_array('category', $queryKeys))
            $criteria['categories'] = $queryParams['category'];
        
        if (in_array('brand', $queryKeys))
            $criteria['brand'] = $queryParams['brand'];
        
        if (in_array('price', $queryKeys)) {
            $price_parts = explode('-', $queryParams['price']);
            $min_price = (int)trim($price_parts[0]);
            $criteria['lowest_price.price'] = ['$gte' => $min_price];
                if ($price_parts[1]) {
                    $max_price = (int)trim($price_parts[1]);            
                    $criteria['lowest_price.price']['$lte'] = $max_price;			
                }
        }
        
        if (in_array('limit', $queryKeys)) {
            if ($queryParams['limit'] < 20)
                $limit = $queryParams['limit'];
        }
        
        if (in_array('page', $queryKeys)) {
            if ($queryParams['page'] < 100)
                $page = $queryParams['page'];
        }
        
        $order = [];
        
        if (in_array('order', $queryKeys)) {
            if ($queryParams['order'] == 'price_asc')
                $order = ['lowest_price.price' => 1];
            if ($queryParams['order'] == 'price_dsc')
                $order = ['lowest_price.price' => -1];
            if ($queryParams['order'] == 'date')
                $order = ['added_datetime' => -1];
           $order['store_count'] = -1;
           $order['added_datetime'] = -1;
           
           //var_dump($order);
        }
        
        if ($queryParams['category'] == 'book')
            $connection = Registry::$dbConnections['books'];
        else
            $connection = [];
        
        if (count($order) > 0) 
             $products = Products::find([
                'conditions' => $criteria,
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'limit' => $limit,
                'page' => $page,
                'order' => $order,
                ], $connection);
        
        else
            $products = Products::find([
                'conditions' => $criteria,
                'fields' => ['_id','name','lowest_price','key_features', 'root_category', 'store_count'],
                'limit' => $limit,
                'page' => $page,
                'order' => ['store_count' => -1, 'added_datetime' => -1, 'lowest_price.price' => -1],
                ], $connection);
        
        foreach ($products as $k => $product) {
            $products[$k]['url'] = Products::getSlugFromProduct($product).'_'.$product['_id'];
            //$products[$k]['store_count'] = Products::getStoreCount($product);
        }
        
        $count = Products::count($criteria, $connection);
        
        //var_dump($products);die;
        $response['products'] = $products;
        $response['count'] = $count;
        $json = json_encode($response);
        echo $json;
    }
    
    public function search ($limit = 20, $page = 1) {
        $queryParams = Registry::$query;
        $query = $queryParams['q'];
        $query = strip_tags($query);
        $queryKeys = array_keys($queryParams);
        $criteria = ['status' => 1, 'query' => $query];
        
        if (in_array('category', $queryKeys))
            $criteria['categories'] = $queryParams['category'];
        
        if (in_array('price', $queryKeys)) {
            $price_parts = explode('-', $queryParams['price']);
            $min_price = (int)trim($price_parts[0]);
            $criteria['lowest_price.price'] = ['$gte' => $min_price];
			if ($price_parts[1]) {
				$max_price = (int)trim($price_parts[1]);            
				$criteria['lowest_price.price']['$lte'] = $max_price;			
			}
        }
        
        if (in_array('limit', $queryKeys)) {
            if ($queryParams['limit'] < 20)
                $limit = $queryParams['limit'];
        }
        
        if (in_array('page', $queryKeys)) {
            if ($queryParams['page'] < 100)
                $page = $queryParams['page'];
        }
        
        $result = Search::query($criteria, $limit, $page);
        $response['products'] = $result[0];
        $response['count'] = $result[1];
        
        $json = json_encode($response);
        echo $json;
        
    }
}
