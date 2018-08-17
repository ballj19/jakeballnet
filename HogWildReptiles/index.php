<?php
include 'functions.php';
$conn = Database_Connect('reptiles');
$parameters = Get_Parameters();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="nav.css">
        <script src="javascript.js"></script>
</head>
<body>
        <div class="nav-bar">
        <?php
                        echo '<a href="./"><img src="WRReptiles_Logo_White.png" class="logo"></a>';
                        $menu_paths = array('Available/','About-Us/','Contact-Us/','My-Collection/');
                        $menu_headers = array('Available','About Us','Contact Us','My Collection');

                        for($i = 3; $i >= 0; $i--)
                        {
                                $path =  $_SERVER['REQUEST_URI'];
                                
                                if($path == $menu_paths[$i])
                                {
                                        echo '<a class="menuitem menuitem-active" href="' . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>';
                                }
                                else {
                                        echo '<a class="menuitem" href="' . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>'; 
                                }
                        }
                ?>
        </div>
        <div class="banner-container">
                <img src="banner-pic.jpg" alt="Solaire" class="banner-pic">
                <img src="WRReptiles_Logo_White.png" class="big-logo">
                <div class="banner-text">Winding Road Reptiles</div>
                <div id="explore-btn" class="btn">Explore</div>
        </div>
        <div id="explore-container" class="row">
        <?php
                $select_sql = "SELECT * FROM reptiles WHERE forsale='1'";
                $result = $conn->query($select_sql);
                
                
                while($row = $result->fetch_assoc())
                {
                        $name = $row['name'];
                        echo '<div class="reptile col-md-10 col-md-offset-1">';

                        echo '<div id="carousel-' . $name . '" class="carousel slide col-md-4" data-ride="carousel" data-interval="false">';
                        echo '<ol class="carousel-indicators">';
                        $images = scandir('Data/' . $name . '/Images/');
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
                                $image =  'Data/' . $name . '/Images/' . $images[$j];  
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
                        <ul class="nav nav-tabs col-md-12">
                                <li class="active"><a href="#<?php echo $name . '-';?>about" data-toggle="tab">About</a></li>
                                <li><a href="#<?php echo $name . '-';?>care" data-toggle="tab">Care</a></li>
                                <li><a href="#<?php echo $name . '-';?>resources" data-toggle="tab">Resources</a></li>
                        </ul>

                        <div class="tab-content col-md-12">
                                <div class="tab-pane active" id="<?php echo $name . '-';?>about"> 
                                        <div class="breed">
                                                <?php echo $row['type'];?>
                                        </div>
                                        <div class="price">
                                                <?php echo '$' . $row['price'];?>
                                        </div>
                                        <div class="hatch">
                                                Hatched: <?php echo $row['hatch'];?>
                                        </div>
                                        <div class="personality">
                                                <?php echo $row['bio'];?>
                                        </div>
                                </div>
                                <div class="tab-pane" id="<?php echo $name . '-';?>care">Test1</div>
                                <div class="tab-pane" id="<?php echo $name . '-';?>resources">Test2</div>  
                        </div>
                        <div class="more-info col-md-12">For more information, or if you are looking to buy, please email us at info@hogwildreptiles.com.<br>We know this critter as <b><?php echo $name;?></b> so be sure to include that in your email!</div>
                </div>  
        <?php        
                        echo '</div>';
                }
        ?>
        </div>
</div>
</body>
</html>

