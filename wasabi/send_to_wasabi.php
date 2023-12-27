<?php session_start();   

require  $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: GET");


use Aws\S3\S3Client;
use Aws\Exception\AwsException;
 
function file_upload($con, $thumbnail, $thumb_url)
{
    
    
    $pathThumbnailWasabi = "https://viraldashboardimages.s3.us-west-1.wasabisys.com/".$thumbnail;
    $thumbBucketName = "viraldashboardimages";
    
    $awsEndpoint ='http://s3.us-west-1.wasabisys.com';
    $IAM_KEY = 'Y402BS62VJZDIVZR7AJL';
    $IAM_SECRET = 'bsrawt9r2yqtu4YzzY5Ei0aD7seM8aJURm5AUZaG';
    
    try {
            
        		$s3 = S3Client::factory(
        			array(
        			    
        				'credentials' => array(
        					'key' => $IAM_KEY,
        					'secret' => $IAM_SECRET
        				),
        				'version' => 'latest',
        				'region'  => 'us-west-1',
        				'endpoint' => 'http://s3.us-west-1.wasabisys.com',
        			)
        		);
        		
        
        	} catch (Exception $e) {
        
        		die("Error: " . $e->getMessage());
        	}
    
    try{
            $result1 = $s3->putObject(
            	array(
                
            		'Bucket'=>$thumbBucketName,
            		'Key' =>  $thumbnail,
            		'SourceFile' => $thumb_url,
            		'StorageClass' => 'REDUCED_REDUNDANCY',
            	)
            );
        } catch (S3Exception $e) {
    		die('Error:' . $e->getMessage());
    		$fail1='fail';
    	} catch (Exception $e) {
    		die('Error:' . $e->getMessage());
    		$fail2='fail';
    	}
    
    //var_dump($result1);
    
    if(file_exists($thumb_url))
    {
        unlink($thumb_url);
    }
    
    return $pathThumbnailWasabi;
}
 
 
?>