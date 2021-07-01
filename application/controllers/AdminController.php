<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller
{
	public function __construct($route)
    {
		parent::__construct($route);

		$this->view->layout = 'admin';
	}

	public function addAction()
    {
		if (!empty($_POST))
		{
			if (!$this->model->validatePost($_POST))
				$this->view->message('error', $this->model->error);

			$id = $this->model->addPost($_POST);

			if (!$id)
				$this->view->message('error', 'Ошибка обработки запроса');

            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id);

			$this->view->message('success', 'Пост добавлен');
		}

		$this->view->render('Добавить пост');
	}

	public function addCategoryAction()
    {
        if(!empty($_POST))
        {
            if(!$this->model->validateCategory($_POST))
                $this->view->message('error', $this->model->error);

            $id = $this->model->addCategory($_POST);

            if(!$id)
                $this->view->message('error', 'Ошибка обработки запроса');

            $this->view->message('success', 'Категория добавлена');
        }

        $this->view->render('Добавить категорию');
    }

	public function editAction()
    {
		if (!$this->model->getPost($this->route['id']))
			$this->view->errorCode(404);

		if (!empty($_POST))
		{
			if (!$this->model->validatePost($_POST))
				$this->view->message('error', $this->model->error);

			$this->model->editPost($_POST, $this->route['id']);

			if (isset($_FILES['img']['tmp_name']))
                $this->model->postUploadImage($_FILES['img']['tmp_name'], $this->route['id']);

			$this->view->message('success', 'Сохранено');
		}

		$data = $this->model->getPost($this->route['id'])[0];

		$vars = [
			'data' => $data,
            'category' => $this->model->getCategoryById($data['category_id'])[0]['name'],
		];

		$this->view->render('Редактировать пост', $vars);
	}

	public function editCategoryAction()
    {
        if (!$this->model->getCategoryById($this->route['id']))
            $this->view->errorCode(404);

        if (!empty($_POST))
        {
            if (!$this->model->validateCategory($_POST, 'edit'))
                $this->view->message('error', $this->model->error);

            $this->model->editCategory($_POST, $this->route['id']);

            $this->view->message('success', 'Сохранено');
        }

        $data = $this->model->getCategoryById($this->route['id'])[0];

        $vars = [
            'data' => $data,
        ];

        $this->view->render('Редактировать категорию', $vars);
    }

	public function deleteAction()
    {
		if (!$this->model->getPost($this->route['id']))
			$this->view->errorCode(404);

		$this->model->deletePost($this->route['id']);
		$this->view->redirect('../admin/posts');
	}

	public function deleteCategoryAction()
    {
        if (!$this->model->getCategoryById($this->route['id']))
            $this->view->errorCode(404);

        $this->model->deleteCategory($this->route['id']);
        $this->view->redirect('../admin/categories');
    }

	public function postsAction()
    {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->postsCount());

		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->postsList($this->route),
		];

		$this->view->render('Новости', $vars);
	}

	public function categoriesAction()
    {
        $mainModel = new Main;
        $pagination = new Pagination($this->route, $mainModel->categoriesCount());

        $vars = [
            'pagination' => $pagination->get(),
            'list' => $mainModel->categoriesList($this->route),
        ];

        $this->view->render('Категории', $vars);
    }
}