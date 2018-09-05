<?php
function Nav_Bar($location, $admin = false)
{

        echo '<div class="nav-bar">';

        echo '<div class="home-btn">';
        echo '<a href="' . $location . '"><i class="fa fa-home"></i></a>';
        echo '</div>';
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
                    <a href="modhub">ModHub</a>
                    <a href="http://www.windingroadreptiles.com">Winding Road Reptiles</a>
                    <a href="#">Magic Mirror</a>
                    </div>
                </div>';
        echo '</div>';
}
?>