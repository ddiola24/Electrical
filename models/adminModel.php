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

    function addMember($member){
        $query = "";
    }
    function deleteMemeber($member){
        $query = "";
    }
    function updateMember($member){
        $query = "";
    }
    function addCollector($collector){
        $query = "";
    }
    function deleteCollector($collector){
        $query = "";
    }
    function updateCollector($collector){
        $query = "";
    }
}
class userModel extends DBconnection {
    function getuser($username){
        $query = "SELECT user_id, username, fname, lname, reg_date ,role FROM user
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