<?php

namespace Maximizly\Webpush\ViewModel\Checkout\Onepage;

use Magento\Checkout\Model\Session;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoreManagerInterface;

class Success implements ArgumentInterface
{
    protected $_checkoutSession;
    protected $_storeManager;

    public function __construct(
        Session $checkoutSession,
        StoreManagerInterface $storeManager
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->_storeManager = $storeManager;
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

    public function getCurrency()
    {
        return $this->_storeManager->getStore()->getCurrentCurrency()->getCode();
    }
}