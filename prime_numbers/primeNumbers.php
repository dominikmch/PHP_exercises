<?php
/**
 * Created by PhpStorm.
 * User: Dominik Michalski
 * Date: 01/11/2019
 * Time: 19:36
 */
/*
From: https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes#Algorithm_and_variants

The maximum value is set to be a 4096

lcv === Loop Control Variable

Input: an integer n > 1

Let A be an array of Boolean values, indexed by integers 2 to n,
initially all set to true.

for i = 2, 3, 4, ..., not exceeding √n:
  if A[i] is true:
    for j = i2, i2+i, i2+2i, i2+3i, ..., not exceeding n :
      A[j] := false

Output: all i such that A[i] is true.
*/

class PrimeNumbers
{
private $varNumber=0;
private $output = '';
private $primes =[];
//variable $secured used to decide if program can run algorithms securely initially set to be false
private $secured=false;

//Checking if user input is correct
public function intValidation(){
    if ($_POST['form_submit'] == "Submit")
    {
            $error_message = '';
            if (empty($_POST['number']))
            {
                $error_message = "<p>You forgot to enter a number!</p>";
                echo $error_message;
            }else{
                $this->varNumber = $_POST['number'];
            $min = 2;
            $max = 4096;
            if (filter_var($this->varNumber, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
                echo("Variable value is not within the legal range");
            } else {
                $this->secured=true;
            }}
    }}
    //filling array with true values
    public function fillArray(){
        if ($this->secured){
   $this-> primes = array_fill(2, 4096, true);}
}

public function checkPrime(){
    //using Sieve of Eratosthenes Algorithm to set up values in array
        if ($this->secured){
            $start = 2;
            $n = 4096;
for ($lcv = $start; $lcv <= sqrt($n); $lcv++)
{
if ($this->primes[$lcv] === true)
{
$lcv_double = $lcv * 2;
$count = 0;
$lcv2 = $lcv_double;
while ($lcv2 <= $n)
{
$lcv2 = $lcv_double + ($lcv * $count++);
    $this->primes[$lcv2] = false;
}
}
}

//checking user input if it is prime
$lcv=$start;
if ($this->varNumber==2)
    echo "{$this->varNumber} number is a prime number";
else{
while($lcv<($this->varNumber+1)) {
    if ($this->varNumber == $lcv && $this->primes[$lcv] === true) {
        echo "{$this->varNumber} number is a prime number";
        break;
    } else {$this->output = "{$this->varNumber} number is not a prime number";
    $lcv++;
    if ($lcv==$this->varNumber+1)
    echo $this->output;}
}
}

}}}
//creating class instances and invoking methods
$test = new PrimeNumbers();
$test-> intValidation();
$test-> fillArray();
$test-> checkPrime();





