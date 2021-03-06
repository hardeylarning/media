<table class="table table-responsive table-bordered table-hover">
    <thead>
    <tr class="text-lowercase">
        <th>ID</th>
        <th>In RESPONSE TO</th>
        <th>AUTHOR</th>
        <th>COMMENT</th>
        <th>STATUS</th>
        <th>DATE</th>
        <th>Approve</th>
        <th>Unapproved</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query= "SELECT * FROM video_comments";
    $select_video_comment=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_video_comment)) {

        $comment_id = $row['comment_id'];
        $comment_video_id = $row['comment_video_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        echo " <tr>";
        echo "<td>$comment_id</td>";
        // Selecting from categories
    $query= "SELECT * FROM videos WHERE video_id = {$comment_video_id}";
    $get_video_id=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($get_video_id)) {
        $video_id = $row['video_id'];
        $video_title = $row['video_title'];
        echo "<td><a href='../video.php?v_id=$video_id'> $video_title</a></td>";
    }

        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_date</td>";
        echo "<td><a href='video_comments_table.php?source=view_all_video_comments&approve=$comment_id'>Approve</td>";
        echo "<td><a href='video_comments_table.php?source=view_all_video_comments&unapproved=$comment_id'>Unapproved</td>";
        echo "<td><a href='video_comments_table.php?source=view_all_video_comments&delete=$comment_id' onclick=\"confirm('Are you sure you want to delete the comments?')\">Delete</td>";
        echo " </tr>";
    }
    ?>
    </tbody>
</table>

<?php
//approve
if (isset($_GET['approve'])){
    $approve_id=$_GET['approve'];
    $query =" UPDATE video_comments SET comment_status='approved' WHERE comment_id={$approve_id}";
    $approve_comment=mysqli_query($connection, $query);
    header("Location: video_comments_table.php");
}
//Unapproved
if (isset($_GET['unapproved'])){
    $unapproved_id=$_GET['unapproved'];
    $query =" UPDATE video_comments SET comment_status='unapproved' WHERE comment_id={$unapproved_id}";
    $unapproved_comment=mysqli_query($connection, $query);
    header("Location: video_comments_table.php");
}
//delete
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM video_comments WHERE comment_id={$delete_id}";
    $delete_comment=mysqli_query($connection, $query);
    header("Location: video_comments_table.php");
}
?>
