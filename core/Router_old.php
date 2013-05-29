<?php

class Router {
    
    public static $routing_rules=[
    
                ['/','Pages','viewHomePage'],

                ['/about','Pages', 'viewStaticPage', 'args' => ['about',]],

                ['/team','Pages', 'viewStaticPage', 'args' => ['team',]],

                ['/jobs','Pages', 'viewStaticPage', 'args' => ['jobs',]],

                ['/login', 'Pages', 'login'],

                ['/logout', 'Pages', 'logout'],

                ['/signup', 'Pages', 'signup'],

                ['/user/{username}', 'Pages', 'getUserDetails'],

                ['/mobiles/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'mobile',]],

                ['/cameras/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'camera',]],

                ['/laptops/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'laptop',]],

                ['/tablets/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'tablet',]],

                ['/pendrives/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'pendrive',]],

                ['/hard-disks/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'harddisk',]],

                ['/books/{args}','Pages', 'viewCategoryPage', 'args' => ['category' => 'book',]],

                ['/brands', 'Pages', 'viewBrandListPage'],
        
                ['/brand/{brand_name}', 'Pages', 'viewBrandPage'],
        
                ['/brand', 'Pages', 'viewBrandListPage'],

                ['/search', 'Pages', 'viewSearchResultsPage'],

                ['/{slug:[\w\-]*_[0-9a-f]{24}}', 'Pages', 'viewProductPage'],
        
                ['/NotFound', 'Pages', 'viewErrorPage', 'args' => ['status' => '404']],
            ];
    
    
    public static $route=[];
    
    private static function splitURI($uri) {
        
        $uri = trim($uri, '/');
        if ($uri == '')         //for handling home page url
            return [''];
        $query_start = strpos($uri, '?');
        if($query_start > 0) {
            $parts = explode('?', $uri);
            $uri = $parts[0];
            $query = $parts[1];
        }
  
        $uri_parts = explode('/', $uri);
        
        return $uri_parts;
    }
    
    /**
	 * separate parameters from string
	 * eg. Takes "mobiles/{name}/{brand}" and returns ['mobiles',[name,brand]]
	 *
	 * @param string
     * @returns array
	 */
    private static function separateParams($string) {
        
        preg_match('/([\w\/-]+)\/(?:\{([\w_]+)\}\/?)/', $string, $matches);
        
        return [$matches[1], array_slice($matches, 2)];
    }
    
    public static function getRoute($path=false) {
        
        if ($path)
            $request_uri = $path;
        else
            $request_uri = $_SERVER['REQUEST_URI'];
        
        $uri_parts = static::splitURI($request_uri);
        
        foreach (static::$routing_rules as $rule) {
            
            if (strpos($rule[0], ':') > 0) {                //if there is a regular expression in rule string
                
                if (preg_match('~\{([\w_]+)\:(.+)\}~', $rule[0], $matches)) {
                    
                    if (preg_match("~{$matches[2]}~", $request_uri, $match)) {
                        static::$route['controller'] = $rule[1];
                        if (count($rule) > 2)
                            static::$route['method'] = $rule[2];
                        if (count($rule) > 3)
                            static::$route['args'] = $rule[3];
                        if (preg_match("~{$matches[2]}~", $request_uri, $match))
                            static::$route['args'][$matches[1]] = $match[0];
                        return static::$route;
                    }
                }
                    
            }
            
            else { 
                
                if (strpos($rule[0], '{') > 0) {            //if there is an argument in rule string
                
                    $pattern_array = static::separateParams($rule[0]);

                    //if (preg_match("~{$request_uri}~", $pattern_array[0])) {
                      if (trim($pattern_array[0], '/') == $uri_parts[0]) {
                        static::$route['controller'] = $rule[1];
                        if (count($rule) > 2)
                            static::$route['method'] = $rule[2];
                        if (count($rule) > 3)
                            static::$route['args'] = $rule[3];

                        $uri_params = trim(preg_replace("~{$pattern_array[0]}~",'',$request_uri),'{}');
                        $params = explode('/', $uri_params);
                        $i = 0;

                        foreach (array_slice($pattern_array,1) as $arg) {
                            if ($params[$i])
                                static::$route['args'][$arg] = $params[$i];
                            else
                                static::$route['args'][$arg] = null;

                            $i+=1;

                        }

                        return static::$route;
                    
                    }
                }
             
            else {                                               //if there is are no arguments in rule string
                if (trim($rule[0], '/') == $uri_parts[0]) {
                
                    
                //if (preg_match("~{$request_uri}~", $rule[0])) {
                    static::$route['controller'] = $rule[1];
                    if (count($rule) > 2)
                        static::$route['method'] = $rule[2];
                    if (count($rule) > 3)
                        static::$route['args'] = $rule[3];
                    return static::$route;
                }  
            }
          
          }
        
        }
        return [];
    }
    
    public static function redirect($path,$status) {
        header("Location: ".$path,$status);
        
        /*
        $route=Router::getRoute($path);
        Registry::$destinationController=$route['controller'];
        Registry::$destinationAction=$route['method'];
        Registry::$destinationArgs=$route['args'];
         * 
         */
        
        
    }
    
    
}