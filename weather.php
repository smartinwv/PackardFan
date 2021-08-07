<?php

	$weather = "";
	$error = "";
	$city = "Stonewood";
	$temperature = "";	

	$urlContents=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city.",us&appid=2c69553674073ba5c9b394deee6d38ef");

   	$weatherArray = json_decode($urlContents,true);
	
	if($weatherArray['cod']==200)
	{
	$weather = "The weather in ".$city." is currently '".$weatherArray['weather'][0]['description']."' and   ";
	$temperature = (($weatherArray['main']['temp']-273.15)*9/5+32);
	date_default_timezone_set("America/New_York");
	$weather .= round($temperature,0)."&degF.";
	}else{
	$error = "World not Found.";
	echo("City not found.  Please try again.");
	
	}
	
		
	
?>