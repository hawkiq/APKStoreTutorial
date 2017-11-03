<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 25/09/2017
 * Time: 08:13 م
 * IQ TECH Tutorials
 * Project : apkstore
 * app.php
 */

include 'header.php';
if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM `files` WHERE `file_id` = $id";
    $q = mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) > 0){
        $file = mysqli_fetch_assoc($q);
    }else{
        die ('No File Found');
    }
}else{
    die('No App Found');
}
?>
    <div class="row">
        <?php
        include 'category.php';
        ?>
        <div class="col-md-9">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <img src="uploads/<?php echo $file['file_promo']; ?>" class="img-responsive" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="uploads/<?php echo $file['file_icon']; ?>" class="img-responsive" />
                    </div>
                    <div class="col-md-4">
                        <h1><?php echo $file['file_title']; ?></h1>
                        Uploader : <span><?php echo get_uploader($file['file_uploader']); ?></span><br/>
                        Category: <span><?php echo get_cat($file['file_cat']); ?></span><br/>
                        Verdsion: <span class="label label-default"><?php echo $file['file_version']; ?></span>
                        <br/>
                        <a href="uploads/<?php echo $file['file_path']; ?>" class="btn btn-raised btn-primary">Download</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $file['file_desc']; ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php
include 'footer.php';