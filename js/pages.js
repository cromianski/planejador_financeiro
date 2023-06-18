function openPage(id) {
    let page = $(`#page_${id}`);
    page.css({
        right: '0px',
        zIndex: 3,
    });
}
function closePage(id) {
    let page = $(`#page_${id}`);
    page.css({
        right: '-100vw',
        zIndex: 2,
    });
}
function changePage(menuItem){
    try {
        let activeTab = getActiveTab();
        activeTab.children().addClass('done');
        validateMenu(menuItem);
        activeTab.removeClass('active');
        closePage(activeTab.attr('page'));

        let id = getPageId(menuItem);
        let newMenuItem = $(`.menu-item[page=${id}]`);
        newMenuItem.addClass('active');
        openPage(id);
    } catch(e) {
        let activeTab = getActiveTab();
        activeTab.children().removeClass('done');
        alert(e.message);
    }
}
function getPageId(menuItem){
    return $(menuItem).parent().attr('page');
}
