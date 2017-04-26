<script>
 
 //global variables
 var if_record_exist = false;
 
	$(function(){
		//toggle forms
		$('#show_login').click(function(){
			$('#login_form').show();
			$('#signup_form').hide();
			$('.msg').html('');
		});
		$('#show_signup').click(function(){
			$('#login_form').hide();
			$('#signup_form').show();
			$('.msg').html('');
		});
		
		
		$('#login').click(function(){
			//get the values
			var email = $('#email').val();
			var password = $('#password').val();
			
			if(!validateEmail(email)){
				$('.msg').text('Invalid email');
				return;
			}
			
			//validate the form
			if(email == '' || password == ''){
				$('.msg').text('Please fill the form');
			}else{
				$('.msg').html("<img src='loading.gif' border='0' />");			
				//jQuery ajax post method with 
				var shop_url = "<?php echo $_SESSION['shop'];?>";
				$.post('/checklogin.php', {email:email, password:password,shop_url:shop_url}, function(resp){
					console.log("resp="+resp);
					//var resp1= resp.find('.session_email').html();
					if(resp =='cool'){
						//location.href = 'hiddenpage.php';
						alert(resp1);
						$('.login-form-main').hide();
						$('.content-container').show();
						alert("login  sucessfully");
					}else{
						$('.msg').html('Invalid Email or Password');			
					}
				});	
				
			}	
		});
		
		//check if the email is already registered!!
		$('#email-new').blur(function(){
			var email 	 = $('#email-new').val();
			
			if(!validateEmail(email)){
				$('.msg').text('Invalid email');
				return;
			}
			$('.msg').html('');
			
			//checking email
			$.post('check-email-registered.php', {email:email}, function(resp){
				if(resp == 'bad'){
					$('.email_err').text('Email not available');			
					if_record_exist = true;
				}else{
					$('.email_err').text('');			
					if_record_exist = false;
				}	
			});	
		});	
		
		//when click Signup button
		$('#signup').click(function(){
			//get the values
			var email 	 = $('#email-new').val();
			var password = $('#password-new').val();
			//validate the form
			if(email == '' || password == ''){
				$('.msg').text('Please fill the form');
			}else{
				if(if_record_exist == false){
				$('.msg').html("<img src='loading.gif' border='0' />");			
				//jQuery ajax post method with 
				$.post('adduser.php', {email:email, password:password}, function(resp){
					if(resp == "done"){
						$('#login_form').show();
						$('#signup_form').hide();
						$('#options').hide();
						$('.msg').html('Signed up successfully, Now use the above form to login!!');			
					}else{
						$('.msg').html('Something is wrong!');			
					}
				});	
				}else{
					$('.msg').html('Please fix the above error!');			
				}	
			}	
		});
		
	});

	function validateEmail(email) { 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	} 

 </script>

<div id="login_form">
	<h3>Login with your email and password</h3>
	<label>Email</label><input type="text" name="email" id="email"/><br />
	<label>Password</label><input type="password" name="password" id="password"/><br/>
		<div class="msg">&nbsp;</div>
	<button id="login">Login</button> 
</div>

<div id="signup_form" style="display:none">
	<h3>Registration Form</h3>
	<label>Enter Email</label><input type="text" name="email-new" id="email-new" /><span class="email_err"></span><br />
	<label>Create Password</label><input type="password" name="password-new" id="password-new"/><br/>	
	<div class="msg">&nbsp;</div>
	<button id="signup">Signup</button>
</div>



</form>
