$(document).ready(function () {
    var title = $('secretary').text();
    switch (title) {

        // //Articles ครุภัณฑ์ Insert 
        // case "insert_durable_articles_purchase":  //จัดซื้อ 
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .purchase').addClass('active');
        //     break;

        // case "insert_durable_articles": //ครุภัณฑ์
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .insert').addClass('active');
        //     break;

        // case "insert_durable_articles_damage":  //ชำรุด
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .insertdamage').addClass('active');
        //     break;

        // case "insert_durable_articles_donate":  // บริจาค
        //     $('.nav-articles').addClass('active');
        //     $('.collapse-articles').addClass('show');
        //     $('.collapse-articles .insertdonate').addClass('active');
        //     break;

        //  case "insert_durable_articles_transfer_in":  //โอนเข้า
        //      $('.nav-articles').addClass('active');
        //      $('.collapse-articles').addClass('show');
        //      $('.collapse-articles .transfer').addClass('active');
        //      break;

        // case "insert_durable_articles_permits":  // ยืมคืน 
        //      $('.nav-articles').addClass('active');
        //      $('.collapse-articles').addClass('show');
        //      $('.collapse-articles .insertpermits').addClass('active');
        //      break;



        // Articles ครุภัณฑ์ Display

        case "display_durable_articles_permits":  // ยืมคืน 
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .permits').addClass('active');
            break;

        case "display_durable_articles":   //ครุภัณฑ์
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .display').addClass('active');
            break;

        case "display_durable_articles_damage":   //ชำรุด
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .damage').addClass('active');
            break;

        case "display_durable_articles_donate":  // บริจาค
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .donateO').addClass('active');
            break;

        case "display_durable_articles_receive_donate":  // บริจาค
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .donate').addClass('active');
            break;

        case "display_durable_articles_transfer_in":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .transfer').addClass('active');
            break;

        case "display_durable_articles_transfer_out":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .transferO').addClass('active');
            break;

        case "display_durable_articles_purchase":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .purchase').addClass('active');
            break;

        case "display_durable_articles_repair":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .repair').addClass('active');
            break;

        case "display_durable_articles_sell":  //โอนเข้า
            $('.nav-articles').addClass('active');
            $('.collapse-articles').addClass('show');
            $('.collapse-articles .sell').addClass('active');
            break;




        //     // Material  วัสดุคงทน Insert

        // case "insert_durable_material_donate":    //บริจาค
        //     $('.nav-material').addClass('active');
        //     $('.collapse-material').addClass('show');
        //     $('.collapse-material .insertdonates').addClass('active');
        //     break;

        // case "insert_durable_material_damage":  //ชำรุด
        //     $('.nav-material').addClass('active');
        //     $('.collapse-material').addClass('show');
        //     $('.collapse-material .insertdamage').addClass('active');
        //     break;

        // case "insert_supplies'_distribute":  //แจกจ่าย
        //     $('.nav-supplies').addClass('active');
        //     $('.collapse-supplies').addClass('show');
        //     $('.collapse-supplies .insertdistribute').addClass('active');
        //     break;



        // Material  วัสดุคงทน Display

        case "display_durable_material":  //วัสดุ
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .display').addClass('active');
            break;

        case "display_durable_material_donate":  //บริจาค
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .donatesO').addClass('active');
            break;

        case "durable_material_receive_donate":  //บริจาค
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .donates').addClass('active');
            break;

        case "display_durable_material_damage":  //ชำรุด
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .damage').addClass('active');
            break;

        case "display_durable_material_sell":  //ขายทอดตลาด
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .sell').addClass('active');
            break;

        case "display_durable_material_purchase":  //จัดซื้อ
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .purchase').addClass('active');
            break;

        case "display_durable_material_repair":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .repair').addClass('active');
            break;

        case "display_durable_material_permits":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .permits').addClass('active');
            break;

        case "display_durable_material_transfer_in":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .transfer').addClass('active');
            break;

        case "display_durable_material_transfer_out":  //ซ่อม
            $('.nav-material').addClass('active');
            $('.collapse-material').addClass('show');
            $('.collapse-material .transferO').addClass('active');
            break;




        //Supplies วัสดุสิ้นเปลือง

        case "display_supplies'_distribute":    //แจกจ่าย
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .distribute').addClass('active');
            break;

        case "display_supplies":  //วัสดุสิ้นเปลือง
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .display').addClass('active');
            break;

        case "display_supplies_purchase":  //จัดซื้อ
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .purchase').addClass('active');
            break;

        case "display_supplies_permits":  //จัดซื้อ
            $('.nav-supplies').addClass('active');
            $('.collapse-supplies').addClass('show');
            $('.collapse-supplies .permits').addClass('active');
            break;

        // หน่วยงาน Display

        case "display_department":  //หน่วยงาน
            $('.nav-department').addClass('active');
            $('.collapse-department').addClass('show');
            $('.collapse-department .display').addClass('active');
            break;

        // หน่วยงาน Insert

        case "insert_department":  //หน่วยงาน
            $('.nav-department').addClass('active');
            $('.collapse-department').addClass('show');
            $('.collapse-department .insert').addClass('active');
            break;

        // ตั้งค่า insert

        case "insert_seller":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .insertse').addClass('active');
            break;

        case "insert_unit":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .insertun').addClass('active');
            break;

        case "insert_durable_articles_type":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .inserta').addClass('active');
            break;

        case "insert_durable_material_type":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .insertm').addClass('active');
            break;

        // ตั้งค่า display

        case "display_seller":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .displayse').addClass('active');
            break;

        case "display_unit":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .displayun').addClass('active');
            break;

        case "display_durable_articles_type":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .displaya').addClass('active');
            break;

        case "display_durable_material_type":
            $('.nav-setting').addClass('active');
            $('.collapse-setting').addClass('show');
            $('.collapse-setting .displaym').addClass('active');
            break;


    }
})