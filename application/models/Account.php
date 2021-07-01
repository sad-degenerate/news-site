<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{
    public $error;

    public function getUserId($login, $password)
    {
        $params = [
            'login' => $login,
            'password' => $password,
        ];

        $sql = 'SELECT id FROM users WHERE login = :login AND password = :password';

        return $this->db->column($sql, $params);
    }

    public function getUser($id)
    {
        $params = [
            'id' => $id,
        ];

        $sql = 'SELECT * FROM users WHERE id = :id';

        return $this->db->row($sql, $params);
    }

    public function addUser($login, $password, $mail, $access)
    {
        return $this->setUser($login, $password, $mail, $access);
    }

    public function editUser($id, $login, $password, $mail, $access)
    {
        return $this->setUser($login, $password, $mail, $access, $id);
    }

    private function setUser($login, $password, $mail, $access, $id = NULL)
    {
        $params = [
            'id' => $id,
            'login' => $login,
            'password' => $password,
            'mail' => $mail,
            'access' => $access,
        ];

        if (!$id)
            $sql = 'INSERT INTO users VALUES (:id, :login, :password, :mail, :access)';
        else
            $sql = 'UPDATE users SET id = :id, login = :login, password = :password, mail = :mail, access = :access';

        $this->db->query($sql, $params);

        return $this->db->lastInsertId();
    }
}