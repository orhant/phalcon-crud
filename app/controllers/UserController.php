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
                'users'      =>  $users,
                'title' =>  'List User',
                'js'    =>  'public/js/user/index.js',
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
                    'title' =>  'Add User',
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
        $user = User::findFirst(
            [
                'columns'   =>  '*',
                'conditions' =>
                'id_user=:id_user:',
                'bind' => $condition
            ]
        );
        if ($user != NULL || $cek != "") {
            if($this->request->isPost()){
                // $user = new User();
                $username = $this->request->get('username');
                $password = $this->request->get('password');
                $level_user = $this->request->get('level_user');

                if($password == ""){
                    $user->username = $username;
                    $user->level_user = $level_user;
                    $user->update_user = date('Y-m-d H:i:s');
                }else{
                    $user->username = $username;
                    $user->password = password_hash($password, PASSWORD_DEFAULT);
                    $user->level_user = $level_user;
                    $user->update_user = date('Y-m-d H:i:s');
                }
                if ($user->save()) {
                    $this->flashSession->message('edit-user', 'User berhasil diupdate');
                    return $this->response->redirect('user');
                }else{
                    echo "gagal nyimpan";
                    exit();
                }
            }else{
                $this->view->setVars(
                    [
                        'user'  =>  $user,
                        'title' =>  'Edit User',
                        'js'    =>  'public/js/user/edit.js'
                    ]
                );
                return $this->view->user;
            }
        } else {
            $this->flashSession->message('no-id', 'Id Tidak Ditemukan');
            return $this->response->redirect('user');
        }
    }

    public function deleteAction($id)
    {
        echo $id;
    }
}
