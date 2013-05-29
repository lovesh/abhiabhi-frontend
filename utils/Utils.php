<?php

class Utils {
        
     /**
	 * Returns true if the given string can be interpreted as a valid MongoId(0-9a-f and length 24), false otherwise
	 * @param string $monogid
	 * @return bool 
	 */
        public static function canBeValidMongoId($mongoid) {
            if (strlen($mongoid)!=24)
                    return false;
            $match = preg_match('/[a-f0-9]{24}/',$mongoid);
            if ($match > 0)
                    return true;
            return false;
        }
        
     /**
	 * Returns the MongoId from a slug given in the format somecharacters_mongoid
	 * @param string $slug
     * @throws \Exception
	 * @return MongoId $mongoid of the document
	 */
        public static function getMongoIdFromSlug($slug) {
            $slug_parts = explode('_', $slug);
            $mongoid = end($slug_parts);
            $flag = static::canBeValidMongoId($mongoid);
            if ($flag == true) 
                    return $mongoid;
                    //return new \MongoId($mongoid);
            else
                    throw new Exception("Invalid MongoId");
         
        }
        
       
     /**
	 * Returns true or false depending whether a key exists in an associative array of associative arrays.
     * Also if a 3rd parameter is specified it checks if value of that key is equal to the value supplied as the 3rd parameter
	 * @param array the associtive array of associative arrays to be searched
     * @param string name of the key
     * @param mixed value of the key (optional) 
     * @return boolean 
	 */
        public static function hasElementWithKey($array, $key) {
            if (func_num_args() > 2)
                $value = func_get_arg(2);
            foreach ($array as $elem)
                if (array_key_exists($key, $elem)) {
                        if (isset($value))
                            if ($elem[$key] == $value)
                                return true;
                            else
                                continue;
                        return true;
                }
            return false;
        }
        
     /**
	 * Returns an associative array sorted on the basis of the value of the specified key
	 * @param array The associtive array to be sorted
     * @param string Name of the key
     * @param boolean True for descending order sort and false for ascending order sort
     * @return array the sorted array
	 */
        public static function sortArrayByKey($array, $key, $order = true) {
            usort($array,function($v1,$v2) use ($key, $order){
                if ($v1[$key] == $v2[$key])
                    return 0;
		if ($v1[$key] == -1)
		    return 1;
		if ($v2[$key] == -1)
		    return -1;
                if ($order)
                    return ($v1[$key] < $v2[$key]) ? -1 : 1;
                else 
                    return ($v2[$key] < $v1[$key]) ? -1 : 1;
                });
            return $array;
        }
        
        
        
     /**
	 * Returns MongoDate of given seconds before or after the current time 
	 * @param integer positive or negative seconds
     * @return MongoDate 
	 */
        public static function getMongoDate($sec) {
            if ($sec < 0)
                return new MongoDate(time() - $sec);
            if ($sec > 0)
                return new MongoDate(time() + $sec);
            return new MongoDate(time());
        }
        
     /**
	 * Merges 2 or more arrays of products and returns the merged array. The merge is like set union where the key `_id` serves as product identifier 
	 * @param array Takes variable number of arguments and each argument is an array
     * @return Array 
	 */
        public static function mergeProducts() {
            $product_arrays = func_get_args();
            $merged_array = array();
            foreach ($product_arrays as $product_array) 
                foreach ($product_array as $product) 
                    if (!static::hasElementWithKey($merged_array,'_id',$product['_id']))
                            array_push($merged_array,$product);
            
            return $merged_array;
        }
        
      /**
	 * Takes an array of associative arrays and groups them by the given key
	 * @param array Array of associative arrays
     * @param string key that is present in the associative array. If the key is absent then that array is not included in result
     * @return Array An associtive array of 
	 */
        public static function groupArrayByKey($array,$key) {
            $result = array();
            foreach ($array as $item) 
                if (in_array($key,$item)) {
                    if (!in_array($key,$result)) 
                        $result[$key] = array();
                    array_push($result[$key],$item);
                }  
            return $result;
        }
}

?>
