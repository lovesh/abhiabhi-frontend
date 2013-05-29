<?php

class Registry {
   
    public static $host = 'localhost';
    
    public static $timezone = 'Asia/Calcutta';
    
    public static $appPath;
    
    public static $dbConnections = [
        'default' => [
            'type' => 'mongodb',
            'host' => 'localhost',
            'port' => '27017',
            'database' => 'new_final',
            //'username' => '',
            //'password' => ''
        ],
        
        'analytics' => [
            'type' => 'mongodb',
            'host' => 'localhost',
            'port' => '27017',
            'database' => 'analytics',
            //'username' => '',
            //'password' => ''
        ],
        
        'images' => [
            'type' => 'mongodb',
            'host' => 'localhost',
            'port' => '27017',
            'database' => 'abhiabhi',
            //'username' => '',
            //'password' => '',
            'collection' => 'images.files'
        ],
        
        'books' => [
            'type' => 'mongodb',
            'host' => 'localhost',
            'port' => '27017',
            'database' => 'final',
            //'username' => '',
            //'password' => '',
            //'collection' => 'books'
        ]
    ];
    
    public static $smarty_dir = 'smarty/libs';
    
    public static $query = [];
    
    public static $constants = [
        'site_preference' => ['flipkart','buytheprice','saholic','homeshop18','infibeam','indiaplaza']
    ];
 
    public static $destinationController;
    public static $destinationMethod;
    public static $destinationArgs;
    
    public static $pagination_offset = 20;
    
    public static $numPriceFilters = 5;
}
