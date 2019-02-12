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
        $getsup = $db->getsup();
    }
endif;

//product
if($page == "a_prod.php"):
    $getcat = $db->getcat();
    $getsup = $db->getsup();
    $getprod = $db->getprod();
    
endif;
if($submit == "addproduct"):
$product['prodname']= isset($_REQUEST['prodname'])?$_REQUEST['prodname']:NULL;
$product['quantity']= 0;
$product['catid']= isset($_REQUEST['catid'])?$_REQUEST['catid']:NULL;

$addprod = $db->addprod($product);
if($addprod){
    $getprod = $db->getprod();
}
endif;

//category
if($submit == "addcat"):
    $category['catname']= isset($_REQUEST['catname'])?$_REQUEST['catname']:NULL;
    $addcat = $db->addcat($category);
    header("location: ../views/a_prod.php");
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

if($submit == "addsales"):
endif;

if($submit == "addpurchase"):
    $purchase['supplier']= isset($_REQUEST['supplier'])?$_REQUEST['supplier']:NULL;
    $purchase['qty']= isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
    $purchase['cost']= isset($_REQUEST['cost'])?$_REQUEST['cost']:NULL;

    print_r($purchase);
endif;

?>