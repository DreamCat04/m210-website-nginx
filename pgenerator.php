<?php

// Startet unseren ersten Timer
$time_start = microtime(true);

//48-57
//65-90
//97-122

$length = 8;
$password = '';

if (isset($_REQUEST['length']) && !empty($_REQUEST['length']) && is_numeric($_REQUEST['length'])) {
	$length = $_REQUEST['length'];
}

/*if ($length > 256) {
	$length = 256;
}
*/
if ($length <= 0) {
	$length = 8;
}

for ($i = 0; $i < $length; $i++) {
	$ord = 0;
	while ( ! ( ($ord >= 48 && $ord <= 57) || ($ord >= 65 && $ord <= 90) || ($ord >= 97 && $ord <= 122) ) ) {
		$ord = random_int(48,122);
	}
	$char = chr($ord);
	$password .= $char;
}
//echo $password;
$time_end = microtime(true);


// Startet unseren zweiten Timer zum Vergleich
$time_start2 = microtime(true);

$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+*%&/()=?,.-';
$arr = str_split($chars);
$password =  '';


for ($i = 0; $i < $length; $i++) {
	$idx = rand(0, 74);
	$password .= $arr[$idx];
}

//echo $password;
$time_end2 = microtime(true);

// Differenz ausrechnen
$time = $time_end - $time_start;
$time2 = $time_end2 - $time_start2;


// Ausgabe
?><!DOCTYPE html>
<html>
    <head>
        <title>Thierrys Motivationswebsite</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/styles.css">
        <style>
			body {
				background-color: rgb(120,50,30);
				font-family: sans-serif;
			}
			h2
			{
				color: blue;
				padding: 0;
				margin: 0;
			}
			h5
			{
				color: red;
			}
			.Box
			{
				position: absolute;
				top: 50%;
				left: 50%;
				/*
				margin-left: -180px;
				margin-top: -175px;
				width: 360px;
				height: 350px;
				*/
				padding: 32px;
				transform: translate(-50%,-50%);
				background-color: rgba(50,50,50,0.5);
				border-radius: 16px;
				border: 8px solid #00b;
				color: white;
			}
						
			input[type="text"] 
			{
				border: 0 none;
				border-bottom: 1px solid #fff;
				background-color: transparent;
				width: 100%;
			}
			
				input[type="text"]:hover 
				{
					border-bottom: 1px solid #0f0;
					color: white;
				}
			button[type="submit"]
			{
				color: blue;
			}
		</style>
    </head>
    <body>
        <div class="Box">
			<h2>Passwort Generator</h2>
			<p>Geben Sie im Feld über dem Knopf "Passwort generieren" die Länge des zu erzeugenden Passworts ein:</p><h5>(Standard: 8, Maximal 256 Zeichen)</h5>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
				<input type="number" name="length" value="<?php echo $length;?>"/><br/>
				<button type="submit">Passwort generieren</button>
			</form>
			<br/>
			<p>Das Passwort lautet: <input type="text" value="<?php echo $password;?>"/>
			<br/>
			Dauer Variante 1: <?php echo $time;?> Sekunden<br/>
			Dauer Variante 2: <?php echo $time2;?> Sekunden
			</p>
		</div>
    </body>
</html>