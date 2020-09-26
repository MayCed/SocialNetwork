<?php

namespace App\src\controller;
use App\config\Parameter;
use App\config\Files;


class FrontController extends Controller
{

	public function test()
	{
		
		return $this->view->render('test');
	}
	
	public function home()
	{
		return $this->view->render('home');
	}
	public function contact()
	{
		return $this->view->render('contact');
	}
	public function reseau()
	{
		return $this->view->render('reseau');
	}
	public function histoire()
	{
		return $this->view->render('histoire');
	}


	public function register(Parameter $post,$file)
	{
		if($post->get('submit')) {
			$errors = $this->validation->validate($post, 'User');
			if($this->userDao->checkUser($post)) {
				$errors['pseudo'] = $this->userDao->checkUser($post);
			}
			if(!$errors) {

				$path="";

				if (!empty($file->getFiles('myfile'))) {

					$img=$file->getName('myfile');
					$path = "../public/img/".$img;
					move_uploaded_file($file->getTmp('myfile'),"../public/img/$img");

				}

				$this->userDao->register($post,$path);
				$this->session->set('register', 'Votre inscription a bien été effectuée');
				header('Location: ../public/index.php');
			}
			return $this->view->render('register', [
				'post' => $post,
				'errors' => $errors
			]);

		}
		return $this->view->render('register');
	}

	public function login(Parameter $post)
	{
		if($post->get('submit')) {
			$result = $this->userDao->login($post);
			if($result && $result['isPasswordValid']) {
				$this->session->set('login', 'Content de vous revoir');
				$this->session->set('role', $result['result']['role_name']);
				$this->session->set('id', $result['result']['id']);
				$this->session->set('name', $result['result']['name']);
				$this->session->set('firstname', $result['result']['firstname']);
				$this->session->set('email', $result['result']['email']);
				$this->session->set('telephone', $result['result']['telephone']);
				$this->session->set('photo', $result['result']['photo']);
				$this->session->set('pseudo', $post->get('pseudo'));

				header('Location: ../public/index.php');
			}
			else {
				$this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
				return $this->view->render('login', [
					'post'=> $post
				]);
			}
		}
		return $this->view->render('login');
	}
}