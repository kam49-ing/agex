<?php 
/**
 * Users class allows to connect application 
 */
class Users
{
    public $id;
    public $username;
	public $passwrd;

	function __construct($password, $username, $id)
	{
		$this->passwrd = $password;
		$this->username = $username;
		$this->id = isset($id)?id:'';
	}

	public function insert()
	{
		$query = $bdd->prepare('INSERT INTO users(\'username\', \'passwrd\') 
		VALUES (:username, :passwrd)');
		$query->bindValue(':username', $this->username, PDO::PARAM_STR);
		$query->bindValue(':passwrd', $this->passwrd, PDO::PARAM_STR);
		$query->exec();
		return $query;		
	}

	public function update()
	{
		$query = $bdd->prepare('UPDATE users 
		SET username=:username, passwrd=:passwrd
		WHERE id=:id');
		$query->bindValue(':username', $this->username, PDO::PARAM_STR);
		$query->bindValue(':passwrd', $this->passwrd, PDO::PARAM_STR);
		$query->bindValue(':id', $this->id, PDO::PARAM_STR);
		$query->exec();
		return $query;
	}

	public function save()
	{
		if(isset($this->id))
			$query = $this->update();
		else
			$query = $this->insert();
		return $query;
	}
	
	public function delete()
	{
		$query = $bdd->prepare('DELETE FROM users
		WHERE id = :id');
		$query->bindValue(':id', $this->id, PDO::PARAM_STR);
		$query->exec();
		return $query;
	}
	
}
