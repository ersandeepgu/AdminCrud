<?php
/** */

namespace Sandeep\Crud\Block;

use Magento\Framework\View\Element\Template\Context;
use Sandeep\Crud\Model\CrudFactory;
/**
 * Crud List block
 */
class CrudListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Crud
     */
    protected $_crud;
    public function __construct(
        Context $context,
        CrudFactory $crud
    ) {
        $this->_crud = $crud;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        // $this->pageConfig->getTitle()->set(__('Sandeep Crud Module List Page'));
        
        if ($this->getCrudCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'sandeep.crud.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getCrudCollection()
            );
            $this->setChild('pager', $pager);
            $this->getCrudCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getCrudCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $crud = $this->_crud->create();
        $collection = $crud->getCollection();
        $collection->addFieldToFilter('status','1');
        //$crud->setOrder('crud_id','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}