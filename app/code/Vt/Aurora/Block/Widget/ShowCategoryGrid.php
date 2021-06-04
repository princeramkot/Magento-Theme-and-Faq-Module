<?php
namespace Vt\Aurora\Block\Widget;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface; 
class ShowCategoryGrid extends Template implements BlockInterface {

    protected $_template = "widget/categorygrid.phtml";


    protected $_categoryCollectionFactory;

    protected $_categoryHelper;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        array $data = []
    ) {
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_categoryHelper = $categoryHelper;
        parent::__construct($context, $data);
    }


    public function getCategoryCollection($isActive = true, $level = false, $sortBy = false, $pageSize = false) {
        $collection = $this->_categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*');

        // select only active categories
        if ($isActive) {
            $collection->addIsActiveFilter();
        }

        // select categories of certain level
        if ($level) {
            $collection->addLevelFilter($level);
        }

        // sort categories by some value
        if ($sortBy) {
            $collection->addOrderField($sortBy);
        }

        // set pagination
        if ($pageSize) {
            $collection->setPageSize($pageSize); 
        } 

        return $collection;
    }
}
