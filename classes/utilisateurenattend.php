<?php
/**
 * Created by PhpStorm.
 * User: groune mohamed
 * Date: 30/11/2018
 * Time: 10:27
 */

class utilisateurenattend
{
    private  $id;
    private $email;
    private $nom;
    private $prenom;
    private $telephone;
    private $event;
    private $bd;

    /**
     * utilisateur constructor.
     * @param $id
     * @param $email
     * @param $nom
     * @param $prenom
     * @param $telephone
     * @param $event
     * @param $bd
     */
    public function __construct($id=null, $email=null, $nom=null, $prenom=null, $telephone=null, $event=null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->event = $event;
        $this->bd =ConnexionPDO2::getInstance() ;
    }

    /**
     * utilisateur constructor.
     * @param $id
     * @param $email
     * @param $nom
     * @param $prenom
     * @param $telephone
     * @param $event
     * @param $bd
     */


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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event): void
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getBd()
    {
        return $this->bd;
    }

    /**
     * @param mixed $bd
     */
    public function setBd($bd): void
    {
        $this->bd = $bd;
    }


    public function selectByEvent($event){
        $query = "SELECT * FROM `utilisateurs` WHERE `event`='". $event. "' ";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                'event'=> $event,
            )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }


    public function select(){
        $query = "SELECT * FROM `utilisateurenattend`  ";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(

            )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectByID($id){
        $query = "SELECT * FROM `utilisateurenattend` WHERE `id`='". $id. "' ";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                'id'=> $id,
            )
        );
        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteUser($id) {
        $requete = "DELETE FROM `utilisateurenattend` WHERE `utilisateurenattend`.`id` = :id";
        $pdoResult = $this->bd->prepare($requete);
        $pdoResult->execute(array(":id" => $id));

    }

    public function addUser($email, $nom, $prenom, $telephone, $event){


        $query = "INSERT INTO `utilisateurenattend` (  `email`, `nom`, `prenom`, `telephone`, `event`) VALUES (". "'".$email."',' ".$nom."',' ".$prenom."',' ".$telephone."',' ".$event."')";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                ':nom' => $nom,
                ':email' => $email,
                ':prenom' => $prenom,
                ':tel' => $telephone,
                ':event' => $event
            )
        );
    }

}