<?php declare(strict_types=1);

namespace MageChamps\HelloWorld\Block;

use Magento\Framework\View\Element\Template\Context;

class HelloWorld extends \Magento\Framework\View\Element\Template
{
    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array   $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return 'Welcome to MageChamps!!!';
    }
}
