<?php
// Major credit to @malle-pietje 
// This would not be possible without their work
// https://github.com/Art-of-WiFi

        require("class.unifi.php");

	// Grab from URL
        $cmac = $_GET['id'];
		
	// The below login must be an admin on the Unifi controller unfortunately
	// Hoping to fix this in a future release 
        $unifidata = new UnifiApi("Unifi_User", "Unifi_Password", "https://Unifi_Controller_IP:8443", "default", "Unifi_Version");
        $unifidata->login();

        // MAC Address of the client followed by the time in minutes the controller will
        // authroize them for before requiring a login again. BE SURE TO CHANGE THIS!
        $unifidata->authorize_guest($cmac, 2);

	// Where the user will be redirected after they are authorized
	header("Location: http://walrustech.org");
?>

