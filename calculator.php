<?php

function Calculator($infixExpression)
{
    $infixArray = InfixToArrayInfix($infixExpression);
    $postfixArray = InfixArrayToPostfixArray($infixArray);
    return Evaluate($postfixArray);
}

//function validInfix($arrInfix)
function validInfix($arrInfix)
{
}

function is_operator($op)
{
    $operator = '+-*/%^()';
    if (is_numeric(strpos($operator, $op))) {
        return true;
    }
    return false;
}

###
#  convert infix to infixArray function(s)
###
function InfixToArrayInfix($infix)
{
    $infixArray = $array = array();
    $infixIndex = -1;
    $arrayIndex = 0;
    $array = str_split($infix, 1);
    $arrayLength = count($array) - 1;
    while ($arrayLength >= $arrayIndex) {
        if (is_operator($array[$arrayIndex])) {
            $infixArray[++$infixIndex] = $array[$arrayIndex++];
        } else {
            $num = '';
            while ($arrayLength >= $arrayIndex && !is_operator($array[$arrayIndex])) {
                $num .= $array[$arrayIndex++];
            }
            $infixArray[++$infixIndex] = $num;
        }
    }
    return $infixArray;
}

###
#  convert infix to postfix function(s)
###
function InfixArrayToPostfixArray($infixArray)
{
    $infixIndex = 0;
    $infixLength = count($infixArray) - 1;
    $stack = $postfixArray = array();
    $stackTop = $postfixIndex = -1;

    while ($infixLength >= $infixIndex) {
        if ($infixArray[$infixIndex] == '(') { //open parenthesis
            $stack[++$stackTop] = $infixArray[$infixIndex++];
        } elseif ($infixArray[$infixIndex] == ')') { //close parenthesis
            while ($stackTop >= 0 && $stack[$stackTop] != '(') {
                $postfixArray[++$postfixIndex] = $stack[$stackTop--];
            }
            if ($stackTop >= 0 && $stack[$stackTop] == '(') {
                $stackTop--;
                $infixIndex++;
            }
        } elseif (is_operator($infixArray[$infixIndex])) { // if this item is operator
            if ($stackTop < 0 || is_morePriority($infixArray[$infixIndex], $stack[$stackTop])) { //and more priority than top stack item
                $stack[++$stackTop] = $infixArray[$infixIndex++];
            } else { //and less priority than top stack item
                while ($stackTop >= 0 && !is_morePriority($infixArray[$infixIndex], $stack[$stackTop])) {
                    $postfixArray[++$postfixIndex] = $stack[$stackTop--];
                }
            }
        } elseif (!is_operator($infixArray[$infixIndex])) { // if this item is number
            $postfixArray[++$postfixIndex] = $infixArray[$infixIndex++];
        }
    }
    while ($stackTop >= 0) {
        $postfixArray[++$postfixIndex] = $stack[$stackTop--];
    }
    return $postfixArray;
}

function is_morePriority($op1, $op2)
{
    $operatorPriority = array('(', '+-', '*/%', '^');
    $op1Index = $op2Index = '';
    foreach ($operatorPriority as $key => $value) {
        if (is_numeric(strpos($value, $op1))) {
            $op1Index = $key;
        }
        if (is_numeric(strpos($value, $op2))) {
            $op2Index = $key;
        }
    }
    if ($op1Index > $op2Index) {
        return true;
    }
    return false;
}


###
#  evaluate expression function(s)
###
function Evaluate($postfixArray)
{
    $postfixIndex = 0;
    $postfixLength = count($postfixArray) - 1;
    $stack = array();
    $stackTop = -1;

    while ($postfixLength >= $postfixIndex) {
        if (!is_operator($postfixArray[$postfixIndex])) {
            $stack[++$stackTop] = $postfixArray[$postfixIndex++];
        } else {
            $num2 = $stack[$stackTop];
            unset($stack[$stackTop]);
            $stack = array_values($stack);
            $stackTop--;
            $num1 = $stack[$stackTop];
            $stack[$stackTop] = perform_operate($num1, $num2, $postfixArray[$postfixIndex++]);
        }
    }
    return $stack[$stackTop];
}

function perform_operate($num1, $num2, $op)
{
    $result = 0;
    switch ($op) {
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = $num1 / $num2;
            break;
        case '%':
            $result = $num1 % $num2;
            break;
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '^':
            $result = pow($num1, $num2);
            break;
    }
    return $result;
}


