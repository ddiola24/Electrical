 <?php include "../models/DBconnection.php"; 


class transactionModel extends DBconnection {


    function addcat($category){
        $query = "INSERT INTO `category`(`catname`) VALUES (\"".$category['catname']."\")";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function getcat(){
        $query = "SELECT * FROM category`";
        $result = mysqli_query($this->conn, $query);
        $res = array();
        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;
    }

    function getsup(){
        $query = "SELECT * FROM suppliers`";
        $result = mysqli_query($this->conn, $query);
        $res = array();
        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;
    }
    function addsup($supplier){
        $query = "INSERT INTO `suppliers`( `supname`, `address`, `contnum`, `email`) 
        VALUES (\"".$supplier['name']."\",\"".$supplier['address']."\",\"".$supplier['contnum']."\",\"".$supplier['email']."\")";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }

    function addprod($product){
        $query = "INSERT INTO `products`(`prodname`, `quantity`, `catid`) VALUES (\"".$product['prodname']."\",\"".$product['quantity']."\",\"".$product['catid']."\")";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function getprod(){
        $query = "SELECT * FROM products JOIN category on category.catid = products.catid";
        $result = mysqli_query($this->conn, $query);
        $res = array();
        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;
    }
    function updateprod($id,$qty){
        $query="UPDATE `products` SET `quantity`=$qty WHERE prodid = $id";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }

    function addcustomer($customer){
        $query = "INSERT INTO `customer`( `fname`, `mname`, `lname`, `address`, `contnum`) 
        VALUES (\"".$customer['fname']."\",\"".$customer['mname']."\",\"".$customer['lname']."\",\"".$customer['address']."\",\"".$customer['contnum']."\")";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function getcustomers(){
        $query = "SELECT * FROM customer`";
        $result = mysqli_query($this->conn, $query);
        $res = array();
        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;
    }

    function adduser($user){
        $query= "INSERT INTO `user`(`username`,`password`, `fname`, `mname`, `lname`,`role`) 
        VALUES (\"".$user['username']."\",\"".$user['password']."\",\"".$user['fname']."\",\"".$user['mname']."\",\"".$user['lname']."\",\"".$user['role']."\")";
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function getuser(){
         $query = "SELECT * FROM user";
        $result = mysqli_query($this->conn, $query);
        $res = array();
        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;
    }
    function deleteuser($userid){
        $query="DELETE FROM `user` WHERE user_id = $userid";
        print_r($query);
        $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
}
class recordsModel extends DBconnection {
    function addSales($sales){
        $query="INSERT INTO `record`(`transtype`, `quantity`, `cost`,  `stock`, `remarks`, `prodid`,`cusid`) VALUES (\"".$sales['transtype']."\",\"".$sales['qty']."\",\"".$sales['cost']."\",\"".$sales['stock']."\",\"".$sales['remarks']."\",\"".$sales['prodid']."\",\"".$sales['cusid']."\")";
         $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function addPurchase($purchase){
        $query="INSERT INTO `record`(`transtype`, `quantity`, `cost`, `stock`, `remarks`, `prodid`,`supid`) VALUES (\"".$purchase['transtype']."\",\"".$purchase['qty']."\",\"".$purchase['cost']."\",\"".$purchase['stock']."\",\"".$purchase['remarks']."\",\"".$purchase['prodid']."\",\"".$purchase['supid']."\")";
         $result = mysqli_query($this->conn, $query);
            if(!$result) {
                die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                return FALSE;
            }
            return TRUE;
    }
    function getRecord(){
        $query = "SELECT *,record.quantity as recquantity FROM record JOIN products ON products.prodid = record.prodid LEFT JOIN customer ON customer.cusid = record.cusid LEFT JOIN suppliers ON suppliers.supid = record.supid";
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