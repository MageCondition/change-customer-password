<?php

declare(strict_types=1);

namespace MageCondition\ChangeCustomerPassword\Ui\Component\Form\Element;

use Magento\Framework\AuthorizationInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\ComponentVisibilityInterface;
use Magento\Ui\Component\Form\Fieldset;

class NewPasswordFieldset extends Fieldset implements ComponentVisibilityInterface
{
    protected const CHANGE_PASSWORD_ACL_RESOURCE = 'MageCondition_ChangeCustomerPassword::change_password';

    public function __construct(
        ContextInterface $context,
        protected AuthorizationInterface $authorization,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $components, $data);
    }

    /**
     * Hide fieldset if admin creates a new customer account or functionality is disabled
     */
    public function isComponentVisible(): bool
    {
        $customerId = $this->context->getRequestParam('id');
        return $customerId && $this->authorization->isAllowed(self::CHANGE_PASSWORD_ACL_RESOURCE);
    }
}
