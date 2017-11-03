<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 05/09/2017
 * Time: 07:31 م
 * IQ TECH Tutorials
 * Project : apkstore
 * index.php
 */
include 'header.php';
?>
    <div class="row">
        <?php
       include 'category.php';
        ?>
        <div class="col-md-9">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img style="width: 100%" src="slider/s1.jpg" alt="Slider1">
                                    <div class="carousel-caption">
                                        <h1>Slider1</h1>
                                    </div>
                                </div>
                                <div class="item">
                                    <img style="width: 100%" src="slider/s2.jpg" alt="Slider2">
                                    <div class="carousel-caption">
                                        <h1>Slider2</h1>
                                    </div>
                                </div>

                                <div class="item">
                                    <img style="width: 100%" src="slider/s3.jpg" alt="Slider1">
                                    <div class="carousel-caption">
                                        <h1>Slider3</h1>
                                    </div>
                                </div>

                                <div class="item active">
                                   <a href="#"> <img style="width: 100%" src="slider/s4.jpg" alt="Slider1"></a>
                                    <div class="carousel-caption">
                                        <h1>Slider4</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h2>Featured Apps</h2>
                        <div class="owl-carousel owl-theme">
                            <?php
                            $carousel = "SELECT * FROM `files` LIMIT 12";
                            $query = mysqli_query($connect,$carousel);
                            if (mysqli_affected_rows($connect) > 0){
                                while ($data = mysqli_fetch_assoc($query)){
                                    echo '<div class="item">
                                   <a href="app.php?id='.$data['file_id'].'"><img src="uploads/'.$data['file_icon'].'" class="img-responsive" /></a>
                                    <h4>'.$data['file_title'].'</h4>
                                </div>';
                                }
                            }

                            ?>

                        </div>

                        <h2>Latest Apps</h2>
                        <div class="owl-carousel owl-theme">
                            <?php
                            $carousel = "SELECT * FROM `files` ORDER BY `file_date` DESC LIMIT 12";
                            $query = mysqli_query($connect,$carousel);
                            if (mysqli_affected_rows($connect) > 0){
                                while ($data = mysqli_fetch_assoc($query)){
                                    echo '<div class="item">
                                   <a href="app.php?id='.$data['file_id'].'"><img src="uploads/'.$data['file_icon'].'" class="img-responsive" /></a>
                                    <h4>'.$data['file_title'].'</h4>
                                </div>';
                                }
                            }

                            ?>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

   <?php
    include 'footer.php';