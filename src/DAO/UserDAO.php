<?php

namespace App\src\DAO;


use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{

	 private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setCreatedAt($row['createdAt']);
        $user->setRole($row['role_name']);
        $user->setPhoto($row['photo']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT user.id, user.pseudo, user.createdAt,user.photo, role.role_name FROM user INNER JOIN role ON user.role_id = role.id ORDER BY user.id DESC';

        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

	public function register(Parameter $post,$path)
	{
		$this->checkUser($post);

		$sql = 'INSERT INTO user (pseudo,name,firstname,email,telephone, password,photo , createdAt, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(),?)';
		$this->createQuery($sql, [$post->get('pseudo'), $post->get('name'), $post->get('firstname'), $post->get('email'), $post->get('telephone'), password_hash($post->get('password'), PASSWORD_BCRYPT),$path,2]);
	}

	public function checkUser(Parameter $post)
	{
		$sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
		$result = $this->createQuery($sql, [$post->get('pseudo')]);
		$isUnique = $result->fetchColumn();
		if($isUnique) {
			return '<p>Le pseudo existe déjà</p>';
		}
	}

	public function login(Parameter $post)
	{
		$sql = 'SELECT user.id, user.role_id, user.name, user.firstname, user.email, user.telephone, user.password, user.photo, role.role_name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo = ?';

		$data = $this->createQuery($sql, [$post->get('pseudo')]);

		$result = $data->fetch();

		$isPasswordValid = password_verify($post->get('password'), $result['password']);
		return [
			'result' => $result,
			'isPasswordValid' => $isPasswordValid
		];
	}

	public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    public function deleteAccount($pseudo)
    {
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }
}