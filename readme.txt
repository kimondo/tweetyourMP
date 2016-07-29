Hi,
this is the tweet / phone / email your MP toolkit
more info is available at http://kimondo.co.uk/tweet-your-mp/

You'll need web hosting that supports PHP, and a MySQL server - I've used PHPmyAdmin to upload the data file.

You'll also need an API key to use from TheyWorkForYou.com - these are provided free for non-commercial use. 

Please contact them if you're likely to make heavy use of this.

The MP datafile is available free on request - just drop me a line at http://kimondo.co.uk/contact

This makes use of the very useful TheyWorkForYou.com postcode to constituency lookup and Ruben Arakelyan's PHP API interface.

Note that this code contains a few legacy bits and pieces left over from when it was called Webtivist.

To install download these files and create a database on your website to store the MP data. Edit the settings.php file with the theyworkforyou.com API key and database login details. Note that you will need to apply for a API key from theyworkforyou.com/api - these are free for charitible use of 50,000 lookups per year.

Feedback, comments, complaints, support at http://kimondo.co.uk/tweet-your-mp/ 

:)


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
// www.kimondo.co.uk/

// this script requries php 5 for the validation code to work

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
