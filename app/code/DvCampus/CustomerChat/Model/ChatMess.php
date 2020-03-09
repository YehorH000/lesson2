<?php

namespace DvCampus\CustomerChat\Model;

class ChatMess extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct(): void
    {
        parent::_construct();
        $this->_init(\DvCampus\CustomerChat\Model\ResourceModel\ChatMess::class);
    }
}
