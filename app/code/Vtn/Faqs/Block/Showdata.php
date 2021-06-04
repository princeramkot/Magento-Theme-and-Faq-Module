<?php
namespace Vtn\Faqs\Block;

use  Vtn\Faqs\Model\ResourceModel\Faq\CollectionFactory;
class Showdata extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public $collection;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        CollectionFactory $collectionFactory
    ) { 
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collection->create();
    }
}
