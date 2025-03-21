const numbers = [];

for (let i = 0; i < 30; i++) {
    const rng = Math.floor(Math.random() * 100);
    numbers.push(rng);
};

const isEven = numbers => numbers % 2 === 0;

const sumTime = (evenNumbers) => {
    return evenNumbers.reduce((accumilator, currentvalue) => accumilator + currentvalue, 0);
};

const summary = (numbers) => {
    return numbers.reduce((accumilator, currentvalue) => accumilator + currentvalue, 0);
};

function isDivisibleBy(factor){
    return function(num){
        return num % factor == 0;
    }
}

const isDivisibleBy3 = numbers.filter(isDivisibleBy(3));
const isDivisibleBy4 = numbers.filter(isDivisibleBy(4));
const isDivisibleBy5 = numbers.filter(isDivisibleBy(5));

const evenNumbers = numbers.filter(isEven);
const evenSum = sumTime(evenNumbers);
const allSum = summary(numbers);
const divBy3 = numbers.filter(isDivisibleBy3);
const divBy4 = numbers.filter(isDivisibleBy4);
const divBy5 = numbers.filter(isDivisibleBy5);

const maxnumber3 = (divBy3) => { return divBy3.reduce((max, current) => Math.max(max, current))};
const maxnumber4 = (divBy4) => { return divBy4.reduce((max, current) => Math.max(max, current))};
const maxnumber5 = (divBy5) => { return divBy5.reduce((max, current) => Math.max(max, current))};

const largestDivBy3 = maxnumber3(divBy3);
const largestDivBy4 = maxnumber3(divBy4);
const largestDivBy5 = maxnumber3(divBy5);

console.log(numbers);
console.log(evenNumbers);
console.log(evenSum);
console.log(allSum);
console.log(divBy3);
console.log(divBy4);
console.log(divBy5);
console.log("the largest number divisible by 3 is: " + largestDivBy3);
console.log("the largest number divisible by 4 is: " + largestDivBy4);
console.log("the largest number divisible by 5 is: " + largestDivBy5);