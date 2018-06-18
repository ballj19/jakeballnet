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
                        echo '<div class="reptile col-md-8 col-md-offset-2">';
                        echo '<img class="reptile-img1" src="ForSale/' . $name . '/img1.jpg"/>';
                 ?>       
                <div class="reptile-info"> 
                        <ul class="nav nav-tabs">
                                <li class="active"><a href="#<?php echo $name . '-';?>about" data-toggle="tab">About</a></li>
                                <li><a href="#<?php echo $name . '-';?>care" data-toggle="tab">Care</a></li>
                                <li><a href="#<?php echo $name . '-';?>resources" data-toggle="tab">Resources</a></li>
                        </ul>
                        <div class="tab-content">
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