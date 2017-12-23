<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="LogInStyle.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
	</head>
	<body>
	
		<div class="containter">
			<br>
			<div class="row">
				<div class="col-md-12">
					<h1 style="text-align:center; font-weight: bold;color: 	#fff; font-size: 48px;";> Welcome to Dope Playlist Designs!</h1>
				</div>
			</div>
			<br>
			<br>
			<div class="loginBox">
				<img src="ProjectImages/user.png" class="user">
				<div class="row">
					<div class="col-md-12">
						<h1 style="text-align:center; font-weight: bold;color: 	#fff; font-size: 36px;";> Please Login to Continue</h1>
					</div>
				</div>
				<div class="row">
					<p class="text-center">
						<button type="button" name="login" id="login" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</button>
					</p>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-md-12">
						<h1 style="text-align:center; font-weight: bold;color: 	#fff; font-size: 36px;";> Don't Have an Account?</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="text-align:center">
						<button type="button" name="createaccount" id="createaccount" class="btn btn-success" data-toggle="modal" data-target="#createaccountModal">Create Account</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


<div class="container">
	<div class="row">
		<div id="loginModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="loginform" role="form" method="post" action="Server.php">
						<div class="modal-header" style="text-align:center">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Login</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" id="username" class="form-control" />
							</div>
							<br />
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control" />
							</div>
							<br />
						</div>
						<div name="ending" id="ending" class="modal-footer" style="text-align:center">
							<button type="submit" name="login_button" id="login_button" class="btn btn-success" style="margin:auto">LogIn</button>
						</div>
					</form>
					<div style="text-align:center">
						<button onclick="location.href = 'ForgotUsername.php';" type="button" name="fusername" id="fusername" class="btn btn-warning">Forgot Username?</button>
						<button onclick="location.href = 'ForgotPassword.php';" type="button" name="fpassword" id="fpassword" class="btn btn-warning">Forgot Password?</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div id="createaccountModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="createaccountform" method="post" role="form" action="Server.php">
						<div class="modal-header" style="text-align:center">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Create Account</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Enter First Name</label>
								<input type="text" name="firstname" id="firstname" class="form-control" />
							</div>
							<br />
							<div class="form-group">
								<label>Enter Last Name</label>
								<input type="text" name="lastname" id="lastname" class="form-control" />
							</div>
							<br />
							<div class="form-group">
								<label>Enter Email</label>
								<input type="text" name="email" id="email" class="form-control" />
							</div>
							<br />
							<div class="form-group">
								<label>Create Username</label>
								<input type="text" name="user_name" id="user_name" class="form-control" />
							</div>
							<br />
							<div class="form-group">
								<label>Create Password</label>
								<input type="password" name="password_1" id="password_1" class="form-control" />
							</div>
							<br />
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="password_2" id="password_2" class="form-control" />
							</div>
							<br />
						</div>
						<div class="modal-footer" style="text-align:center">
							<button type="submit" name="createaccount_button" id="createaccount_button" class="btn btn-success" style="margin:auto">Create Account</button>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">


jQuery.validator.addMethod("alphanumeric",function(value,element){return this.optional(element)||/^[a-zA-Z0-9]+$/.test(value);});

$(function() {

 /*$("#loginform").validate({
    rules: {
	username: {
          required: true,
	  remote: {
		url: "Validations/usernameexists.php",
		type: "post",
		data: {
			username: function(){
				return $("#username").val();
		      		}
		       }
	      }
	},
	password: {
	  required: true,
	},
      },
     messages: {
	username: {
	  required: "Please enter username",
	  remote: "Username does not exist",
	},
	password: {
	  required: "Please enter password",
	},
     }
   });
});*/

$(function() { 


  $("#createaccountform").validate({
    rules: {
      firstname: {
        required: true,
	maxlength: 25,
      },
      lastname: {
	required: true,
	maxlength: 25
      },
       email: {
	required: true,
	email: true,
	remote: {
		url: "Validations/emailexists.php",
		type: "post",
		data: {
			email: function(){
				return $("#email").val();
		      		}
		       }
	      }
      },
      user_name: {
        required: true,
	rangelength: [6,15],
	alphanumeric: true,
	remote: {
		url: "Validations/usernameexists.php",
		type: "post",
		data: {
			user_name: function(){
				return $("#user_name").val();
		      		}
		       }
	      }
      },
      password_1: {
	required: true,
	rangelength: [6,15],
	alphanumeric: true,
	remote: {
		url: "Validations/passwordexists.php",
		type: "post",
		data: {
			 password_1: function(){
				return $("#password_1").val();
		      		}
		       }
	      }
      },
      password_2: {
	required: true,
	equalTo: "#password_1"
      },
    },
    messages: {
      firstname: {
        required: "Please enter first name",
      },
      lastname: {
	required: "Please enter last name",
      },
      email: {
	required: "Please enter email",
	email: "Please enter a valid email",
	remote: "Email already exists",
      },
      user_name: {
	required: "Please enter a username",
	rangelength: "Username must be between 6 and 15 characters long",
	alphanumeric: "Username can only contain letters or numbers",
	remote: "Username already exists",
      },
      password_1: {
	required: "Please enter a password",
	rangelength: "Password must be between 6 and 15 characters long",
	alphanumeric: "Password can only contain letters or numbers",
	remote: "Password already exists",
      },
      password_2: {
	required: "Please confirm password",
	equalTo: "Passwords do not match",
      },
    },
  });
});

$('[data-dismiss=modal]').on('click', function (e) {
    var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];
    
  $(target)
    .find("input")
       .val('')
       .end()

    var $loginerrors = $('#createaccountform');
    $loginerrors.validate().resetForm();
    $loginerrors.find('.error').removeClass('error');

    var $createaccounterrors = $('#loginform');
    $createaccounterrors.validate().resetForm();
    $createaccounterrors.find('.error').removeClass('error');
});

</script>