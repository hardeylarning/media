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
    $query= "SELECT * FROM music_comments";
    $select_music_comment=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_music_comment)) {

        $comment_id = $row['comment_id'];
        $comment_music_id = $row['comment_music_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        echo " <tr>";
        echo "<td>$comment_id</td>";
        // Selecting from categories
    $query= "SELECT * FROM musics WHERE music_id = {$comment_music_id}";
    $get_music_id=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($get_music_id)) {
        $music_id = $row['music_id'];
        $music_title = $row['music_title'];
        echo "<td><a href='../music.php?m_id=$music_id'> $music_title</a></td>";
    }

        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_date</td>";
        echo "<td><a href='music_comments_table.php?source=view_all_music_comments&approve=$comment_id'>Approve</td>";
        echo "<td><a href='music_comments_table.php?source=view_all_music_comments&unapproved=$comment_id'>Unapproved</td>";
        echo "<td><a href='music_comments_table.php?source=view_all_music_comments&delete=$comment_id'>Delete</td>";
        echo " </tr>";
    }
    ?>
    </tbody>
</table>

<?php
//approve
if (isset($_GET['approve'])){
    $approve_id=$_GET['approve'];
    $query =" UPDATE music_comments SET comment_status='approved' WHERE comment_id={$approve_id}";
    $approve_comment=mysqli_query($connection, $query);
    header("Location: music_comments_table.php");
}
//Unapproved
if (isset($_GET['unapproved'])){
    $unapproved_id=$_GET['unapproved'];
    $query =" UPDATE music_comments SET comment_status='unapproved' WHERE comment_id={$unapproved_id}";
    $unapproved_comment=mysqli_query($connection, $query);
    header("Location: music_comments_table.php");
}
//delete
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM music_comments WHERE comment_id={$delete_id}";
    $delete_comment=mysqli_query($connection, $query);
    header("Location: music_comments_table.php");
}
?>
