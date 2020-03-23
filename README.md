# Captive Portal - Email Collection
This is a PHP and JavaScript based captive portal that requires only a valid email address for login<br><br>
Each email submitted is marked with date/time, the client's MAC address, and stored with an incremental numeric value.
<br><br>
There are two versions here. One is meant for Ruckus Wireless' Hotspot service (Tested with both Unleashed and ZoneDirector controllers) and one is meant for Ubiquiti Unifi controllers (Tested with Unifi Controller 5.10.25).

## Credits
- Alex Ortmanns, https://forums.ruckuswireless.com/ruckuswireless/topics/best_practice_for_a_captive_portal_without_a_password <br>
- jQuery, https://jquery.com/
- https://www.quora.com/How-can-I-submit-two-forms-with-one-button <br>
- https://forums.digitalpoint.com/threads/how-to-submit-a-form-without-rerload-or-redirect-the-page.2151997/ <br>
- Bootstrap of course, https://getbootstrap.com/<br>
- Email validation via https://itnext.io/https-medium-com-joshstudley-form-field-validation-with-html-and-a-little-javascript-1bda6a4a4c8c<br>
- jQuery Validation, https://jqueryvalidation.org/ <br>
- Darin Dimitrov, https://stackoverflow.com/questions/5052315/how-to-fire-jquery-function-only-if-form-is-valid <br>
- https://stackoverflow.com/questions/31612454/using-javascript-to-populate-a-hidden-field-from-url-parameter <br>
- Art of Wifi, https://github.com/Art-of-WiFi/UniFi-API-client <br>

<br><br>
## To Do
- Make it all work with IIS and SQL Express <br>
- Create a record management page with reset/export capability <br>
- Screenshots for Ruckus configuration <br><br>
## Known Issues
- Ubiquiti version currently uses a Unifi admin account to authorize guests
