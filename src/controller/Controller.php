<?php

namespace App\src\controller;


use App\config\Request;
use App\src\DAO\NewsDAO;
use App\src\DAO\CommentNewsDAO;
use App\src\DAO\UserDAO;
use App\src\model\View;
use App\src\constraint\Validation;

abstract class Controller
{
    protected $newsDao;
    protected $commentNewsDao;
    protected $userDao;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->newsDao = new NewsDAO();
        $this->commentNewsDao = new CommentNewsDAO();
        $this->userDao = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}