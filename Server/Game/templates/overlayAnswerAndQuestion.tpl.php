<div id="overlayAnswer<?php echo $category.$task; ?>" class="overlay overlayAnswer" onclick="">
    <div class="overlayContent answer">
        <h1><?php echo $answer; ?></h1>
        <div class="answerButtons">
            <button id="correct<?php echo $category.$task; ?>" class="correct" onclick="closeAnswer(this)">Korrekte Antwort!</button>
            <button id="free<?php echo $category.$task; ?>" class="free" onclick="resetBuzzer()">Freigeben.</button>
        </div>
    </div>
</div>
<div id="overlayQuestion<?php echo $category.$task; ?>" class="overlay overlayQuestion" onclick="closeQuestion(this, <?php echo $value; ?>)">
    <div class="overlayContent question">
        <h1><?php echo $question; ?></h1>
    </div>
</div>