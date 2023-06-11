<?php
/** */

namespace Sandeep\Crud\Model\ResourceModel;

class Crud extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('sandeep_crud', 'crud_id');   //here "sandeep_crud" is table name and "crud_id" is the primary key of custom table
    }
}