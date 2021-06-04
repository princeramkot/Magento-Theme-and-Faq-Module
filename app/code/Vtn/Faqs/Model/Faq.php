<?php

namespace Vtn\Faqs\Model;
use Magento\Framework\DataObject\IdentityInterface;
class Faq extends \Magento\Framework\Model\AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'vtn_faqs_faq';


    protected $_cacheTag = self::CACHE_TAG;
    protected $_eventPrefix = 'faq';

    protected function _construct() //maek sure single undersocre is there
    {
        $this->_init('\Vtn\Faqs\Model\ResourceModel\Faq');
    }



    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
