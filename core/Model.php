<?php

include ('DB.php');

class Model extends DB {
    
    protected static $_connection = 'default';
    
    public static function find($options = [], $connection = []) {
        
        if (!$connection)
            $connection = Registry::$dbConnections[static::$_connection];
        if (!array_key_exists('collection', $connection))
             $connection['collection'] = strtolower(get_called_class());//var_dump($options);die;
        
        $defaults = [               // no limit option specified means find all
            'conditions' => [],
            'limit' => Registry::$pagination_offset,
            'page' => 1,
            'order' => []         
          ];
        $options = array_merge($defaults, $options);//var_dump($options);die;
        //var_dump($connection);
        $result = static::_find($connection, $options);
        //var_dump($result);die;
        return $result;
    } 
    
    public static function create($document, $options) {
        $connection = Registry::$dbConnections[static::$_connection];
        if (!array_key_exists('collection', $connection))
             $connection['collection'] = get_called_class();
        
        $defaults = [
            ['safe' => true],
            ];
        
        $options = array_merge($defaults, $options);
            
        $result = static::_create($connection, $document, $options);
    }
    
    public static function update($criteria = [], $upd = [], $options = []) {
        
        $connection = Registry::$dbConnections[static::$_connection];
        if (!array_key_exists('collection', $connection))
             $connection['collection'] = get_called_class();
        
        $defaults = [
            ['safe' => true],
            ];
        
        $options = array_merge($defaults, $options);
        $result = static::_update($connection, $criteria, $upd, $options);
    } 
    
    public static function delete($criteria, $options) {
        $connection = Registry::$dbConnections[static::$_connection];
        if (!array_key_exists('collection', $connection))
             $connection['collection'] = get_called_class();
        
        $defaults = [
            ['safe' => true],
            ];
        
        $options = array_merge($defaults, $options);
        $result = static::_delete($connection, $criteria, $options);
    }
    
     public static function count($criteria, $connection = []) {
        if (!$connection)
            $connection = Registry::$dbConnections[static::$_connection];
        if (!array_key_exists('collection', $connection))
             $connection['collection'] = strtolower(get_called_class());
        
        $result = static::_count($connection, $criteria);
        return $result;
    }
}

