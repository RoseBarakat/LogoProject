<?php


    /**
     *
     */
class workshop
{
    public $CodeNum;
    public $Type;
    public $Field;
    public $UserNameDesigner;
    public $Description;
    public $UrlLogo;
    public $Salary;
    public $Name;
    public $dbConn;


    function setField($field){
        $this->Field=$field;
    }
    function getField(){

        return $this->Field;
    }
    function setType($Type){
        $this->Type=$Type;
    }
    function getType(){

        return $this->Type;
    }


     function setDesigner($design){
        $this->UserNameDesigner=$design;
     }
     function getDesigner(){

         return $this->UserNameDesigner;
     }
    function setId($id)
    {
        $this->CodeNum = $id;
    }

    function getId()
    {
        return $this->CodeNum;
    }

    function setTitle($Name)
    {
        $this->Name = $Name;
    }

    function getTitle()
    {
        return $this->Name;
    }

    function setPrice($Salary)
    {
        $this->Salary = $Salary;
    }

    function getPrice()
    {
        return $this->Salary;
    }

    function setDescription($description)
    {
        $this->Description = $description;
    }

    function getDescription()
    {
        return $this->Description;
    }

    function setImage($image)
    {
        $this->UrlLogo = $image;
    }

    function getImage()
    {
        return $this->UrlLogo;
    }

    function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
    }

    function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function __construct($conn)
    {
        $this->dbConn = $conn;
    }


    public function getWorkshopByField()
    {
        $sql = "SELECT * FROM Logo WHERE  Field ='Education'";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindParam('wid', $this->Field);
        $stmt->execute();
        $workshop = $stmt->fetch(PDO::FETCH_ASSOC);
        return $workshop;
    }



}