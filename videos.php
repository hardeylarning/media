<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="jumbotron-fluid mt-4">
    <div class="row mt-4">
        <div class="col-md border-dark ">
            <div class="row m-2">
            <?php
                $query = "SELECT * FROM videos";
                $select_musics = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_musics)) {
                    $video_id = $row['video_id'];
                    $category_id = $row['category_id'];
                    $video_title = $row['video_title'];
                    $video = $row['video'];
                    $video_image = $row['video_image'];
                    $video_date = $row['video_date'];
                    $artist = $row['artist'];
                    $genre = $row['genre'];
                    $featuring = $row['featuring'];
                    $recorded_year = $row['recorded_year'];
                    $producer = $row['producer'];
                    $description = $row['description'];
                    $comment_count = $row['comment_count'];
                    ?>
                    <hr>
                        <div class="col-md-4 border shadow mb-2">
                            <img src="admin/images/<?php echo $video_image; ?>" alt="" class="card-img img-fluid" style=" width: 800px; height: 500px;">
                            <p class="lead mb-2 nav-item nav-link"><a href="video.php?v_id=<?php echo $video_id; ?>"><?php echo $video_title.'<br>'; ?></a></p>
                            <p><small class="text-muted"> <i class="fa fa-clock"></i><?php echo $video_date.'<br>'; ?></small></p>
                        </div>
           <?php     } ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="col-md-12 border shadow">
                <p class="lead text-center text-dark">Music Categories</p>
                <p class="lead ">
                    <?php
                    $query= "SELECT * FROM categories ";
                    $select_categories=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_categories)){
                        $cat_id=$row['cat_id'];
                        $cat_title= $row['cat_title'];
                        echo "<a href='music_cat.php?m_cat={$cat_id}' class='text-decoration-none'>{$cat_title}</a><hr>";
                    }
                    ?>
            </div>
            <div class="col-md-12 border shadow">
                <p class="lead text-center text-dark">Video Categories</p>
                <p class="lead ">
                    <?php
                    $query= "SELECT * FROM video_categories ";
                    $select_video_categories=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_video_categories)){
                        $cat_id=$row['cat_id'];
                        $cat_title= $row['cat_title'];
                        echo "<a href='video_cat.php?v_cat={$cat_id}' class='text-decoration-none'>{$cat_title}</a><hr>";
                    }
                    ?>
            </div>
        </div>

    </div>

</div>



<!--footer include -->
<?php include "includes/footer.php"; ?>
