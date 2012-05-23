<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Fitsby - Fitness with Friends!</title>
	<link rel="stylesheet" href="css/landingpage.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/landingpage.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Chau+Philomene+One' rel='stylesheet' type='text/css'>
</head>

<div class="container">

<body>

<header class="header">
	<div class="header_container">
		<h1 class="logo">
			Fitsby
		</h1>
		<nav>

            <!-- Login Starts Here -->
        	<div id="loginContainer">
            <a href="#" id="loginButton"><span><img src="icons/login.gif" alt="">Sign In â–¿</img></span><em></em></a>
            <div style="clear:both"></div>
            <div id="loginBox">                
                <form id="loginForm">
                    <fieldset id="body">
                        <fieldset>
                            <label for="email">Email Address</label>

                            <input type="text" name="email" id="email" />
                        </fieldset>
                        <fieldset>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" />
                        </fieldset>
                        <input type="submit" id="login" value="Sign in" />
                        <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>

                    </fieldset>
                    <span><a href="#">Forgot your password?</a></span>
                </form>
            </div>
		<!-- Login Ends Here -->
		</nav>
	</div> 
</header>

<div class="content">
	<div class="boxes">
		<div class="box">
			<h1>Whether you're <br/><strong style="color:#DE1029">bulking up</strong>,<br/><strong style="color:#ffff00">cutting down</strong>, or just<br/><strong style="color:#0079FF">staying healthy</strong>,<br/> we'll help you find others like yourself! </h1>
		</div>

		<div class ="box2">
			<h1>
				<div class="specialbox2">
					<strong>Sign Up For Free</strong> <br/>
				</div>
				<div class="email_and_password">
					<form>
						<div>

	    					<input class="default-value" class="s" type="text" name="email" placeholder="Email Address" style="color:#5A5858;" size=25 onfocus="inputFocus(this)" onblur="inputBlur(this)" /> <!--Email-->
						</div>
						<br/>
						<div>
	    					<input id="password-clear" class="s" type="text" placeholder="Password" autocomplete="off" style="color:#5A5858;" size=25 onfocus="inputFocus(this)" onblur="inputBlur(this)" /> <!--Password-->
	    					<input id="password-password" class="s" type="password" name="password" placeholder="Password" autocomplete="off" style="color:#5A5858;" size=25 onfocus="inputFocus(this)" onblur="inputBlur(this)" /> <!--Hidden Password-->
						</div>

   						<input type="submit" id="sign_up" value="Sign Up" /> <!--Sign Up-->
					</form>
				</div>
			</h1>
		</div>
	</div>
</div>

<div class="push"></div>

<div class="footer"> 
    <div class="buttons">
    	<ul>
			<li>
				<a id="facebook_button" href="#"><img src="icons/facebook_icon.png" height="22" width="22" alt="FB"> Sign up with Facebook</a> <!--insert 'Sign Up with Facebook' here-->
			</li>
			<li id="or">
				or
			</li>

			<li>
				<a id="twitter_button" href="#"><img src="icons/twitter_icon.png" height="22" width="22" alt="TW"> Sign up with Twitter</a> <!--insert 'Sign Up with Twitter' here-->
			</li>
		</ul>
	</div>
</div>

</body>

</div>

</html>