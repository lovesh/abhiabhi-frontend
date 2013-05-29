<?php
//$con_string='mongodb://198.143.160.210:27017';
//$m = new Mongo($con_string);
$m = new Mongo('localhost');
$db = $m->selectDB('final');
$c=$db->selectCollection('products');
$regex = new MongoRegex("/sony/i");
print $c->count(['brand' => $regex]);
var_dump($regex);
//$abhiabhi = $m->selectDB("abhiabhi");
/*$gridFS = $abhiabhi->getGridFS('images');
$object = $gridFS->findOne(array(
    '_id' => new MongoId('5040339fb83b632fb50461bf')
    ));
header('Content-type: image/jpeg');
echo $object->getBytes();die;*/
$temp=$m->selectDB("DBName");
var_dump($c);
//$scraped_books=new MongoCollection($db,'scraped_books');
//$bks=$db->scraped_books->find(array('site'=>'homeshop18'))->limit(500)->skip(3000);
//$size=0;
//foreach($bks as $bk)
	//$size+=strlen(bson_encode($bk));
//echo $size;
//$flag=1;
//while(!$flag) {
//while(1) {
//try {
	//$bk=$db->scraped_books->find(array('site'=>'homeshop18',
					//'author'=>array(
					//'$exists'=>true,
					//'$size'=>2)))->count();
	////$flag=1;
	//var_dump(iterator_to_array($bk));
	//break;
//}

//catch (MongoCursorException $e) {
    //echo "error message: ".$e->getMessage()."\n";
    //echo "error code: ".$e->getCode()."\n";
//}
//} 

/*$db1=$m->selectDB("DBName");
//$flag=0;
//while(!$flag) {
while(1) {
try {
	$cat=$db1->ip_temporary->find(array('status'=>0))->limit(10);
	//$flag=1;
	$urls=array();
	foreach($cat as $c) 
		array_push($urls,$c['url']);
	var_dump($urls);
	break;
}

catch (MongoCursorException $e) {
    echo "error message: ".$e->getMessage()."\n";
    echo "error code: ".$e->getCode()."\n";
}
}*/

function getCursor($conn,$db_name,$coll_name,$query_options=array(),$fields=array(),$cursor_options=array(),$max_tries=0) {
	$counter=0;
	while(1) {
		try {
			$cursor=new MongoCursor($conn,$db_name.'.'.$coll_name,$query_options,$fields);
			
			if (array_key_exists('count',$cursor_options))
				return $cursor->count();
			if (array_key_exists('limit',$cursor_options))
				$cursor=$cursor->limit($cursor_options['limit']);
			if (array_key_exists('skip',$cursor_options))
				$cursor=$cursor->skip($cursor_options['skip']);
			if (array_key_exists('sort',$cursor_options))
				$cursor=$cursor->sort($cursor_options['sort']);
				
			return $cursor;
		}
		catch (MongoCursorException $e) {
			$counter+=1;
			if ($max_tries>0) {
				if ($counter>$max_tries)
					echo "error message: ".$e->getMessage()."\n";
					echo "error code: ".$e->getCode()."\n";
					return false;
			}
		}
	}
}

/*$m1=new Mongo();
$db1=$m1->selectDB('abhiabhi');
$coll1=$db1->selectCollection('scraped_cameras');
$coll1='scraped_cameras';
$c=getCursor($db1,$coll1,array('site'=>'buytheprice'),array(),array('sort'=>array('price'=>1)),1);
var_dump($c->info());
var_dump(iterator_to_array($c));
//var_dump(iterator_to_array($coll1->find(array('site'=>'indiaplaza'))));
//$mc=new MongoCursor($m1,'abhiabhi.scraped_cameras',array('site'=>'buytheprice'),array('price'=>1));
//var_dump($mc);
//var_dump(iterator_to_array($mc));*/
$key=iconv('UTF-8', 'UTF-8//IGNORE', 'categories');
$val=iconv('UTF-8', 'UTF-8//IGNORE', 'History');
/*$c=getCursor($m,'DBName','hs18_temporary',array($key=>$val),array(),array('limit'=>70));
if ($c) {
	var_dump($c->info());
	var_dump(iterator_to_array($c));
}*/

try {
	//$mc=new MongoCursor($m,'DBName.hs18_temporary',array('categories'=>'Biography & Autobiography'));
	$key=iconv('UTF-8', 'UTF-8//IGNORE', 'categories');
	$val=iconv('UTF-8', 'UTF-8//IGNORE', 'Religion');
	$criteria=array('site'=>'infibeam');
	$criteria=call_user_func(function($criteria) {
		$temp=array();
		foreach($criteria as $k=>$v) {
			if (gettype($v)=='string')
				$temp[utf8_encode($k)]=utf8_encode($v);
			else
				$temp[utf8_encode($k)]=$v;
		}
		return $temp;
	},$criteria);
	//$mc=$temp->command(array( 'dbStats' => 1 ));var_dump($mc);
	$mc=$abab->command(array( 'collStats' => 'images.chunks' ));var_dump($mc);
	//$mc=getCursor($m,'abhiabhi','scraped_books',$criteria,array(),array('limit'=>20));
	var_dump($mc->info());
	var_dump(iterator_to_array($mc));
}
catch (MongoCursorException $e) {
	echo "error message: ".$e->getMessage()."</br>";
	echo "error code: ".$e->getCode();
}
