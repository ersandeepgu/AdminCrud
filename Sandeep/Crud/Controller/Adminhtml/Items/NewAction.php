<?php
/**
 * @category  Magento2.XX
 * @package   Sandeep_Crud
 * @author    Sandeep Gupta
 * @email ersandeepgu@gmail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * 
 */ 

namespace Sandeep\Crud\Controller\Adminhtml\Items;

class NewAction extends \Sandeep\Crud\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
