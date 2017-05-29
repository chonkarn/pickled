$(document).ready(function () {
    
    // test
    function checkHN() {
        alert("Name must be filled out");
        var x = document.form["hn"].value;
        var patt = [0-9];
        patt.test(x);
        alert("Name must be filled out");
    }
});