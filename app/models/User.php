<?php

namespace app\models;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $level_user;

    /**
     *
     * @var string
     */
    public $create_user;

    /**
     *
     * @var string
     */
    public $update_user;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon-crud");
        $this->setSource("user");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]|User|\Phalcon\Mvc\Model\ResultSetInterface
     */
    // public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    // {
    //     return parent::find($parameters);
    // }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User|\Phalcon\Mvc\Model\ResultInterface
     */
    // public static function findFirst($parameters = null)
    // {
    //     return parent::findFirst($parameters);
    // }


    public function get(){
        return User::find();
    }

    public function get_where($condition){
        return User::findFirst(
            [
                'columns'   =>  '*',
                'conditions' =>
                'id_user=:id_user: AND username=:username:', 'bind' => $condition
            ]
        );
    }
}
