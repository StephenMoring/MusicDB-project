<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Forgot Password</title>
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
					<h2 style="color:#fff;font-weight:bold;">Forgot Password</h2>
				</div>
			<div clas="row">
				<div class="col-md-12">
					<form id="enteremail" role="form" method="post" action="Server.php">
						<div class="form-group" style="text-align:center">
							<br>
							<br>
							<label style="font-weight:bold;color:#fff;font-size: 16pt">
							Enter Email of your Account to Reset Password
							<input type="text" name="either" id="either" class="form-control" style="width:540px;text-align:center;" />
							</label>
						</div>
						<br />
						<div class="form-group" style="text-align:center">
							<button type="submit" id="emailbutton" name="emailbutton" class="btn btn-success">Send Email</button>
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
	  remote: "Email does not exists. Please try again.",
	},
     }
    submitHandler: function (form) {;
    	form.submit();
	if($either.val())
	{
	    	alert("Email Sent!");
	}
     }
  });
});
</script>