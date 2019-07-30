$(document).ready(function() {
    var title = $('secretary').text();
    switch (title) {
        case "display_durable_articles_permits":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .permits').addClass('active');
            break;
        case "insert_durable_articles_purchase":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .purchase').addClass('active');
            break
        case "display_durable_articles":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .display').addClass('active');
            break
        case "display_durable_articles_damage":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .damage').addClass('active');
            break
        case "display_durable_articles_donate":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .donate').addClass('active');
            break
        case "insert_durable_articles":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .insert').addClass('active');
            break
    }
})