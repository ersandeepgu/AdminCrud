<?php
/** */

namespace Sandeep\Crud\Controller\Adminhtml\Items;

class NewAction extends \Sandeep\Crud\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
