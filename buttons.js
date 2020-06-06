let mas_of_plus = document.querySelectorAll(".plus");
        
for (let key = 0; key < mas_of_plus.length; key++) {
    mas_of_plus[key].addEventListener("click", (event) => {
        let inp = event.currentTarget.parentNode.childNodes[3];
        if (inp.value >= 1 && inp.value < 50)
            inp.value =  String(Number(inp.value) + 1);
    });
}

let mas_of_minus = document.querySelectorAll(".minus");

for (let key = 0; key < mas_of_plus.length; key++) {
    mas_of_minus[key].addEventListener("click", (event) => {
        let inp = event.currentTarget.parentNode.childNodes[3];
        if (inp.value > 1 && inp.value <= 50)
            inp.value =  String(Number(inp.value) - 1);
    });
}