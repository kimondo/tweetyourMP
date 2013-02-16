<?php
// WEBTIVIST PHP action script by - Pete Taylor www.kimondo.co.uk 
// originally developed for the WORLD DEVELOPMENT MOVEMENT www.wdm.org.uk 

// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with this program in the readme.txt  
// If not, see <http://www.gnu.org/licenses/>.

// if you would like to help fund development of this script please visit
// www.kimondo.co.uk/webtivist

// this script requries php 5 for the validation code to work

// ==========================================================================
// | Edit the settings in actionsettings.php. I've annotated this script so |
// | you know what's going on and can make adjustments if you want to       |
// ==========================================================================

// **********************************************************************
// TWFY::API PHP API interface for TheyWorkForYou.com
// Version 1.5
// Author: Ruben Arakelyan <ruben@wackomenace.co.uk>
// Copyright (C) 2008-2009 Ruben Arakelyan. Some rights reserved.
//
// This file is licensed under the
// Creative Commons Attribution-ShareAlike license version 2.5
// available at http://creativecommons.org/licenses/by-sa/2.5/
//
// For more information, see http://tools.rubenarakelyan.com/twfyapi/
//
// Inspiration: WebService::TWFY::API by Spiros Denaxas
// Available at: http://search.cpan.org/~sden/WebService-TWFY-API-0.01/
// **********************************************************************
// 
// I've included a stylesheet to make the MP action look a bit neater

include 'settings.php';

$actionname = $_POST['action_name'];
$actionname = filter_var($actionname, FILTER_SANITIZE_STRING);

// Live action code follows ************************************************************************************************

$mpdata = "mpdata";

// get the current time

$time = date("m/d/y : H:i:s",time());


// Include the API binding

require_once 'twfyapi.php'; // have included settings.php in the twfapi.php file

// Set up a new instance of the API binding

$twfyapi = new TWFYAPI($twfykey);

// get the postcode from the form

 $senderpostcode = $_POST['postcode'];
 $senderpostcode = filter_var($senderpostcode, FILTER_SANITIZE_STRING);

// $senderpostcode = 'sw2 2ax'; //for testing use form in final version

// remove spaces from the sting 

$sPattern = '/\s*/m';
$sReplace = '';

$senderpostcode2 = preg_replace( $sPattern, $sReplace, $senderpostcode );

// send the query to theyworkforyou.com (twfy)
 
$mps = $twfyapi->query('getConstituency', array('output' => 'php', 'postcode' => $senderpostcode2));

// the next bit sorts the data you get back from twfy. It's not very elegant and could probably be done
// by sorting out the array - but it works. Will try and make it better later.

$pieces = explode(";", $mps);
$constituency_data=$pieces[11]; // get the constituency name from the list of other stuff provided
preg_match('/"([^"]+)"/', $constituency_data, $constituency_name); // get rid of the other bits
$constituency_name=$constituency_name[1]; // turn it into a simple string

// display the page header from actionsettings.php

echo $header_template;

// if TWFY is not returning a valid constituency

if (empty($constituency_name)) {
echo '<script language="javascript" type="text/javascript">alert("Sorry we can\'t find a constituency for that postcode - please try again"); history.back();</script>';
exit(); //and stop running the script
}

else {
// just carry on 
}		

echo "<h2>Your constituency is $constituency_name </h2>";

// now to lookup the MP's details from the database

$link_id = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname, $link_id) or die(mysql_error());


$result = mysql_query("SELECT * FROM $mpdata WHERE constituency='$constituency_name' ");

// and to turn those results into lovely strings

$row = mysql_fetch_assoc($result);

$mpfirstname = $row['firstname'];
$mpsecondname = $row['secondname'];
$mpemail = $row['email'];
$mptwitter = $row['twitter'];	
$mpphone = $row['phone'];	
$mphomepage = $row['homepage'];	

echo "<fieldset><legend>Your MP info</legend>";
echo "<p>$mpfirstname $mpsecondname</p>";

if(empty($mptwitter)){

	echo "<h2>Send your MP a tweet</h2>
	<p>Your MP doesn't have a twitter account listed :(.</p>"; }
	
else {


echo "<h2>Send your MP a tweet</h2>";
echo "<a href=\"https://twitter.com/intent/tweet?screen_name=$mptwitter\" class=\"twitter-mention-button\" data-lang=\"en\" data-size=\"large\">Tweet your MP</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"https://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>";
	}

// leave a comment on your MP's website

if(empty($mphomepage)){

	echo "<h2>Leave a comment on your MP's website</h2>
	<p>Your MP doesn't have a website listed :(.</p>"; }
	
else {

	echo "<h2>Leave a comment on your MP's website</h2>
	<p>Your MP has a site listed at <a href='$mphomepage' target='_blank'>$mphomepage</a></p>";
	
	}
	
// add other contact options here - phone as an example, could add email or post here.
	
//if(empty($mpphone)){
//	echo "<H2>Phone your MP</h2>
//	<p>We don't have a phone number listed for your MP</p>"; }
	
//else {
	
// phone your MP

//echo "<h2>Phone your MP</h2>
//	<p>You can also call your MP at $mpphone</p>";
	
//	}
	
// end of MP details
	
echo '</fieldset><p><a href="index.html">Start again</a>';


// footer as defined in actionsettings.php

echo $footer_template;

?> 