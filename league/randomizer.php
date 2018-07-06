<?php

class Randomizer {
	
	public $players = [];
	public $log;
	
	function __construct()
	{
		$servername = "localhost";
		$username = "ballj19_root";
		$password = "sitkbm19";
		$dbname = "ballj19_league";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		$roles_result = NULL;
		
		$roles_result = $conn->query("SELECT * FROM roles");
		echo $conn->error;
		
		echo '<table class="lock-in-table col-xs-12">';
		echo 	'<thead>';
		echo	'<tr class="col-xs-12">';
		echo 		'<th class="col-xs-2">NAME</th>';
		echo 		'<th class="col-xs-2">TOP</th>';
		echo 		'<th class="col-xs-2">JUNGLE</th>';
		echo 		'<th class="col-xs-2">MID</th>';
		echo 		'<th class="col-xs-2">ADC</th>';
		echo 		'<th class="col-xs-2">SUPPORT</th>';
		echo 	'</tr>';
		echo	'</thead>';
		echo	'<tbody>';
		
		while($roles_row = mysqli_fetch_assoc($roles_result))
		{
				$this->players[] = new Player($roles_row['name'],$roles_row['top'],$roles_row['jg'],$roles_row['mid'],$roles_row['adc'],$roles_row['sup']);
		}
		
		mysqli_free_result($roles_result);
		
		foreach($this->players as $player)
		{
				echo '<tr class="player-row col-xs-12">';
				echo '<th class="col-xs-2">' . $player->name . '</th>';
				echo '<td class="col-xs-2">' . $player->top . '</td>';
				echo '<td class="col-xs-2">' . $player->jg . '</td>';
				echo '<td class="col-xs-2">' . $player->mid . '</td>';
				echo '<td class="col-xs-2">' . $player->adc . '</td>';
				echo '<td class="col-xs-2">' . $player->sup . '</td>';
				echo '</tr>';
		}
		
		echo	'</tbody>';
		echo '</table>';
		
		$result = $conn->query("SELECT * FROM results");
		
		$calculated = 0;
		
		while($row = mysqli_fetch_array($result))
		{
			$calculated = $row['calculated'];
		}
		
		if(count($this->players) == 5)
		{
			if($calculated == 0)
			{
				$results = $this->Randomize();
				$result = $conn->query("UPDATE results SET calculated=1,top='{$results[0]}',jg='{$results[1]}',mid='{$results[2]}',adc='{$results[3]}',sup='{$results[4]}',log='{$this->log}'");
			}
			
			$result = $conn->query("SELECT * FROM results");
			
			while($row = mysqli_fetch_array($result))
			{
				$top = $row['top'];
				$jg = $row['jg'];
				$mid = $row['mid'];
				$adc = $row['adc'];
				$sup = $row['sup'];
				$log = $row['log'];
			}
			
			mysqli_free_result($result);
			
			echo	'<table class="log-table col-xs-12">';
			echo		'<thead>';
			echo		'<tr class="col-xs-12">';
			echo			'<th class="col-xs-2">ROLE</th>';
			echo			'<th class="col-xs-8">PARTICIPANTS</th>';
			echo			'<th class="col-xs-2">WINNER</th>';
			echo		'</tr>';
			echo		'</thead>';
			echo		'<tbody>';
			echo 			$log;
			echo 		'</tbody>';
			echo	'</table>';
			
			//echo '<div class="results col-xs-8 col-xs-offset-8">';
			//echo "RESULTS: " . '<br>';
			//echo "TOP: " . $top. '<br>';
			//echo "JG: " . $jg. '<br>';
			//echo "MID: " . $mid. '<br>';
			//echo "ADC: " . $adc. '<br>';
			//echo "SUP: " . $sup. '<br>';
			//echo '</div>';
			
		}
		
		mysqli_close($conn);
	}
		
	function Randomize(){	
		$rolesList = array('top','jg','mid','adc','sup');
		
		$n = count($rolesList);
		while($n > 1)
		{
			$n--;
			$k = rand(0,$n);
			$value = $rolesList[$n];
			$rolesList[$n] = $rolesList[$k];
			$rolesList[$k] = $value;
		}
		
		$top_player = "";
		$jg_player = "";
		$mid_player = "";
		$adc_player = "";
		$sup_player = "";
		
		$top_locked = false;
		$jg_locked = false;
		$mid_locked = false;
		$adc_locked = false;
		$sup_locked = false;
		
		while(!$top_locked || !$jg_locked || !$mid_locked || !$adc_locked || !$sup_locked)
		{
			foreach($rolesList as $role)
			{
				if($role == "top")
				{
					if(!$top_locked)
					{
						$top_random = $this->Random_Player('top');
						if($top_random != NULL && !$top_random->locked && $top_random->top == 1)
						{
							$top_locked = 1;
							$top_random->locked = 1;
							$top_player = $top_random->name;
							
							foreach($this->players as $player)
							{
								if(!$player->locked)
								{
									if($player->jg > $player->top)
									{
										$player->jg--;
									}
									if($player->mid > $player->top)
									{
										$player->mid--;
									}
									if($player->adc > $player->top)
									{
										$player->adc--;
									}
									if($player->sup > $player->top)
									{
										$player->sup--;
									}
								}
							}
						}
					}
				}
				if($role == "jg")
				{
					if(!$jg_locked)
					{
						$jg_random = $this->Random_Player('jg');
						if($jg_random != NULL && !$jg_random->locked && $jg_random->jg == 1)
						{
							$jg_locked = 1;
							$jg_random->locked = 1;
							$jg_player = $jg_random->name;
							
							foreach($this->players as $player)
							{
								if(!$player->locked)
								{
									if($player->top > $player->jg)
									{
										$player->top--;
									}
									if($player->mid > $player->jg)
									{
										$player->mid--;
									}
									if($player->adc > $player->jg)
									{
										$player->adc--;
									}
									if($player->sup > $player->jg)
									{
										$player->sup--;
									}
								}
							}
						}
					}
				}
				if($role == "mid")
				{
					if(!$mid_locked)
					{
						$mid_random = $this->Random_Player('mid');
						if($mid_random != NULL &&!$mid_random->locked && $mid_random->mid == 1)
						{
							$mid_locked = 1;
							$mid_random->locked = 1;
							$mid_player = $mid_random->name;
							
							foreach($this->players as $player)
							{
								if(!$player->locked)
								{
									if($player->jg > $player->mid)
									{
										$player->jg--;
									}
									if($player->top > $player->mid)
									{
										$player->top--;
									}
									if($player->adc > $player->mid)
									{
										$player->adc--;
									}
									if($player->sup > $player->mid)
									{
										$player->sup--;
									}
								}
							}
						}
					}
				}
				if($role == "adc")
				{
					if(!$adc_locked)
					{
						$adc_random = $this->Random_Player('adc');
						if($adc_random != NULL && !$adc_random->locked && $adc_random->adc == 1)
						{
							$adc_locked = 1;
							$adc_random->locked = 1;
							$adc_player = $adc_random->name;
							
							foreach($this->players as $player)
							{
								if(!$player->locked)
								{
									if($player->jg > $player->adc)
									{
										$player->jg--;
									}
									if($player->mid > $player->adc)
									{
										$player->mid--;
									}
									if($player->top > $player->adc)
									{
										$player->top--;
									}
									if($player->sup > $player->adc)
									{
										$player->sup--;
									}
								}
							}
						}
					}
				}
				if($role == "sup")
				{
					if(!$sup_locked)
					{
						$sup_random = $this->Random_Player('sup');
						if($sup_random != NULL && !$sup_random->locked && $sup_random->sup == 1)
						{
							$sup_locked = 1;
							$sup_random->locked = 1;
							$sup_player = $sup_random->name;
							
							foreach($this->players as $player)
							{
								if(!$player->locked)
								{
									if($player->jg > $player->sup)
									{
										$player->jg--;
									}
									if($player->mid > $player->sup)
									{
										$player->mid--;
									}
									if($player->adc > $player->sup)
									{
										$player->adc--;
									}
									if($player->top > $player->sup)
									{
										$player->top--;
									}
								}
							}
						}
					}
				}
			}
		}
		
		return array($top_player,$jg_player,$mid_player,$adc_player,$sup_player);
	}


	function Random_Player($role){
		
		$total = 0;
		
		$endpoints = [];
		$endpoints[] = 0;
		$possiblePlayers = [];
		
		foreach($this->players as $player)
		{
			if(!$player->locked && $player->{$role} == 1)
			{
				$endpoints[] = $total + 600 / $player->{$role};
				$total += 600 / $player->{$role};
				$possiblePlayers[] = $player;
			}
		}
		
		if(count($possiblePlayers) == 0)
		{
			return NULL;
		}

		$rand = rand(1,$total);
		
		$i = 0;
		
		$this->log .= '<tr class="role-row col-xs-12">';
		$this->log .= 	'<th class="col-xs-2">' . strtoupper($role) . '</th>';
		$this->log .= '<td class="col-xs-8">';
		
		$count = 0;
		
		foreach($possiblePlayers as $player)
		{
			$count++;
			if($count != count($possiblePlayers))
			{
				$this->log .= $player->name . " vs ";
			}
			else{
				$this->log .= $player->name;
			}
		}
		
		$this->log .= '</td>';
		
		$this->log .= '<td class="col-xs-2">';
		
		foreach($possiblePlayers as $player)
		{
			if($rand >= $endpoints[$i] && $rand < $endpoints[$i+1])
			{
				$this->log .= $player->name . '</td></tr>';
				return $player;
			}
			$i++;
		}
	}
}

class Player {
	public $name;
	public $top;
	public $jg;
	public $mid;
	public $adc;
	public $sup;
	public $locked;
	
	function __construct($name,$top,$jg,$mid,$adc,$sup){
		$this->name = $name;
		$this->top = $top;
		$this->jg = $jg;
		$this->mid = $mid;
		$this->adc = $adc;
		$this->sup = $sup;
		$this->locked = 0;
	}
}
?>