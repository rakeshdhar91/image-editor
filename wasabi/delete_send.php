<?php session_start(); ?>
<?php
require  $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: GET");


use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\ElasticTranscoder\ElasticTranscoderClient;


function delete_send($con, $del_video_name, $bucketName)
{
    //$bucketName = 'stockhuntvideo';
	$IAM_KEY = 'Y402BS62VJZDIVZR7AJL';
	$IAM_SECRET = 'bsrawt9r2yqtu4YzzY5Ei0aD7seM8aJURm5AUZaG';
	
	
	######### aws connection
		$s3 = S3Client::factory(
		array(
			'credentials' => array(
				'key' => $IAM_KEY,
				'secret' => $IAM_SECRET
			),
			'version' => 'latest',
			'region'  => 'us-west-1',
			'endpoint'=>'https://s3.us-west-1.wasabisys.com/'
		)
	);
	 
	try {
            
        $result = $s3->deleteObject([
            'Bucket' => $bucketName,
            'Key'    => $del_video_name
        ]);

        //var_dump($result);
	} catch (Exception $e) {

		die("Error: " . $e->getMessage());
	}
    
}
 

