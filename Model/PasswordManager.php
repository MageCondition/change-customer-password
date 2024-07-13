<?php

declare(strict_types=1);

namespace MageCondition\ChangeCustomerPassword\Model;

use Magento\Customer\Model\CustomerRegistry;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class PasswordManager
{
    public function __construct(
        protected CustomerRegistry $customerRegistry,
        protected EncryptorInterface $encryptor
    ) {
    }

    /**
     * Set new password for customer
     *
     * @throws NoSuchEntityException
     */
    public function setNewPassword(int $customerId, string $password): void
    {
        $customerSecure = $this->customerRegistry->retrieveSecureData($customerId);
        $customerSecure->setPasswordHash($this->createPasswordHash($password));
        $customerSecure->setFailuresNum(0);
        $customerSecure->setFirstFailure(null);
        $customerSecure->setLockExpires(null);
    }

    /**
     * Create password hash
     */
    protected function createPasswordHash(string $password): string
    {
        return $this->encryptor->getHash($password, true);
    }
}
