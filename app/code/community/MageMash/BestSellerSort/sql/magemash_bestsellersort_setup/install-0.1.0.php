<?php
/**
 * MageMash
 *
 * @category    MageMash
 * @package     MageMash_ExtendedSortBy
 * @copyright   Copyright (c) 2015 MageMash (http://magemash.co.uk)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

$installer = $this;

$installer->startSetup();

$productTypes = array(
    Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
    Mage_Catalog_Model_Product_Type::TYPE_BUNDLE,
    Mage_Catalog_Model_Product_Type::TYPE_CONFIGURABLE,
    Mage_Catalog_Model_Product_Type::TYPE_VIRTUAL
);
$productTypes = join(',', $productTypes);

$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'best_seller', array(
    'group'         => 'General',
    'type'          => 'int',
    'backend'       => '',
    'frontend'      => '',
    'label'         => 'Best Seller',
    'input'         => 'text',
    'filterable'        => 2,
    'comparable'        => 1,
    'source'        => '',
    'used_for_sort_by' => 1,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'       => true,
    'required'      => false,
    'user_defined'  => false,
    'default'       => '',
    'apply_to'      => $productTypes,
    'input_renderer'   => '',
    'visible_on_front' => true,
    'used_in_product_listing' => true
));

$installer->endSetup();