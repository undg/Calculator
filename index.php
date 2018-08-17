<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bartek Laskowski: Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
  </head>
  <body>
    <div class="container">
      <div id="calculator">
        <form>
          <div class="display">
            <span class="display__top" data-fontSize>10 / 2 * 3 - 2 + 8 =</span>
            <span class="display__bottom">21</span>
            <?php // styling text in input[text] is not as flexible as in <span>  ?>
            <input type="hidden" name="operation" value="10 / 2 * 3 - 2 + 8 =">
            <input type="hidden" name="equal" value="21">
          </div>
          <div class="keyboard">
            <button id="ac" class="control">AC</button>
            <button id="save" class="control" type="submit">SAVE</button>
            <button id="divide" class="operator">&#247;</button>

            <button id="dot" class="number">.</button>
            <button id="n0" class="number">0</button>
            <button id="multiply" class="operator">x</button>

            <button id="n1" class="number">1</button>
            <button id="n2" class="number">2</button>
            <button id="n3" class="number">3</button>
            <button id="subtract" class="operator">-</button>

            <button id="n4" class="number">4</button>
            <button id="n5" class="number">5</button>
            <button id="n6" class="number">6</button>
            <button id="add" class="operator">+</button>

            <button id="n7" class="number">7</button>
            <button id="n8" class="number">8</button>
            <button id="n9" class="number">9</button>
            <button id="equal" class="operator">=</button>
          </div>
        </form>
      </div>
    </div>

    <script src="dist/js/main.js"></script>
  </body>
</html>
<?php // vim: tabstop=2 sw=2 ft=html syn=php
