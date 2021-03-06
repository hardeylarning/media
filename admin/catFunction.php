<?php
function insertCategory(){
    global $connection;
    if (isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
        if ($cat_title=="" || empty($cat_title)){
            echo "Field should not be empty";
        }
        else{
            $query="INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $create_category=mysqli_query($connection, $query);
            if (!$create_category){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
    }
}
//FETCH ALL CATEGORIES
function findAllCategories(){
    global $connection;
    $query= "SELECT * FROM categories";
    $select_categories=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_categories)){
        echo " <tr>";
        $cat_id= $row['cat_id'];
        $cat_title= $row['cat_title'];
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a class='btn btn-outline-primary btn-sm' href='music_categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a class='btn btn-outline-primary btn-sm' href='music_categories.php?edit={$cat_id}'>Edit</a></td>";
        echo " </tr>";
    }
}
//DELETE CATEGORY
function deleteCategory(){
    global $connection;
    if (isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$delete_id} ";
        $delete_cat = mysqli_query($connection,$query);
        header("Location: music_categories.php");
    }
}

function insertVideoCategory(){
    global $connection;
    if (isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
        if ($cat_title=="" || empty($cat_title)){
            echo "Field should not be empty";
        }
        else{
            $query="INSERT INTO video_categories(cat_title) VALUE('{$cat_title}')";
            $create_category=mysqli_query($connection, $query);
            if (!$create_category){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
    }
}
//FETCH ALL CATEGORIES
function findAllVideoCategories(){
    global $connection;
    $query= "SELECT * FROM video_categories";
    $select_categories=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($select_categories)){
        echo " <tr>";
        $cat_id= $row['cat_id'];
        $cat_title= $row['cat_title'];
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a class='btn btn-outline-primary btn-sm' href='video_categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a class='btn btn-outline-primary btn-sm' href='video_categories.php?edit={$cat_id}'>Edit</a></td>";
        echo " </tr>";
    }
}
//DELETE CATEGORY
function deleteVideoCategory(){
    global $connection;
    if (isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM video_categories WHERE cat_id = {$delete_id} ";
        $delete_cat = mysqli_query($connection,$query);
        header("Location: video_categories.php");
    }
}
//tester

function testQuery($result){
    global $connection;
    if (!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
}
