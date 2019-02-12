<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","electrical");
    $query=mysqli_query($con, "select * from suppliers where supname LIKE '%$key%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['supname'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
