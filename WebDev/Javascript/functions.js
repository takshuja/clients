// To create a function, we use the function keyword

function getCube(number) {
	return number*number*number;
}


console.log("The cube of 3 is " + getCube(3));


// you can create a function using a function object

var add = new Function("num1", "num2", "return num1+num2");

console.log("Adding 3 and 5 using function object\nResult: " + add(3,5))
