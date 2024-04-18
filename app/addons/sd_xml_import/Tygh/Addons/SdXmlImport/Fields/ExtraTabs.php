<?php

namespace Tygh\Addons\SdXmlImport\Fields;

use Tygh\Addons\SdXmlImport\AField;
use Tygh\Addons\SdXmlImport\AType;
use Tygh\Registry;

include_once(Registry::get('config.dir.addons') . '/hw_extra_tabs/schemas/exim/products.functions.php');

class ExtraTabs extends AField
{
    var $TABS = [];

    public static function modify($product_id, array $data, AType $import)
    {

        if (empty($product_id)) {
            return $data;
        }

        if(empty($TABS)){
            $params = array();
            if(Registry::get('runtime.company_id')){
                $params['company_id'] = Registry::get('runtime.company_id');    
            }
            $TABS = fn_hw_extra_tabs_get_tabs($params);            
        }

        foreach ($TABS as $key => $tab) {
            $tab_name = $tab['name'];
            if (!empty($data[$tab_name])) {
                fn_hw_extra_tabs_import($product_id, [ $import->lang_code => $data[$tab_name] ], $tab['tab_id']);
            }
        }

        return $data;
    }
}
