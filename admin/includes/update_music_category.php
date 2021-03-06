<form action="" method="post" class="border border-shadow p-5">
    <h4 class="text-center">Edit Music Category</h4>
    <div class="form-group">
        <label for="cat-title" ></label>
        <?php //Edit Categories
        if (isset($_GET['edit'])){
            $edit_id=$_GET['edit'];
            $query= "SELECT * FROM categories WHERE cat_id = {$edit_id}";
            $edit_category=mysqli_query($connection, $query);
            while ($row=mysqli_fetch_assoc($edit_category)){
                $cat_id= $row['cat_id'];
                $cat_title= $row['cat_title'];
                ?>
                <input type="text" value="<?php if (isset($cat_title)){ echo $cat_title; } ?>" name="cat_title" class="form-control" placeholder="Edit music category" id="">

            <?php }
        }
        ?>
        <?php // Update
        if (isset($_POST['update'])){
            $cat_title = $_POST['cat_title'];
            if ($cat_title=="" || empty($cat_title)){
                echo "Field should not be empty";
            }
            else{
                $query = "UPDATE categories SET cat_title ='{$cat_title}' WHERE cat_id = {$cat_id} ";
                $update_cat = mysqli_query($connection,$query);
                if (!$update_cat){
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }

        }

        ?>

    </div>
    <div class="form-group">
        <input type="submit" name="update" value="Update Category" class="btn btn-success btn-block">
    </div>
</form>
