<?php

/**
 * aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/LICENSE-L.txt
 *
 * @category   AW
 * @package    AW_Blog
 * @copyright  Copyright (c) 2009-2010 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/LICENSE-L.txt
 */
class AW_Blog_Model_Mysql4_Related extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct() {
        $this->_init('blog/related', 'post_id');
    }

    public function load(Mage_Core_Model_Abstract $object, $value, $field=null) {
        if (strcmp($value, (int) $value) !== 0) {
            $field = 'post_id';
        }
        return parent::load($object, $value, $field);
    }

}
