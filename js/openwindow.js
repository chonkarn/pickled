//function open_calendar_add() {
//    window.open("calendar_add.html", "_self");
//}

function openSumStep(num) {
    switch (num) {
    case 1:
        window.location = 'summary_step1.php';
        break;
    case 2:
        window.location = 'summary_step2.php';
        break;
    case 3:
        window.location = 'summary_step3.php';
        break;
    case 4:
        window.location = 'summary_step4.php';
        break;
    }
}

function openPatientStep(num) {
    switch (num) {
    case 1:
        window.location = 'patient_step1.php';
        break;
    case 2:
        window.location = 'patient_step2.php';
        break;
    case 3:
        window.location = 'patient_step3.php';
        break;
            
    }
}

function openPatient(num) {
    switch (num) {
    case 1:
        window.location = 'patient_view.php';
        break;
    case 2:
        window.location = 'patient_print.html';
        break;
    case 3:
        window.location = 'patient_edit.html';
        break;
    }
}