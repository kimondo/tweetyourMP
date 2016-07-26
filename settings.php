<?php

// settings file for the MP action lookup
// change to your own settings

$youremail = 'email';

// your database settings (for the lookup)

$dbhost = 'localhost';

$dbuser = 'mpdata';
$dbname = 'mpdata';

$dbpass = 'password';

// name of your MP data table 

$mpdata = 'mpdata';

// TheyWorkForYou.com API key

$twfykey='apikey';

// thankyou message

$automessage='Thanks - here is all your info';

// your organisation

$organisation= 'my organisation' ;

// your twitter API key

$twitterkey= 'twitter API key' ;

// optional to change these to fit in with your style

$header_template='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/ico/favicon.png">

    <title>Tweet your MP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <style>
   /* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-left: 15px;
  padding-right: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
  padding-bottom: 19px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: left;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  font-size: 21px;
  padding: 14px 24px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-left: 0;
    padding-right: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
</style>


    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <!--<ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul> -->
      
      	<div class="media">
 		 <a class="pull-left" href="index.html">
    	<img class="media-object" src="tinytweet.gif"" alt="tweet">
  		</a>
 		 	<div class="media-body">
    		<h3 class="text-muted">TweetyourMP.com</h3>
			</div>
		</div>
      
      
      </div>
      
   

      <div class="jumbotron">';

$footer_template=' </div>

      


        <div class="footer">
        
        <p>Constituency lookup by <a href="http://theyworkforyou.com" target="_blank">TheyWorkforYou.com</a> script by <a href="http://kimondo.co.uk" target="_blank">Pete</a>. Data updated March 2016.<br/>
        <a href="http://twitter.com/tweet_your_mp">Follow TweetyourMP.com on twitter</a> - <a href="about.html">More about this tool (including data)</a> - <a href="https://github.com/kimondo/tweetyourMP">Download on GitHub</a></p>
    
      </div>

    </div> <!-- /container -->


   <script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-48726128-1\', \'tweetyourmp.com\');
  ga(\'send\', \'pageview\');

</script>
  </body>
</html>';

?>  