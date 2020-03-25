<?php
declare(strict_types=1);

namespace DvCampus\CustomerChat\Controller\Chat;
use Magento\Framework\Controller\ResultFactory;
use DvCampus\CustomerChat\Model\ChatMess;
use Magento\Framework\App\Action\Context;
use Magento\Framework\DB\Transaction;
use Magento\Framework\Controller\Result\Json as JsonResult;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Temando\Shipping\ViewModel\Account\Support;

/**
 * Class Chat
 * @package DvCampus\CustomerChat\Controller\Chat
 */
class Chat extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{

    /**
     * @var \DvCampus\CustomerChat\Model\ChatMess $chatMessFactory
     */
    private $chatMessFactory;

    /**
     * @var \DvCampus\CustomerChat\Model\ResourceModel\ChatMess $chatMessResource
     */
    private $chatMessResource;

    /**
     * @var \Magento\Framework\DB\TransactionFactory $transactionFactory
     */
    private $transactionFactory;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface $StoreManagerInterface
     */
    private $StoreManagerInterface;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    private $storeManager;
    /**
     * Chat constructor.
     * @param ChatMess $chatMessFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param Context $context
     */
    public function __construct(
        \DvCampus\CustomerChat\Model\ChatMess $chatMessFactory,
        \Magento\Framework\DB\TransactionFactory $transactionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Action\Context $context
    ) {
        parent::__construct($context);
        $this->chatMessFactory = $chatMessFactory;
        $this->transactionFactory = $transactionFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|JsonResult|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /**
         * Transaction $transaction
         */
        $transaction = $this->transactionFactory->create();
        try {
            foreach ($this->getRequest()->getParam('message') as $messageInfo => $value) {
                /** @var Support $textOfMess */
                $textOfMess = $this->chatMessFactory->create();
                $textOfMess->setUserId(1)
                    ->setWebsiteId((int)$this->storeManager->getWebsite()->getId())
                    ->setMessage($messageInfo);

                $transaction->addObject($textOfMess);
            }
            $transaction->save();
            $message = __('Sent');
        } catch (\Exception $e) {
            $message = __('Please wait some time');
        }
        /**@var JsonResult $response */
        $response = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $response->setData([
            'customerName' => $this->getRequest()->getParam('name'),
            'message' => $this->getRequest()->getParam('message')
        ]);
        return $response;
    }
}
