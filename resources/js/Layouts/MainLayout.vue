<template>
    <div class="socBlock">
        <a href="" class="fb"></a>
        <a href="" class="dc"></a>
    </div>
    <div class="toTop buttonTop">
        TOP
    </div>
    <div class="topPanel flex-c">
        <div class="topButton menuButton" data-class="nav">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <a href="/" class="topPanel-logo"><img src="/assets/images/logo-white.png" alt="Logo"></a>
        <nav class="nav flex-c">
            <div class="topPanel-menu flex-c">
                <ul class="menu flex">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Create account</a></li>
                    <li>
                        <a data-class="m_3" class="menu-a">Game</a>
                        <ul class="dropDown-menu m_3">
                            <li><a href="">Statistic</a></li>
                            <li><a href="">Guides</a></li>
                            <li><a href="">Support</a></li>
                            <li><a href="">Characters & Races</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-class="m_4" class="menu-a">Community</a>
                        <ul class="dropDown-menu m_4">
                            <li><a href="">Statistic</a></li>
                            <li><a href="">Guides</a></li>
                            <li><a href="">Support</a></li>
                            <li><a href="">Characters & Races</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="topPanel-button flex-c">
                <a href="#modal-login" class="loginButton bright open_modal">Log In</a>
                <a href="" class="downloadButton bright">Download</a>
            </div>
        </nav>
        <div class="topSocBlock socBlock">
            <a href="" class="fb"></a>
            <a href="" class="dc"></a>
        </div>
    </div><!--topPanel-->

    <div class="wrapper">
        <header class="header">
            <div class="logo"><a href="/"><img src="/assets/images/logo-dark.png" alt="Logo"></a></div>
            <div class="serverBlock flex">
                <div class="server server_1">
                    <p>X50 Nightmare</p>
                    <span>Upcoming 22.10</span>
                </div>
                <div class="server server_2">
                    <p>X300 Paradise</p>
                    <span>9864</span>
                </div>
                <div class="server server_3">
                    <p>X1000 Warland</p>
                    <span>7853</span>
                </div>
            </div>
            <div class="stars">
                <span class="star_1"></span>
                <span class="star_2"></span>
                <span class="star_3"></span>
                <span class="star_4"></span>
                <span class="star_5"></span>
                <span class="star_6"></span>
                <span class="star_7"></span>
                <span class="star_8"></span>
            </div>
        </header><!-- .header-->
        <main class="content">
            <slot />
        </main><!-- .content -->
    </div><!-- .wrapper -->


    <footer class="footer">
        <div class="footerTopBlock">
            <div class="container">
                <div class="footerLogo">
                    <a href="/"><img src="/assets/images/logo-white.png" alt="Logo"></a>
                </div>
                <ul class="flex-c-c">
                    <li><a href="">Terms of service</a></li>
                    <li><a href="">Privacy policy</a></li>
                </ul>
            </div>
        </div><!--footerTopBlock-->
        <div class="footerBottomBlock">
            <p><span>© 2019</span> Giran: Lineage 2</p>
            <p>This server is a test option of the game lineage 2 and is intended only for the acquaintance of players.</p>
            <p>All rights owned by NCSOFT</p>
        </div><!--footerBottomBlock-->
    </footer><!-- .footer -->

    <div id="modal-login" class="modal_div t-center">
        <div class="modal_close">
            <span></span>
            <span></span>
        </div><!--modal_close-->
        <h1>Login</h1>
        <a href="#"><img src="/assets/images/facebook-button.png" alt=""></a>
        <div class="or">Or</div>
        <form class="form-width">
            <p><input type="text" placeholder="Login"></p>
            <p><input type="password" placeholder="Password"></p>
            <p><button>ok</button></p>
        </form>
        <div class="formlinks">
            <p><a href="">Forgot your password ?</a></p>
            <p>Dont`t have an account ? <a href="" class="reg">Register</a></p>
        </div>
    </div>
    <div id="overlay"></div>


</template>

<script setup>
import {onMounted} from "vue";
import $ from 'jquery';

onMounted(() => {
    var res = $(".dropDown-menu");
    $('[data-class^="m"]').on("click", funk);

    $(document).click(function(e) {
        if ($(e.target).closest(res).length || $(e.target).closest('.menu-a').length) return;
        res.fadeOut(100);
    });

    function funk(){
        var link = $(this).attr('data-class'),
            el = $('.dropDown-menu.'+link);
        if(el.css("display") == "none"){
            res.hide();
            el.slideToggle(400);
        }
        else{
            el.slideToggle(400);
        }
    }

    $(".menuButton").click(function(){
        $('.'+$(this).attr('data-class')).toggleClass("active");
        $(this).toggleClass("active");
    });


    $('.tab-button').click(function(){
        $('.tab-button').removeClass('active');
        $(this).addClass('active');
        $('.tab-block').removeClass('active');
        $('#'+$(this).attr('data-tab')).addClass('active');
    })

    $('.buttonTop').click(function(){
        $('body, html').animate({scrollTop:0},800);
    });
    $(document).ready(function() {
        var overlay = $('#overlay');
        var open_modal = $('.open_modal');
        var close = $('.modal_close, #overlay');
        var modal = $('.modal_div');
        open_modal.click( function(event){
            event.preventDefault();
            var div = $(this).attr('href');
            overlay.fadeIn(400,
                function(){
                    $(div)
                        .css('display', 'block')
                        .animate({opacity: 1, top: '20%'}, 200);
                });
        });

        close.click( function(){
            modal
                .animate({opacity: 0, top: '15%'}, 200,
                    function(){
                        $(this).css('display', 'none');
                        overlay.fadeOut(400);
                    }
                );
        });
    });

    var swiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 4000,
        },
        speed: 1000,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
</script>

<style scoped>

</style>
