# Usage & debug
<pre>
   $math = new AwesomeProgression();
   
   $math->debug('fibonnaci 4 = 3', $math->fibonnaci(4, true));
   $math->debug('fibonnaci 8 = 21', $math->fibonnaci(8, true));
</pre>
# Tests
phpunit --verbose AwesomeProgressionTest.php
