<?php

namespace Vtn\Faqs\Controller\Adminhtml\Crud;



use  Vtn\Faqs\Model\ResourceModel\Faq\CollectionFactory;
use  Vtn\Faqs\Model\FaqFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;


class Massdelete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Vtn_Faqs::massdelete';

    const PAGE_TITLE = 'Mass Delete';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */

    protected $faqFactory;
    protected $filter;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(Context $context, Filter $filter, FaqFactory $faqFactory)
    {
        $this->filter = $filter;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        //var_dump($this->getRequest()->getParam('selected'));
        //die;


        $selected = $this->getRequest()->getParam('selected'); // $selected will contain the all ids' selected throgh check box
        //  $collection = $this->faqFactory->create()->addFieldToFilter('faq_id', ['in' => $selected]);


        $row = $this->faqFactory->create();
        $size = 0;
        foreach ($selected as $s) {
            $row->load($s); //loading and delete one by one
            $row->delete();
            $size = $size + 1; // variable for count the number of row deleted
        }
        // foreach ($collection as $page) {
        //    // var_dump($page->getData());
        //     //$page->delete();
        // }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $size));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/faqs/faq'); //redirecting on given path
    }

    protected function _isAllowed() //check if current user is allowed to use current action or not
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
