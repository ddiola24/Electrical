<?php include "../models/transactionModel.php";
$submit = isset($_REQUEST['submit'])?$_REQUEST['submit']:NULL;
$db = new transactionModel();

$page = isset($_SESSION['page'])?$_SESSION['page']:NULL;


//supplier
if($page =="a_sup.php"):
    $getsup = $db->getsup();
endif;

if($submit == "addsup"):
    $supplier['name'] = isset($_REQUEST['supname'])?$_REQUEST['supname']:NULL;
    $supplier['address'] = isset($_REQUEST['address'])?$_REQUEST['address']:NULL;
    $supplier['contnum'] = isset($_REQUEST['contnum'])?$_REQUEST['contnum']:NULL;
    $supplier['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:NULL;

    $addsup = $db->addsup($supplier);
    if($addsup){
        echo "Hello";
    }
endif;

//product
if($page == "a_prod.php"):
    $getcat = $db->getcat();
    $getsup = $db->getsup();
    $getprod = $db->getprod();
    
endif;
if($submit == "addproduct"):
$product['name']= isset($_REQUEST['prodname'])?$_REQUEST['prodname']:NULL;
$product['quantity']= isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
$product['product_category']= isset($_REQUEST['prodcat'])?$_REQUEST['prodcat']:NULL;
$product['price']= isset($_REQUEST['price'])?$_REQUEST['price']:NULL;
endif;

//category
if($submit == "addcat"):
$category['name']= isset($_REQUEST['catname'])?$_REQUEST['catname']:NULL;
$addcat = $db->addcat($category);

endif;

//customer
if($submit == "addcustomer"):
$customer['fname']= isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
$customer['mname']= isset($_REQUEST['mname'])?$_REQUEST['mname']:NULL;
$customer['lname']= isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
$customer['address']= isset($_REQUEST['address'])?$_REQUEST['address']:NULL;
$customer['contnum']= isset($_REQUEST['contnum'])?$_REQUEST['contnum']:NULL;

$addcustomer = $db->addcustomer($customer);

endif;
if($page == "a_cus.php"):
    $getcustomers = $db->getcustomers();
endif;

//user
if($submit == "adduser"):
$user['username']= isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
$user['password']= isset($_REQUEST['password'])?$_REQUEST['password']:NULL;
$user['fname']= isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
$user['lname']= isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
$user['mname']= isset($_REQUEST['mname'])?$_REQUEST['mname']:NULL;
$user['contact']= isset($_REQUEST['contact'])?$_REQUEST['contact']:NULL;
$user['role1']= isset($_REQUEST['role1'])?$_REQUEST['role1']:NULL;
if(!$user['role1']){
    $user['role2']= isset($_REQUEST['role2'])?$_REQUEST['role2']:NULL;
}
endif;






















$action = isset($_REQUEST['action'])?$_REQUEST['action']:NULL;
//print_r($action);

$tm = new transactionModel();

$user= isset($_REQUEST['user'])?$_REQUEST['user']:NULL;
//print_r($user);

if($action == 'transact'){
    $transaction['fullid']= isset($_REQUEST['fullid'])?$_REQUEST['fullid']:NULL;
    $transcation['amtpayment']= isset($_REQUEST['amtpayment'])?$_REQUEST['amtpayment']:NULL;
    $transcation['userID']= isset($_REQUEST['userID'])?$_REQUEST['userID']:NULL;
    $transcation['memberID']= isset($_REQUEST['memberID'])?$_REQUEST['memberID']:NULL;

    // $account = $tm->getaccount($transaction);
    // if($getaccount != null){
    //     $addtransaction = $tm->addtrans($transaction,$account);
    // }
    
}
//print_r($action);
if($action == 'addmember'){
    $memberID = rand(100,1000);
    $checkID = $tm->checkid($memberID);
    
    $member['memberID']= $memberID;
    $member['fname']= isset($_REQUEST['first-name'])?$_REQUEST['first-name']:NULL;
    $member['lname']= isset($_REQUEST['last-name'])?$_REQUEST['last-name']:NULL;
    $member['mname']= isset($_REQUEST['middle-name'])?$_REQUEST['middle-name']:NULL;
    $member['contact']= isset($_REQUEST['contact-num'])?$_REQUEST['contact-num']:NULL;
    $member['street']= isset($_REQUEST['street'])?$_REQUEST['street']:NULL;
    $member['barangay']= isset($_REQUEST['barangay'])?$_REQUEST['barangay']:NULL;
    $member['province']= isset($_REQUEST['province'])?$_REQUEST['province']:NULL;
    $member['city']= isset($_REQUEST['city'])?$_REQUEST['city']:NULL;
    $member['zcode']= isset($_REQUEST['zcode'])?$_REQUEST['zcode']:NULL;
    $member['country']= isset($_REQUEST['country'])?$_REQUEST['country']:NULL;
    $member['gender']= isset($_REQUEST['gender'])?$_REQUEST['gender']:NULL;
    $member['address'] = $member['street'].",".$member['barangay'].",".$member['province'].",".$member['city'].",".$member['country']." ".$member['zcode'];
    $member['rating']= "1";

    $addmember = $tm->addmember($member);
    if($addmember){
        echo "MEMBER ADDED";
        //header("location: ./home.php");
    }

}
?>