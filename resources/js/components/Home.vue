<template>
    <div class="flex-column">
        <Header></Header>
        <div class="row justify-content-center div-content-home">
            <div class="segment segment-1 flex-row row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="h1-text">Reproduksi Batikmu</h1>
                    <h1 class="h1-text">Dengan pewarna alami</h1>
                    <h1 class="h1-indi">INDI</h1>
                    <h3>Mari jalani circular fashion dan re-produksi batikmu</h3>
                    <h3>dengan pewarna alami INDI</h3>
                    <button class="btn-get-start">Pesan sekarang</button>
                </div>
                <div class="col-lg-4">
                    Ini Foto
                </div>
            </div>
            <div class="segment segment-2 row justify-content-center">
                <div class="col-lg-8">
                    Ini Foto
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
        <!-- <Footer></Footer> -->
    </div>
</template>

<script>
    import Header from './elements/Header.vue'
    export default {
        components: { Header },
        mounted() {
            console.log('Component mounted.')
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
