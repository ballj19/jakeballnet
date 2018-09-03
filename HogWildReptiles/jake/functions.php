<?php
function Nav_Bar($location, $admin = false)
{
        echo '<div class="nav-bar">';
        //echo '<a href="' . $location . '"><img src="' . $location . 'WRReptiles_Logo_White.png" class="logo"></a>';
        $menu_paths = array('About-Me/');
        $menu_headers = array('About Me');
        
        for($i = count($menu_paths) - 1; $i >= 0; $i--)
        {
                $path =  $_SERVER['REQUEST_URI'];
                
                if($path == $menu_paths[$i])
                {
                        echo '<a class="menuitem menuitem-active" href="' . $location . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>';
                }
                else {
                        echo '<a class="menuitem" href="' . $location . $menu_paths[$i] . '">' . $menu_headers[$i] . '</a>'; 
                }
        }
        echo    '<div class="dropdwn">
                    <button class="dropbtn" onclick="ToggleDropdown()">My Projects
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdwn-content" id="NavDropdown">
                    <a href="#">ModHub</a>
                    <a href="#">Winding Road Reptiles</a>
                    <a href="#">Magic Mirror</a>
                    </div>
                </div>';
        echo '</div>';
}
?>