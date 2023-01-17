<?php declare(strict_types=1);

namespace MageChamps\AddressClassification\Setup\Patch\Data;

use MageChamps\AddressClassification\Model\Config\Source\AddressClassification;
use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Model\ResourceModel\Attribute;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddressClassificationAttribute implements DataPatchInterface
{
    const ATTRIBUTE_CODE = 'address_classification';

    private Attribute $attribute;
    private Config $config;
    private EavSetupFactory $eavSetupFactory;
    private ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(
        Attribute $attribute,
        Config $config,
        EavSetupFactory $eavSetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->attribute = $attribute;
        $this->config = $config;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::ATTRIBUTE_CODE,
            [
                'type' => 'int',
                'label' => 'Address Classification',
                'input' => 'select',
                'source' => AddressClassification::class,
                'required' => true,
                'default' => 0,
                'system' => false,
                'position' => 150,
                'sort_order' => 150,
            ]
        );
        /**
         * Here 'type' key in the array is the value that will be stored in the database.
         * Here 'input' key in the array is the input type of the field.
         * Always 'system' key to false.This is extremely important with custom attributes .If you don't pass
         * this in, some random things won't work .A lot of code depends on this being set to false
         * for custom attributes for other code in the system to work
         * 'position' and 'sort_order' should be same .If yu look for PropertyMapper in the core customer
         * module you will see that for some reason the sort_order key uses the position key
         */

        $attribute = $this->config->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::ATTRIBUTE_CODE
        );
        $attribute->setData('used_in_forms', [
            'adminhtml_customer_address',
            'customer_address_edit',
            'customer_register_address',
        ]);
        $this->attribute->save($attribute);

        return $this;
    }
}
