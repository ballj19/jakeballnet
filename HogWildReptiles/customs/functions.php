<?php

function GetDataById($text, $id)
{
        $id_location = strpos($text, 'id="' . $id . '"');
        $endOfTag_location = strpos($text, '>', $id_location);
        $startOfNextTag_location = strpos($text, '<', $endOfTag_location);

        return substr($text, $endOfTag_location + 1, $startOfNextTag_location - $endOfTag_location - 1);
}

function GetStats($html, $id)
{
        $bindingId = 739 + 23 * $id;

        if($id >= 5)
        {
                $bindingId += 27;  //Team 2 has an offset of 27
        }

        $name = GetDataById($html, 'binding-' . $bindingId);
        $kills = GetDataById($html, 'binding-' . ($bindingId + 3));
        $deaths = GetDataById($html, 'binding-' . ($bindingId + 2));
        $assists = GetDataById($html, 'binding-' . ($bindingId + 1));

        $total_damage_to_champs = GetDataById($html, 'grid-cell-' . ($id + 351));
        $total_damage_to_objectives = GetDataById($html, 'grid-cell-' . ($id + 468));
        $total_damage_to_turrets = GetDataById($html, 'grid-cell-' . ($id + 481));

        echo $name . ' ' . $kills . '/' . $deaths . '/' . $assists . ' ' . $total_damage_to_champs . '<br>' ;
        
}