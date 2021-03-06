<?php
if (isset($_POST['create_music'])){
   $music_title= $_POST['music_title'];
    $music=$_FILES['music']['name'];
    $music_temp=$_FILES['music']['tmp_name'];
    $music_image=$_FILES['music_image']['name'];
    $music_image_temp=$_FILES['music_image']['tmp_name'];
    move_uploaded_file($music_image_temp, "./images/$music_image");
    $category_id=$_POST['music_category'];
    $description=$_POST['description'];
    $music_date=date('d-m-yy');
    $artist=$_POST['artist'];
    $genre=$_POST['genre'];
    $featuring=$_POST['featuring'];
    $recorded_year=$_POST['recorded_year'];
    $producer=$_POST['producer'];
    $author_name=$_SESSION['name'];

    move_uploaded_file($music_temp, "./musics/$music");
    move_uploaded_file($music_image_temp, "./images/$music_image");
    $query= "INSERT INTO musics(author_name,music_title, music, music_image, category_id, description, music_date, artist, ";
    $query.="genre, featuring, recorded_year, producer) VALUES('{$author_name}', '{$music_title}', '{$music}', ";
    $query.="'{$music_image}', {$category_id}, '{$description}', '{$music_date}', '{$artist}', '{$genre}', '{$featuring}', ";
    $query.="'{$recorded_year}', '{$producer}' )";
    $insert_musics=mysqli_query($connection, $query);
    //
    testQuery($insert_musics);
}
?>
<div class="col-md-10">
<form action="" method="post" enctype="multipart/form-data" class="border border-shadow p-3 ">
    <h1 class="text-center mt-0"> Add New Music</h1>
    <div class="form-group ">
        <label for="">Music Title</label>
        <input type="text" name="music_title" class="form-control" placeholder="Enter Music title" id="" required>
    </div>
    <div class="form-group ">
        <label for="">Music</label>
        <input type="file" name="music" class="form-control" placeholder="Upload Music" id="" required>
    </div>
    <div class="form-group ">
        <label for="">Music Image</label>
        <input type="file" name="music_image" class="form-control" placeholder="Upload Music Image" id="" required>
    </div>
    <div class="form-group ">
        <label for="">Music Category</label>
        <select name="music_category" id="music_category" class="form-control">
            <?php
            $query= "SELECT * FROM categories ";
            $select_categories=mysqli_query($connection, $query);
            while ($row=mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group ">
        <label for="">Music Description</label>
        <textarea name="description" id="" placeholder="Enter Music Description Here" rows="3" required class="form-control mb-0"></textarea>
    </div>
    <div class="form-group ">
        <label for="">Music Artist</label>
        <input type="text" name="artist" class="form-control" placeholder="Enter Name of the Artist" required id="">
    </div>
    <div class="form-group ">
        <label for="">Music Genre</label>
        <input type="text" name="genre" class="form-control" placeholder="Enter Music Genre" required id="">
    </div>
    <div class="form-group ">
        <label for="">Artist Featuring in the Music</label>
        <input type="text" name="featuring" class="form-control" placeholder="Enter Featured Artists" required id="">
    </div>
    <div class="form-group ">
        <label for="">Music Recorded Year</label>
        <input type="text" name="recorded_year" class="form-control" placeholder="Enter Year Music was Recorded" required id="">
    </div>
    <div class="form-group ">
        <label for="">Producer Name</label>
        <input type="text" name="producer" class="form-control" placeholder="Enter the Name of producer" id="" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Add Music" name="create_music" class="btn btn-info btn-block">
    </div>
</form>
</div>