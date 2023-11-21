const closeOnResize = () => {
    $(window).resize(() => {
        $('.header--mobile').removeClass('nav-open');
    });
}

const mobileNav = () => {
    const $menuBtn = $('.nav-btn');

    $menuBtn.click(() => {
        $(this).toggleClass('nav-open');
        $('.header--mobile').toggleClass('nav-open');
    });

    closeOnResize();
}

$(function() {
    mobileNav();
});