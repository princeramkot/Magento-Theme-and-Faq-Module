<?php
namespace Vt\Aurora\Controller\Adminhtml\Banner;
use \Vt\Aurora\Model\BannerFactory;
class Upload extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Vt_Aurora::upload';

    const PAGE_TITLE = 'Manage Banner';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       BannerFactory $bannerFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->bannerFactory=$bannerFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
            // $data=$this->bannerFactory->create()->getCollection();

            // foreach($data as $item){
            //     echo "<pre>";
            //     print_r($item->getData());
            //     echo "</pre>";
            // }

         $resultPage = $this->_pageFactory->create();
         $resultPage->getConfig()->getTitle()->prepend(__(static::PAGE_TITLE));

         return $resultPage;
    }

    /**
     * Is the user allowed to view the page.
    *
    * @return bool
    */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
