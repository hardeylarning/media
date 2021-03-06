<?php include "includes/header.php"; ?>
    <div class="jumbotron-fluid bg-dark">
        <div class="row d-flex flex-fill bg-dark">
            <?php include "includes/navigation.php";?>
            <div class="col-md bg-light">
                <p class="lead text-dark mt-2 display-4 " style="font-family: Algerian; font-weight: bold;">Welcome to admin <small class="text-muted"><?php echo $_SESSION['username']; ?></small> </p>
                <div class="row p-5 border bg-secondary">
                    <div class="col-lg-4 col-md-4" style="font-family: Algerian; font-weight: bold;">
                        <?php
                        $query="SELECT * FROM musics ";
                        $all_musics=mysqli_query($connection, $query);
                        $musics_count=mysqli_num_rows($all_musics);
                        ?>
                        <li class="list-group-item list-group-item-action list-group-item-secondary d-flex justify-content-between">Musics<span class="badge badge-secondary" style="font-size: large;"><?php echo $musics_count; ?></span> </li>
                        <a href="" class="d-flex justify-content-between bg-dark nav-link text-muted">View Details <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4" style="font-family: Algerian; font-weight: bold;">
                        <?php
                        $query="SELECT * FROM music_comments ";
                        $all_music_comments=mysqli_query($connection, $query);
                        $music_comments_count=mysqli_num_rows($all_music_comments);
                        ?>
                        <li class="list-group-item list-group-item-action list-group-item-danger d-flex justify-content-between">Music Comment<span class="badge badge-danger" style="font-size: large;"><?php echo $music_comments_count; ?></span> </li>
                        <a href="" class="d-flex justify-content-between bg-dark nav-link text-muted">View Details <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4" style="font-family: Algerian; font-weight: bold;">
                        <?php
                        $query="SELECT * FROM categories ";
                        $all_music_categories=mysqli_query($connection, $query);
                        $music_categories_count=mysqli_num_rows($all_music_categories);
                        ?>
                        <li class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between">Music Categories<span class="badge badge-info" style="font-size: large;"><?php echo $music_categories_count; ?></span> </li>
                        <a href="" class="d-flex justify-content-between bg-dark nav-link text-muted">View Details <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php"; ?>