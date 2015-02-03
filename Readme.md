# Usage & debug
<pre>
   $math = new AwesomeProgression();
   
   $math->debug('fibonachi 4 = 3', $math->fibonachi(4, true));
   $math->debug('fibonachi 8 = 21', $math->fibonachi(8, true));
</pre>
# Tests
phpunit --verbose AwesomeProgressionTest.php
