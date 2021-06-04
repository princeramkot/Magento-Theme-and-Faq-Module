<?php
namespace Vt\Aurora\Model\ResourceModel;
class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    // Resource Models are data mappers for the storage structure. 
    //They are used for making transactions to the database.
    protected function _construct() //make sure single underscore is there
    {
        $this->_init('aurora_banner', 'img_id'); //here we need to define table name and primary key of the table
    }
}
