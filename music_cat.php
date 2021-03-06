<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<!--sidebar include-->

<div class="jumbotron-fluid justify-content-between mt-4">
    <div class="row">
        <div class="d-none d-md-block col-1 col-md-1 bg-dark">

        </div>
        <div class=" col-md border-dark ">
            <div class="row">
    <?php
    if (isset($_GET['m_cat'])){
        $the_m_id =$_GET['m_cat'];
    $query = "SELECT * FROM musics WHERE category_id= {$the_m_id}";
    $select_all_category = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_category)) {
        $music_id = $row['music_id'];
        $category_id = $row['category_id'];
        $music_title = $row['music_title'];
        $music = $row['music'];
        $music_image = $row['music_image'];
        $music_date = $row['music_date'];
        $artist = $row['artist'];
        $genre = $row['genre'];
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
                            <img src="admin/images/<?php echo  $music_image; ?>" alt="" style="width: 500px; height: 300px; " class="card-img img-fluid">
                            <p class="card-title lead mb-2">Title: <a class="text-decoration-none" href="music.php?m_id=<?php echo $music_id; ?>"><?php echo $music_title.'<br>'; ?></a></p>
                            <p >Date: <small class="fa fa-clock text-muted"><?php echo $music_date.'<br>'; ?></small></p>
                        </div>
                    </div>
                </div>
    <?php     } } ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php include "includes/sidebar.php"; ?>
        </div>
    </div>
</div>
<!--footer include -->
<?php include "includes/footer.php"; ?>

