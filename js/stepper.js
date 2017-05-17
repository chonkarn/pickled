$(document).ready(function () {
    function step1() {
        $("#step1").addClass("active")
        $("#step2").removeClass("active")
        $("#step3").removeClass("active")
        $("#step4").removeClass("active")
    }

    function step2() {
        $("#step1").removeClass("active")
        $("#step2").addClass("active")
        $("#step3").removeClass("active")
        $("#step4").toggleClass("active")
    }

    function step3() {
        $("#step1").removeClass("active")
        $("#step2").removeClass("active")
        $("#step3").addClass("active")
        $("#step4").removeClass("active")
    }

    function step4() {
        $("#step1").removeClass("active")
        $("#step2").removeClass("active")
        $("#step3").removeClass("active")
        $("#step4").addClass("active")
    }

    /* stepper */
    $("#step1").click(function () {
        step1();
    });
    $("#step2").click(function () {
        step2();
    });
    $("#step3").click(function () {
        step3();
    });
    $("#step4").click(function () {
        step4();
    });

    /* prev-btn */
    $("#prev-btn2").click(function () {
        step1();
    });
    $("#prev-btn3").click(function () {
        step2();
    });
    $("#prev-btn4").click(function () {
        step3();
    });

    /* next-btn */
    $("#next-btn1").click(function () {
        step2();
    });
    $("#next-btn2").click(function () {
        step3();
    });
    $("#next-btn3").click(function () {
        step4();
    });
});
