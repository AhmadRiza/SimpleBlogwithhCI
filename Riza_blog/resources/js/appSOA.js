$(document).ready(function () {

    const BASE_PATH = 'resources/';

    var curPage;

    loadTemplate();
    detectURL();

    function detectURL() {
        var path = window.location.pathname.replace('/', '');
        if (path != null && path != '') {
            loadPage(path);
        } else {
            loadPage('home');
        }
    }

    function loadTemplate() {
        // load footer
        $(".side").load(BASE_PATH + "partials/sidebar.html");

    }

    // routes
    function loadPage(page, data) {
        $('.main').hide();
        
        

        switch (page) {
            //route index
            case 'home':
                setUrl(null,'Blog Ahmad Riza',page);
                $(".main").load(BASE_PATH + "pages/index.html",
                    function () {
                        index();
                        setLinksCB();
                        $('#loadTutor').click(function(){
                            loadPage('tutorials')
                            scrollUp();
                        });
                        $('#loadStories').click(function(){
                            loadPage('stories')
                            scrollUp();
                        });

                    });
                break;
            case 'stories':
                setUrl(null, 'Stories', page);
                $(".main").load(BASE_PATH + "pages/stories.html",
                    function () {
                        stories();
                        setLinksCB();

                    });
                break;
            case 'tutorials':
                setUrl(null, 'Turorials', page);
                $(".main").load(BASE_PATH + "pages/tutorials.html",
                    function () {
                        tutorials();
                        setLinksCB();

                    });
                break;
            case 'about':
                setUrl(null, 'About', page);
                $(".main").load(BASE_PATH + "pages/about.html",
                    function () {

                    });
                break;

            default:
                $(".main").empty();
            
            
        }

        // set nav active
        $('.nav-items li a').removeClass('active');
        $(".nav-items li a").each(function (index) {
            if ($(this).text().toLowerCase() == page) {
                $(this).addClass('active');
            }

        });

        $('.main').show(1000);


    }

    // BACK BROWSER HANDLE
    window.onpopstate = function (event) {
        detectURL();
    };
    // NAV HANDLER
    $('.nav-items li a').click(function () {
        $('.nav-items li a').removeClass('active');
        $(this).addClass('active');
        var page = $(this).text().toLowerCase();
        if(page!=curPage){
            loadPage(page);
        }
    });


    // LOGO CALLBACk
    $('.logo').click(function () {
        loadPage('home');
    })

    // SCROLL

    //Click event to scroll to top
    $('.up').click(function () {
        scrollUp();
        return false;
    });


    // TODO TEMPORARY
    // READ HANDLE
    function setLinksCB() {

        $('.title-img').click(function () {
            var img = $(this).siblings('img').attr('src');
            var title = $(this).children('.title').text();
            $('.main').load(BASE_PATH + 'pages/read.html', function () {
                $('h1').text(title);
                $('.pict-detail img').attr('src', img);
            });
            scrollUp();

        });
    }

    function scrollUp(){
        $('html, body').animate({ scrollTop: 0 }, 800);
    }

    // TODO
    // URL CHANGER
    function setUrl(data,title,url) {
        curPage = url;
        history.pushState(data, title, url);
        document.title = title;
    }


    //pageLoader
    // AJAX JSON
    ///////////////////////////
    function index() {

        // HEADLINE

        $.ajax({
            url: BASE_PATH + "data/home.json", success: function (result) {
                var headline = result.data.headline;        
                var img = '<img src="resources/img/' + headline.img + '.jpg">';
                $('.main-headline .title').text(headline.title);
                $('.main-headline .tag').text(headline.tag);
                $('.main-headline').prepend(img);

                showCard(result.data.stories, 0)
                showCard(result.data.tutorials, 3)
            
            }
        });


    }

    function stories() {
        $.ajax({
            url: BASE_PATH + "data/stories.json", success: function (result) {
                showCard(result,0);
            }
        });
    }

    
    function tutorials() {
        $.ajax({
            url: BASE_PATH + "data/tutorlist.json", success: function (result) {
                var android = result.data.android;
                showCard(android, 0);
                var web = result.data.web;
                showCard(web, 3);
                var cs = result.data.cs;
                showCard(cs, 6);
            }
        }).done(function () {
            $('.empty').remove();
        });
    }



    function read(data) {
    }



    function showCard(data, start) {
        $.each(data, function (i, field) {

            var img = '<img src="resources/img/' + field.img + '.jpg">';
            $('.card .title').eq(i + start).text(field.title);
            $('.card .tag').eq(i + start).text(field.date);
            $('.card').eq(i + start).prepend(img);
            $('.card').eq(i + start).removeClass('empty');
        });

    }


});

