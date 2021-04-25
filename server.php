#!/usr/bin/php

<?php
	
	
	$host = "127.0.0.1";
	$port = 12345;
	$from = '';
	
	if( ! ( $server = socket_create( AF_INET, SOCK_DGRAM, SOL_UDP ) ) )
	{
		print "socket_create(): " 		. socket_strerror( socket_last_error( $server ) ) . "\n";
		exit( 1 );
	}
	
	
	if( ! socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1) )
	{
		print "socket_set_option(): " 	. socket_strerror(socket_last_error( $server ) ) . "\n";
		exit( 1 );
	}
	
	
	if( ! socket_bind( $server, $host, $port ) )
	{
		print "socket_bind(): " 		. socket_strerror( socket_last_error( $server ) ) . "\n";
		exit( 1 );
	}
	
	$pid = "";
	$msg = "";
	while( 1 )
	{
		socket_recvfrom ( $server , $pid , 256 , MSG_OOB , $from, $port);
		socket_recvfrom ( $server , $msg , 256 , MSG_OOB , $from, $port);
		$file = fopen($pid,"w");
		fwrite($file,$msg);
		fclose($file);
		print "odebrano od $pid: $msg i zapisano do pliku";
	}
	
	socket_close( $server );
	
?>














