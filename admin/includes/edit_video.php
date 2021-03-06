<?php
if (isset($_GET['v_id'])){
    $v_id= $_GET['v_id'];
}

$query= "SELECT * FROM videos WHERE video_id={$v_id}";
$select_video_by_id=mysqli_query($connection, $query);
while ($row=mysqli_fetch_assoc($select_video_by_id)) {
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
}

$query2= "SELECT * FROM video_categories WHERE cat_id={$category_id}";
$select_category_by_title=mysqli_query($connection, $query2);
while ($cat_row=mysqli_fetch_assoc($select_category_by_title)){
    $cat_id_title=$cat_row['cat_title'];
}

//submission validation
if (isset($_POST['update_video'])){
    $video_title= $_POST['video_title'];
    $video=$_FILES['video']['name'];
    $video_temp=$_FILES['video']['tmp_name'];
    $video_image=$_FILES['video_image']['name'];
    $video_image_temp=$_FILES['video_image']['tmp_name'];
    $category_id=$_POST['video_category_id'];
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
    if (empty($video)){
        $query="SELECT * FROM videos WHERE video_id= $v_id";
        $select_video = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($select_video)){
            $video = $row['video'];
        }
    }
    if (empty($video_image)){
        $query="SELECT * FROM videos WHERE video_id= $v_id";
        $select_image = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($select_image)){
            $video_image = $row['video_image'];
        }
    }

    $query = "UPDATE videos SET author_name='{$author_name}', video_title='{$video_title}', video='{$video}', video_image='{$video_image}', ";
    $query.="category_id={$category_id}, description='{$description}', video_date= '{$video_date}', artist='{$artist}', ";
    $query.="genre='{$genre}', featuring='{$featuring}', recorded_year='{$recorded_year}', producer='{$producer}'";
    $query.=" WHERE video_id={$v_id} ";
    $update_video=mysqli_query($connection, $query);
    testQuery($update_video);
}
?>
<div class="col-md-10">
<form action="" method="post" enctype="multipart/form-data" class="border border-shadow p-3 ">
    <h1 class="text-center"> Edit Video Details</h1>
    <div class="form-group ">
        <label for="">Video Title</label>
        <input type="text" name="video_title" value="<?php echo $video_title; ?>" class="form-control" placeholder="Enter Video title" id="" required>
    </div>
    <div class="form-group ">
        <label for="" class="">Video</label>
        <video class=""  src='videos/<?php echo $video; ?>' controls></video>
        <input type="file" name="video" class="form-control-file" >

    </div>
    <div class="form-group ">
        <label for="">Video Image</label>
        <img class='img-fluid ' width="150px" height="150px" src='images/<?php echo $video_image; ?>' alt=''>
        <input type="file" name="video_image" class="form-control-file" >
    </div>
    <div class="form-group ">
        <label for="">Video Category</label>
        <p class="text-white bg-dark"><?php echo $cat_id_title; ?></p>
        <select name="video_category_id" id="video_category" class="form-control">
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
    <div class="form-group">
        <label for="">Video Description</label>
        <textarea name="description" id="" rows="3" class="form-control mb-0"><?php echo $description; ?></textarea>
    </div>
    <div class="form-group ">
        <label for="">Artist</label>
        <input type="text" name="artist" value="<?php echo $artist; ?>" class="form-control" placeholder="Enter Name of the Artist" id="">
    </div>
    <div class="form-group ">
        <label for="">Genre</label>
        <input type="text" name="genre" value="<?php echo $genre; ?>" class="form-control" placeholder="Enter Genre" id="">
    </div>
    <div class="form-group ">
        <label for="">Artist Featuring in the Video</label>
        <input type="text" name="featuring" value="<?php echo $featuring; ?>" class="form-control" placeholder="Enter Featured Artists" id="">
    </div>
    <div class="form-group ">
        <label for="">Video Recorded Year</label>
        <input type="text" name="recorded_year" value="<?php echo $recorded_year; ?>" class="form-control" placeholder="Enter Year video was Recorded" id="">
    </div>
    <div class="form-group ">
        <label for="">Producer Name</label>
        <input type="text" name="producer" value="<?php echo $producer; ?>" class="form-control" placeholder="Enter the Name of the producer" id="">
    </div>
    <div class="form-group">
        <input type="submit" value="Update Video" name="update_video" class="btn btn-info btn-block">
    </div>
</form>
</div>