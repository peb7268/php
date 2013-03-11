#PHP strings: Interpolation, single quotes vs double quotes. 
####Strings in PHP can be specified not just in two ways, but in four ways. 

1. Single quoted strings will display things almost completely "as is." Variables and most escape sequences will not be interpreted. The exception is that to display a literal single quote, you can escape it with a back slash \', and to display a back slash, you can escape it with another backslash \\ (So yes, even single quoted strings are parsed). 

2. Double quote strings will display a host of escaped characters (including some regexes), and variables in the strings will be evaluated. An important point here is that you can use curly braces to isolate the name of the variable you want evaluated. For example let's say you have the variable $type and you what to echo "The $types are" That will look for the variable $types. To get around this use echo "The {$type}s are" You can put the left brace before or after the dollar sign. Take a look at string parsing to see how to use array variables and such. 

3. Heredoc string syntax works like double quoted strings. It starts with <<<. After this operator, an identifier is provided, then a newline. The string itself follows, and then the same identifier again to close the quotation. You don't need to escape quotes in this syntax. 

4. Nowdoc (since PHP 5.3.0) string syntax works essentially like single quoted strings. The difference is that not even single quotes or backslashes have to be escaped. A nowdoc is identified with the same <<< sequence used for heredocs, but the identifier which follows is enclosed in single quotes, e.g. <<<'EOT'. No parsing is done in nowdoc. 

####In summary, double quotes interpret things more fully, like what a \n means or what a variable actually evaluates to as opposed to single quotes which will literally display the variable name.


##Curly Brace interpolation can be used anywhere where you want to out put the string value of a variable in PHP. It often looks cleaner than the other forms and is easier to use when doing concatentation. 

````php 
$adj 	= "really";
$great 	= 'fantastic';
echo "\$great is a ".gettype($great)."<br>";
echo "It's value is  {$adj} {$great}";
````

####Really clean for readability
````php
$edition = 4;
print "You have the {$number}th edition book";
//output: "You have the 4th edition book";
```` 

Without the { } php would look for $numberth instead of concatinating the value of $number with the string th. It treats the whole thing as a string.