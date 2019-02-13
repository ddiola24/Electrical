<?php session_start();  
if( !isset($_SESSION['username']) && !isset($_SESSION['password']) && $_SESSION['role'] != 'admin'){
  header("location: ../index.php");
} 
unset($_SESSION['page']);
$_SESSION['page'] =  basename($_SERVER['PHP_SELF']);
include "../controllers/transactionFunction.php"; 
$db = new userModel();
$data =$db->getuser($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 
    <title>| PRODUCTS</title>
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="../build/js/typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
  });
    </script>


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- FAVICON-->
    <link rel="icon" href="..vendors/img/favicon.png">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="a_home.php" class="site_title"><img src="../vendors/img/favicon.png" width="50px" height="50px">   Electrical Shop</span></a>
            </div>

            <div class="clearfix"></div>

            

            <?php include "structure/sidemenu.php";
            include "structure/topnav.php"; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Products </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                  <!-- button -->
                    <div class="btn-toolbar">
                      <div class="btn-group">
                        <button class="btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> Add Product </button>
                        <!-- Add Product -->
                          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">ADD PRODUCT</h4>
                                </div>
                                <div class="modal-body">
                                  <!-- form -->
                                  <form action="<?php $_PHP_SELF ?>" method="POST" id="demo-form" data-parsley-validate onsubmit="return confirm('Are you sure you want to submit?');">
                                  <label for="prodname">Product Name * </label>
                                  <input type="text" id="prodname" class="form-control" name="prodname" required />

                                  <label for="category">Category</label>
                                    <select name="catid" class="form-control">
                                      <?php error_reporting(E_ERROR | E_PARSE); foreach ($getcat as $index => $cat): ?>
                                      <option value="<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" value="addproduct" class="btn btn-primary">Save changes</button>
                                </div>
                                  </form>
                                    <!-- form -->
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- add product -->

                        <button class="btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg2"> Add Category </button>
                        <!-- Add Category -->
                          <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">ADD CATEGORY</h4>
                                </div>
                                <div class="modal-body">
                                  <!-- form -->
                                  <form action="<?php $_PHP_SELF ?>" method="POST" id="demo-form" data-parsley-validate onsubmit="return confirm('Are you sure you want to submit?');">
                                  <label for="catname">Category Name * </label>
                                  <input type="text" id="catname" class="form-control" name="catname" required />

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" value="addcat" class="btn btn-primary">Save changes</button>
                                </div>
                                  </form>
                                    <!-- form -->
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- add category -->

                        <button class="btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg3"> Add Sales </button>
                        <!-- Add Sales -->
                          <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">ADD SALES</h4>
                                </div>
                                <div class="modal-body">
                                  <!-- form -->
                                  <form action="<?php $_PHP_SELF ?>" method="POST" id="demo-form" data-parsley-validate>

                                  <label for="category">Product</label>
                                    <select name="product" class="form-control">
                                      <?php error_reporting(E_ERROR | E_PARSE); foreach ($getprod as $index => $prod): ?>
                                      <option value="<?php echo $prod['prodid']; ?>"><?php echo $prod['prodname']; ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                  <label for="category">Customer</label>
                                    <select name="customer" class="form-control">
                                      <?php error_reporting(E_ERROR | E_PARSE); foreach ($getcustomer as $index => $customer): ?>
                                      <option value="<?php echo $customer['cusid']; ?>"><?php echo $customer['fname']." ".$customer['mname']." ".$customer['lname']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <label for="qty">Quantity * </label>
                                  <input type="number" id="qty" class="form-control" name="qty" required />

                                  <label for="catname">Cost * </label>
                                  <input type="number" id="cost" class="form-control" name="cost" required />

                                  <label for="quantity">Remarks * </label>
                                  <textarea id="remarks" required="required" class="form-control" name="remarks" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" data-parsley-id="4463"></textarea>
                                  

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" value="addsale" class="btn btn-primary">Save changes</button>
                                </div>
                                  </form>
                                    <!-- form -->
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- add sales -->

                        <button class="btn btn-dark" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg4"> Add Purchase </button>
                        <!-- Add Purchase -->
                          <div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">ADD PURCHASE</h4>
                                </div>
                                <div class="modal-body">
                                  <!-- form -->
                                  <form  action="<?php $_PHP_SELF ?>" method="POST" id="demo-form" data-parsley-validate onsubmit="return confirm('Are you sure you want to submit?');">

                                  <label for="category">Product</label>
                                    <select name="product" class="form-control">
                                      <?php error_reporting(E_ERROR | E_PARSE); foreach ($getprod as $index => $prod): ?>
                                      <option value="<?php echo $prod['prodid']; ?>"><?php echo $prod['prodname']; ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                  <label for="category">Supplier</label>
                                    <select name="supplier" class="form-control">
                                      <?php error_reporting(E_ERROR | E_PARSE); foreach ($getsup as $index => $sup): ?>
                                      <option value="<?php echo $sup['supid']; ?>"><?php echo $sup['supname']; ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                  <label for="catname">Quantity * </label>
                                  <input type="number" id="qty" class="form-control" name="qty" required />

                                  <label for="catname">Cost * </label>
                                  <input type="number" id="cost" class="form-control" name="cost" required />

                                  <label for="quantity">Remarks * </label>
                                  <textarea id="remarks" required="required" class="form-control" name="remarks" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" data-parsley-id="4463"></textarea>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" value="addpurchase" class="btn btn-primary" >Save changes</button>
                                </div>
                                  </form>
                                    <!-- form -->
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- add purchase -->

                      </div>
                    </div>
                  <!-- button -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start product list -->
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Stock on Hand</th>
                          <th>Price from Supplier</th>
                          <th>Actual Price</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($getprod as $index => $prod): ?>
                        <tr>
                          <td> <?php echo $prod['prodid']; ?> </td>
                          <td> <?php echo $prod['prodname']; ?> </td>
                          <td> <?php echo $prod['catname']; ?> </td>
                          <td> <?php echo $prod['quantity']; ?> </td>
                          <td> <?php echo $prod['cost']; ?> </td>
                          
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                    <!-- end product list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


        <!-- footer content -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
     <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <?php print_r($_SESSION['script']); ?>
    <script type="text/javascript">
   
      function notifyUser(message) {
          if(message == "success") {
              new PNotify({
                title: 'Adding Success',
                text: 'Successfully Added Sales on Record',
                type: 'success',
                styling: 'bootstrap3'
              });
          } else {
              new PNotify({
                  title: 'Adding Error',
                text: 'Trying to sell more than your current Stock on Hand.',
                type: 'error',
                styling: 'bootstrap3'
              }); 
          }
      }
      
    </script>
    <?php unset($_SESSION['script']); ?>
	
  </body>
</html>
