<?php 
include_once 'setting/server.php';
include_once 'menu/head.php';
include 'menu/h1.php';

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 <br>
 <br>
 <br>
 <br><form class="form-horizontal" action="mail.php" method="POST">
<fieldset>
<div class="alert alert-error">

</div>

<!-- Form Name -->
<legend>Register Member</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="text">User Name</label>  
  <div class="col-md-4">
  <input id="text" name="username" type="text" placeholder="Usename" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="email" type="email" placeholder="Email @" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Nama Lengkap</label>  
  <div class="col-md-4">
  <input id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pass1">Password</label>
  <div class="col-md-4">
    <input id="pass1" name="pass1" type="password" placeholder="***" class="form-control input-md" required="">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="pass2">Confirm Password</label>
  <div class="col-md-4">
    <input id="pass2" name="pass2" type="password" placeholder="**" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success">Daftar</button>
  </div>
</div>

</form>

 </body>
 </html>