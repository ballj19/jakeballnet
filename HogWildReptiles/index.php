<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
</head>
<body>
        <div class="banner-container">
                <img src="banner-pic.jpg" alt="Solaire" class="banner-pic">
                <div class="menubar row">
                <?php
                        $menu_paths = array('/HogWildReptiles/','/HogWildReptiles/Animal-Care/','/HogWildReptiles/About-Us/','/HogWildReptiles/Contact-Us/');
                        $menu_headers = array('Home','Animal Care','About Us','Contact Us');

                        for($i = 0; $i < 4; $i++)
                        {
                                $path =  $_SERVER['REQUEST_URI'];
                                
                                if($path == $menu_paths[$i])
                                {
                                        echo '<a class="menuitem-active" href="' . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>';
                                }
                                else {
                                        echo '<a class="menuitem" href="' . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>'; 
                                }
                        }
                ?>
                </div>
                <div class="banner-text">Hog Wild Reptiles</div>
                <div id="explore-btn" class="btn">Explore</div>
        </div>
        <div id="explore-container" class="row">
        <?php
                $for_sale = scandir('ForSale/');
                for($i = 2; $i < sizeof($for_sale); $i++)
                {
                        $name = $for_sale[$i];
                        echo '<div class="reptile col-md-10 col-md-offset-1">';

                        echo '<div id="carousel-' . $name . '" class="carousel slide col-md-4" data-ride="carousel" data-interval="false">';
                        echo '<ol class="carousel-indicators">';
                        $images = scandir('ForSale/' . $name . '/Images/');
                        for($j = 2; $j < sizeof($images); $j++)
                        {
                                if($j == 2)
                                {
                                        echo '<li data-target="#carousel-' . $name . '" data-slide-to="' . ($j - 2) . '" class="active"></li>';
                                }
                                else 
                                {
                                        echo '<li data-target="#carousel-' . $name . '" data-slide-to="' . ($j - 2) . '"></li>';
                                }   
                        }  
                        echo '</ol>';

                        echo '<div class="carousel-inner">';
                        for($j = 2; $j < sizeof($images); $j++)
                        {
                                if($j == 2)
                                {
                                        echo '<div class="item active">';
                                }
                                else 
                                {
                                        echo '<div class="item">';
                                }
                                $image =  'ForSale/' . $name . '/Images/' . $images[$j];  
                                echo '<img class="reptile-img" src="' . $image . '">';
                                echo '</div>';
                        } 
                        echo '</div>'; 

                        echo '<a class="left carousel-control" href="#carousel-' . $name . '" data-slide="prev">';
                        echo '<span class="glyphicon glyphicon-chevron-left"></span>';
                        echo '<span class="sr-only">Previous</span>';
                        echo '</a>';
                        echo '<a class="right carousel-control" href="#carousel-' . $name . '" data-slide="next">';
                        echo '<span class="glyphicon glyphicon-chevron-right"></span>';
                        echo '<span class="sr-only">Next</span>';
                        echo '</a>';

                        echo '</div>';
                 ?>       
                <div class="reptile-info col-md-8"> 
                        <ul class="nav nav-tabs col-md-10">
                                <li class="active"><a href="#<?php echo $name . '-';?>about" data-toggle="tab">About</a></li>
                                <li><a href="#<?php echo $name . '-';?>care" data-toggle="tab">Care</a></li>
                                <li><a href="#<?php echo $name . '-';?>resources" data-toggle="tab">Resources</a></li>
                        </ul>
                        <button type="button" data-toggle="modal" data-target="#form-<?php echo $name; ?>" class="btn buy-btn col-md-2">Learn More</button>

                        <!-- Modal -->
                        <div class="modal fade" id="form-<?php echo $name; ?>" tabindex="-1" role="dialog" aria-labelledby="form-<?php echo $name; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <h5 class="modal-title" id="form-<?php echo $name; ?>">Looking to buy or have any questions?  Email us here and we will get back to you!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                        <form action="mail.php" method="post">
                                                                Name:<br>
                                                                <input type="text" name="name" required><br>
                                                                E-mail:<br>
                                                                <input type="text" name="mail" required><br>
                                                                Comment:<br>
                                                                <input type="text" name="comment" size="50" required><br><br>
                                                                <input type="submit" value="Send">
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <div class="tab-content col-md-12">
                                <div class="tab-pane active" id="<?php echo $name . '-';?>about"><?php echo file_get_contents('ForSale/' . $name . '/about.txt');?></div>
                                <div class="tab-pane" id="<?php echo $name . '-';?>care">Test1</div>
                                <div class="tab-pane" id="<?php echo $name . '-';?>resources">Test2</div>  
                        </div>
                </div>  
        <?php        
                        echo '</div>';
                }
        ?>
        </div>
</div>
</body>
</html>

