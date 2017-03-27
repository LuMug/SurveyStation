<form id="form-login" action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter email" name="login_email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="login_password" class="password form-control m-t-xxs" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="checkbox">
        <label class="no-s">
            <div class="checker"><span class="checked"><input type="checkbox"></span></div> Voglio ricevere l'email di allarme
        </label>
    </div>
    <button type="submit" class="btn btn-primary m-t-xs m-b-xs" href='?<?php $_SESSION["user"] ?>'>Login</button>
    <div class="">
      Non hai un account?
    </div>
    <a class="btn btn-primary m-t-xs m-b-xs" id="btn-register">Registrati</a>
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
    <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Registrati</button>
    <div class="">
      Hai un account?
    </div>
    <a class="btn btn-primary m-t-xs m-b-xs" id="btn-login">Accedi</a>
</form>
