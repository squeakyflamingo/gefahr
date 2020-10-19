<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeopardy! - <?php echo $teamname; ?></title>
    <link rel="stylesheet" href="styling/client.css">
</head>
<body id="client">
    <h1 class="team"><?php echo $teamname; ?></h1>
    <button name="buzzer" id="buzzer" class="team<?php echo $team; ?>" onclick="buzzerAction(<?php echo $team; ?>)">Buzzern!</button>
    <div class="overlay" id="buzzered">
        <h1>Buzzered!</h1>
    </div>
</body>
<script src="javascript/common.js"></script>
<script src="javascript/client.js"></script>
</html>