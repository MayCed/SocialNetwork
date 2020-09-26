<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use App\src\controller\BackController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $request;


    public function __construct()
    {

        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();

    }
    public function run()
    {

         $route = $this->request->getGet()->get('route');

        try{
            if(isset($route))
            {
                if($route === 'multiple_new'){
        
                    $this->backController->getMultipleNew();
                }
                elseif($route === 'new'){
                    
                    $this->backController->getNew($this->request->getGet()->get('newId'));
                }
                elseif($route === 'addNew'){
                    $this->backController->addNew($this->request->getPost(),$this->request->getFiles());
                }
                elseif ($route === 'editNew'){
                    $this->backController->editNew($this->request->getPost(), $this->request->getGet()->get('newId'),$this->request->getFiles());
                }
                elseif ($route === 'deleteNew'){
                    $this->backController->deleteNew($this->request->getGet()->get('newId'));
                }
                elseif($route === 'addCommentNew'){
                    $this->backController->addCommentNew($this->request->getPost(), $this->request->getGet()->get('newId'));
                }
                elseif($route === 'flagCommentNew'){
                    $this->backController->flagCommentNew($this->request->getGet()->get('commentNewId'));
                }
                 elseif($route === 'deleteCommentNew'){
                    $this->backController->deleteCommentNew($this->request->getGet()->get('commentNewId'));
                }
                 elseif($route === 'register'){
                    $this->frontController->register($this->request->getPost(),$this->request->getFiles());
                }
                  elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                 elseif($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                  elseif($route === 'administration'){
                    $this->backController->administration();
                }
                elseif($route === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                }
                 elseif($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'contact'){
                    $this->frontController->contact($this->request->getGet()->get('userId'));
                }
                elseif($route === 'reseau'){
                    $this->frontController->reseau($this->request->getGet()->get('userId'));
                }
                elseif($route === 'histoire'){
                    $this->frontController->histoire($this->request->getGet()->get('userId'));
                }
                elseif($route === 'test'){
                    $this->frontController->test();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
            //echo $e->getMessage();
        }
    }
}