<?php include "DBconnection.php"; 

class loginModel extends DBconnection {

    function goto($string){
        header("$string");
        exit();
    }
    function escape_string($string){
        return mysqli_real_escape_string($this->conn,$string);
    }
    function check_user($username,$password){
        $query = "SELECT * FROM user
        WHERE username = \"".$username."\" AND password = \"".$password."\" LIMIT 1";
        print_r($query);
        $result = mysqli_query($this->conn,$query);
        if(!$result){
            //die("<strong>WARNING:</strong><br>".mysqli_error());
        }
        return (($result->num_rows==1)?TRUE:FALSE);
    }
    function get_user($username,$password){
        $query = "SELECT * FROM user
        WHERE username = \"".$username."\" AND password = \"".$password."\" LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        // if there is an error in your query, an error message is displayed.
        if(!$result) {
            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
        }
        $row = $result->fetch_object();
        return $row;
    }
}
class adminModel extends DBconnection {
    function adduser($user){
        $query = "INSERT INTO `user`(`username`, `password`, `fname`, `mname`, `lname`, `role`) 
        VALUES (\"".$username."\",\"".$password."\",
        \"".$fname."\",\"".$mname."\",\"".$lname."\",\"".$role."\")";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function updateuser($user){
        $query = "UPDATE `user` SET `username`=\"".$username."\",`user_id`=\"".$user_id."\",`password`=\"".$password."\",`fname`=\"".$fname."\",`mname`=\"".$mname."\",`lname`=\"".$lname."\",`regDate`=\"".$regDate."\",`role`=\"".$role."\" WHERE user_id = \"".$user_id."\"";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function deleteuser($userid){
        $query = "DELETE FROM `user` WHERE user-id = $userid";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function getuser(){
        $query="SELECT `username`, `fname`, `mname`, `lname`, `regDate`, `role` FROM `user`";
        $result = mysqli_query($this->conn, $query);
        $res = array();
        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;
    }
}
class userModel extends DBconnection {
    function getuser($username){
        $query = "SELECT user_id, username, fname, lname, regDate ,role FROM user
                WHERE username = \"".$username."\" LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        if(!$result) {
            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
        }
        $row = $result->fetch_object();
        return $row;
    }
}

?>