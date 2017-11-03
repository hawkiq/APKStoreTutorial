<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 22/09/2017
 * Time: 07:19 م
 * IQ TECH Tutorials
 * Project : apkstore
 * cat.php
 */
include 'header.php';
if (isset($_GET['catid']) && !empty($_GET['catid'])){
    $mcatID = (int)$_GET['catid'];
    $sqlf = "SELECT * FROM `files` WHERE `file_cat` = $mcatID ORDER BY `file_date` DESC";
}else{
    $sqlf = "SELECT * FROM `files` ORDER BY `file_date` DESC";
}
?>
    <div class="row">
        <?php
        include 'category.php';
        ?>
        <div class="col-md-9">
            <div class="jumbotron">
                <div class="row">
                <?php
                $pager = new PS_Pagination($connect,$sqlf,4,4,'catid='.$mcatID);
                if ($pager->paginate())
               // $q = mysqli_query($connect,$sqlf);
                {
                    $q = $pager->paginate();
                    while ($data = mysqli_fetch_assoc($q)){
                        $fileID = $data['file_id'];
                        $fileTitle = $data['file_title'];
                        $fileIcon = $data['file_icon'];
                        echo '<div class="col-md-3">
<div class="panel panel-success">
                         <div class="panel-heading">
                            <h3 class="panel-title">'.$fileTitle.'</h3>
                         </div>
                          <div class="panel-body">
                           <div class="">
                        <a href="app.php?id='.$fileID.'" class="thumbnail">
                          <img src="uploads/'.$fileIcon.'" alt="'.$fileTitle.'">
                         </a>
                        </div>
                     </div>
                </div>
                </div>';
                    }
                }
                ?>
                </div><!-- row-->
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo $pager->renderFullNav();
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php
include 'footer.php';