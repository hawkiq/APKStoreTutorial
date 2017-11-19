<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 14/09/2017
 * Time: 08:15 م
 * IQ TECH Tutorials
 * Project : apkstore
 * upload.php
 */
include 'header.php';
if (!isset($_SESSION['login']) && $_SESSION['login'] == ""){
    header("Location:login.php");
    exit();
}

if (isset($_POST['upload'])){
    $error = false;
    $msg = '';
    $uploadDir = 'uploads/';
    $picsExt = array('gif','jpg','jpeg','png','bmp');
    $hash = date('YmdHis');
    $time = date('Y-m-d H:i:s');

    $title = clean($_POST['apptitle']);
    $appTitle = preg_replace('/[\x7f-\xff -]/',"_",$title);

    $desc = clean($_POST['appdesc']);
    $version = clean($_POST['appversion']);
    $cat = (int)$_POST['filecat'];


    if (check($title,$version)){
        $error = true;
        $msg .= 'Application Already found';
    }

    if (!empty($_FILES['appicon']['name'])){
        $fileName = $_FILES['appicon']['name'];
        $fileTmp = $_FILES['appicon']['tmp_name'];
        $fileType = $_FILES['appicon']['type'];
        $fileExt = pathinfo($fileName,PATHINFO_EXTENSION);

        if ((!in_array(strtolower($fileExt) , $picsExt))){
            $error = true;
            $msg .= 'Wrong Extension for Icon';
        }else{
            $iconFile = $appTitle.'_'.$hash.'.'.$fileExt;
        }
    }else{
        $error = true ;
        $msg .= 'You forget to upload Icon';
    }
    if (!empty($_FILES['apppromo']['name'])){
        $promoName = $_FILES['apppromo']['name'];
        $promoTmp = $_FILES['apppromo']['tmp_name'];
        $promoType = $_FILES['apppromo']['type'];
        $promoExt = pathinfo($promoName,PATHINFO_EXTENSION);

        if ((!in_array(strtolower($promoExt) , $picsExt))){
            $error = true;
            $msg .= 'Wrong Extension for Promo';
        }else{
            $promoFile = $appTitle.'_promo_'.$hash.'.'.$promoExt;
        }
    }
    if (!empty($_FILES['appfile']['name'])){
        $apkName = $_FILES['appfile']['name'];
        $apkTmp = $_FILES['appicon']['tmp_name'];
        $apkType = $_FILES['appicon']['type'];
        $apkExt = pathinfo($apkName,PATHINFO_EXTENSION);

        if (strtolower($apkExt) != 'apk'){
            $error = true;
            $msg .= 'Wrong Extension for File';
        }
        $apkFile = $appTitle.'_'.$hash.'.'.$apkExt;
    }else{
        $error = true;
        $msg .= 'You forget to Upload APK File';
    }

    if ($error ==false){
        create_thumb($fileTmp,$uploadDir.$iconFile,$fileType,512,512);
        create_thumb($promoTmp,$uploadDir.$promoFile,$promoType,1200,300);
        move_uploaded_file($apkTmp,$uploadDir.$apkFile);
        $userId = $_SESSION['userid'];

        $sql = "INSERT INTO `files` (`file_title`, `file_desc`, `file_icon`, `file_promo`, `file_version`, `file_date`, `file_cat`, `file_uploader`, `file_path`, `file_active`) VALUES ('$title', '$desc', '$iconFile', '$promoFile', '$version', '$time', '$cat', '$userId', '$apkFile', '0')";
        mysqli_query($connect,$sql);
        if (mysqli_affected_rows($connect) > 0){
            echo '<div class="alert alert-dismissible alert-success">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>OK!</strong>
                 File Uploaded wait for Admin Approval
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
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Upload File</legend>
                        <div class="form-group">
                            <label for="apptitle" class="col-md-2 control-label">App Title</label>

                            <div class="col-md-10">
                                <input class="form-control" id="apptitle" name="apptitle" placeholder="Enter app title" type="text" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="appdesc" class="col-md-2 control-label">App Description</label>

                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" id="appdesc" name="appdesc" required></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="appicon" class="col-md-2 control-label">Icon</label>

                            <div class="col-md-10">
                                <input readonly="" class="form-control" placeholder="Browse..." type="text">
                                <input id="appicon" name="appicon" multiple="" type="file" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apppromo" class="col-md-2 control-label">Promo Picture</label>

                            <div class="col-md-10">
                                <input readonly="" class="form-control" placeholder="Browse..." type="text">
                                <input id="apppromo" name="apppromo" multiple="" type="file" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="appfile" class="col-md-2 control-label">APK File</label>

                            <div class="col-md-10">
                                <input readonly="" class="form-control" placeholder="Browse..." type="text">
                                <input id="appfile" name="appfile" multiple="" type="file" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="appversion" class="col-md-2 control-label">App Version</label>

                            <div class="col-md-10">
                                <input class="form-control" id="appversion" name="appversion" placeholder="Enter app Version" type="text" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="filecat" class="col-md-2 control-label">Category</label>

                            <div class="col-md-10">
                                <select id="filecat" name="filecat" class="form-control" required>
                                    <?php
		
			 
			  $sql = "SELECT * FROM `category`";
                                    $q = mysqli_query($connect,$sql);
                                    if (mysqli_affected_rows($connect) > 0){
                                        while ($data = mysqli_fetch_assoc($q)){
                                            echo '<option value="'.$data['cat_id'].'">'.$data['cat_name'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">

                               <input type="submit" class="btn btn-info btn-raised btn-block" value="Upload" name="upload" />

                        </div>
                    </fieldset>
                </form>
            </div>

        </div>

    </div>

<?php
include 'footer.php';