<!-- header include  -->

<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/sidebar.php"; ?>
<div class="jumbotron-fluid mt-4">
    <div class="row mt-4">
        <div class="col-md border-dark ">
            <div class="row m-2">
            <?php
            if (isset($_POST['submit'])){
                $search = $_POST['search'];

                $query = "SELECT * FROM musics WHERE music_title LIKE '%$search%' OR description LIKE '%$search%'";
                $search_musics = mysqli_query($connection, $query);
                if (!$search_musics){
                    die("QUERY FAILED". mysqli_error($connection));
                }
                $count = mysqli_num_rows($search_musics);
                if ($count==0){
                    echo "<h1>NO RESULT FOUND</h1>";
                }
                else{
                    while ($row = mysqli_fetch_assoc($search_musics)) {
                        $music_title = $row['music_title'];
                        $music_image = $row['music_image'];
                        $music_date = $row['music_date'];
                        $artist = $row['artist'];
                        $genre = $row['genre'];
                        $producer = $row['producer'];
                        $featuring = $row['featuring'];
                        $recorded_year = $row['recorded_year'];
                        $description = $row['description'];
                        ?>
                        <hr>
                        <div class="col-md">
                            <div class="card">
                                <img src="images/<?php echo  $music_image; ?>" alt="" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-title lead text-primary"><a href=""><?php echo $music_title.'<br>'; ?></a></p>
                                    <p class="card-text"><?php echo $description.'<br>'; ?> </p>
                                    <p><small class="fa fa-clock text-muted"><?php echo $music_date.'<br>'; ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php     } } } ?>
            </div>
        </div>

    </div>

</div>



<!--footer include -->
<?php include "includes/footer.php"; ?>
