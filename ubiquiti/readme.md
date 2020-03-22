## Requirements
- Apache2/Nginx with PHP configured<br>
- PHP 7+ with the FPM and MySQL extensions<br>
- MySQL/MariaDB<br>
- An Online Unifi Controller (Linux based or one of their hardware ones)<br><br>
The captive portal web server must be accessible to clients, I suggest putting it on the same VLAN you use for guests that is fully seperate from important infrastructure just in case it's compromised. Though you MAY need to make a firewall rule allowing it to talk to the unifi controller (Not yet tested).<br>
<br><br>

# Ubiquiti Unifi Captive Portal Setup
<br><br>
For the following we're assuming your SQL database is on the same server as the web server.
<br><br>
1) Log into your MySQL/MariaDB instance as root and run the following commands (Create your own user and password):
<br>

```
CREATE DATABASE captive_data;
CREATE USER 'DB_User'@'localhost' IDENTIFIED BY 'DB_Password';
GRANT ALL PRIVILEGES ON captive_data.* TO 'DB_User'@'localhost';
FLUSH PRIVILEGES;
```

<br>

2) Exit and then run the import command to create the structure of the captive portal database (This file is in the base folder of this repo):<br>

```
 mysql -u root -p captive_data < captive_data.sql
```

3) Next lets deploy the captive portal files to the web root. In my case that is /var/www (The files must be inside /guest/s/default THIS IS IMPORTANT!). You should have the following in that folder:<br>

- bootstrap.min.css<br>
- class.unifi.php<br>
- index.php<br>
- jquery.min.js<br>
- jquery.validate.min.js<br>
- submit.php<br>
- unifi.php<br>

4) Now lets edit the submit.php file first, edit the second line and change DB_User and DB_Password to the login you made above.
<br><br>
5) Next we edit unifi.php. Change the Unifi_User, Unifi_Password, Unifi_Controller_IP, Unifi_Version (For Example mine was 5.10.25), and if necessary the Unifi site (Currently set to default).
<br><br>
6) Test what you've done so far by navigating to and submitting an email address at your captive portal -> http://Captive_Portal_Web_Server_IP/guest/s/default<br>
Log into your SQL server and check that the email and mac address are showing in the table.<br>

7) Now let's configure your unifi controller, first log into it and go to Settings > Wireless Networks. Set up your SSID like the following screenshot, set your own SSID name.<br>
![alt text](https://github.com/ITGoon/Captive-Portal-Email/blob/master/ubiquiti/setup_images/wireless_network.PNG)
8) Now go to Settings > Guest Control and set this portion up like the screenshot below, put your captive portal web server IP where it says CaptivePortalWebServer.<br>
![alt text](https://github.com/ITGoon/Captive-Portal-Email/blob/master/ubiquiti/setup_images/guest_control.PNG)
9) Test your wireless network with any device and then you're done.
