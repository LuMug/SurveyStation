<form id="form-login" action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter email" name="login_email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="login_password" class="password form-control m-t-xxs" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="inline-flex">
      <button type="submit" class="ow-m-btn btn-green" href='?<?php $_SESSION["user"] ?>'>Login</button>
      <a class="ow-m-btn btn-green" id="btn-register">Nuovo account?</a>
    </div>
</form>
<form id="form-register" class="displayNo" action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter email" name="registr_email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="registr_password" class="password form-control m-t-xxs" id="password_register" placeholder="Password">
    </div>
    <div class="inline-flex">
      <button type="submit" class="ow-m-btn btn-green">Registrati</button>
      <a class="ow-m-btn btn-green" id="btn-login">Hai un account?</a>
    </div>
</form>
<?php include "form_user_script.php"?>