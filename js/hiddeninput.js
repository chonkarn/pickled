function checkInput(name) {
        if (document.getElementById("other").checked == true) {
            document.getElementById("other_input").disabled = false;
        } else {
            document.getElementById("other_input").disabled = true;
        }
    }