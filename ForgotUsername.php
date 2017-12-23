<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Forgot Username</title>
		<link rel="stylesheet" href="ForgotUsernameStyle.css">
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
					<h2 style="color:#808080;font-weight:bold;">Forgot Username</h2>
				</div>
			<div clas="row">
				<div class="col-md-12">
					<form id="enteremail" role="form" method="post" action="Server.php">
						<div class="form-group" style="text-align:center">
							<br>
							<br>
							<label style="font-weight:bold;color:#808080;font-size: 16pt">
							Enter Email of your Account to Receive Username
							<input type="text" name="either" id="either" class="form-control" style="width:540px;text-align:center;" />
							</label>
						</div>
						<br />
						<div class="form-group" style="text-align:center">
							<button type="submit" id="usernamebutton" name="usernamebutton" class="btn btn-success">Send Email</button>
						</div>
					</form>
				</div>
	
			</div>
		</div>
	</body>
</html>

<script type="text/javascript"> 

$(function() {

  $("#enteremail").validate({
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
      },
     messages: {
	either: {
	  required: "Please enter email",
	  email: "Please enter a valid email",
	  remote: "Email does not exists. Please try again.",
	},
     }
  });
});
</script>