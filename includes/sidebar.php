<div class="col-md-12 mb-5">
    <p class="font-weight-bold h3 text-dark text-center ">Music Categories</p>
    <hr class="bg-secondary font-weight-bold mb-3">
    <p class="lead ">
        <?php
        $query= "SELECT * FROM categories ";
        $select_categories=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_categories)){
            $cat_id=$row['cat_id'];
            $cat_title= $row['cat_title'];
            echo "<a href='music_cat.php?m_cat={$cat_id}' class='text-decoration-none'>{$cat_title}</a><hr>";
        }
        ?>
</div>
<div class="col-md-12 mb-5">
    <p class="font-weight-bold h3 text-dark text-center ">Video Categories</p>
    <hr class="bg-secondary font-weight-bold mb-3">
    <p class="lead ">
        <?php
        $query= "SELECT * FROM video_categories ";
        $select_video_categories=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_video_categories)){
            $cat_id=$row['cat_id'];
            $cat_title= $row['cat_title'];
            echo "<a href='video_cat.php?v_cat={$cat_id}' class='text-decoration-none'>{$cat_title}</a><hr>";
        }
        ?>
</div>