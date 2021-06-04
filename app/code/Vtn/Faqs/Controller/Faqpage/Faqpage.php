<?php

namespace Vtn\Faqs\Controller\Faqpage;

class Faqpage extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {

        $this->resultPageFactory = $resultPageFactory;

        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create(); //creating instance of page
        // $resultPage->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0', true);
        $resultPage->getConfig()->getTitle()->prepend(__('Faq')); //setting title for page
        return $resultPage;
    }
}
