function validate(){
    let nom = document.getElementById('nom').value;
    if(nom.trim() === ""){
        alert("Le nom est obligatoire");
        return false;
    }
    document.getElementById('add-formulaire').submit();
}