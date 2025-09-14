<?php
class UserAuth
{
    public function username($username){
        include('egytalk/inc/dbFunctions.php');

        $db = dbConnect();

        $stmt = $db->prepare("SELECT * FROM user WHERE username = :user");
        $stmt->bindValue(":user", $username);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }
}