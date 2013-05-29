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

                ['/mobiles/{args}','Pages', 'viewCategoryPage', ['category' => 'mobile',]],

                ['/cameras/{args}','Pages', 'viewCategoryPage', ['category' => 'camera',]],

                ['/laptops/{args}','Pages', 'viewCategoryPage', ['category' => 'laptop',]],

                ['/tablets/{args}','Pages', 'viewCategoryPage', ['category' => 'tablet',]],

                ['/pendrives/{args}','Pages', 'viewCategoryPage', ['category' => 'pendrive',]],

                ['/harddisks/{args}','Pages', 'viewCategoryPage', ['category' => 'harddisk',]],
        
                ['/comingsoon','Pages', 'viewUpcomingPage', ['category' => 'mobile',]],

                ['/books/{args}','Pages', 'viewCategoryPage', ['category' => 'book',]],

                ['/brands', 'Pages', 'viewBrandListPage'],
        
                ['/brand/{brand_name}', 'Pages', 'viewBrandPage'],
        
                ['/search', 'Pages', 'viewSearchResultsPage'],

                ['/{slug:[\w\-]*_[0-9a-f]{24}}', 'Pages', 'viewProductPage'],
        
                ['/products', 'Products', 'getProducts'],
        
                ['/search-product', 'Products', 'search'],
        
                ['/NotFound', 'Pages', 'viewErrorPage', 'args' => ['status' => '404']],
            ];
    
    
    public static $route=['params' => []];
    
    private static function splitQueryString($queryString) {
        $queryParams = [];
        $qs_parts = explode('&', $queryString);
        foreach ($qs_parts as $part) {
            $kv = explode('=', $part);
            $queryParams[$kv[0]] = $queryParams[$kv[1]];
        }
        return $queryParams;
    }
    
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
        
        preg_match('/([\w\/-]+)\/(?:\{([\w:_]+)\}\/?)/', $string, $matches);
        
        return [$matches[1], $matches[2]];
    }
    
    public static function getRoute($path=false) {
        
        if ($path)
            $request_uri = $path;
        else
            $request_uri = $_SERVER['REQUEST_URI'];
        
        $uri_parts = static::splitURI($request_uri);
        
        foreach (static::$routing_rules as $rule) {
            
            if (strpos($rule[0], ':') > 0) {                //if there is a regular expression in rule string
                
                //$pattern_array = static::separateParams($rule[0]);
                if (preg_match('~\{([\w_-]+)\:(.+)\}~', $rule[0], $matches)) {
                    
                    if (preg_match("~{$matches[2]}~", $request_uri, $match)) {
                        
                        static::$route['controller'] = $rule[1];
                        
                        if (count($rule) > 2)
                            static::$route['method'] = $rule[2];
                        
                        if (count($rule) > 3)
                                foreach ($rule[3] as $k => $v)
                                    static::$route['params'][$k] = $v;
                        
                        if (preg_match("~{$matches[2]}~", $request_uri, $match))
                            static::$route['params'][$matches[1]] = $match[0];
                        
                        return static::$route;
                    }
                }
                    
            }
            
            else { 
                
                if (strpos($rule[0], '{') > 0) {            //if there is an argument in rule string
                
                    $pattern_array = static::separateParams($rule[0]);

                    //if (preg_match("~{$request_uri}~", $pattern_array[0])) {
                      if (trim($pattern_array[0], '/') == $uri_parts[0]) {
                          
                          $uri_param = trim(preg_replace("~{$pattern_array[0]}~",'',$request_uri),'{}/');
                            if ($uri_param) 
                                static::$route['params'][$pattern_array[1]] = $uri_param;
                            else
                                static::$route['params'][$pattern_array[1]] = null;
                            
                            static::$route['controller'] = $rule[1];
                                
                            if (count($rule) > 2)
                                static::$route['method'] = $rule[2];

                            if (count($rule) > 3)
                                foreach ($rule[3] as $k => $v)
                                    static::$route['params'][$k] = $v;

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
                            foreach ($rule[3] as $k => $v)
                                static::$route['params'][$k] = $v;
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