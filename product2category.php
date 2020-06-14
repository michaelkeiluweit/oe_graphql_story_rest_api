<?php declare(strict_types=1);

// required headers
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json; charset=UTF-8');

// database connection will be here
require_once 'bootstrap.php';
require_once 'product_helper.php';


$id = $_GET['id'] ?: '';


$products = [];
$category = oxNew(\OxidEsales\Eshop\Application\Model\Category::class);
$loaded = $category->load($id);

if ($loaded) {
    /** @var \Doctrine\DBAL\Query\QueryBuilder $queryBuilder */
    $container = \OxidEsales\EshopCommunity\Internal\Container\ContainerFactory::getInstance()->getContainer();
    $queryBuilderFactory = $container->get(\OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface::class);
    $queryBuilder = $queryBuilderFactory->create();
    $result = $queryBuilder
        ->select('*')
        ->from('oxobject2category')
        ->where('oxcatnid = :category')
        ->andWhere('oxshopid = :shop')
        ->setParameters([
            'category' => $id,
            'shop' => 1,
        ])
        ->execute()
        ->fetchAll();

    foreach ($result as $key => $item) {
        $products[] = $item['OXOBJECTID'];
    }
}

if ($loaded) {
    displayResult($products);
} else {
    http_response_code(404);
    echo json_encode(
        ['message' => 'No products found.']
    );
}

