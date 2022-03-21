<template>
<footer class="mt-5 pt-5 pb-5 footer bg-dark text-white footer-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xs-12 about-company text-left">
                <h2>Kantor</h2>
                <p class="pr-5 pb-1 text-white-50 text-left">Jl. KH. Wahid Hasyim Kel No.10D</p>
                <p class="pr-5 pb-1 text-white-50 text-left">Jakarta Pusat 10340</p>
                <p class="pr-5 pb-1 text-white-50 text-left">Indonesia</p>
            </div>
            <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3">Kontak</h4>
                <p class="pr-5 pb-1 text-white-50 text-left">team@indiugm.com</p>
                <p class="pr-5 pb-1 text-white-50 text-left">+62 813 2910 4928</p>
            </div>
            <div class="col-lg-4 col-xs-12 location">
                <h4 class="mt-lg-0 mt-sm-4">Social media</h4>
                <p><font-awesome-icon icon="fab fa-facebook-square" /> <font-awesome-icon icon="fab fa-instagram" /> <font-awesome-icon icon="fab fa-youtube" /> <font-awesome-icon icon="fab fa-linkedin" /></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col copyright">
                <p class=""><small class="text-white-50">© 2022 INDI UGM. All Rights Reserved.</small></p>
            </div>
        </div>
    </div>
</footer>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mou')
        }
    }
</script>

<style scoped>
    /* .footer-container{
        background-image: url("paper.gif");
        background-color: #cccccc;
    } */
</style>