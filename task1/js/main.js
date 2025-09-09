const display = document.getElementById("result-display"); 
const input = document.getElementById("input-display"); 

function appendNumber(number) {
    if (display.innerHTML === "0" || display.innerHTML === "Error") {
        display.innerHTML = number;
    } else {
        display.innerHTML += number;
    }

    input.innerHTML += number;
}

function appendOperator(operator) {
    const lastChar = input.innerHTML.slice(-1);

    if ("+-*/".includes(lastChar)) {
        input.innerHTML = input.innerHTML.slice(0, -1) + operator;
    } else {
        input.innerHTML += operator;
    }

    display.innerHTML = "";
}

function clearDisplay() {
    display.innerHTML = "0";
    input.innerHTML = "";
}

function deleteLast() {
    if (display.innerHTML.length > 1) {
        display.innerHTML = display.innerHTML.slice(0, -1);
    } else {
        display.innerHTML = "0";
    }

    input.innerHTML = input.innerHTML.slice(0, -1);
}

function calculate() {
    try {
        const expression = input.innerHTML;
        const result = new Function("return " + expression)();

        display.innerHTML = result;
        input.innerHTML = expression + " =";
    } catch {
        display.innerHTML = "Error";
        input.innerHTML = "";
    }
}
