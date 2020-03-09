<?php

namespace DvCampus\CustomerChat\Model\ResourceModel;

class ChatMess extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct(): void
    {
        $this->_init('dv_campus_customer_chat','message_id');
    }
}
