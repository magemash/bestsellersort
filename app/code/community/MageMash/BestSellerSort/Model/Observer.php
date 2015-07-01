<?php

class MageMash_BestSellerSort_Model_Observer
{
    public function rebuildBestSellers(Varien_Event_Observer $observer)
    {
        $visibility = array(
	        Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH,
	        Mage_Catalog_Model_Product_Visibility::VISIBILITY_IN_CATALOG
	    );

	$_productCollection = Mage::getResourceModel('reports/product_collection')
	->addAttributeToSelect('*')
	->addOrderedQty()
	->addAttributeToFilter('visibility', $visibility)
	->setOrder('ordered_qty', 'desc');

        $count = 0;
        foreach ($_productCollection as $product) {
//            echo $product->getId();
//            echo "</br>";
//            echo $product->getOrderedQty();
//            echo "</br>";
            $p = Mage::getModel('catalog/product')->load($product->getId());

            $p->setData('best_seller', $count);
            $p->save();
            $count++;
//            Mage::log($product->getId(), 0, 'bestsellers.log', true);
        }
    }
}