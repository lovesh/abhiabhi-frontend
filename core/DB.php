<?php

include ('MongoAdapter.php');

class DB {
    
    public static function _find($connection, $options, $count = false) {
        if ($connection['type'] == 'mongodb') {
            if (array_key_exists('page', $options))
                if ($options['page'] > 1)
                    $options['offset'] = $options['limit'] * ((int)$options['page'] - 1);
            
            return MongoAdapter::find($connection, $options, $count);
        }
    }
    
    public static function _update($connection, $criteria, $upd, $options) {
        if ($connection['type'] == 'mongodb') {
            
            return MongoAdapter::update($connection, $criteria, $upd, $options);
        }
    }
    
    public static function _create($connection, $document, $options) {
        if ($connection['type'] == 'mongodb') {
            
            return MongoAdapter::insert($connection, $document, $options);
        }
    }
    
    public static function _delete($connection, $document, $options) {
        if ($connection['type'] == 'mongodb') {
            
            return MongoAdapter::delete($connection, $criteria, $options);
        }
    }
    
    public static function _count($connection, $criteria) {
        if ($connection['type'] == 'mongodb') {
            
            return MongoAdapter::count($connection, $criteria);
        }
    }
}

