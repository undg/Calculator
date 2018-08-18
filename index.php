<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bartek Laskowski: Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
  </head>
  <body>
    <?php 
    // It should by by in separate file, but i think
    // with this amount of code index.php is not to noisy
    $ip = getenv('HTTP_CLIENT_IP')?:
          getenv('HTTP_X_FORWARDED_FOR')?:
          getenv('HTTP_X_FORWARDED')?:
          getenv('HTTP_FORWARDED_FOR')?:
          getenv('HTTP_FORWARDED')?:
          getenv('REMOTE_ADDR');

    function browser() {
    // not 100% accurate but doing the job in most cases
      $u_agent = $_SERVER['HTTP_USER_AGENT'];
          if(preg_match('/MSIE/i',$u_agent))    { return "ie"; }
      elseif(preg_match('/Firefox/i',$u_agent)) { return "firefox"; }
      elseif(preg_match('/Chrome/i',$u_agent))  { return "chrome"; }
      elseif(preg_match('/Safari/i',$u_agent))  { return "safari"; }
      elseif(preg_match('/Flock/i',$u_agent))   { return "flock"; }
      elseif(preg_match('/Opera/i',$u_agent))   { return "opera"; }
    }
    ?>
    <div class="container">
      <div id="calculator">
        <form>
          <div class="display">
            <span class="display__top" data-fontSize data-display="top"></span>
            <span class="display__bottom" data-fontSize data-display="bottom"></span>
            <?php /* styling text in input[text] is not as flexible as in <span> */ ?>
            <input type="hidden" name="calc" data-display="top">
            <input type="hidden" name="result" data-display="bottom"> 
            <input type="hidden" name="date" value="<?=Date('Y-m-d')?>"> 
            <input type="hidden" name="browser" value="<?=browser()?>"> 
            <input type="hidden" name="ip" value="<?=$ip?>"> 
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
