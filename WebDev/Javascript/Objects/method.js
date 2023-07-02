function emp(id, name, salary) {
	this.id = id;
	this.name = name;
	this.salary = salary;

	this.changeSalary = changeSalary;

	function changeSalary(newSalary) {
		this.salary = newSalary;
	}
}


const emp1 = new emp(101, "Shuja Ahmad", 65000);

console.log(emp1.id)
console.log(emp1.name)
console.log(emp1.salary)

console.log("\n\n")

emp1.changeSalary(75000)

console.log(emp1.id)
console.log(emp1.name)
console.log(emp1.salary)


