<?php
Class Users{
    public $Id,$UserName,$Password,$Name,$Email,$Address,$Admin;
    public function __construct($Id=0,$UserName="",$Password="",$Name="",$Email="",$Address="",$Admin=0){
        $this->Id=$Id;
        $this->UserName=$UserName;
        $this->Password=$Password;
        $this->Name=$Name;
        $this->Email=$Email;
        $this->Address=$Address;
        $this->Admin=$Admin;
    }
    public static function getUsers($sql){
        global $pdo;
        $user=$pdo->query($sql);
        $arrUser=array();	
        foreach($user->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $user=new Users();
            foreach($row as $key=>$pro){
                $user->{$key}=$row[$key];
            }
            $arrUser[]=$user;
        }
        return $arrUser;
    }
    public static function getById($id) {
        global $pdo;
    
        // Use a prepared statement to avoid SQL injection
        $sql = "SELECT * FROM `user` WHERE Id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        // Execute the statement
        if ($stmt->execute()) {
            // Fetch the result
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                // Only proceed if a row was returned
                $user = new Users();
                foreach ($row as $key => $value) {
                    $user->{$key} = $value;
                }
                return $user;
            } else {
                // No row was returned
                return null;
            }
        } else {
            // Query execution failed
            return null;
        }
    }
    
    public static function insert($UserName, $Password, $Name, $Email, $Address, $Admin){
        global $pdo;
        $sql="INSERT INTO `user`(`UserName`, `Password`, `Name`, `Email`, `Address`, `Admin`) 
        VALUES (?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$UserName, $Password, $Name, $Email, $Address, $Admin]);
    }
    public static function update($Name, $Email, $Address,$Id){
        global $pdo;
        $sql="UPDATE `user` SET `Name`=?,
        `Email`=?,`Address`=? WHERE `Id`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Name, $Email, $Address,$Id]);
    }
    public static function updatePassword($pass,$Id){
        global $pdo;
        $sql="UPDATE `user` SET `Password`=? WHERE `Id`=?";
        $stmt = $pdo->prepare($sql);
        echo $pass;
        $stmt->execute([$pass,$Id]);
    }
    public static function delete($Id){
        global $pdo;
        $sql="DELETE FROM `user` WHERE Id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Id]);
    }
}