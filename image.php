<?php
$id = $_GET['id'];
$upcoming = $_GET['upcoming'];
$mid = new MongoId($id);
$mongo = new Mongo('mongodb://198.143.160.211:27017',array('username' => 'root', 'password' => 'hpalpha1911'));

$final = $mongo->selectDB('new_final');
$products = $final->selectCollection('products');

if (!$upcoming) {
    $scraped_ids = $products->findOne(array('_id' => $mid), array('scraped_product_ids' => true));
    if (!$scraped_ids) {
        $final = $mongo->selectDB('final');
        $products = $final->selectCollection('products');//var_dump($products.__toString);var_dump($mid);die;
        $scraped_ids = $products->findOne(array('_id' => $mid), array('scraped_product_ids' => true));
    }
    foreach ($scraped_ids['scraped_product_ids'] as $id)
        $scraped_product_ids[] = $id;
}

$abhiabhi = $mongo->selectDB('abhiabhi');
$gridFS = $abhiabhi->getGridFS('images');
//query the file object
//var_dump($scraped_product_ids);//die;
if ($upcoming) 
    $object = $gridFS->findOne(array(
    'metadata.product_id' => $mid
    ));
else
    $object = $gridFS->findOne(array(
    'metadata.product_id' => array(
    '$in' => $scraped_product_ids
    )
    ));

//$object = $gridFS->findOne(array('_id' => new MongoId("503fd8b8b83b637de3e4ed2e")));
//var_dump($object);die;
//set content-type header, output in browser

if (!is_null($object)) { 
    header('Content-type: image/jpeg');
    echo $object->getBytes();
}

else {
    header('Location: /images/im-404.png');
}
