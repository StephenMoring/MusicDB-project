<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reset Password</title>
		<link rel="stylesheet" href="ForgotPasswordStyle.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="text-align:center">
					<h2 style="color:#fff;font-weight:bold;">Reset Password</h2>
				</div>
			<div clas="row">
				<div class="col-md-12">
					<form id="changepassword" role="form" method="post" action="Server.php">
						<div class="form-group" style="text-align:center">
							<br>
							<br>
							<label style="font-weight:bold;color:#fff;font-size: 16pt">
							Enter Email of your Account
							<input type="text" name="either" id="either" class="form-control" style="width:540px;text-align:center;" />
							</label>
							<br>
							<label style="font-weight:bold;color:#fff;font-size: 16pt">
							Enter New Password
							<input type="password" name="password1" id="password1" class="form-control" style="width:540px;text-align:center;" />
							</label>
							<br>
							<label style="font-weight:bold;color:#fff;font-size: 16pt">
							Confirm New Password
							<input type="password" name="password2" id="password2" class="form-control" style="width:540px;text-align:center;" />
							</label>
			
						</div>
						<br />
						<div class="form-group" style="text-align:center">
							<button type="submit" id="resetbutton" name="resetbutton" class="btn btn-success">Reset Password</button>
						</div>
					</form>
				</div>
	
			</div>
		</div>
	</body>
</html>

<script type="text/javascript"> 

jQuery.validator.addMethod("alphanumeric",function(value,element){return this.optional(element)||/^[a-zA-Z0-9]+$/.test(value);});

$(function() {

  $("#changepassword").validate({
    rules: {
	either: {
          required: true,
	  email: true,
	  remote: {
		url: "Validations/emailexists.php",
		type: "post",
		data: {
			either: function(){
				return $("#either").val();
		      		}
		       }
	      }
	},
        password1: {
	  required: true,
	  alphanumeric: true,
	  rangelength: [6,15],
        },
        password2: {
	  required: true,
	  equalTo: "#password1",
        },
      },
     messages: {
	either: {
	  required: "Please enter email",
	  email: "Please enter a valid email",
	  remote: "Email does not exists. Please try again.",
	},
        password1: {
	  required: "Please enter a password",
	  alphanumeric: "Password can only contain letters or numbers",
	  rangelength: "Password must be between 6 and 15 characters long",
        },
        password2: {
	  required: "Please confirm password",
	  equalTo: "Passwords do not match",
        },
     },
  });
});
</script>