function clearForm() {

    document.getElementById('form_grade').reset();


    document.getElementsByTagName('input').name.value = "";

    document.getElementById('d').value = "";
    document.getElementById('w').value = "";
    document.getElementById('h').value = "";


    var errors = document.getElementsByClassName('error');
    for (var i = 0; i < errors.length; i++) {
        errors.item(i).innerHTML = "";
    }
}

