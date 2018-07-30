<?php

$frame_name = str_replace("%"," ",$_GET['frame']);
$level = $_GET['level'];

$frame_json = file_get_contents('../Warframes.json');
$frame_table = json_decode($frame_json, true);
$frame_found = false;

foreach($frame_table as $number => $frame)
{
        if($frame['name'] == $frame_name)
        {
                $health = ($frame['health'] * 2) / 30 * $level + $frame['health'];
                $shield = ($frame['shield'] * 2) / 30 * $level + $frame['shield'];
                $armor = $frame['armor'];
                $polarities = $frame['polarities'];
                $frame_found = true;
        }
}

if(!$frame_found)
{
        echo 'Frame does not exist';
}
else {
?>

<div>Health: <?php echo $health;?></div>
<div>Shield: <?php echo $shield;?></div>
<div>Armor: <?php echo $armor;?></div>

<?php
        foreach($polarities as $polarity)
        {
                echo '<div>' . $polarity . '</div>';
        }

}
?>
