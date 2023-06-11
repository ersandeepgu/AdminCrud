<?php


namespace Sandeep\Crud\Block\Adminhtml\Items\Edit\Tab;

use Vendor\Productattach\Model\ProductattachFactory;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Experience extends Generic implements TabInterface
{
    protected $_wysiwygConfig;

    
    protected $productCollectionFactory;
    protected $contactFactory;

    protected $registry;

    protected $_objectManager = null;

 
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, 
        \Magento\Framework\Registry $registry, 
        \Magento\Framework\Data\FormFactory $formFactory,  
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig, 
        array $data = []
    ) 
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Other Details');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Other Details');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_sandeep_crud_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Work Experience')]);
        if ($model->getId()) {
            $fieldset->addField('crud_id', 'hidden', ['name' => 'crud_id']);
        }        


        $fieldset->addField(
            'experience',
            'editor',
            [
                'name' => 'experience',
                'label' => __('Experience'),
                'title' => __('Experience'),
                'style' => 'height:26em;',
                'required' => true,
                'config'    => $this->_wysiwygConfig->getConfig(),
                'wysiwyg' => true,
                'note'=>__("Write Experience")

            ]
        );
        $fieldset->addField(
            'otherexperience',
            'editor',
            [
                'name' => 'otherexperience',
                'label' => __('Any Other Experience'),
                'title' => __('Any Other Experience'),
                'style' => 'height:26em;',                
                'config'    => $this->_wysiwygConfig->getConfig(),
                'wysiwyg' => true,
                'note'=>__("Write any other experience")

            ]
        );
        
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
