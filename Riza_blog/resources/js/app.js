$(document).ready(function () {

    const BASE_PATH = "http://localhost:8080/";
    var cur_page = 0;

    detectURL();

    // NAV HANDLER
    $('.nav-items li a').click(function () {
        $('.nav-items li a').removeClass('active');
        $(this).addClass('active');
    });


    // SCROLL

    //Click event to scroll to top
    $('.up').click(function () {
        scrollUp();
        return false;
    });

    function scrollUp() {
        $('html, body').animate({ scrollTop: 0 }, 800);
    }


    function detectURL() {
        var path = window.location.pathname;
        var paths = path.split('/')[1];

        if(paths==''){
            return false;
        }
        // set nav active
        $('.nav-items li a').removeClass('active');
        $(".nav-items li a").each(function (index) {
            if ($(this).text().toLowerCase() == paths) {
                $(this).addClass('active');
            }
        });
    }


    $('#loadmore').click(function(){

        var murl = window.location.pathname;

        var offset = $('.card').length; 

        console.log(offset);

        $.ajax({
            url: murl + '/loadmore',
            data: {
                "page": offset
            },
            cache: false,
            type: "GET",
            success: function (response) {
                showCard(response);
            },
            error: function (xhr) {

            }
        });

    });

    function showCard(data, start) {

        var murl = window.location.pathname+"/";

        $.each(data, function (i, field) {

            var date = field.date;
            var frmtdate = date.substr(8, 2) + '-' + date.substr(5, 2) + '-' + date.substr(0, 4);

            var elm = "<div class=\"col-md-4 col-sm-6\">"+
                            "<div class=\"card\">"+
                                "<img src=\""+BASE_PATH+'resources/img/'+field.img +"\" alt=\""+ field.title +"\">"+
                                    "<a href=\""+murl+field.slug+"\" class=\"title-img flex vertical\">"+
                                        "<p class=\"tag\">"+frmtdate+"</p>"+
                                        "<div class=\"title\">"+ field.title +"</div>"+
                                    " </a></div></div>";
            $('.gallery').append(elm);
                                         
        });

    }

});