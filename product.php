<?php declare(strict_types=1);

// required headers
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json; charset=UTF-8');

// database connection will be here
require_once 'bootstrap.php';
require_once 'product_helper.php';


/**
 * If Ids is empty the script reads all ids from the database
 * if ids is one or more it tries to loads the objects
 *
 * if id  is one or more and not one is existing it returns 404.
 */


$ids = (array) $_GET['id'] ?: [];


// $ids is empty: read all ids
if (!(bool) count($ids)) {
    /** @var \Doctrine\DBAL\Query\QueryBuilder $queryBuilder */

    $container = \OxidEsales\EshopCommunity\Internal\Container\ContainerFactory::getInstance()->getContainer();
    $queryBuilderFactory = $container->get(\OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface::class);
    $queryBuilder = $queryBuilderFactory->create();
    $result = $queryBuilder->select('*')->from('oxarticles')->execute()->fetchAll();

    foreach ($result as $key => $product) {
        $ids[] = $product['OXID'];
    }
}


// Load the objects by the ids.
$products = [];
foreach ($ids as $id) {
    $product = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);

    if ($product->load($id)) {
        loadFlagshipProperties($product);
        removePreLoadedProperties($product);

        $products[] = $product;
    }
}

// if no product could be loaded then return 404
if ((bool) count($products)) {
    displayResult($products);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        ['message' => 'No products found.']
    );
}

