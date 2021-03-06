<!--header include -->
<?php include "includes/header.php"; ?>
<div class="jumbotron-fluid bg-dark">
    <div class="row d-flex flex-fill bg-dark">
        <?php include "includes/navigation.php";?>
            <div class="col-md bg-light">
                <!--/*INSERT FUNCTION */-->
                <?php insertCategory(); ?>
                <form action="" method="post" class="border border-shadow p-5">
                    <h4 class="text-center">Add New Music Category</h4>
                    <div class="form-group">
                        <label for="cat-title" ></label>
                        <input type="text" name="cat_title" class="form-control" placeholder="Add new music category" id="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Add Category" class="btn btn-info btn-block">
                    </div>
                </form>
                <!-- EDIT FORM CALLING  -->
                <?php
                if (isset($_GET['edit'])){
                    $cat_id =$_GET['edit'];
                    include "includes/update_music_category.php";
                }
                ?>

            </div>
        <div class="col-md-4 bg-light">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                </tr>
                </thead>
                <tbody>
                    <!-- //Find All Categories -->
                    <?php findAllCategories(); ?>
                    <!---->
                    <!-- DELETE CATEGORY FUNCTION -->
                    <?php deleteCategory(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>