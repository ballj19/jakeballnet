<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
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
        <div id="explore-container">

        </div>
</body>
</html>