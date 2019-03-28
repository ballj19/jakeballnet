<?php
include 'functions.php';
$conn = Database_Connect('reptiles');
$parameters = Get_Parameters();
?>
<html>
<head>
  <title>Winding Road Reptiles</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Sacramento local reptile breeding business. Snake and gecko breeding for sale throughout the United States.">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="nav.css">
        <script src="javascript.js"></script>
</head>
<body>
        <?php
                Nav_Bar('./');
        ?>
        <div id="banner" class="banner-container row">
                <img src="banner-pic.jpg" alt="Solaire" class="banner-pic">
                <img src="WRReptiles_Logo_White.png" id="big-logo">
                <div class="banner-text">Winding Road Reptiles</div>
                <div class="button-block">
                        <div id="forsale-btn" class="btn">For Sale</div>
                        <div id="tour-btn" class="btn">Tour</div>
                </div>
        </div>
        <div id="news-container" class="row">
        <div id="news-section">
        <?php
                $conn = Database_Connect('reptiles');
                $result = SQL_SELECT($conn, 'news', array('*'));
                while($row = $result->fetch_assoc())
                {
                        $imagesrc = "Data/news/{$row['name']}/Images/md/{$row['coverPhoto']}";
                        echo "<div class='news-item'>";
                                echo "<div class='news-info'>";
                                        echo "<div class='news-img'>";
                                                echo "<img src='$imagesrc'>";
                                        echo "</div>";
                                        echo "<div class='news-title'>{$row['name']}</div>";
                                        echo "<div class='news-date'>{$row['date']}</div>";
                                        echo "<div class='news-desc'>{$row['shortDesc']}</div>";
                                echo "</div>";
                                echo "<a href='/News/index.php?id=" . $row['id'] . "'>";
                                        echo "<div class='read-more'>";
                                                echo "<div class='read-more-text'>Read More</div>";
                                                echo "<img class='read-more-arrow' src='svg/si-glyph-arrow-thick-right.svg'/>";
                                        echo "</div>";
                                echo "</a>";
                        echo "</div>";
                }
        ?>
        </div>
        </div>
        <div id="forsale-container" class="row">
        <?php
                $select_sql = "SELECT * FROM reptiles WHERE forsale='1'";
                $result = $conn->query($select_sql);
                
                
                while($row = $result->fetch_assoc())
                {
                        $name = $row['name'];
                        echo '<div class="reptile">';

                        echo '<div id="carousel-' . $name . '" class="carousel slide col-xs-4" data-ride="carousel" data-interval="false">';
                        echo '<ol class="carousel-indicators">';
                        $images = scandir('Data/reptiles/' . $name . '/Images/md/');
                        for($j = 2; $j < sizeof($images); $j++)
                        {
                                if($images[$j] == $row['coverPhoto'])
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
                                $image =  'Data/reptiles/' . $name . '/Images/md/' . $images[$j]; 
                                list($width, $height) = getimagesize($image);
                                if($images[$j] == $row['coverPhoto'])
                                {
                                        echo '<div class="item active">';
                                }
                                else 
                                {
                                        echo '<div class="item">';
                                } 
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
        <div id="tour-container" class="row">
        <div id="tour-section">
                <iframe 
                        width="100%"
                        height="600px"
                        allowfullscreen="allowfullscreen"
                        mozallowfullscreen="mozallowfullscreen" 
                        msallowfullscreen="msallowfullscreen" 
                        oallowfullscreen="oallowfullscreen" 
                        webkitallowfullscreen="webkitallowfullscreen"
                        class="youtube"
                        src="https://www.youtube.com/embed/Q2GgqpdOrns">
                </iframe>
        </div>
        </div>
</div>
</body>
</html>

