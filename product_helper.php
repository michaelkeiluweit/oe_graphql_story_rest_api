<?php declare(strict_types=1);

/**
 * Removes properties which are loaded automatically
 * @param \OxidEsales\Eshop\Application\Model\Article $product
 */
function removePreLoadedProperties(\OxidEsales\Eshop\Application\Model\Article $product) : void
{
    unset(
        $product->oxarticles__oxshopid,
        $product->oxarticles__oxnid,
        $product->oxarticles__oxstockflag,
        $product->oxarticles__oxvarstock,
        $product->oxarticles__oxvarcount,
        $product->oxarticles__oxvarstock,
        $product->oxarticles__oxvarminprice,
        $product->dabsimagedir,
        $product->ssl_dimagedir,
        $product->nossl_dimagedir,
        $product->oxarticles__oxparentid,
    );
}

/**
 * Loads example properties
 * @param \OxidEsales\Eshop\Application\Model\Article $product
 */
function loadFlagshipProperties(\OxidEsales\Eshop\Application\Model\Article $product) : void
{
    $product->oxarticles__oxtitle;
    $product->oxarticles__oxprice;
}