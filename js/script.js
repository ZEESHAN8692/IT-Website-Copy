function showContent(page) {
    var contentDiv = document.querySelector('.content');

    // Close the left sidebar in mobile view
    var leftSidebar = document.querySelector('.left-sidebar');
    leftSidebar.classList.remove('show');
}

function toggleLeftSidebar() {
    var leftSidebar = document.querySelector('.left-sidebar');
    leftSidebar.classList.toggle('show');
}

//pop up
// Function to show the pop-up after 10 seconds
document.addEventListener('DOMContentLoaded', function() {
setTimeout(function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}, 20000);

document.getElementById('close').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
});
});

//header
var searchList = document.getElementById('searchList');
document.getElementById('searchInput').addEventListener('click', function() {
    searchList.style.display = 'block';
});

// Close the search list when clicking outside of it
document.addEventListener('click', function(event) {
    if (!event.target.closest('.search-container')) {
        searchList.style.display = 'none';
    }
});

//form code

