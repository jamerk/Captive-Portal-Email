# Ruckus Captive Portal Setup
Captive portal with email collection for Ruckus Wireless hotspot service.
<br><br>
## Requirements
- Apache2/Nginx with PHP configured<br>
- PHP with the FPM and MySQL extensions<br>
- MySQL/MariaDB<br>
This server must be accessible to clients, I spun up a very small Debian VM on the VLAN I use for guests that is fully seperate from important infrastructure just in case it's compromised.<br>
<br>

## Initial Setup
1) Import the Captive-Portal-Email/captive_data.sql database file into your SQL server <br>
2) Create a directory on your webserver called ruckus and upload the files under Captive-Portal-Email/ruckus to it (Excluding readme.md of course) <br>
3) Edit auth.js and put in a unique username and password, you will create this user on the Ruckus controller below <br>
4) Create a new user called captive in your SQL server with a unique password <br>
5) Add the captive user your just created with your unique password in the submit.php file
6) Test by navigating to http://WebServerAddress/ruckus, type in an email, and hit submit. The email you typed should be in the users table in your captive_data database.  <br>

## Unleashed Controller
1) Login to your Unleashed root AP<br>
2) Go to 'Admin & Services' > 'Services' > 'Hotspot Services'<br>
3) Click 'Create New'<br>
4) Name it whatever you want and set your User Session settings to what you would like<br>
5) Set the login page to http://WebServerAddress/ruckus<br>
6) Set your Start Page if needed <br>
7) Click Ok then navigate to System > Users and create a new user with the username/password you entered into auth.js above <br>
8) Click Ok and then create a new SSID with Hotspot Service as the Usage Type and your Hotspot Services profile you created above selected in the drop down menu. <br><br>
## ZoneDirector Controller
1) 
