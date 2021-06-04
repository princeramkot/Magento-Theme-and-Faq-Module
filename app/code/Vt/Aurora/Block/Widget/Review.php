<?php
namespace Vt\Aurora\Block\Widget;
use Magento\Widget\Block\BlockInterface; 
class Review extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    protected $_template = "widget/review.phtml";

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
}
