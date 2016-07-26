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
 
// get the twitter message from the form (if defined) 
 
 $tweetmsg = $_POST['tweetmsg'];
 $tweetmsg = filter_var($tweetmsg, FILTER_SANITIZE_STRING);


 
 // define sent via (if empty) or get from the form

  $sentvia = $_POST['sentvia'];
 $sentvia = filter_var($sentvia, FILTER_SANITIZE_STRING);
 
 if (empty($sentvia)) { $sentvia="@tweet_your_mp";}
 else {};
 
 
 
// $senderpostcode = 'sw2 2ax'; //for testing use form in final version

// remove spaces from the sting 

$sPattern = '/\s*/m';
$sReplace = '';

$senderpostcode2 = preg_replace( $sPattern, $sReplace, $senderpostcode );

// send the query to theyworkforyou.com (twfy)
 
$mps = $twfyapi->query('getConstituency', array('output' => 'php', 'postcode' => $senderpostcode2));


// the next bit sorts the data you get back from twfy. It's not very elegant and could probably be done
// by sorting out the array - but it works. Will try and make it better later.

$pieces = explode(":", $mps);
// get the constituency name from the list of other stuff provided - the string returned from TWFY is a differing length 
// but the last value is always the TWFY constituency name
$constituency_data = end(explode(":", $mps));

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




echo "<h1>Tweet your MP</h1>";

echo "<h2>Your constituency is:<br/> $constituency_name </h2>";

// now to lookup the MP's details from the database

$link_id = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname, $link_id) or die(mysql_error());


//$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

$result = mysql_query("SELECT * FROM $mpdata WHERE constituency='$constituency_name' ");

// and to turn those results into lovely strings

$row = mysql_fetch_assoc($result);

$mpfirstname = $row['firstname'];
$mpsecondname = $row['secondname'];
$mpparty = $row['party'];
$mpemail = $row['email (parliament)'];
$mptwitter = $row['twitter'];	
$mpfacebook= $row['facebook'];	
$mphomepage = $row['homepage'];	
$mpnotes = $row['notes'];

// record the lookup (optional)

//$mpcounter = $row['Count'];

//$addcounter=$mpcounter+1;


//$update = mysql_query("UPDATE $mpdata SET Count = '$addcounter' WHERE constituency='$constituency_name' ");
//mysql_query($sql);

// close the database

mysql_close($link_id);

// catch errors (e.g. invalid postcode)

if (empty($mpfirstname)) {
echo '<script language="javascript" type="text/javascript">alert("Sorry we can\'t find a constituency for that postcode - please try again"); history.back();</script>';
exit(); //and stop running the script
}

else {
// just carry on 
}		



echo "<h2>Your MP is:<br/> $mpfirstname $mpsecondname ($mpparty)</h2>";

if(empty($mpnotes)){
	// do nothing 
}

else {

echo "<p>$mpnotes</p>";

}  

if(empty($mptwitter)){

	echo "<p><span class=\"glyphicon glyphicon-alert\" aria-hidden=\"true\"></span> Your MP doesn't have a twitter account listed</p>"; }
	
else {

// twitter button style - am using the responsive button style below
//<a href=\"https://twitter.com/intent/tweet?screen_name=$mptwitter&text=sent%20via%20tweetyourmp.com\" class=\"twitter-mention-button\" data-size=\"large\" data-related=\"kimondo\">Tweet to $mptwitter</a>
//<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


echo "<p>Send your MP a tweet:</p>
<p><a class=\"btn btn-primary btn-lg\" role=\"button\" href=\"https://twitter.com/intent/tweet?screen_name=$mptwitter&text=hello%20$mptwitter%20$tweetmsg%20%0A%20via%20$sentvia\" target=\"_blank\">Tweet $mptwitter</a>
</p>";
	}

// email your mp

if(empty($mpemail)){

	echo "<p><span class=\"glyphicon glyphicon-alert\" aria-hidden=\"true\"></span> Your MP doesn't have an email address listed</p>"; }
	
else {

	echo "<p><span class=\"glyphicon glyphicon-envelope\" aria-hidden=\"true\"></span> <a href='mailto:$mpemail' target='_blank'>$mpemail</a></p>";
	
	}


// leave a comment on your MP's website

if(empty($mphomepage)){

	echo "<p><span class=\"glyphicon glyphicon-alert\" aria-hidden=\"true\"></span> Your MP doesn't have a website listed</p>"; }
	
else {

	echo "<p><span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span> <strong><a href='$mphomepage' target='_blank'>$mphomepage</a></p></strong>";
	
	}
	
// add other contact options here - phone as an example, could add post address or constituency meeting here
	
if(empty($mpfacebook)){
echo "<p><span class=\"glyphicon glyphicon-alert\" aria-hidden=\"true\"></span> Your MP doesn't have a facebook page listed</p>"; }
	
else {
	
// facebook

echo "<p><span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span> <strong><a href='$mpfacebook' target='_blank'>Comment on your MP's facebook page</a></p></strong>";
	
	}
	
// end of MP details
	
echo '</fieldset>
<p><a class="btn btn-primary btn-lg" role="button" href="index.html"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Start again</a>';

// feedback

echo '<p><small><a href="http://kimondo.co.uk/contact-me/">Feedback?</a></p></small>';

// number of times MP has been tweeted commented out for now...

//echo "<!-- <p><small>$mpfirstname $mpsecondname has been tweeted approximately $mpcounter time(s) using this tool.</small></p> -->";
// footer as defined in actionsettings.php

echo $footer_template;

?> 