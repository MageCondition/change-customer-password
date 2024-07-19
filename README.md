# Change Customer Password in Magento 2 from Admin

![Magento 2](https://img.shields.io/badge/Magento-2-brightgreen.svg)
![License](https://img.shields.io/badge/license-OSL-blue.svg)

## Overview

**Change Customer Password** is a minimalistic module that allows administrators to change customer passwords directly from the back-office (admin panel).

## Features

- Change customer passwords directly from the admin panel.
- Simple and intuitive interface for ease of use.
- Lightweight and minimal impact on system performance.

## Installation

Follow these steps to install the module:

1. **Require the module via Composer**

    ```bash
    composer require mage-condition/change-customer-password
    ```

2. **Run Magento setup upgrade**

    ```bash
    php bin/magento setup:upgrade
    ```

3. **Clear the cache**

    ```bash
    php bin/magento cache:clean
    ```

## Usage

1. Navigate to the **Customers** section in the Magento admin panel.
2. Select the customer whose password you wish to change.
3. Use the new interface provided by the module to set a new password for the customer.
<img width="1593" alt="image" src="https://github.com/user-attachments/assets/4de4e8c8-afe8-406e-a18c-e1803a87ac1a">
4. Save the changes.

## Compatibility

- PHP 8.0 or higher
- Magento Open Source (CE) 2.4.x
- Adobe Commerce (EE) 2.4.x

## Support

If you encounter any issues or have questions regarding the module, please open an issue on the [GitHub repository](https://github.com/MageCondition/change-customer-password/issues).

You can also reach us via email at [wincondition2911@gmail.com](mailto:wincondition2911@gmail.com).

## License

This module is licensed under the Open Software License (OSL). See the [LICENSE](https://opensource.org/licenses/OSL-3.0) for more details.
