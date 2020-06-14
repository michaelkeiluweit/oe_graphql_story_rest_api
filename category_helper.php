<?php declare(strict_types=1);

/**
 * Removes properties which are loaded automatically
 * @param \OxidEsales\Eshop\Application\Model\Category $category
 */
function removePreLoadedProperties(\OxidEsales\Eshop\Application\Model\Category $category) : void
{
    unset(
        $category->oxcategories__oxmapid,
        $category->oxcategories__oxparentid,
        $category->oxcategories__oxleft,
        $category->oxcategories__oxright,
        $category->oxcategories__oxrootid,
        $category->oxcategories__oxsort,
        $category->oxcategories__oxactive,
        $category->oxcategories__oxhidden,
        $category->oxcategories__oxshopid,
        $category->oxcategories__oxdesc,
        $category->oxcategories__oxlongdesc,
        $category->oxcategories__oxthumb,
        $category->oxcategories__oxextlink,
        $category->oxcategories__oxtemplate,
        $category->oxcategories__oxdefsort,
        $category->oxcategories__oxdefsortmode,
        $category->oxcategories__oxpricefrom,
        $category->oxcategories__oxpriceto,
        $category->oxcategories__oxicon,
        $category->oxcategories__oxpromoicon,
        $category->oxcategories__oxvat,
        $category->oxcategories__oxskipdiscounts,
        $category->oxcategories__oxshowsuffix,
        $category->oxcategories__oxtimestamp,
    );
}

/**
 * Loads example properties
 * @param \OxidEsales\Eshop\Application\Model\Category $category
 */
function loadFlagshipProperties(\OxidEsales\Eshop\Application\Model\Category $category) : void
{
    $category->oxcategories__oxtitle;
}