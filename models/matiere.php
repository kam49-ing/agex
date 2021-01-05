<?php
class matiere{
    public $id;
    public $libelle;

    function __construct($id, $libelle)
	{
        $this->id = $id;
		$this->libelle = $libelle;
	}

	public function insert()
	{
		$query = $bdd->prepare('INSERT INTO matiere(`libelle`) 
        VALUES (:libelle)');
		$query->bindValue(':libelle', $this->libelle, PDO::PARAM_STR);
        $query->exec();
		return $query;		
	}

	public function update()
	{
		$query = $bdd->prepare('UPDATE matiere
        SET libelle = :libelle');
		$query->bindValue(':libelle', $this->libelle, PDO::PARAM_STR);
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
		$query = $bdd->prepare('DELETE FROM matiere
		WHERE id = :id');
		$query->bindValue(':id', $this->id, PDO::PARAM_STR);
		$query->exec();
		return $query;
	}


}
