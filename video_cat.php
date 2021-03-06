<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="jumbotron-fluid mt-4">
    <div class="row mt-4">
        <div class="col-md border-dark ">
<div class="row m-2">
    <?php
    if (isset($_GET['v_cat'])){
        $the_m_id =$_GET['v_cat'];
    $query = "SELECT * FROM videos WHERE category_id= {$the_m_id}";
    $select_all_category = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_category)) {
        $video_id = $row['video_id'];
        $category_id = $row['category_id'];
        $video_title = $row['video_title'];
        $video = $row['video'];
        $video_image = $row['video_image'];
        $video_date = $row['video_date'];
        $artist = $row['artist'];
        $featuring = $row['featuring'];
        $recorded_year = $row['recorded_year'];
        $producer = $row['producer'];
        $description = $row['description'];
        $comment_count = $row['comment_count'];
        ?>
        <hr>
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <img src="admin/images/<?php echo  $video_image; ?>" alt="" style="width: 1200px; height: 300px; " class="card-img img-fluid">
                    <p class="card-title lead text-primary mb-2"><a href="video.php?v_id=<?php echo $video_id; ?>"><?php echo $video_title.'<br>'; ?></a></p>
                </div>
            </div>
        </div>
    <?php     } } ?>
</div>
</div>
<div class="col-md-2">
    <div class="card">
        <div class="card-body">
            <p class="card-title lead text-light bg-dark"><u>Video Categories</u></p>
            <p class="card-text">
                <?php
                $query= "SELECT * FROM video_categories ";
                $select_categories=mysqli_query($connection, $query);
                while ($row=mysqli_fetch_assoc($select_categories)){
                    $cat_id=$row['cat_id'];
                    $cat_title= $row['cat_title'];
                    echo "<a href='video_cat.php?v_cat={$cat_id}' class='text-decoration-none'>{$cat_title}</a><hr>";
                }
                ?>
        </div>
    </div>
</div>

</div>

</div>



<!--footer include -->
<?php include "includes/footer.php"; ?>

