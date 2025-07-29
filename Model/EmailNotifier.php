<?php

declare(strict_types=1);

namespace MageCondition\ChangeCustomerPassword\Model;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Area;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;

class EmailNotifier
{
    public function __construct(
        protected TransportBuilder $transportBuilder,
        protected StoreManagerInterface $storeManager,
        protected CustomerRepositoryInterface $customerRepository,
        protected string $templateId = 'magecondition_change_customer_password',
        protected string $sender = 'general'
    ) {
    }

    public function notify(int $customerId, string $newPassword): void
    {
        $customer = $this->customerRepository->getById($customerId);
        $storeId = (int) $this->storeManager->getStore()->getId();

        $transport = $this->transportBuilder
            ->setTemplateIdentifier($this->templateId)
            ->setTemplateOptions(['area' => Area::AREA_FRONTEND, 'store' => $storeId])
            ->setTemplateVars(['customer' => $customer, 'newPassword' => $newPassword])
            ->setFromByScope($this->sender, $storeId)
            ->addTo($customer->getEmail(), $customer->getFirstname() . ' ' . $customer->getLastname())
            ->getTransport();

        $transport->sendMessage();
    }
}
