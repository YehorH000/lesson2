<?php

namespace DvCampus\CustomerChat\Model;

use Magento\Framework\Exception\LocalizedException;

class ChatMess extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct(): void
    {
        parent::_construct();
        $this->_init(\DvCampus\CustomerChat\Model\ResourceModel\ChatMess::class);
    }

    public function beforeSave(): self
    {
        parent::beforeSave();
        $this->validate();

        return $this;
    }


    /**
     * @throws LocalizedException
     */
    public function validate(): void
    {
        if (!$this->getUserId()) {
            throw new LocalizedException(__('Can\'t send message: %s is not set.', 'user_id'));
        }
        if (!$this->getWebsiteId()) {
            throw new LocalizedException(__('Can\'t send message: %s is not set.', 'website_id'));
        }

    }
}
