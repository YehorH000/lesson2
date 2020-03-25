<?php
declare(strict_types=1);

namespace DvCampus\CustomerChat\Model\ResourceModel\ChatMess;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @inheritDoc
     */
    protected function _construct(): void
    {
        parent::_construct();
        $this->_init(
            \DvCampus\CustomerChat\Model\ChatMess::class,
            \DvCampus\CustomerChat\Model\ResourceModel\ChatMess::class
        );
    }
}
