// ธนโชติ
var hn8512365 = document.querySelector('#hn8512365');
var showHN8512365 = document.querySelector('#show-hn8512365');
if (!hn8512365.showModal) {
    dialogPolyfill.registerDialog(hn8512365);
}
showHN8512365.addEventListener('click', function () {
    hn8512365.showModal();
});
hn8512365.querySelector('.close').addEventListener('click', function () {
    hn8512365.close();
});

// มาณี
var hn4683265 = document.querySelector('#hn4683265');
var showHN4683265 = document.querySelector('#show-hn4683265');
if (!hn4683265.showModal) {
    dialogPolyfill.registerDialog(hn4683265);
}
showHN4683265.addEventListener('click', function () {
    hn4683265.showModal();
});
hn4683265.querySelector('.close').addEventListener('click', function () {
    hn4683265.close();
});

// more
var dialog = document.querySelector('#dialog-more');
var showDialogButton = document.querySelector('#show-more');
if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
showDialogButton.addEventListener('click', function () {
    dialog.showModal();
});
dialog.querySelector('.close').addEventListener('click', function () {
    dialog.close();
});