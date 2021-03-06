<table class="table table-responsive table-bordered table-hover">
    <thead>
    <tr class="text-lowercase">
        <th>ID</th>
        <th>AUTHOR</th>
        <th>TITLE</th>
        <th>VIDEO</th>
        <th>IMAGE</th>
        <th>CATEGORY</th>
        <th>DESCRIPTION</th>
        <th>DATE</th>
        <th>ARTIST</th>
        <th>FEATURING</th>
        <th>RECORDED</th>
        <th>PRODUCER</th>
        <th>COUNT</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query= "SELECT * FROM videos";
    $select_videos=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_videos)) {

        $video_id = $row['video_id'];
        $category_id = $row['category_id'];
        $video_title = $row['video_title'];
        $video = $row['video'];
        $video_image = $row['video_image'];
        $video_date = $row['video_date'];
        $artist = $row['artist'];
        $featuring = $row['featuring'];
        $recorded_year = $row['recorded_year'];
        $producer = $row['producer'];
        $description = $row['description'];
        $comment_count = $row['comment_count'];
        $author_name=$row['author_name'];
        echo " <tr>";
        echo "<td>$video_id</td>";
        echo "<td>$author_name</td>";
        echo "<td>$video_title</td>";
        echo "<td ><video style='height: 50px; width: 50px;' src='videos/$video' ></video></td>";
        echo "<td><img class='img-fluid' src='images/$video_image' alt=''></td>";
        $cat_title="";
        // Selecting from categories
    $query= "SELECT * FROM video_categories WHERE cat_id = {$category_id}";
    $edit_category=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($edit_category)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    }

        echo "<td>$cat_title</td>";
        echo "<td>$description</td>";
        echo "<td>$video_date</td>";
        echo "<td>$artist</td>";
        echo "<td>$featuring</td>";
        echo "<td>$recorded_year</td>";
        echo "<td>$producer</td>";
        echo "<td>$comment_count</td>";
        echo "<td><a href='videos_table.php?source=edit_video&v_id=$video_id'>Edit</td>";
        echo "<td><a href='videos_table.php?delete=$video_id' onclick=\"confirm('Are you sure you want to delete the comments?')\">Delete</td>";
        echo " </tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM videos WHERE video_id={$delete_id}";
    $delete_music=mysqli_query($connection, $query);
    header("Location: videos_table.php");
}
?>
