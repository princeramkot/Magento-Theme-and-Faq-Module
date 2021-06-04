<?php
namespace Vt\Aurora\Model\ResourceModel\Banner;

use \Vt\Aurora\Model\Banner;
use \Vt\Aurora\Model\ResourceModel\Banner as ResourceModelBanner;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'aurora_banner';
    protected $_eventPrefix = 'vt_aurora_banner_collection';
    protected $_eventObject = 'banner_collection';
  
    protected function _construct()
    {
        $this->_init(Banner::class, ResourceModelBanner::class);
    }


}
