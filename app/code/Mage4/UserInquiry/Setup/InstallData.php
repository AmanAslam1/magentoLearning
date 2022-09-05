<?php

namespace Mage4\UserInquiry\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('Mage4_UserInquiry'),
            [
                'name' => 'Aman',
                'dob' => '7th Sept',
                'occupation' => 'Spy',
                'activities' => 'Sleeping',
                'contact_email' => 'aman@gmail.com'

            ]
        );

        $setup->endSetup();
    }
}
