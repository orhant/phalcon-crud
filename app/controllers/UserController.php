<?php
declare(strict_types=1);

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->setVars(
            [
                'sayang'    =>  'Leni'
            ]
        );
        return $this->view->pick('user/list');
    }

}

