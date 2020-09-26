<?php

namespace App\src\controller;
use App\config\Parameter;
use App\config\Files;

class BackController extends controller
{

	private function checkLoggedIn()
	{
		if(!$this->session->get('pseudo')) {
			$this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
			header('Location: ../public/index.php?route=login');
		} else {
			return true;
		}
	}

	private function checkAdmin()
	{
		$this->checkLoggedIn();
		if(!($this->session->get('role') === 'admin')) {
			$this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
			header('Location: ../public/index.php?route=profile');
		} else {
			return true;
		}
	}

	public function administration()
	{
		if($this->checkAdmin()) {
			$articles = $this->newsDao->getNews();
			$comments = $this->commentNewsDao->getFlagComments();
			$users = $this->userDao->getUsers();

			return $this->view->render('administration', [
				'articles' => $articles,
				'comments' => $comments,
				'users'    => $users
			]);
		}
	}

	public function getMultipleNew()
	{

		if($this->checkLoggedIn()){
			$articles = $this->newsDao->getNews();
			return $this->view->render('multiple_new',[
				'articles'=>$articles
			]);

		}
	}


	public function getNew($newId)
	{
		if($this->checkLoggedIn()){
			$article = $this->newsDao->getNew($newId);

		


			$comments = $this->commentNewsDao->getCommentsFromNew($newId);



			return $this->view->render('single_new',[
				'article'=>$article,
				'comments'=>$comments
			]);
		}
	}



	public function editNew(Parameter $post, $newId,$file)
	

		{
			if($this->checkLoggedIn()){
			$article = $this->newsDao->getNew($newId);

			if($post->get('submit')) {

				$errors = $this->validation->validate($post,'New');

				if(!$errors){ 

					$path="";

					if (!empty($file->getFiles('myfile'))) {

						$img=$file->getName('myfile');
						$path = "../public/img/".$img;
						move_uploaded_file($file->getTmp('myfile'),"../public/img/$img");
					}


					$this->newsDao->editNew($post, $newId,$this->session->get('id'),$path);
					$this->session->set('edit_new', 'L\' article a bien été modifié');
					header('Location: ../public/index.php?route=multiple_new');


				}

				return $this->view->render('edit_new', [
					'post' => $post,
					'errors' => $errors
				]);
			}

			$post->set('id',$article->getId());
			$post->set('title',$article->getTitle());
			$post->set('content',$article->getContent());
			$post->set('author',$article->getAuthor());
			$post->set('photo',$article->getPhoto());

			return $this->view->render('edit_new', [
				'post' => $post
			]);
		}
	}


	public function deleteNew($newId){

		if($this->checkLoggedIn()){

			$this->newsDao->deleteNew($newId);
			$this->session->set('delete_new','L\' article a bien été supprimé');
			header('Location:../public/index.php?route=multiple_new');
		}
	}


	public function addCommentNew(Parameter $post,$newId)
	{
		if($this->checkLoggedIn()){
			if($post->get('submit')) {

				$errors = $this->validation->validate($post, 'CommentNew');

				if(!$errors){

					$this->commentNewsDao->addCommentNew($post, $newId, $this->session->get('pseudo'));
					$this->session->set('add_comment_new', 'Le nouveau commentaire a bien été ajouté');
					header('Location: ../public/index.php?route=new&newId='.$newId);
				}

				$article = $this->newsDao->getNew($newId);
				$comments = $this->commentNewsDao->getCommentsFromNew($newId);

				return $this->view->render('single_new',[
					'article'=>$article,
					'comments'=>$comments,
					'post' =>$post,
					'errors' =>$errors
				]);
			}
		}
	}




	public function deleteCommentNew($commentNewId){

		if($this->checkLoggedIn()){

			$this->commentNewsDao->deleteCommentNew($commentNewId);
			$this->session->set('delete_comment_new', 'Le commentaire a bien été supprimé');
			header('Location: ../public/index.php?route=multiple_new');
		}

	}

	public function flagCommentNew($commentNewId)
	{
		$this->commentNewsDao->flagCommentNew($commentNewId);
		$this->session->set('flag_comment_new', 'Le commentaire a bien été signalé');
		header('Location: ../public/index.php?route=multiple_new');
	}



	public function unflagComment($commentId)
	{
		if($this->checkAdmin()) {
			$this->commentNewsDao->unflagComment($commentId);
			$this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
			header('Location: ../public/index.php?route=administration');
		}
	}

	public function deleteUser($userId)
	{
		if($this->checkAdmin()) {
			$this->userDao->deleteUser($userId);
			$this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
			header('Location: ../public/index.php?route=administration');
		}
	}

	public function addNew(Parameter $post,Files $file)
	{
		
		if($this->checkLoggedIn()){
			if($post->get('submit')) {

				$errors = $this->validation->validate($post, 'New');

				if(!$errors) {

					$path="";

					if (!empty($file->getFiles('myfile'))) {

						$img=$file->getName('myfile');
						$path = "../public/img/".$img;
						move_uploaded_file($file->getTmp('myfile'),"../public/img/$img");

					}

					$this->newsDao->addNew($post,$path,$this->session->get('id'));
					$this->session->set('add_new', 'Le nouvel article a bien été ajouté');
					header('Location: ../public/index.php?route=multiple_new');
				}

				return $this->view->render('add_new', [
					'post' => $post,
					'errors'=> $errors
				]);
			}

			$this->view->render('add_new');
		}
	}

	public function profile()
	{
		if($this->checkLoggedIn()){
			$articles = $this->newsDao->getMyNews($this->session->get('id'));
			return $this->view->render('profile',[
				'articles' => $articles
			]);
		}
	}

	public function updatePassword(Parameter $post)
	{
		if($this->checkLoggedIn()){
			if($post->get('submit')) {
				$this->userDao->updatePassword($post, $this->session->get('pseudo'));
				$this->session->set('update_password', 'Le mot de passe a été mis à jour');
				header('Location: ../public/index.php?route=profile');
			}
			return $this->view->render('update_password');
		}
	}

	public function logout()
	{
		if($this->checkLoggedIn()){
			$this->logoutOrDelete('logout');
		}
	}

	public function deleteAccount()
	{
		$this->userDao->deleteAccount($this->session->get('pseudo'));
		$this->logoutOrDelete('delete_account');
	}

	private function logoutOrDelete($param)
	{
		$this->session->stop();
		$this->session->start();
		if($param === 'logout') {
			$this->session->set($param, 'À bientôt');
		} else {
			$this->session->set($param, 'Votre compte a bien été supprimé');
		}
		header('Location: ../public/index.php');
	}
}