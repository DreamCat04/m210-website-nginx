<?php

function primzahlenzerlegung()
{
    $prim = '';
    $teiler = 2;
    if (isset($_REQUEST['prim']) && !empty($_REQUEST['prim']) && is_numeric($_REQUEST['prim'])) 
    {
        $prim = $_REQUEST['prim'];
    $prim2=$prim;
    $output="Die Primfaktoren der Zahl $prim lauten: ";
    for ($teiler=2; $teiler<=$prim2/2; $teiler++)
    {
        while($prim%$teiler==0)
        {
            $prim=($prim/$teiler);
            $output.=$teiler.", ";
        }
    } 

    }

    return $output;
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thierrys Primfaktorzerleger</title>
        <meta charset="utf-8">
        <style>
            body
            {
                background-color: rgb(107,142,35);
                font-family: Arial, Helvetica, sans-serif;
            }
            .prim
            {
                position: absolute;
                width: 50%;
                height: 50%;
				top: 50%;
				left: 50%;
                background-color: rgb(32,178 ,170);
				padding: 32px;
				transform: translate(-50%,-50%);
				border-radius: 16px;
				border: 8px solid #458B00;
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
        </style>
    </head>
    <body>
        <div class="prim">
        <form action="/prime/primdex.php" method="get">
            <p>Hier Zahl eingeben, die zerlegt werden soll:<input type="number" name="prim"><button type="submit">Zahl in ihre Primfaktoren zerlegen</button></p>
            <p><?php echo (primzahlenzerlegung()); ?></p>
        </form>
        </div>
    </body>
</html>

