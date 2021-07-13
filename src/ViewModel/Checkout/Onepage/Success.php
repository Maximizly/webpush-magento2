<?php

namespace Maximizly\Webpush\ViewModel\Checkout\Onepage;

use Magento\Checkout\Model\Session;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Success implements ArgumentInterface
{
    protected $_checkoutSession;
    public function __construct(
        Session $checkoutSession
    ) {
        $this->_checkoutSession = $checkoutSession;
    }

    public function getOrder()
    {
        return $this->_checkoutSession->getLastRealOrder();
    }

    public function getOrderTotal()
    {
        return $this->getOrder()->getGrandTotal();
    }

    public function getOrderNumber()
    {
        return $this->getOrder()->getIncrementId();
    }
}