$(document).ready(function () {
    var count = 1;

    /* stepper */
    $("#step1").click(function () {
        count = 1;
        $("#step1").addClass("active")
        $("#step2").removeClass("active")
        $("#step3").removeClass("active")
        $("#step4").removeClass("active")
    });
    $("#step2").click(function () {
        count = 2;
        $("#step1").removeClass("active")
        $("#step2").addClass("active")
        $("#step3").removeClass("active")
        $("#step4").toggleClass("active")
    });
    $("#step3").click(function () {
        count = 3;
        $("#step1").removeClass("active")
        $("#step2").removeClass("active")
        $("#step3").addClass("active");
        $("#step4").removeClass("active")
    });
    $("#step4").click(function () {
        count = 4;
        $("#step1").removeClass("active")
        $("#step2").removeClass("active")
        $("#step3").removeClass("active")
        $("#step4").addClass("active")
    });

    /* btn */
    $("#prev-btn").click(function () {
        count--;
        alert(count);
    });
    $("#next-btn").click(function () {
        count++;
    });
    if (count == 1) {
        $("#step1").addClass("active")
        $("#step2").removeClass("active")
        $("#step3").removeClass("active")
        $("#step4").removeClass("active")
    } else if (count == 2) {
        $("#step1").removeClass("active")
        $("#step2").addClass("active")
        $("#step3").removeClass("active")
        $("#step4").toggleClass("active")
    } else if (count == 3) {
        $("#step1").removeClass("active")
        $("#step2").removeClass("active")
        $("#step3").addClass("active")
        $("#step4").removeClass("active")
    } else if (count == 4) {
        $("#step1").removeClass("active")
        $("#step2").removeClass("active")
        $("#step3").removeClass("active")
        $("#step4").addClass("active");
    }
});
