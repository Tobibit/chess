document.getElementById('transitionButton').addEventListener('click', function() {
    document.getElementById('body').classList.add('fade-out');

    setTimeout(function() {
        window.location.href = 'mode.html';
    }, 500);
});

document.addEventListener('DOMContentLoaded', function() {
    if(document.getElementById('body').classList.contains('fade-out')) {
        setTimeout(function() {
            document.getElementById('body').classList.add('fade-in');
        }, 0);
    }
});