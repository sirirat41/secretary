$(document).ready(function() {
    var title = $('secretary').text();
    switch (title) {

        //Articles ครุภัณฑ์

        case "display_durable_articles_permits":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .permits').addClass('active');
            break;

        case "insert_durable_articles_purchase":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .purchase').addClass('active');
            break;

        case "display_durable_articles":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .display').addClass('active');
            break;

        case "insert_durable_articles":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .insert').addClass('active');
            break;

        case "display_durable_articles_damage":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .damage').addClass('active');
            break;

        case "insert_durable_articles_damage":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .insertdamage').addClass('active');
            break;

        case "display_durable_articles_donate":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .donate').addClass('active');
            break;

        case "insert_durable_articles_donate":
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .insertdonate').addClass('active');
            break;

         case "display_durable_articles_transfer_in":
             $('.nav-articles').addClass('active');
             $('.collapse-articles').addClass('show');
             $('.collapse-articles .transfer').addClass('active');
             break;

         case "insert_durable_articles_transfer_in":
             $('.nav-articles').addClass('active');
             $('.collapse-articles').addClass('show');
             $('.collapse-articles .transfer').addClass('active');
             break;


            // Material 

        case "insert_durable_material_donate":
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .insertdonates').addClass('active');
            break;

        case "display_durable_material_donate":
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .donates').addClass('active');
            break;

        case "insert_durable_material_damage":
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .insertdamage').addClass('active');
            break;

        case "display_durable_material_damage":
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .damage').addClass('active');
            break;

            //Supplies วัสดุสิ้นเปลือง

        case "display_suplies_distribute":
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .distribute').addClass('active');
            break;

        case "insert_suplies_distribute":
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .insertdistribute').addClass('active');
            break;

    }
})