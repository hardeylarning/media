<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="jumbotron-fluid bg-dark justify-content-center text-white py-1  my-3">
    <p class="display-4 text-center font-weight-bold">Nigerian Musics Download</p>
</div>
<div class="jumbotron-fluid mt-4">
    <div class="row mt-4">
        <div class="col-1 col-md-1">
            <div class="container bg-dark"></div>
        </div>
        <div class="col-md-8 border-dark mb-2">
            <div class="row">
            <?php
                $query = "SELECT * FROM musics";
                $select_musics = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_musics)) {
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
                                <picture>
                                    <source srcset="admin/images/<?php echo  $music_image; ?>">
                                    <img src="admin/images/<?php echo $music_image; ?>" alt="" class="card-img img-fluid" style="height: 300px; width: 500px;"></picture>
                            </div>
                            <div class="container text-center border shadow-lg p-3 bg-white">
                                <p class="lead "><span class="font-weight-bold"><a class="text-decoration-none" href="music.php?m_id=<?php echo $music_id; ?>"><?php echo $music_title.'<br>'; ?></a></p>
                                <i class="fa fa-clock text-muted p-2"><span class="card-title"><?php echo $music_date; ?></span></i>
                            </div>

                        </div>

           <?php     } ?>
            </div>
            </div>
        <div class="col-md-3">
                <!--   sidebar categories         -->
           <?php include "includes/sidebar.php"?>
        </div>

    </div>

</div>



<!--footer include -->
<?php include "includes/footer.php"; ?>
