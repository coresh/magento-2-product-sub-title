<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Coresh\ProductSubTitle\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
* @codeCoverageIgnore
*/
class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            Product::ENTITY,
            'subtitle',
            [
                'type'                     => 'varchar',
                'label'                    => 'Sub Title',
                'input'                    => 'text',
                'sort_order'               => 1,
                'global'                   => ScopedAttributeInterface::SCOPE_STORE,
                'group'                    => 'General Information',
                'validate_rules'           => '{"max_text_length":255}',
                'required'                 => false,
                'is_used_in_grid'          => true,
                'is_visible_in_grid'       => true,
                'is_filterable_in_grid'    => true,
                'visible'                  => true,
                'is_html_allowed_on_front' => false,
                'visible_on_front'         => false
            ]
        );
    }
}
