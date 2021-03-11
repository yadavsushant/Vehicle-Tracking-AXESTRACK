<?php
function get_axestrack_tracking()
{
	$curl = curl_init();
	$api_key = XXXXXXXXXX;
	$url = 'https://vehicletrack.biz/api/companyvehiclelatestinfo?token='.$api_key; 

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,

		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'content-type: application/json'
		),
	));
	$response = curl_exec($curl);
	$response = json_decode($response);
	
	for($i=0;$i<count($response->Vehicle);$i++){
		$data=$response->Vehicle;

		$VehicleNo=$data[$i]->VehicleNo;
		$Lat=$data[$i]->Lat;
		$Long=$data[$i]->Long;
		$lat_longi=$Lat.",".$Long;
		$Location=$data[$i]->Location;
		$Date=$data[$i]->Date;
		$Speed=$data[$i]->Speed;
		$Angle=$data[$i]->Angle;
		$Ignition=$data[$i]->Ignition;
		$Tempr=$data[$i]->Tempr;
		$Imei=$data[$i]->Imei;
	}
}
