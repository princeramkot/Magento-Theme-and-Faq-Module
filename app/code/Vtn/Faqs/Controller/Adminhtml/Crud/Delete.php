<?php

namespace Vtn\Faqs\Controller\Adminhtml\Crud;

use Magento\Framework\Controller\Result\RedirectFactory;

use Vtn\Faqs\Model\FaqFactory;

class Delete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Vtn_Faqs::delete';

    const PAGE_TITLE = 'Delete Faq';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */

    private $redirectFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        RedirectFactory $redirectFactory,
        FaqFactory $faqFactory

    ) {
        $this->faqFactory = $faqFactory;
        $this->redirectFactory = $redirectFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        $id = $this->getRequest()->getParam('faq_id'); //getting single element from url

        if ($id) {
            try {


                $row = $this->faqFactory->create(); //creating object of faqfactory
                $row->load($id); //loading particular model(row) or we can say selecting

                $row->delete();  //function to delete row
                $this->messageManager->addSuccessMessage(__("Record Deleted Successfully.")); // added success msg after opration

            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e, __("We can\'t delete record, Please try again.")); //added error msg after operation
            }
        }

        $redirect = $this->redirectFactory->create(); //creating instance for redireceFacotry
        $redirect->setPath('faq/faqs/faq/');
        return $redirect;
    }

    /**
     * Is the user allowed to view the page.
     *
     * @return bool
     */
    protected function _isAllowed() //this function checks if the current user is allowed to use this controller or not
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
