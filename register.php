<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 09/09/2017
 * Time: 11:39 م
 * IQ TECH Tutorials
 * Project : apkstore
 * register.php
 */
include 'header.php';
if (isset($_SESSION['login']) && $_SESSION['login'] != ""){
    header("Location:index.php");
    exit();
}

if (isset($_POST['register'])){

    $error = false;
    $msg = '';
    $username = clean($_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = clean($_POST['email']);

    if (checkUser($username)){
        $error = true;
        $msg .= "<li>Username Already Used</li>";
    }

    if (checkEmail($email)){
        $error = true;
        $msg .= "<li>Email Already Registerd</li>";
    }

    if (strlen($password) < 5){
        $error = true;
        $msg .='<li>Password length shorter than 6</li>';
    }

    if ($password != $password2){
        $error = true;
        $msg .= '<li>Passwords doesn\'t match</li>';
    }

    if ($error == false){
       $hashedPassword = md5($password);
        $sql = "INSERT INTO `users` (`user_name`,`user_pass`,`user_mail`) VALUES ('$username','$hashedPassword','$email')";
        mysqli_query($connect,$sql);
        if (mysqli_affected_rows($connect) > 0){
            echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Well done!</strong>
  Registered OK
</div>';
        }
    }else{
        echo '<div class="alert alert-dismissible alert-danger">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Error!</strong>
                 '.$msg.'
                </div>';
    }

}
?>
    <div class="row">
        <?php
        include 'category.php';
        ?>
        <div class="col-md-9">
            <div class="jumbotron">
                <form class="form-horizontal" action="" method="post">
                    <fieldset>
                        <legend>Register</legend>

                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                                <input class="form-control" id="username" name="username" placeholder="Enter Username" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" id="password" name="password" placeholder="Enter Password more than 6" type="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password2" class="col-md-2 control-label">Retype Password</label>
                            <div class="col-md-10">
                                <input class="form-control" id="password2" name="password2" placeholder="Enter Password Again" type="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" id="email" name="email" placeholder="Enter Email" type="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-info btn-raised btn-block" name="register" value="Register" />
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>

    </div>

<?php
include 'footer.php';