<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeopardy! - Teamwähler</title>
    <link rel="stylesheet" href="styling/client.css">
</head>
<body id="choose">
    <h1 class="team">Team wählen.</h1>
    <form method="POST">
        <select name="team">
            <?php foreach ($GLOBALS['teamnamen'] as $number => $name) {
                echo "<option value='$number'>$name</option>";
            } ?>
        </select>
        <span class="custom-select">⯆</span>
        <button type="submit">Wählen.</button>
    </form>
</body>
</html>