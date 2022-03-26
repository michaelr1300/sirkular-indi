<template>
    <div class="flex-column">
        <HeaderComponent></HeaderComponent>
        <div class="row justify-content-center div-content-home">
            <div class="segment segment-1 flex-row row justify-content-center">
                <!-- <div class="col-lg-7 batik-cover-background px-0"> -->
                    <div class="col-lg-7 wrap-left-home-1">
                        <h1 class="h1-text text-uppercase">Katalog</h1>
                        <h1 class="h1-indi text-uppercase">INDI</h1>
                        <button class="btn-get-start">Lihat selengkapnya <font-awesome-icon class="icon-arrow-down" icon="fa-solid fa-arrow-down"/></button>
                    </div>
                <!-- </div> -->
                <div class="col-lg-5 wrap-right-home-1">
                    <div class="img-wrapper-1">
                        <img class="img-front-catalog" src="images/img-front-catalog.png" alt="img catalog">
                    </div>
                </div>
            </div>
            <div class="segment-2 row justify-content-center">
                <div class="col-lg-12">
                    <div class="div-section-3">
                        <h1>Keunggulan INDI</h1>
                        <div class="wrapper-points">
                            <div class="div-point-indi">
                                <img class="img-product-1" src="images/img-product-1.png" alt=""/>
                                <h3>Lebih hemat</h3>
                                <p>
                                    Layanan reparasi INDI lebih terjangkau
                                    dibandingkan dengan membeli pakaian baru
                                </p>
                            </div>
                            <div class="div-point-indi">
                                <img class="img-product-2" src="images/img-product-2.png" alt=""/>
                                <h3>Lebih nyaman</h3>
                                <p>
                                    Pewarna yang kami gunakan adalah bahan alami,
                                    karenanya Anda tidak perlu khawatir dengan kemungkinan alergi
                                </p>
                            </div>
                            <div class="div-point-indi">
                                <img class="img-product-3" src="images/img-product-3.png" alt=""/>
                                <h3>Lebih Artistik</h3>
                                <p>
                                    Layanan kami tidak hanya memperbaiki
                                    pakaian, namun dikhususkan untuk mempercantik
                                    pakaian Anda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="segment segment-3 row justify-content-center">
                <div class="col-lg-10">
                    <h2>Tertarik untuk menggunakan jasa kami?</h2>
                </div>
                <div class="col-lg-2">
                    <button class="btn-get-start">Pesan sekarang</button>
                </div>
            </div>
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>

<script>
    import HeaderComponent from './elements/HeaderComponent.vue'
    import FooterComponent from './elements/FooterComponent.vue'
    export default {
        components: { HeaderComponent, FooterComponent },
        mounted() {
            console.log('Component mounted')
        }
    }
</script>

<style scoped>
    .div-content-home{
        /* padding: 0 15%; */
        flex-direction: column;
    }

    .segment{
        min-height: 100vh;
    }

    .segment-1{
        flex-direction: row;
    }

    .h1-indi{
        font-size: 120px;
    }
    
    .btn-get-start{
        background: #000;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 700;
        color: #fff;
    }

    .btn-read-cont{
        background: #fff;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 600;
    }

    .segment-3{
        background-color: #F3F9FE;
        font-family: 'Mulish', sans-serif;
        padding: 50px 100px;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
    }

    .segment-3 h2 {
        font-weight: 800;
    }

    .btn-bottom-order{

    }
</style>
