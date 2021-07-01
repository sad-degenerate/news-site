<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;

class MainController extends Controller
{
    public function indexAction()
    {
		$pagination = new Pagination($this->route, $this->model->postsCount());

		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->postsList($this->route),
            'categories' => $this->model->categoriesList(),
		];

		$this->view->render('Главная страница', $vars);
	}

	public function categoryAction()
    {
        $pagination = new Pagination($this->route, $this->model->postsCountByCategory($this->route['id']));

        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->postsListByCategory($this->route, $this->route['id']),
            'categories' => $this->model->categoriesList(),
        ];

        $this->view->render('Главная страница', $vars);
    }

	public function postAction()
    {
        if(!empty($_POST))
        {
            if (empty($_POST['comment']))
                $this->view->message('error', 'Пустой комментарий');

            $id = $this->model->addComment($this->route['id'], $_SESSION['id'], $_POST['comment']);

            if(!$id)
                $this->view->message('error', 'Ошибка в запросе');

            $this->view->message('success', 'Комментарий успешно оставлен');
        }

		$adminModel = new Admin;

		if (!$adminModel->getPost($this->route['id']))
			$this->view->errorCode(404);

		$data = $adminModel->getPost($this->route['id'])[0];

		$vars = [
			'data' => $data,
            'category' => $adminModel->getCategoryById($data['category_id'])[0],
            'comments' => $this->model->getComments($this->route['id']),
		];

		$this->view->render($data['topic'], $vars);
	}
}