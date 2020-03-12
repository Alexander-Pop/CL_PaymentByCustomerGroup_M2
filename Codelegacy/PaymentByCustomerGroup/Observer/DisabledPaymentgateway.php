<?php
/* Glory to Ukraine! Glory to the heros! */
namespace Codelegacy\PaymentByCustomerGroup\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Event\Observer;

class DisabledPaymentgateway implements ObserverInterface
{
	public function __construct() {

	}

	/**
	 * @param \Magento\Framework\Event\Observer $observer
	 * @return void
	 */
	public function execute(Observer $observer)
	{
		$event           = $observer->getEvent();
	  	$result          = $event->getResult();
	  	$method_instance = $event->getMethodInstance();
	  	$quote           = $event->getQuote();

	  	if($quote != null && $quote->getCustomerGroupId() =='CUSTOMER_GROUP_ID_YOU_NEED'  ){
			/* Disable All payment gateway  exclude Your payment Gateway*/
		  	if($method_instance->getCode() !='CUSTOM_PAYMENT_METHOD_CODE'){
			   $result->isAvailable = false;
		  	}
	  	}
	}
}

