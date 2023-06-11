<?php
/** */

namespace Sandeep\Crud\Block\Adminhtml;

class Items extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'items';
        $this->_headerText = __('Developer');
        $this->_addButtonLabel = __('Add New Developer');
        parent::_construct();
    }
}
