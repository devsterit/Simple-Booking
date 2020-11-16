<?php

	require_once( 'WhatsApp.php' );


	$wa = new WhatsApp();

	$phoneArtisan = //'HERE THE ARTISAN PHONE NUMBER WITH PHONE PREFIX';

	$wa->phoneArtisan( $phoneArtisan );
	$wa->apiUrl();

	$wa->orderContactName( $_POST['contactName'] );
	$wa->orderContactPhone( $_POST['contactPhone'] );
	$wa->orderHourDelivery( $_POST['hourDelivery'] );
	$wa->orderContactAddress( $_POST['contactAddress'] );
	$wa->orderProducts( $_POST['prod'], $_POST['qt'] );

	$wa->message();

	$wa->buildOrder();

	$wa->sendOrder();
