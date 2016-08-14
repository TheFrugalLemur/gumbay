<?php require('includes/config.php');

//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	}

//define page title
$title = 'About - Gumbay';

//include header template
require('layout/header.php');
?><div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1><center>Gumbay Australia<center></h1>
		<p class="text-justify"><b>Welcome to Gumbay!
		We thought you might like to know a bit more of what we're all about.

		<br><br>Gumbay launched in Australia back in 2016 as a local classified ads and community site, designed to connect people who were either planning to move, or had just arrived in a new neighbourhood, and needed help getting started with accommodation, employment and meeting new people.

		<br><br>We've grown a lot since then through word of mouth and we're proud to say that Gumbay is now loved by its ever growing community all around the world. We are the local noticeboard that now spans 76 cities across 11 countries that connects not just new people arriving to a city but primarily the locals of those cities in - Australia, UK, Ireland, Northern Ireland, Poland, South Africa, New Zealand, Singapore and Hong Kong - and are the biggest websites for local community classifieds including Stuff for sale, Cars, flat share, flat rentals and jobs for majority of the countries mentioned.

		<br><br>Our aim at Gumbay is to give you a simple and easy-to-use tool that lets you quickly find what you are looking for. You can find everything you need to live your life with the help of your local Gumbay community; from that unique item at a bargain price to your dream machine car, a job or a flat, a nanny for your kids or a language teacher to help you learn that new language!

		<br><br><br>Thanks for now,

		<br><br>Gumbay Australia</b></p>
    </div>
  </div>
</div>
