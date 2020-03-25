<?php

declare(strict_types=1);

namespace DvCampus\CustomerChat\Block;

use DvCampus\CustomerChat\Model\ResourceModel\ChatMess\Collection;
use DvCampus\CustomerChat\Model\ResourceModel\ChatMess\CollectionFactory;

class Last10Messages extends \Magento\Framework\View\Element\Template
{
    /**
     * @var CollectionFactory
     */
    private $messagesFactory;

    public function __construct(
        \DvCampus\CustomerChat\Model\ResourceModel\ChatMess\Collection $messagesFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->$messagesFactory = $messagesFactory;
    }
    /**
     * @param string $ChatHash
     * @return Collection
     */
    public function getLastMessages(string $ChatHash): Collection
    {
        /** @var Collection $messageCollection */
        $messageCollection = $this->messagesFactory->create();
        return $messageCollection->addFieldToFilter('chat_hash', $ChatHash)
            ->setOrder('created_at', $messageCollection::SORT_ORDER_DESC)
            ->setPageSize(10);
    }
}
