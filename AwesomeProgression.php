<?php

/**
 * Copyright (c) <2015>, Ghali Ahmed<ghaliano2005@gmail.com>
 * 
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright notice, 
 * this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright notice, 
 * this list of conditions and the following disclaimer in the documentation and/or 
 * other materials provided with the distribution.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, 
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
 * IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES 
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY 
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This class calculate some popular progressions 
 * and Math functions like factoriel and Test prime number
 *
 * @author Ghali Ahmed<ghaliano2005@gmail.com>
 * @version 1.0
 */
class AwesomeProgression
{
    /**
     * U(0) = 0;
     * U(1) = 1;
     * U(2) = 1;
     * U(n) = U(n-1) + U(n-2)
     */
    public function fibonachi($i, $dump = false)  
    {
        $progression = [0,1];
        $n = 2;
        while ($n < $i) {
            $progression[] = $progression[$n - 1] + $progression[$n - 2];
            $n++;
        }

        return $dump?$progression:($progression[$i - 1] + $progression[$i - 2]);
    }

    /** 
     * U(0) = arbitrary positive integer:
     * If the number is even, divide it by two.
     * If the number is odd, triple it and add one.
     */
    public function collatz($from, $i, $dump = false) 
    {
        //U0 = $from
        $n = 0;
        $progression = [$from];
        while ($n < $i) {
            $progression[] = $progression[$n]%2?(3*$progression[$n] + 1):($progression[$n]/2);
            $n++;
        }

        return $dump?$progression:$progression[$i];
    }

    /** 
     * U(0) = a
     * U(n+1) = (U(n) + a/U(n))/2
     * Always U(n+1) < U(n)
     */
    public function cauchy($from, $i, $dump = false) 
    {
        //U0 = $from
        $n = 0;
        $progression = [$from];
        while ($n < $i) {
            $progression[] = ($progression[$n] + ($from/$progression[$n]))/2;
            $n++;
        }

        return $dump?$progression:$progression[$i];
    }

    /** 
     * 1 read : "one 1" -> "11"
     * 11 read : "two 1" -> "21"
     * 21 read : "one 2 one 1" -> "1211"
     * 1211 read : " one 1 one 2 two 1" -> "111221"
     */
    public function conway($i, $dump = false) 
    {
        //U0 = $from
        $n = 0;
        $progression = [1];        

        while ($n < $i) {
            $progression[] = $this->getAsHumanRead($progression[$n]) ;
            $n++;
        }

        return $dump?$progression:$progression[$i];
    }

    /** 
     * U(n+1) = U(n) × (U(n) + 1);
     */
    public function arithmetic1($i, $dump = false) 
    {
        //U0 = $from
        $n = 0;
        $progression = [1];
        while ($n < $i) {
            $progression[] = $progression[$n]*($progression[$n] + 1);
            $n++;
        }

        return $dump?$progression:$progression[$i];
    }

    protected function getAsHumanRead($u) 
    {
        $j = 0;
        $count = 0;
        $str = "";    
        $len = strlen($u);
        $u = str_split($u);
        while ($j < $len) {
            $count++;
            if ($u[$j] !== @$u[$j + 1]) {
                $str .= $count.$u[$j];
                $count=0;
            }
            $j++;
        }

        return $str;
    }

    /** Helper method to debug result */
    public function debug($text, $val) 
    {
        if (is_array($val)) {
            print(sprintf("%s:\n", $text));
            print_r($val);
            print("\n");
        } else {            
            print sprintf("%s:%s\n", $text, $val);
        }
    }
}