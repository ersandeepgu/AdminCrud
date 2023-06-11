<?php
/**
 * @category  Magento2.XX
 * @package   Sandeep_Crud
 * @author    Sandeep Gupta
 * @email ersandeepgu@gmail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * 
 */ 

namespace Sandeep\Crud\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Sandeep\Crud\Block\CrudView;

class View extends \Magento\Framework\App\Action\Action
{
	protected $_crudview;

	public function __construct(
        Context $context,
        CrudView $crudview
    ) {
        $this->_crudview = $crudview;
        parent::__construct($context);
    }

	public function execute()
    {
    	if(!$this->_crudview->getSingleData()){
    		throw new NotFoundException(__('Parameter is incorrect.'));
    	}
    	
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
