<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);

        $this->view->layout = 'account';
    }

    public function signInAction()
    {
        if(!empty($_POST))
        {
            $userId = $this->model->getUserId($_POST['login'], $_POST['password']);

            if(empty($userId))
                $this->view->message('error', 'такого пользователя не существует');
            else
            {
                $user = $this->model->getUser($userId)[0];

                $this->setSession($user['id'], $user['login'], $user['password'],
                                $user['mail'], $user['access']);
            }
        }

        $this->view->render('Вход');
    }

    public function registerAction()
    {
        if(!empty($_POST))
        {
            $userId = $this->model->getUserId($_POST['login'], $_POST['password']);

            if(!empty($userId))
                $this->view->message('error', 'такой пользователь уже существует');
            else
            {
                $id = $this->model->addUser($_POST['login'], $_POST['password'], $_POST['mail'], 'user');

                $user = $this->model->getUser($id)[0];

                $this->setSession($user['id'], $user['login'], $user['password'],
                    $user['mail'], $user['access']);
            }
        }

        $this->view->render("Регистрация");
    }

    private function setSession($id, $login, $password, $mail, $access)
    {
        $_SESSION['id'] = $id;
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['mail'] = $mail;
        $_SESSION['access'] = $access;

        $this->view->location('../');
    }

    public function logoutAction()
    {
        $this->clearSession();

        $this->view->redirect('');
    }

    private function clearSession()
    {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        unset($_SESSION['mail']);
        unset($_SESSION['access']);
    }
}