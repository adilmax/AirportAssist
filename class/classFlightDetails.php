<?php
/*
 * @Murgency - flight class file
 * created By : ketan saini
 * created On : 19/07/2017
 * 
 */
?>
<?php
namespace flightAssAirport;
// declare the airport class..

class flight{
    // function which gives the all airport details..
    
    public function getFlightDetails($name)
    {
		$str = file_get_contents('AirlineList.json');
		$json_str = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $str);
		$json_data = json_decode($json_str, true );
		$jsonArr = $json_data['airlines'];

		foreach( $jsonArr as $value)
		{
			if ( strpos(strtolower($value['fs']),$name) !== false || strpos(strtolower($value['name']),$name) !== false )
			{  
				$data[] = array( 'label' => $value['name']."(".$value['fs'].")" , 'value' => $value['fs'] );
			}
		}

		return $data;
    }


	function ReadTemplate($fileName)
	{
		$fd = fopen ($fileName, "r");
		return fread ($fd, filesize ($fileName));
	}


	function ReplaceContent($VarList, $Var_arr, $is_replace="")
	{
		if($is_replace=="")
		{
			preg_match_all ("/__(\w+)__/e",$VarList, $matches);
			for($i=0; $i <=count($matches[1]); $i++)
			{
				if(array_key_exists($matches[1][$i], $Var_arr)==false)
				$Var_arr[$matches[1][$i]]=$matches[0][$i];
			}
		}
		//$VarList=preg_replace("/__(\w+)__/e","\$Var_arr['$1']",$VarList);

		$VarList=preg_replace_callback
		(
			"/__(\w+)__/",
			function($match) use ($Var_arr)
			{ 
				return $Var_arr[$match[1]];
			},
			$VarList
		);
		return $VarList;
	}

	function converToDate($input)
	{
		$dateArr = explode("T",$input);
		$date=date_create($dateArr[0]);
		return date_format($date,"D, d M");
	}

	function converToTime($input)
	{
		$dateArr = explode("T",$input);
		$date=date_create($dateArr[1]);
		return date_format($date,"h:i a");
	}



}