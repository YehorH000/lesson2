<?php
declare(strict_types=1);

namespace DvCampus\CustomerChat\Controller\Submit;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action implements
    \Magento\Framework\App\Action\HttpPostActionInterface
{
    public function execute()
    {
        $response = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $response->setData([
            'message' => 'Send'
        ]);

        return $response;
    }
}
