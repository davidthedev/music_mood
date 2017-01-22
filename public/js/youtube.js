var tableWrapper = document.getElementById('table-responsive');
var searchForm = document.getElementById('record-search');
var playlist = [];
var youtubePlayer;
var currentTrack;

// load YouTube API
function launchYoutube() {
    youtubePlayer = new YT.Player('youtube-player', {
        height: '360',
        width: "100%",
        playerVars: {
            'controls': 1,
            'autoplay': 0
        },
        events: {
            'onReady': setTrack,
            'onStateChange': onPlayerStateChange
        },
        videoId: ''
    });

    window.location.hash = 'playlist';
}

// use function when YouTube player changes state
// (e.g. video ends, etc.)
function onPlayerStateChange(e) {

    // '0' signifies video end
    if (e.data === 0) {
        document.querySelector("[data-id='" + currentTrack + "']").className = '';
        document.querySelector("[data-id='" + currentTrack + "']").querySelector('.fa').className = 'fa';
        var index = playlist.indexOf(currentTrack);
        currentTrack = playlist[index + 1];

        // if no more tracks left in the playlist redirect to next page
        if (typeof currentTrack === 'undefined') {
            var currentPage = document.getElementsByClassName('active');

            if (currentPage.length === 0) {
                return window.location.reload();
            }

            var href = currentPage[0].nextElementSibling.getElementsByTagName('a');

            if (typeof href[0] !== 'undefined' ) {
                window.location = href[0].getAttribute('href');
            }
        }
        document.querySelector("[data-id='" + currentTrack + "']").querySelector('.fa').className = 'fa fa-pause';
        document.querySelector("[data-id='" + currentTrack + "']").className += 'active-track';
        youtubePlayer.loadVideoById(currentTrack, 0, 'default');
    }
}

// event listener for results table
tableWrapper.addEventListener('click', clicked, false);

// when one of the td elements in the table is clicked
function clicked(e) {

    var target = e.target || e.srcElement,
        // parent = target.parentNode,
        row = function(element) {
                return element.tagName.match(/tr/i);
        };

    while (target = target.parentNode) {
        if (row(target)) {
            if (target.className === 'active-track') {
                if (youtubePlayer.getPlayerState() === 1) {
                    youtubePlayer.pauseVideo();
                    // change icon from pause to play
                    target.querySelector('.fa').className = 'fa fa-play';
                    return true;
                }
                target.querySelector('.fa').className = 'fa fa-pause';
                youtubePlayer.playVideo();
                return true;
            }

            // remove active state from the previous track and any player buttons
            document.querySelector("[data-id='" + currentTrack + "']").className = '';
            document.querySelector("[data-id='" + currentTrack + "']").querySelector('.fa').className = 'fa';

            // add new track and player icons play / pause
            currentTrack = target.dataset.id;
            target.className = 'active-track';
            target.querySelector('.fa').className = 'fa fa-pause';
            youtubePlayer.loadVideoById(currentTrack, 0, 'default');
            return true;
        }
    }
}

// on search form submission
searchForm.addEventListener('submit', function(e) {
    // prevent form from submission
    // e.preventDefault();
    // reference to object that dispatched the event (form in our case)
    var form = e.target;
    // a set of key - value pairs from the form
    var data = new FormData(form);
    // XML Http request object
    var request = new XMLHttpRequest();
    // when state of request is ready
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            // clear everything inside table wrapper
            tableWrapper.innerHTML = '';
            // set table wrapper's inner html to response data
            // which is a partial html view
            tableWrapper.innerHTML = request.responseText;
            // scroll to the bottom of the page
            // to show the playlist
            window.scrollTo(0, document.body.scrollHeight);
            // get generated rows
            var rows = document.getElementById('playlist').getElementsByTagName('tr');
            // loop through rows, get video ids and push into playlst array
            for (var i = 0; i < rows.length; i++) {
                if (typeof rows[i].dataset.id !== 'undefined') {
                    playlist.push(rows[i].dataset.id);
                }
            }

            if (typeof youtubePlayer === 'undefined') {
                launchYoutube();
            }
        }
    }
    // specify type of request, true - meaning asynchronous request (by default)
    request.open('POST', '/records', true);
    // set this header for Laravel to recognise AJAX request
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    // sned request
    request.send(data);
});


function getTracks() {
    var rows = document.getElementById('playlist').getElementsByTagName('tr');

    if (rows.length > 0) {
        // loop through rows, get video ids and push into array
        for (var i = 0; i < rows.length; i++) {
            if (typeof rows[i].dataset.id !== 'undefined') {
                playlist.push(rows[i].dataset.id);
            }
        }

        launchYoutube();
    }
}

function setTrack() {
    currentTrack = playlist[0];
    document.querySelector("[data-id='" + currentTrack + "']").className = 'active-track';
    document.querySelector("[data-id='" + currentTrack + "']").querySelector('.fa').className = 'fa fa-pause';
    youtubePlayer.loadVideoById(currentTrack, 0, 'default');
}

window.addEventListener('load', function() {
    getTracks();
} ,false);
