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
            <span class="display__top" data-fontSize data-display="top"></span>
            <span class="display__bottom" data-fontSize data-display="bottom"></span>
            <?php /* styling text in input[text] is not as flexible as in <span> */ ?>
            <input type="hidden" name="operation" data-display="top">
            <input type="hidden" name="equal" data-display="bottom"> 
          </div>
          <div class="keyboard">
            <button class="control" data-ac>AC</button>
            <button class="control" data-save type="submit">SAVE</button>
            <button class="operator" data-operator="/">&#247;</button>

<?php /* [data-num="0"]:
I was thinking a while about centering ZERO BUTTON, This primitive method will by less buggy.
With responsive sizes i need to use much more calc() and hacks to center it to pseudo-grid, instead to container,
without warranty that digit will stay 'inline' in every edge case. */?>
            <button class="number" data-num=".">.</button>    
            <button class="number" data-num="0">0</button>       
            <button class="number" data-num="0"></button>      
            <button class="operator" data-operator="*">x</button>

            <button class="number" data-num="1">1</button>
            <button class="number" data-num="2">2</button>
            <button class="number" data-num="3">3</button>
            <button class="operator" data-operator="-">-</button>

            <button class="number" data-num="4">4</button>
            <button class="number" data-num="5">5</button>
            <button class="number" data-num="6">6</button>
            <button class="operator" data-operator="+">+</button>

            <button class="number" data-num="7">7</button>
            <button class="number" data-num="8">8</button>
            <button class="number" data-num="9">9</button>
            <button class="operator" data-equal>=</button>
          </div>
        </form>
      </div>
    </div>

    <script src="dist/js/main.js"></script>
  </body>
</html>
<?php // vim: tabstop=2 sw=2 ft=html syn=php
