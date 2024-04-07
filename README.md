# program to calculate the mathematical function 3x + 1

The provided PHP code Mainly consists of two main functions, collatzSequence and collatzSingularity, designed to analyze the Collatz sequence. The code also includes a script that utilizes these functions to generate and display results based on user input.

collatzSingularity Function:
Purpose: Analyzes the Collatz sequence for a single number.
Parameter: Takes a single parameter, $input, representing the starting number.
Algorithm:
•	Follow the Collatz sequence rules for the given number until it reaches 1.
•	Keeps track of the sequence of numbers encountered, the maximum value reached, and the iteration count.
•	Provides a result array containing the sequence of numbers, the maximum value, and the iteration count.
