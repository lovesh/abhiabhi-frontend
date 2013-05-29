<?php

include (Registry::$smarty_dir.'/Smarty.class.php');
require_once 'utils/Utils.php';
require_once 'Pages.php';
require_once 'Products.php';
require_once 'Categories.php';
require_once 'Brands.php';
require_once 'Analytics.php';




class PagesController {
    
    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->template_dir = 'view/templates';
        $this->smarty->compile_dir  = 'view/templates_c/'; 
        $this->smarty->config_dir   = 'view/configs/'; 
        $this->smarty->cache_dir    = 'view/cache/'; 
        $this->smarty->assign('base_url', 'http://'.Registry::$host);
        
        $roots = Categories::getRootCategories();
        $rootCategories = [];
        $temp = [];
        foreach($roots as $k => $v) {
            if ($v['name'] == 'harddisk') {
                $name = 'hard disks';
                $slug = 'harddisks';
            }
            else {
                $name = $v['name'].'s';
                $slug = $name;
            }
            $temp[$v['name']] = ['name' => $name, 'slug' => $slug];
        }
        $rootCategories[0] = $temp['mobile'];
        $rootCategories[1] = $temp['camera'];
        $rootCategories[2] = $temp['laptop'];
        $rootCategories[3] = $temp['tablet'];
        $rootCategories[4] = $temp['pendrive'];
        $rootCategories[5] = $temp['harddisk'];
        $rootCategories[6] = $temp['book'];
        
        $up = Products::getUpcomingProducts('mobile', true);
        $rand = mt_rand(0, count($up));
        //var_dump(Registry::$destinationArgs);if (array_key_exists('slug', Registry::$destinationArgs)) print 123;
        if (array_key_exists('slug', Registry::$destinationArgs)) {
            $slug = Registry::$destinationArgs['slug'];
            $mongoId=Utils::getMongoIdFromSlug($slug);
            if ($mongoId == $up[$rand]['_id']) {
                $rand = mt_rand(0, count($up));
            }
            
        }
        
        $this->smarty->assign('upcoming', $up[$rand]);
        $this->smarty->assign('root_categories', $rootCategories);
        //var_dump($this);
    }
    
    public function viewhomePage() {
        $page = new Pages('home');
        $this->smarty->assign('page', $page);
        $this->smarty->display('index.tpl');
        }
    
    public function viewProductPage() {
        $slug=Registry::$destinationArgs['slug'];
        #$mongoId=Utils::getMongoIdFromSlug($slug);
        try {
               $mongoId=Utils::getMongoIdFromSlug($slug);
        }
        catch (Exception $e) {
                
                Router::redirect('/NotFound.html',404);
        }

        //Analytics::viewsProductPage($mongoId);
        $page = new Pages("product", $mongoId);
        
        
        //$this->_render['template'] = 'product_page';
        //var_dump($page);//die;
        $this->smarty->assign('page', $page);
        //$this->smarty->assign('mostViewedProducts', $mostViewedProducts);
        $this->smarty->display('product.tpl');
        }
        
        public function viewCategoryPage() {
            $rootCategory=Registry::$destinationArgs['category'];
            /*if (isset(Registry::$destinationArgs['params']))
                $subcats=Registry::$destinationArgs['params'];
            else
                $subcats=array();*/
            $page=new Pages('category',$rootCategory);
            //var_dump($page);die;
            $this->smarty->assign('page', $page);
            $this->smarty->display('category.tpl');
        }
        
        public function viewBrandListPage() {
            
            $page=new Pages('brand list');
            //var_dump($page);die;
            $this->smarty->assign('page', $page);
            $this->smarty->display('brands.tpl');
            
        }
        
        public function viewBrandPage() {
            $brandName = Registry::$destinationArgs['brand_name'];
            if (!$brandName)
                Router::redirect('/brands' ,302);
            /*if (isset(Registry::$destinationArgs['args']))
                $subcats=Registry::$destinationArgs['args'];
            else
                $subcats=array();*/
            $page=new Pages('brand',$brandName);
            //var_dump($page);die;
            $this->smarty->assign('page', $page);
            $this->smarty->display('brand.tpl');
        }
        
        public function viewSearchResultsPage() {
            $queryParams = Registry::$query;
            $query = $queryParams['q'];
            $query = strip_tags($query);
            $page=new Pages('search results',$query);
            //var_dump($page);die;
            $this->smarty->assign('page', $page);
            $this->smarty->display('search.tpl');
        }
        
        public function viewUpcomingPage() {
            $rootCategory = Registry::$destinationArgs['category'];
            /*if (isset(Registry::$destinationArgs['params']))
                $subcats=Registry::$destinationArgs['params'];
            else
                $subcats=array();*/
            $page = new Pages('upcoming',$rootCategory);
            //var_dump($page);die;
            $this->smarty->assign('page', $page);
            $this->smarty->display('category.tpl');
        }
        
        public function staticPage() {
            var_dump(func_get_args());
            echo Registry::$destinationArgs['number'];
	}
        
}
