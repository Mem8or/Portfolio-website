const radioButtons = document.querySelectorAll('input[name="radio"]');

const config = {
    method: "GET",
    cache: "no-store"
};

function radioChange(event) {
    const selectedValue = event.target.value;
    let filePath;

    switch (selectedValue) {
        case "1": filePath = "./apache.html"; break;
        case "2": filePath = "./dreadnought.html"; break;
        case "3": filePath = "./leopard.html"; break;
        case "4": filePath = "./northrop.html"; break;
        case "5": filePath = "./panzer.html"; break;
        default: filePath = "";
    }

    if (filePath) {
        fetch(filePath, config)
            .then(response => response.text())
            .then(data => {
                document.getElementById("output").innerHTML = data;
            })
            .catch(error => {
                console.error("Womp Womp :(");
            });
    }
}

radioButtons.forEach(radio => {
    radio.addEventListener("change", radioChange);
});