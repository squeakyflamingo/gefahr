<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeopardy! - Teamwähler</title>
    <link rel="stylesheet" href="styling/form.css">
    <?php include 'styling/teamColors.tpl.php'; ?>
</head>
<body>
    <h1 class="team">Team wählen.</h1>
    <form method="POST">
        <select class="custom-select" name="team">
            <?php foreach ($GLOBALS['teams'] as $team => $teamData) {
                echo "<option value='{$team}'>{$teamData['name']}</option>";
            } ?>
        </select>
        <button type="submit">Wählen.</button>
    </form>
</body>
</html>