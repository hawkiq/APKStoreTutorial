<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 12/09/2017
 * Time: 08:37 م
 * IQ TECH Tutorials
 * Project : apkstore
 * login.php
 */

include 'header.php';
if (isset($_SESSION['login']) && $_SESSION['login'] != ""){
    header("Location:index.php");
    exit();
}
if (isset($_POST['login'])){
    $username = clean($_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `user_name` = '$username' AND `user_pass` = '$password'";
    $q = mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) == 1){
        $data = mysqli_fetch_assoc($q);

        $_SESSION['userid'] = $data['user_id'];
        $_SESSION['login'] = $data['user_name'];
        header('Location:index.php');
    }else{
        echo '<div class="alert alert-dismissible alert-danger">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Error!</strong>
                Login Error
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
                        <legend>Login</legend>

                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                                <input class="form-control" id="username" name="username" placeholder="Enter Username" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-info btn-raised btn-block" name="login" value="Login" />
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>

    </div>

<?php
include 'footer.php';