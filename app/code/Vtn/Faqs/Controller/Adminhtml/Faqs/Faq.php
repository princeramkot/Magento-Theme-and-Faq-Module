<?php

namespace Vtn\Faqs\Controller\Adminhtml\Faqs;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Faq extends \Magento\Backend\App\Action
{


    private $pageFactory;
    private $_faqFactory;
    public function __construct(
        Context $context,
        PageFactory $rawFactory,

        \Vtn\Faqs\Model\FaqFactory $faqFactory
    ) {
        $this->pageFactory = $rawFactory;
        $this->_faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create(); //creating object of pageFactory

        $resultPage->getConfig()->getTitle()->prepend(__('Manage Faq')); //setting the title of the page

        return $resultPage;
    }
}
