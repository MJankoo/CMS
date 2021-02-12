const ingredientsContainer = document.getElementById("recipe_ingredients_container");
const ingredientsDataInput = document.getElementById("recipe_ingredients_data");
let input = document.getElementById("recipe_ingredients_input");
let editedElementId = 0;

ingredientsContainer.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        if(input.value != "") {
            let newElement = document.createElement("li");
            newElement.id = editedElementId+1;
            newElement.setAttribute('onclick', 'editElement(this.id)');
            newElement.innerHTML = "<input id=\"recipe_ingredients_input\" type=\"text\" >";
            editedElementId++;
            input.parentElement.parentElement.appendChild(newElement);
            input.parentElement.innerText = input.value;
            updateData();
            input = document.getElementById("recipe_ingredients_input");
        }
        input.focus();
    }
});

function editElement(id) {
    if(id != editedElementId) {
        alert(input.value);
        if(input.value == "") {
            document.getElementById(editedElementId).remove();
        } else {
            document.getElementById(editedElementId).innerHTML = input.value;
        }

        document.getElementById(id).innerHTML = "<input id=\"recipe_ingredients_input\" type=\"text\" value=\""+document.getElementById(id).innerText+"\">";
        input = document.getElementById("recipe_ingredients_input");
        input.focus();
        editedElementId = id;
        alert(editedElementId);
    }
}

function updateData() {
    let data = {};
    let ingredientsList = Array.prototype.slice.call(document.getElementById("recipe_ingredients_list").children);
    let i = 0;
    ingredientsList.forEach(function (element) {
        if(element.innerText != "") {
            data[i] = element.innerText;
            i++;
        }
    });
    data = JSON.stringify(data);
    ingredientsDataInput.value = data;
    console.log(ingredientsDataInput.value );
}