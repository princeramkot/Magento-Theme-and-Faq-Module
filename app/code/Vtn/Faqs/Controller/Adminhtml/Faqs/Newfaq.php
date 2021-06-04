<?php

namespace Vtn\Faqs\Controller\Adminhtml\Faqs;

use Vtn\Faqs\Model\FaqFactory;
use Vtn\Faqs\Model\Faq;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class Newfaq extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Vtn_Faqs::newfaq';

    const PAGE_TITLE = 'Add New Faq';
    protected $resultRedirect;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */


    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ResultFactory $result,
        PageFactory $rawFactory
    ) {
        $this->resultRedirect = $result;
        $this->pageFactory = $rawFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        $resultPage = $this->pageFactory->create(); //creating object of pageFactory
        $resultPage->getConfig()->getTitle()->prepend(__('Add Faq')); //set title of the page

        return $resultPage;
    }



    /**
     * Is the user allowed to view the page.
     *
     * @return bool
     */
    protected function _isAllowed() //this function checks if current user can perfome this admin action or not
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
