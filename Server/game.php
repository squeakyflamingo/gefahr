<?php 
    require_once("xml-parser.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeopardy! - <?php echo $gamearray["Spieltitel"]; ?></title>
    <link rel="stylesheet" href="styling/game.css">
</head>
<body>
    <div class="game grid5Col">
        <?php for($i = 0; $i <= 4; $i++) { ?>
            <div class="category">
                <h2 class="categoryTitle">
                    <?php echo $gamearray["Kategorie"][$i]["Kategorietitel"]; ?>
                </h2>
                <div class="grid5Row">
                    <?php for($j = 0; $j <= 4; $j++) { ?>
                        <div id="question<?php echo $i.$j; ?>" class="question" onclick="showAnswer('<?php echo $i.$j; ?>')">
                            <h1 class="value">
                                <?php echo $gamearray["Kategorie"][$i]["Frage"][$j]["Wert"]; ?>
                            </h1>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>  
    <div class="tools">
        <div class="stats team1">
            <div class="buzzerIndicator team1" id="team1">BUZZ!</div>
            <div class="pointsContainer team1">
                Punkte:&nbsp;<span class="points" id="team1">0</span>
            </div>
        </div>
        <div>
            <button id="resetBuzzerButton" class="resetBuzzerButton" onclick="resetBuzzer()">
                Reset Buzzers!
            </button>
        </div>
        <div class="stats team2">
            <div class="pointsContainer team2">
                Punkte:&nbsp;<span class="points" id="team2">0</span>
            </div>
            <div class="buzzerIndicator team2" id="team2">BUZZ!</div>
        </div>
    </div>
    <div class="overlayContainer">
        <?php for($i = 0; $i <= 4; $i++) { 
            for($j = 0; $j <= 4; $j++) { ?> 
                <div id="overlayAnswer<?php echo $i.$j ?>" class="overlay overlayAnswer" onclick="">
                    <div class="overlayContent answer">
                        <h1><?php echo $gamearray["Kategorie"][$i]["Frage"][$j]["Antwort"]; ?></h1>
                        <div class="answerButtons">
                            <button id="correct<?php echo $i.$j ?>" class="correct" onclick="closeAnswer(this)">Korrekte Antwort!</button>
                            <button id="free<?php echo $i.$j ?>" class="free" onclick="resetBuzzer()">Freigeben.</button>
                        </div>
                    </div>
                </div>
                <div id="overlayQuestion<?php echo $i.$j ?>" class="overlay overlayQuestion" onclick="closeQuestion(this, <?php echo $gamearray['Kategorie'][$i]['Frage'][$j]['Wert']; ?>)">
                    <div class="overlayContent question">
                        <h1><?php echo $gamearray["Kategorie"][$i]["Frage"][$j]["Fragestellung"]; ?></h1>
                    </div>
                </div>
            <?php }
        } ?>
        <div id="team1" class="overlay overlayTeambuzzer team1" onclick="hideElement(this)">
            <h1>Team 1 hat gebuzzert!</h1>
        </div>
        <div id="team2" class="overlay overlayTeambuzzer team2" onclick="hideElement(this)">
            <h1>Team 2 hat gebuzzert!</h1>
        </div>
    </div>  
</body>
<script src="game.js"></script>
<script>
    startBuzzer();
</script>
</html>