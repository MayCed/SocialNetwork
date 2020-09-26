<?php

namespace App\src\DAO;
use App\src\model\News;
use App\config\Parameter;


class NewsDAO extends DAO
{


    private function buildObject($row)
    {
        $article = new News();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['pseudo']);
        $article->setPhoto($row['photo']);
        $article->setCreatedAt($row['createdAt']);
        $article->setUserId($row['user_id']);

        return $article;
    }



    public function getNews()
    {
         $sql = 'SELECT news.id, news.title, news.content, user.pseudo, news.createdAt, news.photo, news.user_id FROM news INNER JOIN user ON news.user_id = user.id ORDER BY news.id DESC';
        $result = $this->createQuery($sql);
        $articles = [];

        foreach($result as $row)
        {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }

        $result->closeCursor();
        return $articles;
    }


    public function getMyNews($myId)
    {
         $sql = 'SELECT news.id, news.title, news.content, user.pseudo, news.createdAt, news.photo, news.user_id FROM news INNER JOIN user ON news.user_id = user.id WHERE news.user_id = ? ORDER BY news.id DESC';
        $result = $this->createQuery($sql,[$myId]);
        $articles = [];

        foreach($result as $row)
        {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }

        $result->closeCursor();
        return $articles;
    }



     public function getNew($newId)
    {
        $sql = 'SELECT news.id, news.title, news.content, user.pseudo, news.createdAt, news.photo, news.user_id FROM news INNER JOIN user ON news.user_id = user.id WHERE news.id = ?';
        $result = $this->createQuery($sql, [$newId]);

        $article = $result->fetch();
        $result->closeCursor();

        return $this->buildObject($article);
    }


     public function addNew(Parameter $post,$path,$id)
    {
        extract($post);
        $sql = 'INSERT INTO News (title, content, createdAt,photo,user_id) VALUES (?, ?, NOW(),?, ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'),$path,$id]);
    }

      public function editNew(Parameter $post, $newId, $userId,$path)
    {
        $sql = 'UPDATE news SET title=:title, content=:content, photo=:photo, user_id=:user_id WHERE id=:newId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'user_id' => $userId,
            'photo' => $path,
            'newId' => $newId
        ]);
    }

    public function deleteNew($newId)
    {

        $sql = 'DELETE from comment_news WHERE news_id = ?';
        $this->createQuery($sql,[$newId]);
        
        $sql = 'DELETE from news WHERE id = ?';
        $this->createQuery($sql,[$newId]);


    }
}