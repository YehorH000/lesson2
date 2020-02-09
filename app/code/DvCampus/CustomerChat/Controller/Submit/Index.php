<?php
declare(strict_types=1);

namespace DvCampus\CustomerChat\Controller\Submit;

use \Magento\Framework\App\Request\Http;
class Index extends \Magento\Framework\App\Action\Action implements
    \Magento\Framework\App\Action\HttpPostActionInterface
{
    public function execute()
    {
    }
    public function __construct(Http $request) {
        $this->request = $request;
    }
    public function getPost() {
    $postData = $this->request->getPost();
}
}
