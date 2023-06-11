<?php
/**
 * @category  Magento2.XX
 * @package   Sandeep_Crud
 * @author    Sandeep Gupta
 * @email ersandeepgu@gmail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * 
 */ 

namespace Sandeep\Crud\Block\Adminhtml\Items\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('sandeep_crud_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('About Devloper'));
    }

      /**
     * _BeforeToHtml Function
     *
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'personal',
            [
                'label' => __('Personal Detail'),
                'title' => __('Personal Detail'),
                'content' => $this->getLayout()->createBlock(
                   \Sandeep\Crud\Block\Adminhtml\Items\Edit\Tab\Personal::class
                )->toHtml()
                
            ]
        );        
        $this->addTab(
            'experience',
            [
                'label' => __('Work Experience'),
                'title' => __('Work Experience'),
                'content' => $this->getLayout()->createBlock(
                   \Sandeep\Crud\Block\Adminhtml\Items\Edit\Tab\Experience::class
                )->toHtml()
            ]
        );           

        return parent::_beforeToHtml();
    }
}

