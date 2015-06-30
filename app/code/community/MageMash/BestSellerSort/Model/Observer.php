<?php

class MageMash_BestSellerSort_Model_Observer
{
    public function rebuildBestSellers(Varien_Event_Observer $observer)
    {
        $collection = Mage::getModel('catalog/product')
            ->getCollection();

        $collection
            ->getSelect()
            ->joinLeft('sales_flat_order_item AS sfoi',
            'e.entity_id = sfoi.product_id',
            'SUM(sfoi.qty_ordered) AS ordered_qty')->
            group('e.entity_id')->order('ordered_qty', 'DESC');


        $count = 0;
        foreach ($collection as $product) {
            $product->setBestSeller($count);
            $product->save();
            $count++;
//            Mage::log($product->getId(), 0, 'bestsellers.log', true);
        }
    }
}