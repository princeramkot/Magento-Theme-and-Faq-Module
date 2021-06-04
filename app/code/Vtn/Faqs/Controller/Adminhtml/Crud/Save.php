<?php

namespace Vtn\Faqs\Controller\Adminhtml\Crud;

use Vtn\Faqs\Model\Faq;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Cms\Api\BlockRepositoryInterface;


use Vtn\Faqs\Model\FaqFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Vtn_Faqs::save';
    const PAGE_TITLE = 'save';
    private $faqFactory;




    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        FaqFactory $faqFactory,
        \Magento\Framework\Controller\ResultFactory $result
    ) {

        $this->faqFactory = $faqFactory;
        $this->resultRedirect = $result;
        return parent::__construct($context);
    }


    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create(); // object of resultRedirecotFacotry for redirecting

        $id = $this->getRequest()->getParam("faq_id");
        if ($id) { //if id is alrady there , that means we are updating content
            try {

                $data = (array)$this->getRequest()->getPost(); //getting post data of form
                $model = $this->faqFactory->create();
                $model->load($id['faq_id']); //loading model(obj) with particular faq_id

                $model->setTitle($data['content_heading']); //setting title from array $data
                $model->setDescription($data['content']); //setting description
                $model->save(); //finally saving 
                $this->messageManager->addSuccessMessage(__("Data Updated Successfully."));
                $path = '*/faqs/editform/faq_id/' . $id['faq_id']; //variable for path redirect
                return $resultRedirect->setPath($path); //redirecting along with faq_id

            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
            }
        } else { //if id is not there, that means we are adding new content



            try {
                $data = (array)$this->getRequest()->getPost();
                if ($data) {
                    $model = $this->faqFactory->create(); //creating object of model
                    $model->setTitle($data['content_heading']); //setting title of the model
                    $model->setDescription($data['content']); //setting description of the model
                    $model->save(); //saving model at the end
                    $this->messageManager->addSuccessMessage(__("Data Saved Successfully.")); //adding success msg after operation
                    return $resultRedirect->setPath('*/faqs/newfaq');
                }
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again.")); //adding error msg after operation
            }
        }
    }
}




 // $data = $this->getRequest()->getPostValue();
        // $resultRedirect = $this->resultRedirectFactory->create();
        // if(is_array($data)) {
        //     $faq = $this->_objectManager->create(Faq::class);
        //     $faq->setData($data)->save();
        //     return $resultRedirect->setPath('*/faqs/newfaq');
        // }
        // return $resultRedirect->setPath('*/faqs/faq/');