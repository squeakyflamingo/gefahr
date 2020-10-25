<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeopardy! - <?php echo $gametitle; ?></title>
    <link rel="stylesheet" href="styling/game.css">
    <?php include 'styling/teamColors.tpl.php'; ?>
</head>
<body>
    <div class="game grid5Col">
    
        <?php foreach ($categoryColumns as $categoryColumn) {
            echo $categoryColumn;
        } ?>

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

        <?php foreach ($overlayAnswersAndQuestions as $overlayAnswerAndQuestion) {
            echo $overlayAnswerAndQuestion;
        } ?>

        <div id="team1" class="overlay overlayTeambuzzer team1" onclick="hideElement(this)">
            <h1><?php echo $GLOBALS['teams'][1]['name']; ?> hat gebuzzert!</h1>
        </div>
        <div id="team2" class="overlay overlayTeambuzzer team2" onclick="hideElement(this)">
            <h1><?php echo $GLOBALS['teams'][2]['name']; ?> hat gebuzzert!</h1>
        </div>
    </div>  
</body>
<script src="javascript/common.js"></script>
<script src="javascript/game.js"></script>
<script>
    startBuzzer();
</script>
</html>