# PHP a program to calculate the mathematical function 3x + 1 using OOP & child class (inheritance) 

This PHP code defines 2 classes which are called CollatzSequence that generates and analyses Collatz sequences for a given range of input numbers, or a single number based on user input to enter single number or sequence & the step size between numbers in the sequence and ArrayPrinter that printResults: Prints the here how the code works:

1.	CollatzSequence Class:

•	This class calculates Collatz sequences for a given range of numbers.
•	Constructor: It takes three parameters start, end, and step, representing the range of numbers to iterate through and the step size. It first validates and adjusts the input parameters if necessary.
•	It then iterates through the range of numbers, computing the Collatz sequence for each number.
•	For each number, it calculates the sequence until reaching 1 and records various statistics such as the maximum value in the sequence and the iteration count.
•	It maintains an array $results to store the calculated sequences and related information.
•	After iterating through all numbers, it creates an instance of ArrayPrinter and utilizes its methods to print the results in HTML format, including a histogram visualization.


2.	ArrayPrinter Class:

•	This class handles the printing of the Collatz sequence results.
•	It has two methods:
•	printResults: Prints the results of the Collatz sequence calculation in a formatted HTML structure. It iterates through each result, printing details such as the number, the sequence list, the maximum number in the sequence, and the iteration count.
•	printResults_Histogram: Prints a histogram visualization of the iteration counts for each number. It calculates the height of each bar in the histogram based on the iteration count relative to the maximum iteration count. It also displays the number and iteration count when hovering over each bar.
•	Additionally, there's JavaScript code included at the end to handle the interactivity of the histogram visualization. When hovering over a bar, it changes the background color and displays the details of the corresponding Collatz sequence.
