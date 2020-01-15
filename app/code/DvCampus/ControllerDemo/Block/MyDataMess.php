<?php
namespace DvCampus\ControllerDemo\Block;

class MyDataMess extends \Magento\Framework\View\Element\Template
{
    /*public function getMessMyData()
    {
        $name = $this->getRequest()->getParam('name');
        $surname = $this->getRequest()->getParam('surname');
        $git_url = $this->getRequest()->getParam('git_url');
        $my_data_mess = 'Full name:' . $name . ' ' . $surname . '<br/>' .  'Repository URL: ' . $git_url . ' <br/> ' ;

        return $my_data_mess;
    }*/

    public function getName()
    {
        return $this->getRequest()->getParam('name') . ' ' .  $this->getRequest()->getParam('surname');
    }

    public function getGitUrl()
    {
        return $this->getRequest()->getParam('git_url');
    }
    /*/**
     * @var array
     */
    /*private $getMessage;

    /**
     * MyDataMess constructor.
     * @param Template\Context $context
     * @param array $data
     */
    /*public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->getMessage = $this->getRequest()->getParams();
    }

    public function getName(): string
    {
        return $this->getMessage['firstName'] . ' ' . $this->getMessage['lastName'];
    }
    public function getLink(): string
    {
        return $this->getMessage['githubRepository'];
    }*/
}