<?php
class anneeexamen{
    public $id;
    public $id_annee;
    public $id_examen;
    public $dateComposition;

    function __construct($id, $id_annee, $id_examen, $dateComposition)
	{
        $this->id_examen = $id_examen;
		$this->id_annee = $id_annee;
        $this->dateComposition = $dateComposition;
        $this->id = isset($id)?id:'';
	}

	public function insert()
	{
		$query = $bdd->prepare('INSERT INTO anneeexamen(`id_examen`, `id_annee`, `dateComposition`) 
		VALUES (:id_examen, :id_annee, :dateComposition, :dateComposition)');
		$query->bindValue(':id_examen', $this->id_examen, PDO::PARAM_STR);
        $query->bindValue(':id_annnee', $this->id_annnee, PDO::PARAM_STR);
        $query->bindValue(':dateComposition', $this->dateComposition, PDO::PARAM_STR);
		$query->exec();
		return $query;		
	}

	public function update()
	{
		$query = $bdd->prepare('UPDATE anneeexamen
        SET id_examen = :id_examen, id_annee = :id_annee, dateComposition = :dateComposition
        WHERE id=:id');
		$query->bindValue(':id_examen', $this->id_examen, PDO::PARAM_STR);
        $query->bindValue(':id_annnee', $this->id_annnee, PDO::PARAM_STR);
        $query->bindValue(':dateComposition', $this->dateComposition, PDO::PARAM_STR);
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
		$query = $bdd->prepare('DELETE FROM anneeexamen
		WHERE id = :id');
		$query->bindValue(':id', $this->id, PDO::PARAM_STR);
		$query->exec();
		return $query;
	}


}
