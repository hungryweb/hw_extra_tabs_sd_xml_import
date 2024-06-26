<?php

use Tygh\Registry;
 
$schema = [ 'product' => [ 'name' => 'Product name' ], 'product_code' => [ 'name' => 'Product code' ], 'product_type' => [ 'name' => 'Product type' ], 'price' => [ 'name' => 'Price' ], 'currency' => [ 'name' => 'Currency' ], 'category' => [ 'name' => 'Category' ], 'external_category_id' => [ 'name' => 'External category id' ], 'external_category_parent_id' => [ 'name' => 'External category parent_id' ], 'external_category_parent_name' => [ 'name' => 'External category parent name' ], 'secondary_categories' => [ 'name' => 'Secondary categories' ], 'list_price' => [ 'name' => 'List price' ], 'status' => [ 'name' => 'Status' ], 'amount' => [ 'name' => 'Quantity' ], 'weight' => [ 'name' => 'Weight' ], 'min_qty' => [ 'name' => 'Min quantity' ], 'max_qty' => [ 'name' => 'Max quantity' ], 'qty_step' => [ 'name' => 'Quantity step' ], 'list_qty_count' => [ 'name' => 'List qty count' ], 'shipping_freight' => [ 'name' => 'Shipping freight' ], 'timestamp' => [ 'name' => 'Date added' ], 'is_edp' => [ 'name' => 'Downloadable' ], 'lang_code' => [ 'name' => 'Language' ], 'files' => [ 'name' => 'Files' ], 'edp_shipping' => [ 'name' => 'Ship downloadable' ], 'tracking' => [ 'name' => 'Inventory tracking' ], 'out_of_stock_actions' => [ 'name' => 'Out of stock actions' ], 'free_shipping' => [ 'name' => 'Free shipping' ], 'zero_price_action' => [ 'name' => 'Zero price action' ], 'detailed_id' => [ 'name' => 'Detailed image' ], 'additional_images' => [ 'name' => 'Additional images' ], 'full_description' => [ 'name' => 'Description' ], 'short_description' => [ 'name' => 'Short description' ], 'meta_keywords' => [ 'name' => 'Meta keywords' ], 'meta_description' => [ 'name' => 'Meta description' ], 'search_words' => [ 'name' => 'Search words' ], 'page_title' => [ 'name' => 'Page title' ], 'promo_text' => [ 'name' => 'Promo text' ], 'tax_names' => [ 'name' => 'Taxes' ], 'avail_since' => [ 'name' => 'Available since' ], ]; if (Registry::get('addons.seo.status') == 'A') { $schema['seo_names'] = [ 'name' => 'Seo name' ]; } if (Registry::get('addons.product_variations.status') == 'A') { $schema['variation_group_code'] = [ 'name' => 'Variation group code' ]; $schema['variation_set_as_default'] = [ 'name' => 'Variation set as default' ]; }

// Include the function that gets the extra tabs
$params = array();
if(Registry::get('runtime.company_id')){
    $params['company_id'] = Registry::get('runtime.company_id');    
}
$hw_extra_tabs = fn_hw_extra_tabs_get_tabs($params);

foreach ($hw_extra_tabs as $key => $tab) {
    $schema[$tab['name']] = [
        'name' => $tab['name'],
    ];
}

return $schema;