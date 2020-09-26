<?php

namespace App\src\DAO;
use App\src\model\CommentNews;
use App\config\Parameter;
class CommentNewsDAO extends DAO
{

	private function buildObject($row)
    {
        $comment = new CommentNews();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->setFlag($row['flag']);
        return $comment;
    }


    public function getCommentsFromNew($newId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt,flag FROM comment_news WHERE news_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$newId]);

        $comments = [];

        foreach($result as $row)
        {
        	$commentId = $row['id'];
        	$comments[$commentId] = $this->buildObject($row);
        }

        $result->closeCursor();
        return $comments;
    }

      public function addCommentNew(Parameter $post, $newId, $myPseudo)
    {
        $sql = 'INSERT INTO comment_news (pseudo, content, createdAt,flag, news_id) VALUES (?, ?, NOW(),?, ?)';
        $this->createQuery($sql, [$myPseudo, $post->get('content'),0, $newId]);
    }

    public function getFlagComments()
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment_news WHERE flag = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function flagCommentNew($commentNewId)
    {
        $sql = 'UPDATE comment_news SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentNewId]);
    }

    public function unflagComment($commentId)
    {
        $sql = 'UPDATE comment_news SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }

    public function deleteCommentNew($commentNewId)
    {
        $sql = 'DELETE FROM comment_news WHERE id = ?';
        $this->createQuery($sql, [$commentNewId]);
    }
}