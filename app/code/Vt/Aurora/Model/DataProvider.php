<?php
namespace Vt\Aurora\Model;
use Magento\Store\Model\StoreManagerInterface;
use RH\Helloworld\Model\ResourceModel\Banner\CollectionFactory;
use Magento\Framework\App\RequestInterface;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvide
{
    const CACHE_TAG = 'vt_aurora_data_provider';

   
    protected $_cacheTag = self::CACHE_TAG;
    protected $_eventPrefix = 'data_provider';
    protected $collection;
    protected $loadedData;
    protected $request;
    protected $storeManager;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collection,
        RequestInterface $request,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collection;
        $this->request = $request;
        $this->storeManager = $storeManager;
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->loadedData) {
            $storeId = (int) $this->request->getParam('store');
            $this->collection->setStoreId($storeId)->addAttributeToSelect('*');
            $items = $this->collection->getItems();
            foreach ($items as $item) {
                $item->setStoreId($storeId);
                $itemData = $item->getData();
                if (isset($itemData['logo'])) {
                    $imageName = explode('/', $itemData['logo']);
                    $itemData['logo'] = [
                        [
                            'name' => $imageName[3],
                            'url' => $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'logo/image' . $itemData['logo'],
                        ],
                    ];
                } else {
                    $itemData['logo'] = null;
                }
                
                $this->loadedData[$item->getEntityId()] = $itemData;
                break;
            }
        }
        return $this->loadedData;
    }
}
