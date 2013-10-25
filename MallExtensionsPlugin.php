<?php
/**
 * @package MallExtensions
 * @copyright Copyright 2013, Kim Nguyen
 */

if (!defined('MALLEXT_PLUGIN_DIR')) {
    define('MALLEXT_PLUGIN_DIR', dirname(__FILE__));
    define('MALLEXT_LAYOUTS_DIR_NAME', 'MALLEXT_layouts');
    define('MALLEXT_LAYOUTS_DIR', MALLEXT_PLUGIN_DIR
        . '/views/shared/MALLEXT_layouts');
}

class MallExtensionsPlugin extends Omeka_Plugin_AbstractPlugin {

    protected $_hooks = array('define_routes');

    protected $_filters = array('exhibit_layouts', 'items_browse_params');
    
    public function filterExhibitLayouts($layouts) {
        $layouts['scavenger-hunt'] = array(
            'name' => 'Scavenger Hunt',
            'description' => 'Scavenger hunt layout.'
        );
        return $layouts;
    }
    
    public function hookDefineRoutes($args)
    {
        // Don't add these routes on the admin side to avoid conflicts.
        if (is_admin_theme()) {
            return;
        }

        $router = $args['router'];
        $router->addConfig(new Zend_Config_Ini(MALLEXT_PLUGIN_DIR .
            DIRECTORY_SEPARATOR . 'routes.ini', 'routes'));
    }


    public function filterItemsBrowseParams($params)
    {
        $itemTypeId = Zend_Controller_Front::getInstance()->getRequest()->getParam('type');
        if(is_numeric($itemTypeId)) {
            $itemTypeId = strtolower(get_db()->getTable('ItemType')->find($itemTypeId)->name);
        }
        if ($itemTypeId == "people") {
            $params['sort_field'] = "Item Type Metadata,Last Name";
            $params['sort_dir'] = "ASC";
        } else {
            $params['sort_param'] = "Dublin Core,Title";
        }
        return $params;
    }

    
}