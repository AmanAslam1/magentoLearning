<?php

namespace Mage4\Slider\Setup;

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
            $setup->getTable('scandiweb_slider')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Slider ID'
        )->addIndex(
            $setup->getIdxName('scandiweb_slider', ['id']),
            ['id']
        )->setComment(
            'Banners Info'
        );
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()->newTable(
            $setup->getTable('scandiweb_slider_slide')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Slider ID'
        )->addIndex(
            $setup->getIdxName('scandiweb_slider_slide', ['id']),
            ['id']
        )->setComment(
            'Banners Info'
        );
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()->newTable(
            $setup->getTable('scandiweb_slider_slide_store')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Slider ID'
        )->addIndex(
            $setup->getIdxName('scandiweb_slider_slide_store', ['id']),
            ['id']
        )->setComment(
            'Banners Info'
        );
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()->newTable(
            $setup->getTable('scandiweb_slider_slide_map')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Slider ID'
        )->addIndex(
            $setup->getIdxName('scandiweb_slider_slide_map', ['id']),
            ['id']
        )->setComment(
            'Banners Info'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
