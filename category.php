<?php declare(strict_types=1);

// required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// database connection will be here
require_once 'bootstrap.php';
require_once 'category_helper.php';

$ids = (array) $_GET['id'] ?: [];



// $ids is empty: read all ids
if (!(bool) count($ids)) {
    /** @var \Doctrine\DBAL\Query\QueryBuilder $queryBuilder */

    $container = \OxidEsales\EshopCommunity\Internal\Container\ContainerFactory::getInstance()->getContainer();
    $queryBuilderFactory = $container->get(\OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface::class);
    $queryBuilder = $queryBuilderFactory->create();
    $result = $queryBuilder->select('*')->from('oxcategories')->execute()->fetchAll();

    foreach ($result as $key => $category) {
        $ids[] = $category['OXID'];
    }
}


$categories = [];
foreach ($ids as $id) {
    $category = oxNew(\OxidEsales\Eshop\Application\Model\Category::class);

    if ($category->load($id)) {
        removePreLoadedProperties($category);
        loadFlagshipProperties($category);
        $categories[] = $category;
    }
}

if ((bool) count($categories)) {
    displayResult($categories);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        ['message' => 'No category found.']
    );
}

