<?php
/**
 * Created by PhpStorm.
 * User: groune mohamed
 * Date: 29/11/2018
 * Time: 16:30
 */

class utilisateur

{   private  $id;
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

    public function selectByEventAndEmail($email ,$event){
        $query = "SELECT * FROM `utilisateurs` WHERE `email`= '".$email." 'AND `event`='".$event."'";
        $reponce = $this->bd->query($query);

        return $reponce->fetchAll(PDO::FETCH_OBJ);
    }
    public function addUserA($email, $nom, $prenom, $telephone, $event){


        $query = "INSERT INTO `utilisateurs` (  `email`, `nom`, `prenom`, `telephone`, `event`) VALUES (". "'".$email."',' ".$nom."',' ".$prenom."',' ".$telephone."',' ".trim($event)."')";
        $reponce = $this->bd->prepare($query);
        $reponce->execute(
            array(
                ':nom' =>$nom,
                ':email' =>$email,
                ':prenom' =>$prenom,
                ':tel' =>$telephone,
                ':event' =>trim($event)
            )
        );
    }
}