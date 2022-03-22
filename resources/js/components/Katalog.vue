<template>
    <div class="flex-column">
        <HeaderComponent></HeaderComponent>
        <div class="row justify-content-center div-content-home">
            <div class="segment segment-1 flex-row row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="h1-text text-uppercase">Katalog</h1>
                    <h1 class="h1-indi text-uppercase">INDI</h1>
                    <h3>Mari jalani circular fashion dan re-produksi batikmu</h3>
                    <h3>dengan pewarna alami INDI</h3>
                    <button class="btn-get-start">Lihat selengkapnya</button>
                </div>
                <div class="col-lg-4">
                    Ini Foto
                </div>
            </div>
            <div class="segment segment-2 row justify-content-center">
                <div class="col-lg-11">
                    <div>
                        <h1>Produk kami</h1>
                        <div>
                            <card>
                                Ini img
                                <h3>Lebih hemat</h3>
                                <p>
                                    Layanan reparasi INDI lebih terjangkau
                                    dibandingkan dengan membeli pakaian baru
                                </p>
                            </card>
                            <card>
                                Ini img
                                <h3>Lebih nyaman</h3>
                                <p>
                                    Pewarna yang kami gunakan adalah bahan alami,
                                    karenanya Anda tidak perlu khawatir dengan kemungkinan alergi
                                </p>
                            </card>
                            <card>
                                Ini img
                                <h3>Lebih Artistik</h3>
                                <p>
                                    Layanan kami tidak hanya memperbaiki
                                    pakaian, namun dikhususkan untuk mempercantik
                                    pakaian Anda
                                </p>
                            </card>
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
        padding: 0 15%;
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

    .btn-bottom-order{

    }
</style>
