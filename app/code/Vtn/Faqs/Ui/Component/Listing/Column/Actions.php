<?php
namespace Vtn\Faqs\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Listing\Columns\Column;
class Actions extends column
{
    const URL_PATH_DELETE="faq/crud/delete";
    const URL_PATH_EDIT="faq/faqs/editform";
        protected $urlBuilder;
        
     
        protected $_viewUrl;
    
        public function __construct(
            ContextInterface $context, //context for parent class
            UiComponentFactory $uiComponentFactory, 
            UrlInterface $urlBuilder,
            array $components = [],
            array $data = []
        ) {
            $this->urlBuilder = $urlBuilder;
            parent::__construct($context, $uiComponentFactory, $components, $data);
        }
    
       
        public function prepareDataSource(array $dataSource) //this function accepts a 2d array which has the data of faq
        { 
            if (isset($dataSource['data']['items'])) {
                foreach ($dataSource['data']['items'] as &$item) {
                    
                    $name = $this->getData('name');
                    if (isset($item['faq_id'])) {
                        
                        $item[$this->getData('name')] = [  //if user click on edit button
                            'edit' => [
                                'href' => $this->urlBuilder->getUrl( //this function will build a url using faq id and operation to be done
                                    static::URL_PATH_EDIT,
                                    [
                                        'faq_id' => $item['faq_id'],
                                    ]
                                ),
                                'label' => __('Edit'),
                            ],
                            'delete' => [   //if user click on delete button
                                'href' => $this->urlBuilder->getUrl( //this function will build a url using faq id and operation to be done
                                    static::URL_PATH_DELETE,
                                    [
                                        'faq_id' => $item['faq_id'],
                                    ]
                                ),
                                'label' => __('Delete'),
                                'confirm' => [       //confirm msg when user wants to delete faq
                                    'title' => __('Delete'),
                                    'message' => __('Are you sure you want to delete a faq'),
                                ],
                                'post' => true,
                            ],
                        ];
                    }
                }
            }
            return $dataSource;
        }
}
