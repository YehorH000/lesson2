<?php
declare(strict_types=1);
namespace DvCampus\ControllerDemo\Controller\Forward;

use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

/**
 * Class Forward
 * @package DvCampus\ControllerDemo\Controller\Forward
 */
class Forward extends \Magento\Framework\App\Action\Action
{

    private $resultPageFactory;

    /**
     * Forward constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct
    (
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $myData = [
            'name'=>'Yehor',
            'surname'=>'Hrabyna',
            'git_url' => 'https://github.com/YehorH000/magento'
        ];
        $this->_forward(
            'Message',
            'Forward',
            'DvCampus_ControllerDemo',
            $myData
        );

        return $this->resultPageFactory->create();
    }

}
