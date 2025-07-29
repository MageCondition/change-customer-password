<?php

declare(strict_types=1);

namespace MageCondition\ChangeCustomerPassword\Observer;

use MageCondition\ChangeCustomerPassword\Model\EmailNotifier;
use MageCondition\ChangeCustomerPassword\Model\PasswordManager;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class ChangePassword implements ObserverInterface
{
    public function __construct(
        protected PasswordManager $passwordManager,
        protected EmailNotifier $emailNotifier
    ) {
    }

    /**
     * Set new password for a customer
     *
     * @throws NoSuchEntityException
     */
    public function execute(Observer $observer): void
    {
        $customer = $observer->getEvent()->getCustomer();
        $changePassword = $observer->getEvent()->getRequest()->getPost('change_password');
        if ($changePassword['new_password']) {
            $this->passwordManager->setNewPassword((int) $customer->getId(), $changePassword['new_password']);

            if (!empty($changePassword['notify_customer'])) {
                $this->emailNotifier->notify((int) $customer->getId(), $changePassword['new_password']);
            }
        }
    }
}
