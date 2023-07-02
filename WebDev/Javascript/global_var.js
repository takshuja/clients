/*

Do NOT create global variables unless you intend to.

Your global variables (or functions) can overwrite window variables (or functions).
Any function, including the window object, can overwrite your global variables and functions.

*/

// to declare a global variable, create it outside the function


var num = 90;	// This is a global variable

// Some test examples

function printNum() {
	console.log('Printing num inside the function ' + num);
}
printNum()
console.log("Printing num outside the funtion " + num)
