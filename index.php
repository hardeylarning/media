<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
 <?php include "includes/navigation.php"; ?>
<div class="jumbotron-fluid">
    <table class="table table-bordered table-responsive table-hover">
            <marquee behavior="scroll" scrollamount="20" direction="left">
                <tr>




<?php
$query="SELECT * FROM musics";
$select_music=mysqli_query($connection,$query);

$query2="SELECT * FROM videos";
$select_video=mysqli_query($connection,$query2);
if (!$select_music){
    die("QUERY FAILED". mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($select_music)){
    $music_id=$row['music_id'];
    $music_image=$row['music_image'];
    $music_title=$row['music_title'];
    $music_date = $row['music_date'];
    ?>

        <td>
            <div id="slide" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a class='' href='music.php?m_id=<?php echo $music_id; ?>' >
                             <img src="admin/images/<?php echo  $music_image; ?>" alt="" style="width: 350px; height: 350px;" class=" card-img"> </a>
                            <div class="carousel-caption d-none d-md-block" data-parent="#slide">
                                <p class='lead font-weight-bold bg-dark'>Music: <a class='nav-pills text-decoration-none' href='music.php?m_id=<?php echo $music_id; ?>' > <?php echo $music_title; ?> </a> </p>
                            </div>
                     </div>
                </div>
            </div>
        </td>

    <?php
    while($video = mysqli_fetch_assoc($select_video)){
        $video_id=$video['video_id'];
        $video_image=$video['video_image'];
        $video_title=$video['video_title'];
        $video_date = $video['video_date'];
        ?>
        <td>
            <div id="slide" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a class='' href='video.php?v_id=<?php echo $video_id; ?>' >
                            <img src="admin/images/<?php echo  $video_image; ?>" alt="" style="width: 350px; height: 350px;" class=" card-img"> </a>
                        <div class="carousel-caption d-none d-md-block" data-parent="#slide">
                            <p class='lead font-weight-bold bg-dark'>Video: <a class='nav-pills text-decoration-none' href='video.php?v_id=<?php echo $video_id; ?>' > <?php echo $video_title; ?> </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    <?php }
    ?>


<?php } ?>


            </tr>
            </marquee>
    </table>
</div>
<div class="jumbotron-fluid bg-dark justify-content-center text-white py-1 mb-3">
    <p class="display-4 text-center font-weight-bold">Latest Nigerian Musics & Videos</p>
</div>
<div class="container-fluid justify-content-between">
    <div class="row">
        <div class="col-1 col-md-1">
            <div id="accordion">
                        <a href="" class="mb-4"  data-toggle="collapse" data-parent="#accordion" >
                            <img src="images/fb.png" id="part1" class="img-fluid card-img" style="width: 60px; height: 80px;" alt=""></a>
                    <a href="" class="mb-4" data-toggle="collapse" data-parent="#accordion" >
                        <img src="images/flickr.jpg" id="part2" class="img-fluid card-img" style="width: 60px; height: 80px;" alt=""></a>
            </div>

        </div>
        <div class="col-8 col-md-8">
            <div class="row mr-0">
                    <?php
                    $query="SELECT * FROM musics";
                    $select_music=mysqli_query($connection,$query);

                    $query2="SELECT * FROM videos";
                    $select_video=mysqli_query($connection,$query2);
                    if (!$select_music){
                        die("QUERY FAILED". mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($select_music)){
                        $music_id=$row['music_id'];
                        $music_image=$row['music_image'];
                        $music_title=$row['music_title'];
                        $music_date = $row['music_date'];
                        ?>
                        <div class="col-md-6 mb-2">
                            <div class="card">
                                <picture style="background-image: url('images/1g.gif');
                                background-repeat: no-repeat;
                                background-attachment: fixed;
                                background-position: center;
                                background-size: cover;">
                                    <source srcset="admin/images/<?php echo  $music_image; ?>">
                                    <img src="admin/images/<?php echo  $music_image; ?>" alt="" class="card-img img-fluid" style="height: 300px; width: 500px;"></picture>
                                <div class="card-img-overlay justify-content-start mr-0">
                                    <i class="fa fa-clock bg-white p-2"><span class="card-title"><?php echo $music_date; ?></span></i>
                                </div>
                            </div>
                            <div class="container text-center border shadow-lg p-3 bg-white">
                                <p class="lead "><span class="font-weight-bold">Music: <a class="text-decoration-none" href="music.php?m_id=<?php echo $music_id; ?>"><?php echo $music_title.'<br>'; ?></a></p>
                            </div>

                        </div>
                        <?php
                        while($video = mysqli_fetch_assoc($select_video)){
                            $video_id=$video['video_id'];
                            $video_image=$video['video_image'];
                            $video_title=$video['video_title'];
                            $video_date = $video['video_date'];
                            ?>
                            <div class="col-md-6 mb-2 bg-white">
                                <div class="card">
                                    <picture>
                                        <source srcset="admin/images/<?php echo  $video_image; ?>">
                                        <img src="admin/images/1.jpg" alt="" class="card-img img-fluid" style="height: 300px; width: 500px;"></picture>
                                    <div class="card-img-overlay">
                                        <i class="fa fa-clock bg-white p-2"><span class="card-title"><?php echo $video_date; ?></span></i>
                                    </div>
                                </div>
                                <div class="container text-center border shadow-lg p-3 bg-white">
                                    <p class="lead "><span class="font-weight-bold">Video:
                                            <a class="text-decoration-none" href="video.php?v_id=<?php echo $video_id; ?>"><?php echo $video_title.'<br>'; ?></a>
                                    </p>
                                </div>
                            </div>
                        <?php }
                        ?>
                    <?php } ?>
            </div>
        </div>
        <div class="col-3 col-md-3">
            <?php include "includes/sidebar.php"?>
        </div>
    </div>
</div>



<!--footer include -->
<?php include "includes/footer.php"; ?>
