var nav = document.getElementsByClassName('nav');
var mobileNavChange = document.getElementById('nav-mobile');
var addNewFormFieldBtn = document.getElementById('btn-add-field');
var recordForm = document.getElementById('record-form');
var dropDownMenuBtn = document.getElementsByClassName('navbar-right');
var dropDownMenu = dropDownMenuBtn[0].querySelector('li');

// toggle between show and hide for the dropdown
dropDownMenuBtn[0].addEventListener('click', function() {
    if (dropDownMenu.className.match(/(?:^|\s)open(?!\S)/)) {
        dropDownMenu.className =
            dropDownMenu.className.replace(/(?:^|\s)open(?!\S)/g, '');
    } else {
        dropDownMenu.className += ' open';
    }
}, false);

// on mobile nav icon click open menu
if (mobileNavChange != null) {
    mobileNavChange.addEventListener('click', function() {
        for (var i = nav.length - 1; i >= 0; i--) {
            if (nav[i].style.display == 'block') {
                nav[i].style.display = '';
            } else {
                nav[i].style.display = 'block';
            }
        }
    });
}

// on window resize, fold menu and create 'three line' menu symbol
window.onresize = function() {
    if (document.documentElement.clientWidth > 800) {
        for (var i = nav.length - 1; i >= 0; i--) {
            nav[i].style.display = '';
        }

        if (document.getElementsByClassName('change').length > 0) {
            mobileNavChange.classList.remove('change');
        }
    }
};

if (mobileNavChange != null) {
    // transform 'three line' menu symbol to 'X' symbol on mobile menu unfold
    mobileNavChange.addEventListener('click', function() {
        mobileNavChange.classList.toggle('change');
    });
}

if (recordForm != null) {
    recordForm.addEventListener('click', handleFormBtnClick, false);

    function handleFormBtnClick(event) {
        var target = event.target || event.srcElement;
        clickedBtn = target.id;

        switch(target.id) {
            case 'add-artist':
                if (document.getElementById('new-artist') == null) {
                    target.innerHTML = '- Delete';
                    target.style.backgroundColor = '#d43f3a';

                    var node = document.createElement('input');
                    node.type = 'text';
                    node.name = 'artist';
                    node.id = 'new-artist';
                    node.className = 'form-field';
                    node.placeholder = 'Enter new artist name';

                    return document.querySelector("#add-artist").parentNode.insertBefore(
                        node, document.querySelector("#add-artist").nextSibling);
                }

                target.innerHTML = '+ Add artist';
                target.style.backgroundColor = '#5cb85c';

                return document.getElementById('new-artist').remove();
                break;
            case 'add-genre':
                if (document.getElementById('new-genre') == null) {
                    target.innerHTML = '- Delete';
                    target.style.backgroundColor = '#d43f3a';

                    var node = document.createElement('input');
                    node.type = 'text';
                    node.name = 'genre';
                    node.id = 'new-genre';
                    node.className = 'form-field';
                    node.placeholder = 'Enter new genre';

                    return document.querySelector("#add-genre").parentNode.insertBefore(
                        node, document.querySelector("#add-genre").nextSibling);
                }

                target.innerHTML = '+ Add genre';
                target.style.backgroundColor = '#5cb85c';

                return document.getElementById('new-genre').remove();
                break;
            case 'add-mood':
                if (document.getElementById('new-mood') == null) {
                    target.innerHTML = '- Delete';
                    target.style.backgroundColor = '#d43f3a';

                    var node = document.createElement('input');
                    node.type = 'text';
                    node.name = 'mood';
                    node.id = 'new-mood';
                    node.className = 'form-field';
                    node.placeholder = 'Enter new mood';

                    return document.querySelector("#add-mood").parentNode.insertBefore(
                        node, document.querySelector("#add-mood").nextSibling);
                }

                target.innerHTML = '+ Add mood';
                target.style.backgroundColor = '#5cb85c';

                return document.getElementById('new-mood').remove();
                break;
        }
    }
}
