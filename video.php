<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="jumbotron-fluid mt-4">
    <div class="row mt-4">

        <div class="col-md border-dark justify-content-around">
            <div class="container">
            <?php
            if (isset($_GET['v_id'])){
                $the_m_id =$_GET['v_id'];

            $query = "SELECT * FROM videos WHERE video_id= {$the_m_id}";
            $select_video = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_video)) {
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
                <div class="col-sm-12 col-md p-5">
                    <img src="admin/images/<?php echo $video_image; ?>" alt="" class="card-img img-fluid" style=" width: 800px; height: 500px;">
                    <p class="lead mb-2"><a href="video.php?v_id=<?php echo $video_id; ?>"><?php echo $video_title.'<br>'; ?></a></p>
                    <p><small class="text-muted"> <i class="fa fa-clock"></i><?php echo $video_date.'<br>'; ?></small></p>
                    <label for="video" class="h2">Watch and enjoy</label>
                    <div class="container mb-2">

                    <video src="admin/videos/<?php echo  $video; ?>" controls></video>
                    </div>
                    <a href="admin/videos/<?php echo  $video; ?>" class="btn btn-primary btn-block" download >Download now</a>
                </div>
            <?php  }   } ?>
            <div class="col-md">
                <?php
                if (isset($_POST['submit_comment'])){
                    $comment_video_id =$_GET['v_id'];
                    $comment_author=$_POST['comment_author'];
                    $comment_content=$_POST['comment_content'];
                    $query="INSERT INTO video_comments(comment_video_id, comment_author, comment_content, comment_status, comment_date)";
                    $query.=" VALUES({$comment_video_id}, '{$comment_author}', '{$comment_content}', 'unapproved', now())";
                    $video_comments=mysqli_query($connection, $query);

                    $update_video_count_query="UPDATE videos SET comment_count = comment_count+1 WHERE video_id={$comment_video_id}";
                    $update_video_count=mysqli_query($connection, $update_video_count_query);
                }
                ?>
                        <form action="" class="p-5" method="post">
                            <div class="form-group">
                                <h4 class="text-center">Add New Comment</h4>
                                <input type="text" name="comment_author" class="form-control" placeholder="Enter Your Name here" id="" required>
                            </div>
                            <div class="form-group">
                                <textarea name="comment_content" id="" rows="3" required class="form-control mb-0" placeholder="Comment here your comment means a lot to us."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit Comment" name="submit_comment" class="btn btn-info btn-block">
                            </div>
                        </form>
            </div>
                <div class="col-md mt-3 p-3">
                    <?php
                    $query="SELECT * FROM videos WHERE video_id = {$the_m_id} ";
                    $select_video_comment_count=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_array($select_video_comment_count)) {
                        $comment_counter = $row['comment_count'];
                        echo "<p class='h5'>Comments: <span class='badge badge-dark border shadow btn btn-lg'>$comment_counter</span></p>";
                    }

                    ?>

                    <?php
                    $query="SELECT * FROM video_comments WHERE comment_video_id = {$the_m_id} AND comment_status='approved' ORDER BY comment_id DESC ";
                    $select_video_comment=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_array($select_video_comment)){
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
        <div class="col-md-3">
            <div class="col-md-12 border shadow">
                <p class="lead text-center text-dark"><u>Music Categories</u></p>
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
                <p class="lead text-center text-dark"><u>Video Categories</u></p>
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

