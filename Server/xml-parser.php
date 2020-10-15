<?php

$file = "Spiele\GameOn.xml";
$xmlobject = simplexml_load_file($file);

$gamearray = (array) $xmlobject;

for ($i=0; $i <= 4; $i++) { 
    $gamearray["Kategorie"][$i] = (array) $gamearray["Kategorie"][$i];
    
    for ($j=0; $j <= 4; $j++) {
        $gamearray["Kategorie"][$i]["Frage"][$j] = (array) $gamearray["Kategorie"][$i]["Frage"][$j];
    }
}

?>



