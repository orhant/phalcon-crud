<?php

declare(strict_types=1);

use Phalcon\Di as Di;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Query;

use Phalcon\Flash\Session;

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        // $condition = [
        //     'id_user' => 3,
        //     'username' => 'nisa'
        // ];
        // $users = User::get_where($condition);

        // return $this->view->pick('user/list');

        $users = User::find();
        $this->view->setVars(
            [
                'js'    =>  'public/js/user/index.js',
                'users'      =>  $users,
            ]
        );
        // return $this->view->pick('user/list');
        return $this->view->user;
    }

    public function addAction()
    {
        if ($this->request->isPost()) {
            $user = new User();
            $username   = $this->request->get('username');
            $password   = $this->request->get('password');
            $hash       = password_hash($password, PASSWORD_DEFAULT);
            $level_user = $this->request->get('level_user');

            $id = User::findFirst(['order' => 'id_user DESC']);
            $id = $id->id_user + 1;

            $user->id_user = $id;
            $user->username = $username;
            $user->password = $hash;
            $user->level_user = $level_user;
            $user->create_user = date('Y-m-d H:i:s');
            $user->update_user = date('Y-m-d H:i:s');

            if ($user->create()) {
                $this->flashSession->message('add-user', 'User berhasil ditambahkan');
                return $this->response->redirect('user');
            }
        } else {
            $this->view->setVars(
                [
                    'js'    =>  'public/js/user/add.js'
                ]
            );
            return $this->view->user;
        }
    }

    public function editAction($id)
    {
        $condition = [
            'id_user'   =>  $id
        ];
        $cek = User::findFirst(
            [
                'columns'   =>  '*',
                'conditions' =>
                'id_user=:id_user:',
                'bind' => $condition
            ]
        );
        if ($cek != NULL || $cek != "") {
            return $this->view->user;
        } else {
            $this->flashSession->message('no-id', 'Id Tidak Ditemukan');
            return $this->response->redirect('user');
        }
    }
}
