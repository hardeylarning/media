<?php include "includes/db.php";?>
<div class="jumbotron-fluid bg-dark sticky-top">

        <nav class="navbar navbar-expand-lg navbar-dark justify-content-between">
            <a href="" class="navbar-brand ">
                <h4 class="mb-0 mr-5"> ROCKMEDIA &reg;</h4>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ml-5 ">
                    <li class="nav-item"><a href="../index.php" class="nav-link">HOME</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">FORUM</a></li>
                    <li class="nav-item"><a href="#explore" class="nav-link">VIDEOS</a></li>
                    <li class="nav-item dropdown"><a href="" class="nav-link" data-toggle="dropdown">
                            MUSIC
                        </a>


                                <div class="dropdown-menu bg-dark">
                                    <a href="musics.php" class="dropdown-item">ALL SONGS</a>
                                    <?php data(); ?>
                                    <?php
                                    function data(){
                                        global $connection;
                                        $query= "SELECT * FROM categories";
                                        $select_categories=mysqli_query($connection, $query);
                                        while ($row=mysqli_fetch_assoc($select_categories)){
                                            $cat_title= $row['cat_title'];
                                            $cat_id= $row['cat_id'];
                                            echo "<a href='music_cat.php?m_cat={$cat_id}' class='dropdown-item'>{$cat_title}</a>";
                                        }
                                    }
                                    ?>
                                </div>
                    </li>


                    <li class="nav-item"><a href="#service" class="nav-link">ALBULMS</a></li>
                    <li class="nav-item"><a href="#service" class="nav-link">ARTISTES</a></li>
                    <li class="nav-item"><a href="#service" class="nav-link">CONTACT</a></li>
                </ul>
                <a href="#searcher" class="navbar-toggler ml-5 btn btn-dark btn-lg " data-toggle="collapse">
                    <span class=""><i class="fas fa-search"></i></span>
                </a>
                <div class="collapse navbar-collapse" id="searcher">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item nav-link">
                            <form action="">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                                    </div>
                                    <input type="search" name="search" id="" class="form-control">
                                    <div class="input-group-append">
                                        <input type="submit" value="search" class="btn btn-success text-light">
                                    </div>
                                </div>

                            </form>
                        </li>
                    </ul>
                </div>

            </div>

        </nav>
    </div>

