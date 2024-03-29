<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   
    <!------ Include the above in your HEAD tag ---------->
   
</head>

<body>
    <div class="container">
        <div class=" card">
            <form class="form-horizontal" role="form" id="login_form">
                <div style="margin-top:0em ; margin-left: 85px;">  <h2>Login</h2> </div>
               
                
                <div class="form-group">
                    <label for="uname" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="uname" id="uname"  name="uname"  placeholder="Username" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
                     
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
    </div> <!-- ./card -->
</body>
<script>
    $("#login_form").submit(function(e) {
           
           e.preventDefault(); // avoid to execute the actual submit of the form.

           var form = $(this);
           var actionUrl = form.attr('action');

           $.ajax({
               type: "POST",
               url: "form_validation.php",
               data: "function=login&"+form.serialize(), // serializes the form's elements.
               success: function(data) {
                data = JSON.parse(data);
           
                  if(data != 0)
                  {
                   role = (data[0].role);
                    if(role == "admin"){
                        alert("Welcome,"+ data[0].uname);
                        window.location.replace("admin/admin_dashboard.php");
                    }
                    else{
                        alert("Welcome,"+data[0].uname);
                        window.location.replace("instructor/instructor_dashboard.php");
                    }
                 
                  }
                  else{
                    alert("Invalid username or password");
                  }
                   
               }
           });

       });
</script>
</html>