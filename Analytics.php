<?php

require_once 'Products.php';

class Analytics extends Model {
    
    protected static $_connection = 'analytics';
    
    public static function viewsProductPage($mongoId) {
            
            Products::update([
                ['_id' => $mongoId],
                ['$inc' => [
                    'views_count' => 1
                ]]
                ]);
            
            $ip=$_SERVER['REMOTE_ADDR'];
            $datetime=new MongoDate();
            
            if ($user) {
                $userId=$user['user_id'];
                UsersHistory::update([
                    'user_id' => $userId
                        ],
                    [
                    '$push' => [
                        'products_viewed' => [
                        'product_id' => $mongoId,
                        'ip' => $ip,
                        'session_id' => $sessionId,
                        'datetime' => $datetime
                         ]
                     ],
                    '$inc' => [
                        'products_viewed_count' => 1
                         ]
                     ]);
            }
            
            else {
                $visitor=Visitors::find([
                    'conditions' => [
                        'session_id' => $sessionId
                    ],
                    'limit' => 1
                ]);
                
                if (is_null($visitor)) {
                    $document=[
                        'session_id' => $sessionId,
                        'products_viewed' => [],
                        'products_checked' => [],
                        'products_viewed_count' => 0,
                        'products_checked_count' => 0
                    ];
                    $visitor=Visitors::create($document)->save();
                }
                    
                    Visitors::update([
                         'session_id' => $visitor->session_id
                            ],
                        [
                        '$push' => [
                            'products_viewed' => [
                            'product_id' => $mongoId,
                            'ip' => $ip,
                            'datetime' => $datetime
                             ]
                         ],
                        '$inc' => [
                            'products_viewed_count' => 1
                             ]
                     ]);
                }
                
        }
    
     public static function ckecksStore($data) {
            
            extract($data);
            
            Products::update([
                '$inc' => [
                    'checks_count' => 1
                ]],$productId);
            
            $ip=$_SERVER['REMOTE_ADDR'];
            $datetime=new \MongoDate();
            
            if (!isset($userId)) {
                $visitor=Visitors::find([
                    'conditions' => [
                        'session_id' => $sessionId
                    ],
                    'limit' => 1
                ]);
                
                if (is_null($visitor)) {
                    $document=[
                        'products_viewed' => [],
                        'products_checked' => [],
                        'products_viewed_count' => 0,
                        'products_checked_count' => 0
                    ];
                    $visitor=Visitor::create($document)->save();
                }
                    
                    Visitors::update([
                         'session_id' => $visitor->session_id
                          ],
                        [
                        '$push' => [
                            'products_checked' => [
                            'product_id' => $productId,
                            'store_id' => $storeID,
                            'ip' => $ip,
                            'datetime' => $datetime
                             ]
                         ],
                        '$inc' => [
                            'products_checked_count' => 1
                             ]
                        ]);
              
            }
            else 
                UsersHistory::update([
                         'user_id' => $userId
                        ],
                        [
                        '$push' => [
                            'products_checked' => [
                            'product_id' => $productId,
                            'store_id' => $storeID,
                            'ip' => $ip,
                            'session_id' => $sessionId,
                            'datetime' => $datetime
                             ]
                         ],
                        '$inc' => [
                            'products_viewed_count' => 1
                             ]
                     ]);
            
        }
}
