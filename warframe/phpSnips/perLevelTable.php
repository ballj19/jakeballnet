<?php 

function Polarize_Mods($slots,$sf,$v,$r)
{
        $sf_pol = false;
        $v_pol = false;
        $r_pol = false;

        for($i = 0; $i < $slots; $i++)
        {
                $max = max($sf,$v,$r);

                if($sf_pol)
                {
                        $max = max($v,$r);

                        if($v_pol)
                        {
                                $max = $r;
                        }
                        if($r_pol)
                        {
                                $max = $v;
                        }
                }
                else if($v_pol)
                {
                        $max = max($sf,$r);

                        if($r_pol)
                        {
                                $max = $sf;
                        }
                }
                else if($r_pol)
                {
                        $max = max($sf,$v);
                }
                
                if($sf == $max && !$sf_pol)
                {
                        $sf_pol = true;
                }
                else if($v == $max && !$v_pol)
                {
                        $v_pol = true;
                }
                else if($r == $max && !$r_pol)
                {
                        $r_pol = true;
                }
        }

        if($sf_pol)
        {
                $sf = ceil($sf / 2);
        }
        if($v_pol)
        {
                $v = ceil($v / 2);
        }
        if($r_pol)
        {
                $r = ceil($r / 2);
        }

        return array($sf,$v,$r);
}

$frame_name = str_replace("%"," ",$_GET['frame']);
$level = $_GET['level'];
$steelfiber_max = $_GET['sf'] + 4;
$vitality_max = $_GET['v'] + 2;
$redirection_max = $_GET['r'] + 4;
$vazarin_slots = $_GET['vazarin'];

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
                $frame_found = true;
        }
}

if(!$frame_found)
{
        
}
else {
?>

<table>
<td>Capacity Used</td>
<td>Vitality</td>
<td>Redirection</td>
<td>Steel Fiber</td>
<td>Effective Health</td>
<td>% Increase</td>

<?php
$cap_max = $steelfiber_max + $vitality_max + $redirection_max;


$damage_reduction = $armor / ($armor + 300);
$old_effective_health = $health / (1 - $damage_reduction) + $shield;
$max_effective_health = $old_effective_health;

for($cap = 0; $cap <= $cap_max; $cap++)
{
        for ($sf = 0; $sf <= $steelfiber_max; $sf++)
        {
                if($sf < 1 || $sf > 3)
                {
                        for ($v = 0; $v <= $vitality_max; $v++)
                        {
                                if($v != 1)
                                {
                                        for ($r = 0; $r <= $redirection_max; $r++)
                                        {
                                                if($r < 1 || $r > 3)
                                                {
                                                        $polarity_array = Polarize_Mods($vazarin_slots,$sf,$v,$r);
                                                        $sf_pol = $polarity_array[0];
                                                        $v_pol = $polarity_array[1];
                                                        $r_pol = $polarity_array[2];
                                                        
                                                        if ($sf_pol + $v_pol + $r_pol == $cap)
                                                        {
                                                                $scaled_armor = $armor * (1 + 0.1 * ($sf - 3));
                                                                $scaled_health = $health * (1 + 0.4 * ($v - 1));
                                                                $scaled_shield = $shield * (1 + 0.4 * ($r - 3));

                                                                if($sf == 0)
                                                                {
                                                                        $scaled_armor = $armor;
                                                                }
                                                                if ($v == 0)
                                                                {
                                                                        $scaled_health = $health;
                                                                }
                                                                if ($r == 0)
                                                                {
                                                                        $scaled_shield = $shield;
                                                                }

                                                                $damage_reduction = $scaled_armor / ($scaled_armor + 300);
                                                                $effective_health = $scaled_health / (1 - $damage_reduction) + $scaled_shield;
                                                                $percentage_increase = $effective_health / $old_effective_health - 1;

                                                                if ($effective_health >= $max_effective_health)
                                                                {
                                                                        $max_effective_health = $effective_health;

                                                                        if($sf - 4 < 0)
                                                                        {
                                                                                $opt_armor = 'Not Used';
                                                                        }
                                                                        else
                                                                        {
                                                                                $opt_armor = 'Rank ' . ($sf - 4);
                                                                        }
                                                                        if($v - 2 < 0)
                                                                        {
                                                                                $opt_health = 'Not Used';
                                                                        }
                                                                        else
                                                                        {
                                                                                $opt_health = 'Rank ' . ($v - 2);
                                                                        }
                                                                        if($r - 4 < 0)
                                                                        {
                                                                                $opt_shield = 'Not Used';
                                                                        }
                                                                        else
                                                                        {
                                                                                $opt_shield = 'Rank ' . ($r - 4);
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                        }
                }
        }
        $percentage_increase = $max_effective_health / $old_effective_health - 1;
        $old_effective_health = $max_effective_health;
?>      
        <tr>
                <td><?php echo $cap?></td>
                <td><?php echo $opt_health?></td>
                <td><?php echo $opt_shield?></td>
                <td><?php echo $opt_armor?></td>
                <td><?php echo $max_effective_health?></td>
                <td><?php echo round($percentage_increase * 100,2) . '%'?></td>
        </tr>
<?php
}

echo '</table>';

}
?>