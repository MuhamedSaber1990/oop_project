# PHP a program to calculate the mathematical function 3x + 1 using OOP, Access Modifiers,

This PHP code defines a class called CollatzSequence that generates and analyses Collatz sequences for a given range of input numbers, or a single number based on user input to enter single number or sequence & the step size between numbers in the sequence & here how the code works:
1.	The class CollatzSequence is defined with a public property $results to store the results of the Collatz sequences.
2.	The __construct method serves as the constructor for the class. It takes three parameters: $start (the starting number for the sequence), $end (the ending number for the sequence), and $step (the step size between numbers in the sequence):

•	The constructor initializes some variables and checks if the input values are consistent. If not, it adjusts them and informs the user.
•	It then iterates through the range of numbers specified by $start, $end, and $step.
•	For each number, it generates the Collatz sequence and stores information about the sequence (such as the number itself, the list of numbers in the sequence, the maximum number in the sequence, and the count of iterations) in the $results array.
•	It also keeps track of the maximum and minimum iteration counts and their corresponding numbers and maximum values.

3.	Output: After the constructor completes its execution, it calls the printResults method with the generated results:

•	The maximum and minimum iteration counts, along with their corresponding numbers and maximum values, are prepended to the $results array.
•	The entire set of results, including the additional information, is then printed in HTML format.
