<template>
<div class="footer-bg-container">
    <footer class="pt-5 pb-5 footer bg-dark text-white div-footer">
        <div class="container">
            <div class="row">
                <img class="img-footer-icon" src="images/icon-indi-pair-white.svg" alt="icon-indi">
            </div>
            <div class="row mt-5">
                <div class="col-lg-5 col-xs-12 about-company text-left">
                    <h2>Kantor</h2>
                    <p class="pr-5 pb-1 text-white-60 text-left">Jl. KH. Wahid Hasyim Kel No.10D <br/> Jakarta Pusat 10340 <br/> Indonesia</p>
                </div>
                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3">Kontak</h4>
                    <p class="pr-5 pb-1 text-white-60 text-left">team@indiugm.com <br/> +62 813 2910 4928</p>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <h4 class="mt-lg-0 mt-sm-4">Social media</h4>
                    <div class="div-icon"><font-awesome-icon class="icon-footer" icon="fab fa-facebook-square" /> <font-awesome-icon class="icon-footer" icon="fab fa-instagram" /> <font-awesome-icon class="icon-footer" icon="fab fa-youtube" /> <font-awesome-icon class="icon-footer" icon="fab fa-linkedin" /></div>
                </div>
            </div>
            <div class="row mt-2 div-copyright">
                <div class="col copyright">
                    <span class=""><small class="text-white-50">© 2022 INDI UGM. All Rights Reserved.</small></span>
                </div>
            </div>
        </div>
    </footer>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mou')
        }
    }
</script>

<style scoped>
    .footer-bg-container{
        position: relative;
        background-image: url("../../../assets/footer-background.jpg");
        background-color: #000;
        background-repeat: no-repeat;
        background-position: 50% 0;
        background-size: cover;
    }

    .div-footer{
        opacity: 0.96;
    }

    .img-footer-icon{
        width: auto;
        height: auto;
    }

    .div-icon{
        display: flex;
        align-items: center;
    }

    .icon-footer{
        width: 28px;
        height: auto;
        margin-right: 10px;
    }
</style>