const mobileNav = () => {
    const $menuBtn = $('.nav-btn');

    $menuBtn.click(() => {
        $(this).toggleClass('nav-open');
        $('.header--mobile').toggleClass('nav-open');
    })

    $(window).resize(() => {
        $('.header--mobile').removeClass('nav-open');
    });
}

$(function() {
    mobileNav();
});