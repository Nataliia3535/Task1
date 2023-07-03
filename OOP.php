<?php

class OOP{

    private $servername="localhost";
    private $username="root";
    private $password="";
    private $db="test1task";
    private $conn;
    private $successAdd = " Your Record Have Been Added";
    private $updatedSuccess = " Your Record Have Been Updated";
    private $deletedSuccess = " Your Record Have Been Deleted";



    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password,$this->db);
        if(!$this->conn)
        {
            die("their is an error in connection of db ". mysqli_connect_error());
        }
    }
    

    public function addTask($sql)
    {
        if(mysqli_query($this->conn,$sql))
        {
            return $this->successAdd;
        }
        else 
        {
            die("Error : " . mysqli_error($this->conn));
        }
    }

    public function getTasks($table)
    {
        $sql = "SELECT  * FROM $table ORDER BY priority DESC";
        $result = mysqli_query($this->conn, $sql);
        $array = array();
        if (mysqli_query($this->conn, $sql)) 
        {
            if (mysqli_num_rows($result) > 0) 
            {
                
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $array[] = $row;
                }
            } 
            return $array;
        }
        else 
        {
            return  die("Error : " . mysqli_error($this->conn));
        }
    
    }
    public function find($table,$id)
    {
        $id = filter_var($id,FILTER_VALIDATE_INT);
        $sql = "SELECT * FROM $table WHERE `id`='$id' LIMIT 1 ";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_query($this->conn,$sql))
        { 
            if (mysqli_num_rows($result) > 0) 
            {
              return mysqli_fetch_assoc($result);
            }
            else 
            {
                return false;
            }
        }
        else 
        {
            return die("Error : ".mysqli_error($this->conn));
        }
    }






    // update data in db 
    public function completeTask($sql)
    {
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_query($this->conn,$sql))
        { 
            return $this->updatedSuccess;
        }
        else 
        {
            return die("Error : ".mysqli_error($this->conn));
        }
    }
    public function deleteTask($table,$id)
    {
        $sql = "DELETE FROM $table WHERE `id`='$id' ";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_query($this->conn,$sql))
        { 
            return $this->deletedSuccess;
        }
        else 
        {
            return die("Error : ".mysqli_error($this->conn));
        }
    }










}































?>