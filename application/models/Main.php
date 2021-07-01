<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public $error;

	public function postsCount()
    {
		return $this->db->column("SELECT COUNT(id) FROM posts");
	}

	public function postsCountByCategory($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->column("SELECT COUNT(id) FROM posts WHERE category_id = :id", $params);
    }

    public function postsListByCategory($route, $categoryId, $max = 10)
    {
        $params = [
            'id' => $categoryId,
            'max' => $max,
            'start' => ((($route['page'] ?? 1) - 1) * $max),
        ];

        return $this->db->row("SELECT * FROM posts WHERE category_id = :id ORDER BY id DESC LIMIT :start, :max", $params);
    }

	public function getComments($postId)
    {
        $params = [
            'id' => $postId,
        ];

        $sql = "SELECT users.login, comments.comment 
                FROM users INNER JOIN comments
                ON comments.user_id = users.id
                WHERE comments.post_id = :id";

        return $this->db->row($sql, $params);
    }

    public function addComment($postId, $userId, $comment)
    {
        $params = [
            'id' => NULL,
            'post_id' => $postId,
            'user_id' => $userId,
            'comment' => $comment,
        ];

        $sql = 'INSERT INTO comments VALUES (:id, :post_id, :user_id, :comment)';

        $this->db->query($sql, $params);

        return $this->db->lastInsertId();
    }

	public function postsList($route, $max = 10)
    {
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		
		return $this->db->row('SELECT * FROM posts ORDER BY id DESC LIMIT :start, :max', $params);
	}

    public function categoriesCount()
    {
        return $this->db->column("SELECT COUNT(id) FROM categories");
    }

	public function categoriesList()
    {
        return $this->db->row("SELECT * FROM categories");
    }
}