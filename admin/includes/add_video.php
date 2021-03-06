<?php
if (isset($_POST['create_video'])){
   $video_title= $_POST['video_title'];
    $video=$_FILES['video']['name'];
    $video_temp=$_FILES['video']['tmp_name'];
    $video_image=$_FILES['video_image']['name'];
    $video_image_temp=$_FILES['video_image']['tmp_name'];
    $category_id=$_POST['video_category'];
    $description=$_POST['description'];
    $video_date=date('d-m-yy');
    $artist=$_POST['artist'];
    $genre=$_POST['genre'];
    $featuring=$_POST['featuring'];
    $recorded_year=$_POST['recorded_year'];
    $producer=$_POST['producer'];
    $author_name=$_SESSION['name'];

    move_uploaded_file($video_temp, "./videos/$video");
    move_uploaded_file($video_image_temp, "./images/$video_image");
    $query= "INSERT INTO videos(author_name, video_title, video, video_image, category_id, description, video_date, artist, ";
    $query.="genre, featuring, recorded_year, producer) VALUES('{$author_name}','{$video_title}', '{$video}', ";
    $query.="'{$video_image}', {$category_id}, '{$description}', '{$video_date}', '{$artist}', '{$genre}', '{$featuring}', ";
    $query.="'{$recorded_year}', '{$producer}' )";
    $insert_video=mysqli_query($connection, $query);
    //
    testQuery($insert_video);
}
?>
<div class="col-md-10">
<form action="" method="post" enctype="multipart/form-data" class="border border-shadow p-3 ">
    <h1 class="text-center mt-0"> Add New Video</h1>
    <div class="form-group ">
        <label for="">Video Title</label>
        <input type="text" name="video_title" class="form-control" placeholder="Enter video title" id="" required>
    </div>
    <div class="form-group ">
        <label for="">Video</label>
        <input type="file" name="video" class="form-control" id="" required>
    </div>
    <div class="form-group ">
        <label for="">Video Image</label>
        <input type="file" name="video_image" class="form-control" placeholder="Upload Video Image" id="" required>
    </div>
    <div class="form-group ">
        <label for="">Video Category</label>
        <select name="video_category" id="video_category" class="form-control">
            <?php
            $query= "SELECT * FROM video_categories ";
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
        <label for="">Video Description</label>
        <textarea name="description" id="" placeholder="Enter Video Description Here" rows="3" class="form-control mb-0"></textarea>
    </div>
    <div class="form-group ">
        <label for="">Artist</label>
        <input type="text" name="artist" class="form-control" placeholder="Enter Name of the Artist" id="">
    </div>
    <div class="form-group ">
        <label for="">Genre</label>
        <input type="text" name="genre" class="form-control" placeholder="Enter Video Genre" id="">
    </div>
    <div class="form-group ">
        <label for="">Artist Featuring in the Video</label>
        <input type="text" name="featuring" class="form-control" placeholder="Enter Featured Artists" id="">
    </div>
    <div class="form-group ">
        <label for="">Video Recorded Year</label>
        <input type="text" name="recorded_year" class="form-control" placeholder="Enter Year Music was Recorded" id="">
    </div>
    <div class="form-group ">
        <label for="">Producer Name</label>
        <input type="text" name="producer" class="form-control" placeholder="Enter the Name of producer" id="">
    </div>
    <div class="form-group">
        <input type="submit" value="Add Video" name="create_video" class="btn btn-info btn-block">
    </div>
</form>
</div>