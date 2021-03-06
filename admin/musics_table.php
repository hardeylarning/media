<!--header include -->
<?php include "includes/header.php"; ?>
<div class="jumbotron-fluid bg-dark">
    <div class="row d-flex flex-fill bg-dark justify-content-between">
        <?php include "includes/navigation.php";?>
        <div class="col-md-9 bg-light">

<!--           <h1 class="display-4">Welcome to Admin-->
<!--           <small class="text-muted">Author</small>-->
<!--           </h1>-->
<!--       switching between musics musics     -->
            <?php
            if (isset($_GET['source'])){
                $source =$_GET['source'];
            }
            else {
                $source = '';
            }
            switch ($source){
                case 'add_music':
                    include "includes/add_music.php";
                    break;
                case 'edit_music':
                    include "includes/edit_music.php";
                    break;
                default:
                    include "includes/view_all_musics.php";
                    break;
            }

            ?>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
