<?php
if (isset($_GET['m_id'])){
    $m_id= $_GET['m_id'];
}

$query= "SELECT * FROM musics WHERE music_id={$m_id}";
$select_music_by_id=mysqli_query($connection, $query);
while ($row=mysqli_fetch_assoc($select_music_by_id)) {
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
    $author_name=$row['author_name'];
}

$query2= "SELECT * FROM categories WHERE cat_id={$category_id}";
$select_category_by_title=mysqli_query($connection, $query2);
while ($cat_row=mysqli_fetch_assoc($select_category_by_title)){
    $cat_id_title=$cat_row['cat_title'];
}

//submission validation
if (isset($_POST['update_music'])){
    $music_title= $_POST['music_title'];
    $music=$_FILES['music']['name'];
    $music_temp=$_FILES['music']['tmp_name'];
    $music_image=$_FILES['music_image']['name'];
    $music_image_temp=$_FILES['music_image']['tmp_name'];
    $category_id=$_POST['music_category_id'];
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
    if (empty($music)){
        $query="SELECT * FROM musics WHERE music_id= $m_id";
        $select_music = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($select_music)){
            $music = $row['music'];
        }
    }
    if (empty($music_image)){
        $query="SELECT * FROM musics WHERE music_id= $m_id";
        $select_image = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($select_image)){
            $music_image = $row['music_image'];
        }
    }

    $query = "UPDATE musics SET author_name='{$author_name}', music_title='{$music_title}', music='{$music}', music_image='{$music_image}', ";
    $query.="category_id={$category_id}, description='{$description}', music_date= '{$music_date}', artist='{$artist}', ";
    $query.="genre='{$genre}', featuring='{$featuring}', recorded_year='{$recorded_year}', producer='{$producer}'";
    $query.=" WHERE music_id={$m_id} ";
    $update_music=mysqli_query($connection, $query);
    testQuery($update_music);
}
?>
<div class="col-md-10">
<form action="" method="post" enctype="multipart/form-data" class="border border-shadow p-3 ">
    <h1 class="text-center"> Edit Music Details</h1>
    <div class="form-group ">
        <label for="">Music Title</label>
        <input type="text" name="music_title" value="<?php echo $music_title; ?>" class="form-control" placeholder="Enter Music title" id="" required>
    </div>
    <div class="form-group ">
        <label for="" class="">Music</label>
        <audio class=""  src='musics/<?php echo $music; ?>' controls></audio>
        <input type="file" name="music" class="form-control-file" >

    </div>
    <div class="form-group ">
        <label for="">Music Image</label>
        <img class='img-fluid ' width="150px" height="150px" src='images/<?php echo $music_image; ?>' alt=''>
        <input type="file" name="music_image" class="form-control-file" >
    </div>
    <div class="form-group ">
        <label for="">Music Category</label>
        <p class="text-white bg-dark"><?php echo $cat_id_title; ?></p>
        <select name="music_category_id" id="music_category" class="form-control">
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
    <div class="form-group">
        <label for="">Music Description</label>
        <textarea name="description" id="" rows="3" required class="form-control mb-0"><?php echo $description; ?></textarea>
    </div>
    <div class="form-group ">
        <label for="">Music Artist</label>
        <input type="text" name="artist" value="<?php echo $artist; ?>" class="form-control" placeholder="Enter Name of the Artist" required id="">
    </div>
    <div class="form-group ">
        <label for="">Music Genre</label>
        <input type="text" name="genre" value="<?php echo $genre; ?>" class="form-control" placeholder="Enter Music Genre" required id="">
    </div>
    <div class="form-group ">
        <label for="">Artist Featuring in the Music</label>
        <input type="text" name="featuring" value="<?php echo $featuring; ?>" class="form-control" placeholder="Enter Featured Artists" required id="">
    </div>
    <div class="form-group ">
        <label for="">Music Recorded Year</label>
        <input type="text" name="recorded_year" value="<?php echo $recorded_year; ?>" class="form-control" placeholder="Enter Year Music was Recorded" required id="">
    </div>
    <div class="form-group ">
        <label for="">Producer Name</label>
        <input type="text" name="producer" value="<?php echo $producer; ?>" class="form-control" placeholder="Enter the Name of producer" id="" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Update Music" name="update_music" class="btn btn-info btn-block">
    </div>
</form>
</div>