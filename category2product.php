<?php declare(strict_types=1);

// required headers
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json; charset=UTF-8');

// database connection will be here
require_once 'bootstrap.php';
require_once 'product_helper.php';


$id = $_GET['id'] ?: '';


$categories = [];
$product = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);
$loaded = $product->load($id);

if ($loaded) {
    $categories[] = $product->getCategoryIds();
}

if ($loaded) {
    displayResult($categories);
} else {
    http_response_code(404);
    echo json_encode(
        ['message' => 'No products found.']
    );
}

