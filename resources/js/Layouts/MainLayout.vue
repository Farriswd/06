<template>
    <div class="socBlock">
        <a :href="webSiteSettings.facebook_link" class="fb"></a>
        <a :href="webSiteSettings.discord_link" class="dc"></a>
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
        <a href="/" class="topPanel-logo"><img :src="webSiteSettings.header_logo" :alt="webSiteSettings.title"></a>
        <nav class="nav flex-c">
            <div class="topPanel-menu flex-c">
                <ul class="menu flex">
                    <li><Link :href="route('index')">Home</Link></li>
                    <li v-if="!authUser"><Link :href="route('register')">Create account</Link></li>
<!--                    <li>-->
<!--                        <a data-class="m_3" class="menu-a">Game</a>-->
<!--                        <ul class="dropDown-menu m_3">-->
<!--                            <li><a href="">Statistic</a></li>-->
<!--                            <li><a href="">Guides</a></li>-->
<!--                            <li><a href="">Support</a></li>-->
<!--                            <li><a href="">Characters & Races</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <li>
                        <a data-class="m_4" class="menu-a">Info</a>
                        <ul class="dropDown-menu m_4">
                            <li><Link :href="route('blog.index')">News</Link></li>
                            <li><a href="">Guides</a></li>
                            <li><a href="">Support</a></li>
                            <li><a href="">Characters & Races</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-class="m_5" class="menu-a">Top 100</a>
                        <ul class="dropDown-menu m_5" v-if="servers.length > 0">
                            <li v-for="server in servers" :key="server.id"><Link :href="route('top.server.index', server.id)">{{ server.title }}</Link></li>
                        </ul>
                        <ul class="dropDown-menu m_5" v-else>
                            <li>No Servers</li>
                        </ul>
                    </li>
                    <li v-if="authUser"><Link :href="route('shop.index')">Shop</Link></li>
                </ul>
            </div>
            <div class="topPanel-button flex-c">
                <a v-if="!authUser" href="#modal-login" class="loginButton bright open_modal">Log In</a>
                <template v-if="authUser">
                    <a href="#modal-user" class="loginButton bright open_modal">{{ authUser.name }}</a>
                    <span class="balance">Balance: {{ authUser.balance }} <span>SA</span></span>
                    <Link v-if="totalCartItems > 0" class="cart" :href="route('shop.cart.index')"><i class="fa-solid fa-bag-shopping"></i><span>{{ totalCartItems }}</span></Link>
                    <a v-if="totalCartItems < 1" class="cart" href="#" @click.prevent="cartEmpty"><i class="fa-solid fa-bag-shopping"></i></a>
                </template>
                <a href="" class="downloadButton bright">Download</a>
            </div>
        </nav>
        <div class="topSocBlock socBlock">
            <a :href="webSiteSettings.facebook_link" class="fb"></a>
            <a :href="webSiteSettings.discord_link" class="dc"></a>
        </div>
    </div><!--topPanel-->

    <div class="wrapper">
        <header class="header" v-if="!(route().current('shop.cart.index') || route().current('blog.show') || route().current('payment.index'))">
            <div class="logo"><a href="/"><img :src="webSiteSettings.main_logo" :alt="webSiteSettings.title"></a></div>
            <div class="serverBlock flex">
                <template v-if="servers.length > 0">
                    <div v-for="server in servers" :key="server.id" class="server" :style="`background: url(${server.image}) top no-repeat`">
                        <p>{{ server.title }}</p>
                        <span v-html="serverStatus[server.id]"></span>
                    </div>
                </template>
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
                    <a href="/"><img :src="webSiteSettings.footer_logo" :alt="webSiteSettings.title"></a>
                </div>
                <ul class="flex-c-c">
                    <li><a href="">Terms of service</a></li>
                    <li><a href="">Privacy policy</a></li>
                </ul>
            </div>
        </div><!--footerTopBlock-->
        <div class="footerBottomBlock" v-html="webSiteSettings.copyright_text">

        </div><!--footerBottomBlock-->
    </footer><!-- .footer -->

    <div v-if="!authUser" id="modal-login" class="modal_div t-center">
        <div class="modal_close">
            <span></span>
            <span></span>
        </div><!--modal_close-->
        <h1>Login</h1>
        <form class="form-width" @submit.prevent="authSubmit">
            <p>
                <input
                    id="login"
                    type="text"
                    placeholder="Login"
                    required
                    v-model="authForm.name"
                    autocomplete="username"
                >
                <InputError class="mt-2" :message="authForm.errors.name" />
            </p>
            <p>
                <input
                    id="password"
                    type="password"
                    placeholder="Password"
                    required
                    v-model="authForm.password"
                    autocomplete="current-password"
                >
                <InputError class="mt-2" :message="authForm.errors.password" />
            </p>

            <div class="formGroup">
                <button type="submit" :disabled="authForm.processing">
                    <div v-if="authForm.processing" class="loader loader-sm">
                        <div class="inner one"></div>
                        <div class="inner two"></div>
                        <div class="inner three"></div>
                    </div>
                    Log in
                </button>
            </div>

        </form>
        <div class="formlinks">
            <p><Link :href="route('password.request')">Forgot your password ?</Link></p>
            <p>Dont`t have an account ? <Link :href="route('register')" class="reg">Register</Link></p>
        </div>
    </div>
    <div v-if="authUser" id="modal-user" class="modal_div t-center">
        <div class="modal_close">
            <span></span>
            <span></span>
        </div><!--modal_close-->
        <h1>Hello, {{ authUser.name }}</h1>
        <div class="modal-body">
            <ul>
                <li class="link-item"><Link :href="route('profile.index')">Profile</Link></li>
                <li class="link-item"><Link :href="route('profile.orders')">My Orders</Link></li>
                <li class="link-item"><Link :href="route('payment.index')">Get SA points</Link></li>
                <li class="link-item"><Link :href="route('logout')" method="post" as="button">Logout</Link></li>
            </ul>
        </div>
    </div>
    <div id="overlay"></div>
</template>

<script setup>
import {computed, onMounted, ref, watch, watchEffect} from "vue";
import $ from 'jquery';
import {router, usePage, Link, useForm} from '@inertiajs/vue3';
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const page = usePage();
const totalCartItems = computed(()=>page.props.cart.data.count);
const authUser = usePage().props.auth.user;
const webSiteSettings = usePage().props.settings.data;
const servers = usePage().props.servers;
const serverStatus = ref({});

const authForm = useForm({
    name: '',
    password: '',
    remember: false,
});

const authSubmit = () => {
    authForm.post(route('login'), {
        onFinish: () => {
            authForm.reset('password')
        },
    });
};

const cartEmpty = () => {
    Toastify({
        text: `Your cart is empty!`,
        gravity: 'top',
        position: 'center',
    }).showToast();
}

/* Check Server Availability */
const checkAllServersStatus = async () => {
    await Promise.all(servers.map(server => checkServerStatus(server.id)));
}
const checkServerStatus = async (id) => {
    try {
        serverStatus.value = {
            ...serverStatus.value,
            [id]:
                '<div class="loader">\n' +
                '  <div class="inner one"></div>\n' +
                '  <div class="inner two"></div>\n' +
                '  <div class="inner three"></div>\n' +
                '</div>' };
        const response = await axios.get(route('check.server.status', id));
        serverStatus.value = {
            ...serverStatus.value,
            [id]: response.data === 'Online' ?
                '<span class="online">On</span>'
                :
                '<span class="offline">Off</span>' };
    } catch (error) {
        console.error(`Error checking status for server ${id}`, error);
        serverStatus.value = { ...serverStatus.value, [id]: '<span class="offline">Off</span>' };
    }
}

onMounted(() => {
    watchEffect(() => {
       if (page.props.flash.success) {
            Toastify({
                text: `${page.props.flash.success}`,
                gravity: 'top',
                position: 'center',
                style: {
                    background: "linear-gradient(310deg,#17ad37,#84dc14)",
                }
            }).showToast();
       }
       if (page.props.flash.error) {
           Toastify({
               text: `${page.props.flash.error}`,
               gravity: 'top',
               position: 'center',
               style: {
                   background: "linear-gradient(310deg,#ea0606,#ff3d59)",
               }
           }).showToast();
       }
        if (page.props.flash.info) {
            Toastify({
                text: `${page.props.flash.info}`,
                gravity: 'top',
                position: 'center',
            }).showToast();
        }
    });
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

    checkAllServersStatus();
});
</script>

<style scoped>

</style>
