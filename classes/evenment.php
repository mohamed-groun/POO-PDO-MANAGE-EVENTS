<?php
/**
 * Created by PhpStorm.
 * User: groune mohamed
 * Date: 29/11/2018
 * Time: 16:39
 */

class evenment
{
private $id ;
private $nom ;
private $photo ;
private $dateDebut ;
private $dateFin ;
private $Emplacement ;
private $nombreDePlace ;
private $bd ;

    /**
     * evenment constructor.
     * @param $id
     * @param $nom
     * @param $photo
     * @param $dateDebut
     * @param $dateFin
     * @param $Emplacement
     * @param $nombreDePlace
     * @param $bd
     */
    public function __construct( $id=null,$nom=null,$photo=null,$dateDebut=null,$dateFin=null,$Emplacement=null,$nombreDePlace=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->photo = $photo;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->Emplacement = $Emplacement;
        $this->nombreDePlace = $nombreDePlace;
        $this->bd = ConnexionPDO2::getInstance();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getEmplacement()
    {
        return $this->Emplacement;
    }

    /**
     * @param mixed $Emplacement
     */
    public function setEmplacement($Emplacement): void
    {
        $this->Emplacement = $Emplacement;
    }

    /**
     * @return mixed
     */
    public function getNombreDePlace()
    {
        return $this->nombreDePlace;
    }

    /**
     * @param mixed $nombreDePlace
     */
    public function setNombreDePlace($nombreDePlace): void
    {
        $this->nombreDePlace = $nombreDePlace;
    }

    /**
     * @return null|PDO
     */
    public function getBd(): ?PDO
    {
        return $this->bd;
    }

    /**
     * @param null|PDO $bd
     */
    public function setBd(?PDO $bd): void
    {
        $this->bd = $bd;
    }

    public function addEvent($nom,$photo,$dateDebut,$dateFin,$Emplacement,$nombreDePlace){
        $query = "INSERT INTO `evenement` ( `nom`, `photo`, `dateDebut`, `dateFin`, `Emplacement`, `nombreDePlace`) VALUES (". "'".$nom."',' ".$photo."',' ".$dateDebut."',' ".$dateFin."',' ".$Emplacement."',' ".$nombreDePlace."')";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                'nom' => $nom,
                'photo' => $photo,
                'dateDebut' => $dateDebut,
                'dateFin' => $dateFin,
                'Emplacement' => $Emplacement,
                'nombreDePlace' => $nombreDePlace
            )
        );
    }

    public function deleteEvent($id) {
        $requete = "DELETE FROM `evenement` WHERE `evenement`.`id` = :id";
        $pdoResult = $this->bd->prepare($requete);
        $pdoResult->execute(array(":id" => $id));

    }

    public function updateEvent($nom,$photo,$dateDebut,$dateFin,$Emplacement,$nombreDePlace) {
        $requete = "UPDATE `evenement` SET `nom`=:nom,`photo`=:photo,`dateDebut`=:dateDebut,`dateFin`=:dateFin,`Emplacement`=:Emplacement,`nombreDePlace`=:nombreDePlace WHERE `nom`=:nom";
        $req = $this->bd->prepare($requete);
        $req->execute(
            array(
                'nom' => $nom,
                'photo' => $photo,
                'dateDebut' => $dateDebut,
                'dateFin' => $dateFin,
                'Emplacement' => $Emplacement,
                'nombreDePlace' => $nombreDePlace
            )

        );
    }

    public function select(){
        $query = 'SELECT * FROM `evenement`' ;
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectByID($id){
        $query = 'SELECT * FROM `evenement` WHERE `evenement`.`id` = ' . $id;
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                'id'=> $id,

            )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }
}