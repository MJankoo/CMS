const titleInput = document.getElementById("recipe_title_input");
const linkInput = document.getElementById("recipe_link_input");

titleInput.addEventListener("input", function (){
    let link = titleInput.value.toLowerCase();
    link = link.replace(/\s/g, '-');
    

    linkInput.value = link;
});