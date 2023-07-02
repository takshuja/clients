/*

JavaScript Objects

A javaScript object is an entity having state and behavior (properties and method). For example: car, pen, bike, chair, glass, keyboard, monitor etc.

JavaScript is an object-based language. Everything is an object in JavaScript.

JavaScript is template based not class based. Here, we don't create class to get the object. But, we direct create objects.

*/


// Create an object

// 1. Using the object literal
emp = {id:101, name:"Shuja Ahmad", salary:65000}
console.log(emp.id + "\n" + emp.name + "\n" + emp.salary) ;


// 2. Using the object keyword

var emp = new Object();

emp.id = 101;
emp.name = "Shuja Ahmad";
emp.salary = 65000;

console.log(emp.id)
console.log(emp.name)
console.log(emp.salary)


// 3. By the object constructor

function em(id, name, salary) {
	this.id = id;
	this.name = name;
	this.salary = salary;
}


e = new em(101, "Shuja Ahmad", 65000)

console.log(e.id)
console.log(e.name)
console.log(e.salary)

