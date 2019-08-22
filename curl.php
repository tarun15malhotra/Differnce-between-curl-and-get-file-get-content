
<?php 

/*

# Differnce between curl and get file get content
=================================================

1. Curl is a much faster alternative to file_get_contents.

2. file_get_contents - It is a function to get the contents of a file but  curl - It is a library to do more operations,
   for example get the contents like file_get_contents, sending and receiving data from one site to another site.
   
3. it also supports different types of protocols like http, https, ftp, gopher, telnet, dict, file, and ldap. 
curl also supports HTTPS certificates, HTTP POST, HTTP PUT, FTP uploading HTTP form based upload, proxies, cookies.



*/

#**************************************************************************************#

	#Post using File Get Content
	
	$url= 'http://lastcall.org/cdg/lastcall1/NewApi/login.json';
	
	$postdata = http_build_query(
        array(
		'email'=>'ashi13@gmail.com',
		'password'=>'123456'
		)
	);

	$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-Type: application/x-www-form-urlencoded',
			'header'  => 'token: 5c3ef0a4bb90a7et43c29b17b4c431b7e6',
			'content' => $postdata
		)
	);

	$context  = stream_context_create($opts);

	$result = file_get_contents($url, false, $context);
	$result = json_decode($result);
	print_r($result);


#**************************************************************************************#
    
	#Get using File Get Content
	
	
	$result = file_get_contents("https://jsonplaceholder.typicode.com/users");
	$result = json_decode($result);
	print_r($result); 
	


#**************************************************************************************#

	#Curl Get Request
	
	
	//$header[]='Accept:application/json';
	//$header[]='Content-Type:application/json';


	//$url ='https://jsonplaceholder.typicode.com/todos/1';
	$url ='https://jsonplaceholder.typicode.com/users';


	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

	$result = curl_exec ($ch);
	curl_close ($ch);
	$result = json_decode($result);
	print_r($result); 
	//print_r($result[0]->name); 
	
	
#**************************************************************************************#

	#Curl Post Request
	
	
	//$header[]='Accept:application/json';
	//$header[]='Content-Type:application/json';

	$url ='http://lastcall.org/cdg/lastcall1/Api/get_profile.json';

	$saveArray = array('user_id'=>'953');
	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $saveArray);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

	$result = curl_exec ($ch);
	curl_close ($ch);
	$result = json_decode($result);
	print_r($result);
	

#**************************************************************************************#	
