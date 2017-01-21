var hideMain = document.getElementById('hide-menu');
var recordSearchForm = document.getElementById('record-search');

hideMain.addEventListener('click', function() {
    if (recordSearchForm.className == 'record-search-hidden') {
        recordSearchForm.className = 'record-search-showing';
        hideMain.querySelector('.fa').className = 'fa fa-caret-up fa-3x';
    } else {
        recordSearchForm.className = 'record-search-hidden';
        hideMain.querySelector('.fa').className = 'fa fa-caret-down fa-3x';
    }
}, false);
