<?php

namespace Maximizly\Webpush\Setup;

use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData
 * @package Maximizly\Webpush\Setup
 */
class InstallData implements InstallDataInterface
{

    protected $_dir;

    public function __construct(DirectoryList $dir) {
        $this->_dir = $dir;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $pubDir =  $this->_dir->getPath('pub');

        file_put_contents($pubDir.'/maximizly-sw.js', "importScripts('https://maximizly.s3.eu-central-1.amazonaws.com/sources/webpush/develop/worker/maximizly-sw.js')");

        $installer->endSetup();
    }
}
