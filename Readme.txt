**Usage & dump**
$math = new AwesomeProgression();
$math->debug('Factoriel 6: ', $math->factoriel(6));
$math->debug('Factoriel 7: ', $math->factoriel(7));
$math->debug('Is prime 10: ', $math->isPrimeNumber(10)?'Yes':'No');
$math->debug('Is prime 5: ', $math->isPrimeNumber(5)?'Yes':'No');
$math->debug('Is prime 0: ', $math->isPrimeNumber(0)?'Yes':'No');
$math->debug('Is prime 1: ', $math->isPrimeNumber(1)?'Yes':'No');
$math->debug('Is prime 2: ', $math->isPrimeNumber(2)?'Yes':'No');
$math->debug('Is prime 3: ', $math->isPrimeNumber(2)?'Yes':'No');
$math->debug('fibonachi 4 = 3', $math->fibonachi(4, true));
$math->debug('fibonachi 8 = 21', $math->fibonachi(8, true));

**Running Test**
phpunit --verbose AwesomeProgressionTest.php