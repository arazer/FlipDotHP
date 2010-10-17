<?php

define(IP, 'hs.flipdot.de'); // deine ethersex ip adresse
define(PORT, 2701); // standart port im image

request("1w convert");

$response = request("1w list");
$sensor1 = "1058a570010800e0";
$sensor2 = "1002bc700108008e";
$temp1 = request("1w get " . $sensor1);
$temp2 =  request("1w get " . $sensor2); 
	echo "Aussentemperatur: $temp1";
	echo "<br>\n";
	echo "Innentemperatur: $temp2";
	echo "<br>\n";

	
	echo "$time";
	echo "<br>\n";

$temp1 = $temp1 * 10;
$temp2 = $temp2 * 10;

function request($request) {
	$rs = fsockopen(IP, PORT);

	if (!$rs) {
		$response  = "Kann Verbindung nicht aufbauen!";
	}
	else {
		$response ="";
		$request = "!" . $request . "\r\n";

		fputs($rs, $request);

		while (!feof($rs)) {
			$response .= fgets($rs, 128);
		}
		fclose($rs);
	}

	return $response;
}

?>

