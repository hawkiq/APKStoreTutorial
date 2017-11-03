<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 29/09/2017
 * Time: 12:23 ص
 * IQ TECH Tutorials
 * Project : apkstore
 * search.php
 */
include 'header.php';
if (isset($_GET['q']) && !empty($_GET['q']) && strlen($_GET['q']) > 2){

    $searchQuery = clean($_GET['q']);
    $sqlf = "SELECT * FROM `files` WHERE `file_title` LIKE '%$searchQuery%'";
}else{
    echo 'Write at least 3 letters';
    exit();
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
                    $pager = new PS_Pagination($connect,$sqlf,4,4,'q='.$searchQuery);
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