<?php


namespace Sandeep\Crud\Block\Adminhtml\Items\Edit\Tab;

use Vendor\Productattach\Model\ProductattachFactory;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Personal extends Generic implements TabInterface
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
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Item Information');
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
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Personal Detail')]);
        if ($model->getId()) {
            $fieldset->addField('crud_id', 'hidden', ['name' => 'crud_id']);
        }

        $fieldset->addField(
            'status',
            'select',
            ['name' => 'status', 'label' => __('Status'), 'title' => __('Status'),  'options'   => [0 => 'Disable', 1 => 'Enable'], 'required' => true, 'note'=>__("Enter your name")]
        );

        $fieldset->addField(
            'fullname',
            'text',
            ['name' => 'fullname', 'label' => __('Full Name'), 'title' => __('Full Name'), 'required' => true, 'class' => 'validate-alpha-space']
        );
        $fieldset->addField(
            'email',
            'text',
            ['name' => 'email', 'label' => __('Email'), 'title' => __('Email'), 'required' => true ,  'note'=>__("Enter your email address"),  'class' => 'validate-email']
        );
        $fieldset->addField(
            'image',
            'image',
            [
                'name' => 'image',
                'label' => __('Upload Image'),
                'title' => __('Upload Image'),
                'required'  => true,
                'note'=>__("Upload your Image")
            ]
        ); 

        $fieldset->addField(
            'telephone',
            'text',
            [
                'name' => 'telephone',
                'label' => __('Telephone'),
                'title' => __('Telephone'),
                'required' => true,
                // 'class' => 'validate-number'

            ]
        ); 



       
        $fieldset->addField(
            'dob',
            'date',
            [
                'name' => 'dob',
                'label' => __('Date of birth'),
                'title' => __('Date of birth'),                 
                'singleClick'=> false,
                'date_format' => 'dd-MM-yyyy',
                'time'=>false,
                'required' => true,
                'class' => 'validate-dob'
            ]
        );     
        
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
