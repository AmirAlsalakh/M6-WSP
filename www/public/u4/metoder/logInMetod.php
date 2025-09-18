<?php
include('egytalk/inc/dbFunctions.php');

class UserAuth
{
    public function login($username, $password)
    {

        $username = filter_var($username, FILTER_UNSAFE_RAW);
        $password = $password;

        $db = dbConnect();

        $stmt = $db->prepare("SELECT * FROM user WHERE username = :user");
        $stmt->bindValue(":user", $username);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['inloggad'] = true;
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['surname'] . " " . $user['firstname'];

                return true;
                exit();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}