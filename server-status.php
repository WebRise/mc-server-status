<?php

// Welcome to the MCAPI server status query.
// I do not take credit for the MCAPI website or any of its functions.
// made my mathhulk (https://theartex.net)

function status($enabled = 'false') { //Enable this option to acquire extensive statistics. Only works if enable-query is set to true. (accepts true/false)
	//Create a function to return values.
	
	$server = array(
		'ip'=>'mc.theartex.net', //Enter the IP of the server you wish to query.
		'port'=>'25565'); //Enter the port of the server you wish to query.
		
	if(empty($server['ip']) || empty($server['port'])) { //Verify that default options are set.

			$status = array(
				'connection'=>'error', //Set the connection to error to enable checking.
				'error'=>'Failed to get contents from url (missing IP or port)'); //Grab the error of the response.
				
	} elseif($enabled == 'true') { // Grab extra statistics.
		
		$query = array(
			'address'=>'https://mcapi.ca/query/'.$server["ip"].':'.$server["port"].'/extensive', //Grab statistics from URL.
			'icon'=>'https://mcapi.ca/query/'.$server["ip"].':'.$server["port"].'/icon'); //Grab icon from URL.
			
		$response = json_decode(file_get_contents($query['address']), true); //Decode the JSON response.
		
		if($response['status'] == false) { //Make sure that the API connected to the server.
			
			$status = array(
				'connection'=>'error', //Set the connection to error to enable checking.
				'error'=>$response['error'], //Grab the error of the response.
				'ip'=>$response['hostname'],
				'port'=>$response['port']);
				
		} else {
			
			$status = array(
				'connection'=>'online', //Set the connection to error to enable checking.
				'error'=>'Connection available (no error to define)', //Grab the error of the response.
				'ip'=>$response['hostname'],
				'port'=>$response['port'],
				'minecraft'=>$response['version'],
				'server'=>$response['software'],
				'online_players'=>$response['players']['online'],
				'max_players'=>$response['players']['max'],
				'players'=>$response['list'], //This value must be looped.
				'plugins'=>$response['plugins'], //This value must be looped.
				'motd'=>$response['motd'], 
				'map'=>$response['map'], //Returns the default world.
				'icon'=>'<img src="'.$query['icon'].'" alt="Server Icon" />'); //This value is HTML friendly.
		
		}
				
	} elseif($enabled == 'false') { //Grab regular statistics.
		
		$query = array(
			'address'=>'https://mcapi.ca/query/'.$server["ip"].':'.$server["port"].'/info', //Grab statistics from URL.
			'icon'=>'https://mcapi.ca/query/'.$server["ip"].':'.$server["port"].'/icon'); //Grab icon from URL.
			
		$response = json_decode(file_get_contents($query['address']), true); //Decode the JSON response.
		
		if($response['status'] == false) { //Make sure that the API connected to the server.
			
			$status = array(
				'connection'=>'error', //Set the connection to error to enable checking.
				'error'=>$response['error'], //Grab the error of the response.
				'ip'=>$response['hostname'],
				'port'=>$response['port']);
				
			//echo $response['error'];
				
		} else {
			
			$status = array(
				'connection'=>'online', //Set the connection to error to enable checking.
				'error'=>'Connection available (no error to define)', //Grab the error of the response.
				'ip'=>$response['hostname'],
				'port'=>$response['port'],
				'minecraft'=>$response['version'],
				'protocol'=>$response['protocol'],
				'online_players'=>$response['players']['online'],
				'max_players'=>$response['players']['max'],
				'motd'=>$response['motd'],
				'icon'=>'<img src="'.$query['icon'].'" alt="Server Icon" />', //This value is HTML friendly.
				'friendly_motd'=>$response['htmlmotd']); //This value is HTML friendly.
				
		}
				
	} else {

			$status = array(
				'connection'=>'error', //Set the connection to error to enable checking.
				'error'=>'Failed to get contents from url (enabled [true|false])', //Grab the error of the response.
				'ip'=>$server['ip'],
				'port'=>$server['port']); //Verify that $enabled is set to true or false only.
				
	}
	
	return $status; //Grab the value outside of the API.
}