<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/ico/favicon.png">

<title>Tweet your MP, engage your UK Member of Parliament on twitter</title>
<meta name="description" content="Tweet Your MP is an open-source downloadable tool to tweet your UK Member of Parliament"/>
<link rel="canonical" href="http://tweetyourmp.com" />
<meta property="og:title" content="Tweet your MP, a tool to send tweets to UK members of Parliament" />
<meta property="og:description" content="Tweet your MP is a handy open-source downloadable tool that uses a postcode to find and send your UK Member of Parliament a tweet. Includes code to download and embed on any website along with data for every MP in the UK parliament." />
<meta property="og:url" content="http://tweetyourmp.com" />
<meta property="og:site_name" content="tweetyourMP.com" />
<meta property="article:tag" content="activism" />
<meta property="article:tag" content="e-petitions" />
<meta property="article:tag" content="Social Media" />
<meta property="article:tag" content="tweet your MP" />
<meta property="article:tag" content="twitter" />
<meta property="article:tag" content="UK" />
<meta property="article:section" content="Activism" />

<meta property="og:image" content="http://kimondo.co.uk/wp-content/uploads/2013/03/tweetyourmp.gif" />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@kimondo"/>
<meta name="twitter:domain" content="Kimondo"/>
<meta name="twitter:creator" content="@kimondo"/>

<!-- get values to pre-populate form -->

<?php
$postcode = $_GET['postcode'];
$tweetmsg = $_GET['tweetmsg'];
$sentvia = $_GET['sentvia'];
?>

<!-- format is tweetyourmp.com/index.php?postcode=SW22AX&tweetmsg=please do something -->


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

    <!-- Just for debugging purposes. Don't actually copy this line! -->
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
    	<img class="media-object" src="tinytweet.gif"" alt="Tweet your MP">
  		</a>
 		 	<div class="media-body">
    		<h3 class="text-muted">TweetyourMP.com</h3>
			</div>
		</div>
      
      
      </div>
      
   

      <div class="jumbotron">
         <h1>Tweet your MP</h1>
        
        <p>Find your United Kingdom Member of Parliament using your postcode, send them a tweet* and start a conversation.</p>
     <form action="mplookup_twitter.php" method="post" name="webtivist" id="webtivist">


<p><label>Postcode:</label> <input type="text" name="postcode" value="<?php echo $postcode; ?>" maxlength="10" size="8" style="margin-bottom:5px;">&nbsp;

<!-- pre filled tweet -->

<input type="hidden" name="tweetmsg" value="<?php echo $tweetmsg;?>">
<input type="hidden" name="sentvia" value="<?php echo $sentvia;?>">

<a class="btn btn-primary btn-lg" role="button" href="#" onclick="document.webtivist.submit(); return false;">Find your MP <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></a></p>
    </form>
    
        

       <p>*Includes email, website and facebook details too (when available).</p> 
        

        
      </div>

      <p>Tweet your MP has <strong>649</strong> email addresses, <strong>629</strong> websites, <strong>544</strong> Twitter accounts and <strong>301</strong> facebook pages listed for the 650 Members of the UK Parliament. <a href="about.html">Read more</a> about this tool.
	  </p>
	  <p><a href="forcharities.html">Services and important information for charities linking to this tool.</a></p>
    <p>While I make every attempt to keep this information up to date, if you have any updates or additions please <a href="http://kimondo.co.uk/contact-me/" target="_blank">get in touch.</a></p>
      
     

       <div class="footer">
       
  
        <p>Constituency lookup by <a href="http://theyworkforyou.com" target="_blank">TheyWorkforYou.com</a> script by <a href="http://kimondo.co.uk" target="_blank">Pete</a>. Data updated June 2016.<br/>
        <a href="http://twitter.com/tweet_your_mp">Follow TweetyourMP.com on twitter</a> - <a href="about.html">More about this tool (including data)</a> - <a href="https://github.com/kimondo/tweetyourMP">Download on GitHub</a></p>
    
      </div>

    </div> <!-- /container 

<a href="https://github.com/kimondo"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://github-camo.global.ssl.fastly.net/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>

--> 

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48726128-1', 'tweetyourmp.com');
  ga('send', 'pageview');

</script>
  </body>
</html>
