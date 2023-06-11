<?php
/**
 * @category  Magento2.XX
 * @package   Sandeep_Crud
 * @author    Sandeep Gupta
 * @email ersandeepgu@gmail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * 
 */ 
namespace Sandeep\Crud\Model;

use Magento\Framework\Model\AbstractModel;

class Crud extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Sandeep\Crud\Model\ResourceModel\Crud');
    }
}