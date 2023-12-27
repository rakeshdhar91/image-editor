<?php  session_start();   
include($_SERVER['DOCUMENT_ROOT'].'/DataBase/config.php'); 
     $user_id = $_SESSION['user_id']; 
     $action  = $_POST['action'];
     $frame   = $_POST['frame']; 
     $element = $_POST['element']; 
   
   if($action == 'Frame'){
       
       $select = "select id from wl_deziner_favourite where frame = '$frame'";
       $wert =  mysqli_query($con,$select);
       $res_f = mysqli_fetch_array($wert);
        
       if(empty($res_f['id'])){
          $sql = "INSERT INTO `wl_deziner_favourite`(`user_id`, `frame`,`type`)
                 VALUES ('$user_id','$frame','$element',1)";  
          mysqli_query($con,$sql);
       }
    }
    if($action == 'Element'){
       
       $select = "select id from wl_deziner_favourite where element = '$element'";
       $wert =  mysqli_query($con,$select);
       $res_f = mysqli_fetch_array($wert);
        
       if(empty($res_f['id'])){
          $sql = "INSERT INTO `wl_deziner_favourite`(`user_id`,`element`,`type`)
                 VALUES ('$user_id','$element',2)";  
          mysqli_query($con,$sql);
       }
    }
     if($sql){
         echo 1;
     }
    
    
?>