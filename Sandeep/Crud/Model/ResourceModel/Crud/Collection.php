<?php
/** */

namespace Sandeep\Crud\Model\ResourceModel\Crud;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'crud_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Sandeep\Crud\Model\Crud',
            'Sandeep\Crud\Model\ResourceModel\Crud'
        );
    }
}