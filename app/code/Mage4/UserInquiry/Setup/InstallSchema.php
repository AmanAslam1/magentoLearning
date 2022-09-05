<?php

namespace Mage4\UserInquiry\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('Mage4_UserInquiry')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'User ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Name'
        )->addColumn(
            'dob',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Date of Birth'
        )->addColumn(
            'occupation',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Occupation'
        )->addColumn(
            'activities',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Activity'
        )->addColumn(
            'contact_email',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Email'
        )->addIndex(
            $setup->getIdxName('Mage4_UserInquiry', ['Name']),
            ['Name']
        )->setComment(
            'Users Info'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
