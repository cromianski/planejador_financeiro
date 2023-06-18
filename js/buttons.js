function returnToHome() {
    $('#side-menu').css({
        right: '-6rem',
    });
    $('#pages_background').css({
        right: '-100vw',
        zIndex: -1,
    });
    closePage(2);
}
function previous() {
    let previous = getActiveTab().prev();
    if (previous.hasClass('menu-item')) {
        let menuItem = previous.children().first();
        changePage(menuItem[0]);
    } else {
        returnToHome();
    }
}
function next() {
    let next = getActiveTab().next();
    if (next.hasClass('menu-item')) {
        let menuItem = next.children().first();
        changePage(menuItem[0]);
    } else {
        end();
    }  
}