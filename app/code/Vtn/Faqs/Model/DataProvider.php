<?php
namespace Vtn\Faqs\Model;

use Vtn\Faqs\Model\ResourceModel\Faq\CollectionFactory;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    const CACHE_TAG = 'vtn_faqs_data_provider';

    protected $_cacheTag = self::CACHE_TAG;

    
    protected $_eventPrefix = 'data_provider';
    protected $loadedData;
   
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $faqCollectionFactory,
        array $meta = [],
        array $data = []
       
    ) {
        $this->collection = $faqCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

  
    public function getData() //returns the variable with collection data
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array(); //makes this variable an array
        
        /** @var Customer $customer */
        foreach ($items as $item) {
            
            $this->loadedData[$item->getId()]['faq_id'] = $item->getData(); //$this->loadedData will contains data of particular faq_id
            // print_r( $this->loadedData);
        }

        return $this->loadedData;

    }
}
