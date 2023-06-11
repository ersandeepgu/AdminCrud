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

class Index extends \Sandeep\Crud\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sandeep_Crud::test');
        $resultPage->getConfig()->getTitle()->prepend(__('Create Property Type'));
        $resultPage->addBreadcrumb(__('Test'), __('Test'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }
}