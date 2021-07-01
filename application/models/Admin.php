<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

	public function validatePost ($post, $type = 'add')
    {
        $config = require 'application/config/posts.php';

        if (iconv_strlen($post['topic']) < $config['topic_len']['min'])
        {
            $this->error = 'Название должно быть больше '.$config['topic_len']['min'].' символов';
            return false;
        }
        elseif (iconv_strlen($post['topic']) > $config['topic_len']['max'])
        {
            $this->error = 'Название должно быть меньше '.$config['topic_len']['max'].' символов';
            return false;
        }

        if (iconv_strlen($post['annotation']) < $config['annotation_len']['min'])
        {
            $this->error = 'Аннотация должна быть больше '.$config['annotation_len']['min'].' символов';
            return false;
        }
        elseif (iconv_strlen($post['annotation']) > $config['annotation_len']['max'])
        {
            $this->error = 'Название должно быть меньше '.$config['annotation_len']['max'].' символов';
            return false;
        }

        if (iconv_strlen($post['text']) < $config['text_len']['min'])
        {
            $this->error = 'Текст поста должен быть больше '.$config['text_len']['min'].' символов';
            return false;
        }
        elseif (iconv_strlen($post['text']) > $config['text_len']['max'])
        {
            $this->error = 'Текст поста должен быть меньше '.$config['text_len']['max'].' символов';
            return false;
        }

        $category = $this->getCategory($post['category']);
        if (!$category)
        {
            $this->error = 'Категории, введённой вами не существует';
            return false;
        }

        if (!isset($_FILES['img']['tmp_name']) and $type = 'add')
        {
            $this->error = 'Не прикреплено ни одной картинки';
            return false;
        }

		return true;
	}

	public function validateCategory($post, $type = 'add')
    {
        $config = require 'application/config/categories.php';

        if(iconv_strlen($post['name']) < $config['name_len']['min'])
        {
            $this->error = 'Название категории не может быть меньше '.$config['name_len']['min'].' символов';
            return false;
        }
        else if(iconv_strlen($post['name']) > $config['name_len']['max'])
        {
            $this->error = 'Название категории не может быть больше '.$config['name_len']['max'].' символов';
            return false;
        }

        if(iconv_strlen($post['description']) < $config['description_len']['min'])
        {
            $this->error = 'Описание категории не может быть меньше '.$config['description_len']['min'].' символов';
            return false;
        }
        else if(iconv_strlen($post['description']) > $config['description_len']['max'])
        {
            $this->error = 'Описание категории не может быть больше '.$config['description_len']['max'].' символов';
            return false;
        }

        if($type == 'add' and !empty($this->getCategory($post['name'])))
        {
            $this->error = 'Введённая вами категория уже существует';
            return false;
        }

        return true;
    }

	public function getCategory($name)
    {
        $params = [
            'name' => $name,
        ];

        $sql = 'SELECT * FROM categories WHERE name = :name';

        return $this->db->row($sql, $params);
    }

    public function getCategoryById($id)
    {
        $params = [
            'id' => $id,
        ];

        $sql = 'SELECT * FROM categories WHERE id = :id';

        return $this->db->row($sql, $params);
    }

    public function addPost($post)
    {
        $params = [
            'id' => NULL,
            'topic' => $post['topic'],
            'date' => $post['date'],
            'annotation' => $post['annotation'],
            'text' => $post['text'],
            'link' => $post['link'],
            'category_id' => $this->getCategory($post['category'])[0]['id'],
        ];

        $sql = 'INSERT INTO posts VALUES (:id, :topic, :date, :annotation, :text, :link, :category_id)';

        $this->db->query($sql, $params);

        return $this->db->lastInsertId();
    }

    public function postUploadImage($path, $id)
    {
        move_uploaded_file($path, 'public/materials/'.$id.'.jpg');
    }

    public function editPost($post, $id)
    {
        $params = [
            'id' => $id,
            'topic' => $post['topic'],
            'date' => $post['date'],
            'annotation' => $post['annotation'],
            'text' => $post['text'],
            'link' => $post['link'],
            'category_id' => $this->getCategory($post['category'])[0]['id'],
        ];

        $sql = 'UPDATE posts SET topic = :topic, date = :date, annotation = :annotation,
                text = :text, link = :link, category_id = :category_id WHERE id = :id';

        $this->db->query($sql, $params);
    }

    public function addCategory($post)
    {
        $params = [
            'id' => NULL,
            'name' => $post['name'],
            'description' => $post['description'],
        ];

        $sql = 'INSERT INTO categories VALUES (:id, :name, :description)';

        $this->db->query($sql, $params);

        return $this->db->lastInsertId();
    }

    public function editCategory($post, $id)
    {
        $params = [
            'id' => $id,
            'name' => $post['name'],
            'description' => $post['description'],
        ];

        $sql = 'UPDATE categories SET name = :name, description = :description WHERE id = :id';

        $this->db->query($sql, $params);
    }

    public function getPost($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
    }

    public function deletePost($id)
    {
        $params = [
            'id' => $id,
        ];

        $this->db->query('DELETE FROM posts WHERE id = :id', $params);
    }

    public function deleteCategory($id)
    {
        $params = [
            'id' => $id,
        ];

        $sql = 'DELETE FROM categories WHERE id = :id';

        $this->db->query($sql, $params);
    }
}