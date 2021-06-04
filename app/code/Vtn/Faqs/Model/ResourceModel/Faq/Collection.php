<?php
namespace Vtn\Faqs\Model\ResourceModel\Faq;

use \Vtn\Faqs\Model\Faq;
use \Vtn\Faqs\Model\ResourceModel\Faq as ResourceModelFaq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'faq_id';
    protected $_eventPrefix = 'vtn_faqs_faq_collection';
    protected $_eventObject = 'faq_collection';

  
    protected function _construct()
    {
        $this->_init(Faq::class, ResourceModelFaq::class);
    }
}



