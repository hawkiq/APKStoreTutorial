<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 05/09/2017
 * Time: 08:01 م
 * IQ TECH Tutorials
 * Project : apkstore
 * category.php
 */
?>
     
				
<div class="col-md-3">
    <div class="jumbotron">
				<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
					<li><a href="cat.php">All Applications</a></li>
					<?php

					$sql = "SELECT * FROM `category`";
					$q = mysqli_query($connect,$sql);
					if (mysqli_affected_rows($connect) > 0){
						while ($data = mysqli_fetch_assoc($q)){
							$catID = $data['cat_id'];
							$catName = $data['cat_name'];
							echo '<li><a href="cat.php?catid='.$catID.'">'.$catName.'</a></li>';
						}
					}
					?>


</ul>

    </div>
</div>
