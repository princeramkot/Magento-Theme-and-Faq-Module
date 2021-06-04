<?php

namespace Vt\Aurora\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Vt\Aurora\Block\Widget\ShowCategoryGrid;

class Greetings implements ArgumentInterface
{


    public function getHelloMessage()
    {
        return ("Hello There");
    }


    public function __construct()
    {
    }

    public function getShopNow()
    {
        return "Shop Now";
    }
}
