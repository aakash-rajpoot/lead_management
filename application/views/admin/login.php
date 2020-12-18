<!DOCTYPE html>
<html lang="en">
<title> square</title>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<head>

<style>
/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
:root {
  --primary-color: white;
  --secondary-color: #4caf50;
  --bg-color: rgba(0, 0, 0, 0.8);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  background: url('./media/images/image-logo.jpg') no-repeat;
  background-size: auto;
  background-position-y: 30%;
}

/*--------------------------------------------------------------
# Login
--------------------------------------------------------------*/
.login-box {
  padding: 50px;
  margin-top:316px;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);

  background-color:   #212529);
  background-color: var(--bg-color);
  box-shadow: 0 15px 25px var(--bg-color);
  border-radius: 10px;
}

.login-box h1 {
  font-size: 30px;
  color: var(--primary-color);
  margin-bottom: 10px;
  padding: 13px 0;
  text-align: center;
}

.textbox {
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0 30px 0;
  border-bottom: 2px solid var(--secondary-color);
}

.textbox i {
  width: 26px;
  float: left;
  text-align: center;
  color: var(--primary-color);
}

.textbox input {
  border: none;
  outline: none;
  background: none;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
  color: var(--primary-color);
}

.btn {
  width: 100%;
  height: 50px;
  background: none;
  border: 2px solid var(--secondary-color);
  border-radius: 5px;
  color: var(--primary-color);
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
  color: var(--primary-color);
  background-color: var(--secondary-color);
}

.php_error{
  color:#d61323;
  font-size:16px;
}
</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?=form_open('',array('method' => 'post','novalidate'=>'novalidate')); ?>

    
<!-- login -->
<div class="login-box">
  <h1>Admin Login</h1>
  <?=validation_errors(); ?>
  <!-- ======= Username ======= -->
  <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
    <input type="text" name="email" id="email" placeholder="Enter Your User Id"><sup class='error'>*</sup>
  </div>

  <!-- ======= Password ======= -->
  <div class="textbox">
    <i class="fa fa-lock" aria-hidden="true"></i>
    <input type="password" name="password" id="password" placeholder="Enter Your Password"><sup class='error'>*</sup>
  </div>

  <!-- ======= Sign in ======= -->
  <button type="submit" class="btn btn-primary button-hor" name="admin-login">Login</button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
</body>
</html>