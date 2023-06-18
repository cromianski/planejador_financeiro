
function changeSlides(way){
    let current = document.querySelector('.active_slider');
    let next = current.nextElementSibling;
    let previous = current.previousElementSibling;

    if (way === 'next' && next && next.classList.contains('slider')) {
        current.style.left = '100%';
        next.style.left = '0';
        current.classList.remove('active_slider');
        next.classList.add('active_slider');
        return;
    }

    if (way === 'previous' && previous && previous.classList.contains('slider')) {
        current.style.left = '100%';
        previous.style.left = '0';
        current.classList.remove('active_slider');
        previous.classList.add('active_slider');
        return;
    } 
};
