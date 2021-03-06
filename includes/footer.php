<section class="bg-dark" id="newsletter">
    <div class="container text-white text-center py-5 ">
        <div class="row justify-content-center">
            <div class="d-none d-md-block col-md-2 col-lg-3 ">
                <h4 class="lead  text-muted" style="font-weight: bold">MUSIC CATEGORIES</h4>
                <div class="col-lg-12 border border-bottom-0 border-right-0 border-secondary">
                    <ul type="square">
                        <?php
                        $query= "SELECT * FROM categories ";
                        $select_categories=mysqli_query($connection, $query);
                        while ($row=mysqli_fetch_assoc($select_categories)){
                            $cat_id=$row['cat_id'];
                            $cat_title= $row['cat_title'];
                            echo "<li><a href='music_cat.php?m_cat={$cat_id}' class='text-muted mb-2'>{$cat_title}</a></li><hr>";
                        }
                        ?>
                    </ul>

                </div>
            </div>
            <div class="d-none d-md-block col-md-2 col-lg-3 ">
                <h4 class="lead text-muted " style="font-weight: bold">VIDEO CATEGORIES</h4>
                <div class="col-lg-12 border border-bottom-0 border-right-0 border-secondary">
                    <?php
                    $query= "SELECT * FROM video_categories ";
                    $select_categories=mysqli_query($connection, $query);
                    while ($row=mysqli_fetch_assoc($select_categories)){
                        $cat_id=$row['cat_id'];
                        $cat_title= $row['cat_title'];
                        echo "<a href='video_cat.php?v_cat={$cat_id}' class='text-muted mb-2'>{$cat_title}</a><hr>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="footer" class="bg-dark">
    <ul class="nav text-center justify-content-center">
        <li class="nav-item"><a href="" class="nav-link text-muted" style="font-weight: bold;">Date: <?php echo Date('y-m-d h:s'); ?></a></li>

    </ul>
    <hr class="bg-white">
    <ul class="nav text-center justify-content-center">
        <li class="nav-item"><a href="" class="nav-link text-muted" style="font-weight: bold;">rockmedia &copy; (2020)</a></li>
    </ul>
</section>

<script src="b4.3.1/jquery.js"></script>
<script src="b4.3.1/popper.js/dist/umd/popper.min.js"></script>
<script src="b4.3.1/js/bootstrap.js"></script>
</body>
</html>
