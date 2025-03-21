let num = 5;

function recurse() {
    if (num <= 0){
        return;
    }
    else {
        console.log(num);
        num -= 1;
        recurse();
    }
}

recurse();

let employees = {
	design: [{
		name: 'Ruud',
		salary: 1200
	}, {
		name: 'Nancy',
		salary: 2100
	}],
	development: {
		frontend: {
			angular: [{
				name: 'Mika',
				salary: 1900
			}, {
				name: 'Jeffrey',
				salary: 1900				
			}],
			react: [{
				name: 'Julio',
				salary: 2400
			}]
		},
		backend: [{
			name: 'Aron',
			salary: 2600
		}]
	},
	seo: [{
		name: 'Alex',
		salary: 1800
	}]	
};



function calculateSalary(employees) {
    let totalsalary = 0;

    if(Array.isArray(employees)){

        employees.forEach(employee => totalsalary += employee.salary);
    } else {

        for (const subDepth of Object.values(employees)) {
            totalsalary += calculateSalary(subDepth);
        }
    }
    return totalsalary;
}

const totalsalary = calculateSalary(employees);
console.log("The sum of all salary is: " + totalsalary);