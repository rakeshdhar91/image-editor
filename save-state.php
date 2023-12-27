<?php session_start(); 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include($_SERVER['DOCUMENT_ROOT'].'/DataBase/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/deziner_new/design/wasabi/send_to_wasabi.php');
       
     $token =md5(uniqid());  
     $template = $_POST['template'];
     $token_ = $_POST['token']; 
     $template_name = $_POST['template_name']; 
    //  echo $template;
    //  die;
  if(!empty($template)){ 
       
    $image = $_POST['image'];
    $image_parts = explode(";base64,", $image);  
    $imagebase64 = base64_decode($image_parts[1]); 
    $user_id = $_SESSION['user_id']; 
 
    $json_path    = $_SERVER['DOCUMENT_ROOT'].'/deziner_new/design/files/templates/json/'.$token.'.json'; //thumbnail image location
    file_put_contents($json_path, $template); 
    $json_spath = file_upload($con,$token.'.json',$json_path);
    
    $img_path    = $_SERVER['DOCUMENT_ROOT'].'/deziner_new/design/files/templates/img/'.$token.'.png'; //thumbnail image location
    file_put_contents($img_path, $imagebase64);
    $img_spath = file_upload($con,$token.'.jpg',$img_path);
      
    // $json_spath = 'files/templates/json/'.$token.'.json';
    // $img_spath = 'deziner_new/design/files/templates/img/'.$token.'.png'; 
    
    if($user_id =='7091'){
         $superadmin =1;
          if(!empty($_POST['cat_id'])){
               $cat_id = $_POST['cat_id'];
           }else{
               $cat_id = '7';
           }
           if(!empty($_POST['sub_id'])){
               $sub_id = $_POST['sub_id'];
           }else{
               $sub_id = '0';
           }
    }else{
        $superadmin =0;
        $cat_id = '7';
        $sub_id = '0';
    }
    
    $sel = "select id,img_path,json_path from vd_deziner_image_uploads where token ='$token_' and superadmin = 0"; 
    $qwet = mysqli_query($con,$sel);
    $rew = mysqli_fetch_array($qwet);
    if(isset($rew['id']) && !empty($rew['id'])){
         
        $token_id = $rew['id'];
        $token_img_path = $rew['img_path'];
        $token_json_path = $rew['json_path'];
        
        // $token_json_path = $_SERVER['DOCUMENT_ROOT'].'/deziner_new/design/'.$token_json_path;
        // $token_img_path  = $_SERVER['DOCUMENT_ROOT'].'/'.$token_img_path;
        
        include($_SERVER['DOCUMENT_ROOT'].'/deziner_new/design/wasabi/delete_send.php');
        $ert = delete_send($con,$token_img_path,'viraldashboardimages');
        delete_send($con,$token_json_path,'viraldashboardimages');
        echo $ert;
        $sql = "update vd_deziner_image_uploads set img_path ='$img_spath' ,json_path = '$json_spath',template_name = '$template_name' where id = '$token_id'";
        mysqli_query($con,$sql);
        
    }else{ 
         $sql = "INSERT INTO `vd_deziner_image_uploads`( `token`, `user_id`, `json_path`, `img_path`, `thumbnail`,`superadmin`,`cat_id`,`sub_id`,`template_name`)
               VALUES ('$token','$user_id','$json_spath','$img_spath','','$superadmin','$cat_id','$sub_id','$template_name')";  
         mysqli_query($con,$sql);
    }
     if($sql){
         echo 1;
     }
    }
    
?>