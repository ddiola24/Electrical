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
    $getcustomer = $db->getcustomers();
    
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
    if($addcustomer){
        $_SESSION['script'] = "<script type='text/javascript'>
        $(document).ready(function(e) {
            notifyUser('success_addcustomer');
        });
        </script>";
    }else{
        $_SESSION['script'] = "<script type='text/javascript'>
        $(document).ready(function(e) {
            notifyUser('failed_addcustomer');
        });
        </script>";
    }
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
    $user['role']= isset($_REQUEST['role1'])?$_REQUEST['role1']:NULL;
    if(!$user['role']){
        $user['role']= isset($_REQUEST['role2'])?$_REQUEST['role2']:NULL;
    }
    print_r($user);
    $adduser = $db->adduser($user);
    if($adduser){
    $_SESSION['script'] = "<script type='text/javascript'>
    $(document).ready(function(e) {
    notifyUser('success');
    });
    </script>";
    }else{
    $_SESSION['script'] = "<script type='text/javascript'>
    $(document).ready(function(e) {
        notifyUser('failed');
    });
    </script>";
    }
endif;

if($submit == "addsale"):
    $record = new recordsModel();
    $getprod = $db->getprod();

    $currstock = $getprod['0']['quantity'];
    $sales['qty']= isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
    $sales['cusid']= isset($_REQUEST['customer'])?$_REQUEST['customer']:NULL;
     $sales['cost']= isset($_REQUEST['cost'])?$_REQUEST['cost']:NULL;
    $sales['prodid']= isset($_REQUEST['product'])?$_REQUEST['product']:NULL;
    $sales['remarks']= isset($_REQUEST['remarks'])?$_REQUEST['remarks']:NULL;
    $sales['transtype']= 'sale';
    echo "Current:".$currstock."Incoming: ".$sales['qty'];
    if($currstock != 0){
        if($sales['qty']>$currstock){
        $_SESSION['script'] = "<script type='text/javascript'>
        $(document).ready(function(e) {
            notifyUser('failed');
        });
        </script>";
        }else{
            $sales['stock'] = $currstock-$sales['qty'];
            $addsale = $record->addSales($sales);
            if($addsale){
                $updateprod = $db->updateprod($sales['prodid'],$sales['stock']);
                $_SESSION['script'] = "<script type='text/javascript'>
                $(document).ready(function(e) {
                    notifyUser('success');
                });
                </script>";
                $getprod = $db->getprod();
            }
        }
    }else{$_SESSION['script'] = "<script type='text/javascript'>
        $(document).ready(function(e) {
            notifyUser('failed');
        });
        </script>";}
endif;

if($submit == "addpurchase"):
    $record = new recordsModel();

    $getprod = $db->getprod();

    $currstock = $getprod['0']['quantity'];
    $purchase['prodid']= isset($_REQUEST['product'])?$_REQUEST['product']:NULL;
    $purchase['supid']= isset($_REQUEST['supplier'])?$_REQUEST['supplier']:NULL;
    $purchase['qty']= isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
    $purchase['stock'] = $purchase['qty']+$currstock;
    $purchase['cost']= isset($_REQUEST['cost'])?$_REQUEST['cost']:NULL;
    $purchase['transtype']= 'purchase';
    $purchase['remarks']= isset($_REQUEST['remarks'])?$_REQUEST['remarks']:NULL;

    $addpurchase = $record->addpurchase($purchase);
    if($addpurchase){
        $updateprod = $db->updateprod($purchase['prodid'],$purchase['stock']);
        $getprod = $db->getprod();
    }
endif;

if($page == "a_transList.php"){
    $record = new recordsModel();
    $getRecords = $record->getRecord();
}

if($page == "a_home.php"){
    $getuser = $db->getuser();
    //print_r($getuser);
}

if($submit == "delete"){
    $userid = isset($_REQUEST['user_id'])?$_REQUEST['user_id']:NULL;
    $deleteuser = $db->deleteuser($userid);
    $getuser = $db->getuser();
}

?>