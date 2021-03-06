<table class="table table-responsive table-bordered table-hover">
    <thead>
    <tr class="text-lowercase">
        <th>ID</th>
        <th>AUTHOR</th>
        <th>TITLE</th>
        <th>MUSIC</th>
        <th>IMAGE</th>
        <th>C_ID</th>
        <th>DESCRIPTION</th>
        <th>DATE</th>
        <th>ARTIST</th>
        <th>GENRE</th>
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
    $query= "SELECT * FROM musics";
    $select_musics=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_musics)) {

        $music_id = $row['music_id'];
        $category_id = $row['category_id'];
        $author_name=$row['author_name'];
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
        echo " <tr>";
        echo "<td>$music_id</td>";
        echo "<td>$author_name</td>";
        echo "<td>$music_title</td>";
        echo "<td><audio src='musics/$music' ></audio></td>";
        echo "<td><img class='img-fluid' src='images/$music_image' alt=''></td>";
        $cat_title="";
        // Selecting from categories
    $query= "SELECT * FROM categories WHERE cat_id = {$category_id}";
    $edit_category=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($edit_category)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    }

        echo "<td>$cat_title</td>";
        echo "<td>$description</td>";
        echo "<td>$music_date</td>";
        echo "<td>$artist</td>";
        echo "<td>$genre</td>";
        echo "<td>$featuring</td>";
        echo "<td>$recorded_year</td>";
        echo "<td>$producer</td>";
        echo "<td>$comment_count</td>";
        echo "<td><a href='musics_table.php?source=edit_music&m_id=$music_id'>Edit</td>";
        echo "<td><a href='musics_table.php?delete=$music_id' onclick=\"confirm('Are you sure you want to delete the comments?')\">Delete</td>";
        echo " </tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM musics WHERE music_id={$delete_id}";
    $delete_music=mysqli_query($connection, $query);
    header("Location: musics_table.php");
}
?>
