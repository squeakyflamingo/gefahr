<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeopardy! - Konfiguration</title>
    <link rel="stylesheet" href="styling/form.css">
</head>
<body id="choose">
    <h1 class="team">Konfigurator.</h1>
    <form method="POST">
        <div class="formGroup">
            <input type="text" name="team1name" placeholder="Team 1">
            <label for="team1name">Name für Team 1</label>
            <input type="color" name="team1color" value="#8B0000">
            <label for="team1color">Farbe für Team 1</label>
        </div>
        <div class="formGroup">
            <input type="text" name="team2name" placeholder="Team 2">
            <label for="team2name">Teamname 2</label>
            <input type="color" name="team2color" value="#006400">
            <label for="team2color">Farbe für Team 1</label>
        </div>
        <select name="gamefile">
            <?php foreach ($filenames as $filename) {
                echo "<option value='$filename'>$filename</option>";
            } ?>
        </select>
        <button type="submit">Spiel starten!</button>
    </form>
</body>
</html>