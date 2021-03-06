<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="jumbotron-fluid">
    <table class="table table-bordered table-responsive table-hover">
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
                            <div class="carousel-caption d-md-block" data-parent="#slide">
                                <p class='lead font-weight-bold bg-dark p-3'>Music: <a class='nav-pills text-decoration-none' href='music.php?m_id=<?php echo $music_id; ?>' > <?php echo $music_title; ?> </a> </p>
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
                        <div class="carousel-caption d-md-block" data-parent="#slide">
                            <p class='lead font-weight-bold bg-dark p-3'>Video: <a class='nav-pills text-decoration-none' href='video.php?v_id=<?php echo $video_id; ?>' > <?php echo $video_title; ?> </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    <?php }
    ?>


<?php } ?>
            </tr>
    </table>
</div>
<div class="jumbotron-fluid bg-dark justify-content-center text-white py-1  mb-1">
     <?php
            if (isset($_GET['m_id'])){
                $the_m_id =$_GET['m_id'];

            $query = "SELECT * FROM musics WHERE music_id= {$the_m_id}";
            $select_music = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_music)) {
                $music_title = $row['music_title'];
                $artist=$row['artist'];
                echo "<p class='display-4 text-center '>Audio: $music_title by $artist </p>";
                }
                }
                ?>
</div>

<div class="jumbotron-fluid mt-4 mb-5">
    <div class="row mt-4">

        <div class="col-md border-dark justify-content-around">
            <div class="container">
            <?php
            if (isset($_GET['m_id'])){
                $the_m_id =$_GET['m_id'];

            $query = "SELECT * FROM musics WHERE music_id= {$the_m_id}";
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
                <div class="col-sm-12 col-md p-5">
                    <div class="container mb-3" >
                        <picture style="background-image: url('images/1g.gif');
                                background-repeat: no-repeat;
                                background-attachment: fixed;
                                background-position: center;
                                background-size: cover;">
                            <source srcset="admin/images/<?php echo  $music_image; ?>" style="background-image: url('images/1g.gif');
                                background-repeat: no-repeat;
                                background-attachment: fixed;
                                background-position: center;
                                background-size: cover;">
                            <img src="admin/images/2.png" alt="" class="card-img img-fluid" style="height: 500px; width: 800px;"></picture>
                    </div>
                    <div class="container border-left border-secondary" >
                    <p class="h2 mb-2 ">Download <?php echo $artist." - "; ?><?php echo $music_title; ?><?php echo " ft. ".$featuring." Mp3"."<br><br>"; ?></p>
                        <p class="lead text-muted">Artist: <a href="" class="nav-pills font-weight-bold nav-item text-decoration-none"><?php echo $artist; ?></a></p>
                        <p class="lead text-muted">Genre: <span class=" font-weight-bold nav-item text-decoration-none"><?php echo $genre; ?></span></p>
                        <p class="lead text-muted">Featuring: <a href="" class=" nav-pills font-weight-bold nav-item text-decoration-none"><?php echo $featuring; ?></a></p>
                        <p class="lead text-muted">Recorded: <span class=" font-weight-bold nav-item text-decoration-none"><?php echo $recorded_year; ?></span></p>

                    </div>
                    <div class="container lead text-dark my-5" style="font-family: 'Times New Roman'">
                        <?php echo $description; ?>
                    </div>
                    <p><small class="text-muted"> <i class="fa fa-clock"></i><?php echo $music_date.'<br>'; ?></small></p>

                    <label for="music" class="h2">Listen and enjoy</label>
                    <div class="container mb-2">
                        <span class="p-3">
                            <audio src="admin/musics/<?php echo  $music; ?> " class="d-flex" controls></audio>
                        <img src="watermark.php?path=images/1g.gif" alt="">
                        </span>

                    </div>
                    <div class="container justify-content-center rounded">
                        <a href="admin/musics/<?php echo  $music; ?>" class="btn btn-outline-primary btn-block" download>Download now</a>
                    </div>

                </div>
            <?php  }   } ?>
            <div class="col-md">
                <?php
                if (isset($_POST['submit_comment'])){
                    $comment_music_id =$_GET['m_id'];
                    $comment_author=$_POST['comment_author'];
                    $comment_content=$_POST['comment_content'];
                    $query="INSERT INTO music_comments(comment_music_id, comment_author, comment_content, comment_status, comment_date)";
                    $query.=" VALUES({$comment_music_id}, '{$comment_author}', '{$comment_content}', 'unapproved', now())";
                    $music_comments=mysqli_query($connection, $query);

                    $update_music_count_query="UPDATE musics SET comment_count = comment_count+1 WHERE music_id={$comment_music_id}";
                    $update_music_count=mysqli_query($connection, $update_music_count_query);
                }
                ?>
                        <form action="" class="p-5" method="post">
                            <div class="form-group">
                                <h4 class="text-center">Comment Here</h4>
                                <label for="">Your Name</label>
                                <input type="text" name="comment_author" class="form-control" placeholder="Enter Your Name here" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Comment on a Music</label>
                                <textarea name="comment_content" id="" rows="3" required class="form-control mb-0" placeholder="Comment here your comment means a lot to us."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit Comment" name="submit_comment" class="btn btn-info btn-block">
                            </div>
                        </form>
            </div>
                <div class="col-md mt-3 p-3">
                    <?php
                    $query="SELECT * FROM musics WHERE music_id = {$the_m_id} ";
                    $select_music_comment_count=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_array($select_music_comment_count)) {
                        $comment_counter = $row['comment_count'];
                        echo "<p class='h5'>Comments: <span class='badge badge-dark border shadow btn btn-lg'>$comment_counter</span></p>";
                    }

                    ?>

                    <?php
                    $query="SELECT * FROM music_comments WHERE comment_music_id = {$the_m_id} AND comment_status='approved' ORDER BY comment_id DESC ";
                    $select_music_comment=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_array($select_music_comment)){
                        $comment_author=$row['comment_author'];
                        $comment_content=$row['comment_content'];
                        $comment_date=$row['comment_date'];

                        echo "<div class='container mb-2>'";

                        echo "<h4 class='lead text-dark'>Name: $comment_author</h4>";
                        echo "<p class='lead blockquote'>Description: $comment_content</p>";
                        echo "<p class='text-muted blockquote'><i class='fa fa-clock'></i>Date: $comment_date</p>";

                        echo " </div>";
                        echo "<hr>";
                    }
                    ?>

                </div>
            </div>

        </div>
        <div class="col-md-3 border shadow">
            <?php include "includes/sidebar.php"?>
        </div>
    </div>

</div>



<!--footer include -->
<?php include "includes/footer.php"; ?>

