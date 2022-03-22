<template>
    <div class="flex-column">
        <HeaderComponent></HeaderComponent>
        <div class="row justify-content-center div-content-home">
            <div class="segment segment-1 flex-row row justify-content-center">
                <!-- <div class="col-lg-7 batik-cover-background px-0"> -->
                    <div class="col-lg-7 wrap-left-home-1">
                        <h1 class="h1-text text-uppercase">Re-produksi Batikmu</h1>
                        <h1 class="h1-text text-uppercase">Dengan pewarna alami</h1>
                        <h1 class="h1-indi text-uppercase">INDI</h1>
                        <h3 class="h3-sub-text">Mari jalani circular fashion dan re-produksi batikmu</h3>
                        <h3 class="h3-sub-text">dengan pewarna alami INDI</h3>
                        <button class="btn-get-start">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                    </div>
                <!-- </div> -->
                <div class="col-lg-5 wrap-right-home-1">
                    <div class="img-wrapper-1">
                        <img class="img-person-home" src="images/img-person-home.png" alt="img person">
                        <div class="">
                            <!-- <img src="" alt="icon-recycle"/> -->
                            <p class="p-text-home-1">Mari lestarikan warisan leluhur kita <br/> dengan pewarna alami terbaik dari INDI.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="segment segment-2 row justify-content-center">
                <div class="col-lg-8">
                    <!-- <img class="img-footer-icon" src="images/icon-indi-pair-white.png" alt="icon-indi"> -->
                </div>
                <div class="col-lg-4">
                    <h1 class="h1-text">Tentang Kami</h1>
                    <p>
                        Indi merupakan sebuah konsep circular fashion
                        yang berfokus pada perbaikan nilai-nilai pakaian batik.
                        Kami bekerja sama dengan GamaIndigo, dimana kami menggunakan 
                        pewarna alami untuk tekstil dan bahan serat lainnya dari tanaman 
                        <i>Indigofera tinctoria</i>
                    </p>
                    <button class="btn-read-cont">Baca lebih lanjut</button>
                </div>
            </div>
            <div class="segment segment-3 row justify-content-center">
                <div class="col-lg-12">
                    <div>
                        <h1>Keunggulan INDI</h1>
                        <div>
                            <div>
                                Ini img
                                <h3>Lebih hemat</h3>
                                <p>
                                    Layanan reparasi INDI lebih terjangkau
                                    dibandingkan dengan membeli pakaian baru
                                </p>
                            </div>
                            <div>
                                Ini img
                                <h3>Lebih nyaman</h3>
                                <p>
                                    Pewarna yang kami gunakan adalah bahan alami,
                                    karenanya Anda tidak perlu khawatir dengan kemungkinan alergi
                                </p>
                            </div>
                            <div>
                                Ini img
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
            <div class="segment segment-4 row justify-content-center">
                <div class="col-lg-12">
                    <div>
                        <div>
                            <h1>Testimoni dari pelanggan kami</h1>
                            <a>Lihat semua</a>
                        </div>
                        <div class="wrapper-card flex-row justify-content-center">
                            <div class="card-review card">
                                Ini img
                                <h3>Lebih hemat</h3>
                                <p>
                                    Layanan reparasi INDI lebih terjangkau
                                    dibandingkan dengan membeli pakaian baru
                                </p>
                            </div>
                            <div class="card-review card">
                                Ini img
                                <h3>Lebih hemat</h3>
                                <p>
                                    Layanan reparasi INDI lebih terjangkau
                                    dibandingkan dengan membeli pakaian baru
                                </p>
                            </div>
                            <div class="card-review card">
                                Ini img
                                <h3>Lebih hemat</h3>
                                <p>
                                    Layanan reparasi INDI lebih terjangkau
                                    dibandingkan dengan membeli pakaian baru
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="segment segment-5 row justify-content-center">
                <div class="col-lg-10">
                    <h2>Daftar sekarang untuk investasi pakaian yang berkelanjutan</h2>
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
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .div-content-home{
        flex-direction: column;
    }

    .segment{
        min-height: 100vh;
    }
    
    .segment-1{
        flex-direction: row;
    }
    
    /* .batik-cover-background{
        background-image: url("../../assets/background-home.png");
    } */

    .wrap-left-home-1{
        font-family: 'Mulish', sans-serif;
        padding: 0 3% 0 9%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #142362;
        background-image: url("../../assets/background-home.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-right-home-1{
        background: #001b34;
    }

    .img-wrapper-1{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    
    .img-person-home{
        border-radius: 0 0 200px 200px;
        width: 500px;
    }

    .p-text-home-1{
        color: #fff;
        font-size: 18px;
        /* margin-top: 30px; */
    }

    .h1-text {
        font-size: 48px;
        font-weight: 900;
    }

    .h1-indi{
        font-size: 200px;
        font-weight: 900;
        line-height: 175px;
    }

    .h3-sub-text{
        color: #00042D;
    }
    
    .btn-get-start{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
        border: 3px solid #000;
        width: 210px;
        height: 70px;
        margin-top: 40px;
        font-weight: 700;
        color: #fff;
    }

    .icon-arrow-right{
        margin-left: 25px;
        width: 25px;
        height: 25px;
    }

    .btn-read-cont{
        background: #fff;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 600;
    }

    .btn-bottom-order{

    }
</style>
