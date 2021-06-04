<?php
namespace Vtn\Faqs\Block\Adminhtml\Faq\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */

    public function getButtonData() //this function returns the array which contains values like label, class, action etc.
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'vtn_crud_form.vtn_crud_form', //by specifying trarget name, the values of the traget will be send to action, in this case it is save
                                'actionName' => 'save', //action to be called when this button is clicked
                                'params' => [
                                    true
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'class_name' => Container::SPLIT_BUTTON,
            'sort_order' => 90, //for postion 
        ];
    }
   

}
