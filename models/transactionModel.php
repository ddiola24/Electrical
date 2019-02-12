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
}
class recordsModel extends DBconnection {
    function addSales($sales){

    }
    function addPurchase($purchase){

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