<?php

class MongoAdapter {
    
     public static function connect($connection) {
         
         $con =new Mongo("mongodb://{$connection['host']}:{$connection['port']}", [
             //['username' => $connection['username']],
             //['password' => $connection['password']],
             ['timeout' => false]
         ]);
         return $con;
     }
     
     public static function fromMongoDate(&$item, $key) {
         if (gettype($item) == 'object')
            if (get_class($item) == 'MongoDate') {
                $dt = new DateTime();
                $item = $dt->setTimestamp($item->sec);
         }
     }
     
     public static function transformFromMongo($document) {
         if (array_key_exists('_id',$document))
            if (gettype($document['_id']) != 'string') //var_dump(get_class_vars(get_class($document['_id'])));
                $document['_id'] = $document['_id']->__toString();
            array_walk_recursive($document, 'static::fromMongoDate');
         return $document;
     }
     
     public static function find($connection, $options, $count = false) {
         
         $con = static::connect($connection);
         $db = $con->selectDB($connection['database']);
         $collection = $db->selectCollection($connection['collection']);//var_dump($options);//die;
         
         if (array_key_exists('conditions',$options))
            if (array_key_exists('_id',$options['conditions']))
                $options['conditions']['_id']= new MongoId($options['conditions']['_id']);
         
         if (array_key_exists('fields', $options))
             $cursor = $collection->find($options['conditions'], $options['fields']); 
         else
             $cursor = $collection->find($options['conditions']); 
         
         if (array_key_exists('limit',$options))
            $cursor = $cursor->limit($options['limit']);
         if (array_key_exists('offset',$options)) 
             $cursor = $cursor->skip($options['offset']);
         if (!empty($options['order']))
             if (!is_null($options['order']))
                $cursor = $cursor->sort($options['order']);
         
         $result = [];
         
         foreach($cursor as $doc) 
            $result[] = static::transformFromMongo($doc);
         //var_dump($result);
         if ($count)
            $result['count'] = $cursor->count();
         return $result;
         
     }
     
     public static function insert($connection, $document, $options) {
         
         $con = static::connect($connection);
         $db = $con->selectDB($connection['database']);
         $collection = $db->selectCollection($connection['collection']);
         $result = $collection->insert($document, $options);
        
         return $result;
         
     }
     
     public static function update($connection, $criteria, $upd, $options) {
         
         $con = static::connect($connection);
         $db = $con->selectDB($connection['database']);
         $collection = $db->selectCollection($connection['collection']);
         if (array_key_exists('_id',$criteria))
            $criteria['_id']= new MongoId($criteria['_id']);
         $result = $collection->update($criteria, $upd, $options);
         
         return $result;
         
     }
     
     public static function delete($connection, $criteria, $options) {
         
         $con = static::connect($connection);
         $db = $con->selectDB($connection['database']);
         $collection = $db->selectCollection($connection['collection']);
         if (array_key_exists('_id',$criteria))
            $criteria['_id']= new MongoId($criteria['_id']);
         $result = $collection->remove($criteria, $options);
         
         return $result;
         
     }
     
     public static function count($connection, $criteria) {
         
         $con = static::connect($connection);
         $db = $con->selectDB($connection['database']);
         $collection = $db->selectCollection($connection['collection']);//var_dump($connection);//die;
         if (array_key_exists('_id',$criteria))
            $criteria['_id']= new MongoId($criteria['_id']);//var_dump($criteria);//die;
         $result = $collection->count($criteria);
         //print $result;die;
         return $result;
         
     }
}
