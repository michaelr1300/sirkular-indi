<template>
    <div class="flex-column">
        <div class="row justify-content-center div-content-about">
            <div class="segment segment-1 flex-row justify-content-center">
                <!-- <div class="col-lg-7 batik-cover-background px-0"> -->
                    <div class="col-lg-7 wrap-left-about-1">
                        <h1 class="h1-text text-uppercase">Tentang</h1>
                        <h1 class="h1-indi text-uppercase">INDI</h1>
                        <button class="btn-get-start">Lihat selengkapnya <font-awesome-icon class="icon-arrow-down" icon="fa-solid fa-arrow-down"/></button>
                    </div>
                <!-- </div> -->
                <div class="col-lg-5 wrap-right-about-1">
                    <div class="img-wrapper-1">
                        <img class="img-front-about" src="images/image-front-about.png" alt="image front about">
                    </div>
                </div>
            </div>
            <!-- <div class="segment segment-2 row justify-content-center">
                <div class="col-lg-12">
                    <div class="div-section-3">
                        <img src="images/img-about-2.png" alt="image about 2">
                    </div>
                </div>
            </div> -->
            <div class="segment-3">
                <div class="left-segment-3">
                    <p>
                        INDI merupakan sebuah konsep <i>circular fashion</i> yang berfokus 
                        pada perbaikan nilai-nilai pada pakaian batik. Bekerja sama dengan
                        Gamaindigo, kami menggunakan pewarna alami untuk tekstil dan bahan
                        serat lainnya dari tumbuhan <i>Indigofera tinctoria</i>.
                        <br/>
                        Bahan pewarna ini memiliki keunggulan berupa ramah lingkungan
                        (karena tidak bersifat karsinogen), tersedia dalam jumlah besar,
                        berstandar dan berkualitas tinggi namun tetap murah dan praktis
                        ketika digunakan.
                    </p>
                </div>
                <div class="">
                    <img src="images/img-about-par.png" alt="image about paragraph">
                </div>
            </div>
            <div class="segment-4 row justify-content-center">
                <div class="col-lg-10 left-segment-4">
                    <h2>Tertarik untuk menggunakan jasa kami?</h2>
                </div>
                <div class="col-lg-2">
                    <button class="btn-get-start">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                </div>
            </div>
        </div>
        <FooterComponent></FooterComponent>
    </div>
</template>

<script>
    import FooterComponent from './elements/FooterComponent.vue'
    export default {
        components: { FooterComponent },
        mounted() {
            console.log('Component mounted')
        }
    }
</script>

<style scoped>
@media screen and (min-width: 780px) {
    .div-content-about{
        /* padding: 0 15%; */
        flex-direction: column;
    }

    .segment{
        min-height: 100vh;
    }

    .segment-1{
        flex-direction: row;
        padding: 0 7%;
        background-color: #fff;
    }

    .wrap-left-about-1{
        font-family: 'Mulish', sans-serif;
        padding: 8% 3% 0 9%;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-catalog.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-about-1 button {
        margin-top: 25px;
    }

    .wrap-right-about-1{
        padding: 0;
    }

    .img-front-about{
        width: 100%;
    }

    .h1-text {
        font-size: 120px;
        font-weight: 900;
    }

    .h1-indi{
        font-size: 200px;
        font-weight: 900;
        line-height: 175px;
    }
    
    .btn-get-start{
        display: flex;
        align-items: center;
        justify-content: space-around;
        background: #000;
        border: 3px solid #000;
        width: 190px;
        height: 60px;
        font-weight: 700;
        color: #fff;
    }

    .icon-arrow-down{
        font-size: 16px;
        /* margin-left: 10px; */
    }

    .icon-arrow-right{
        font-size: 16px;
        /* margin-left: 10px; */
    }

    .segment-2{
        background-color: #fff;
    }

    .div-section-3{
        padding: 0 6%;
    }

    .div-section-3 h1{
        font-family: 'Mulish', sans-serif;
        margin-top: 40px;
        font-size: 48px;
        font-weight: 800;
    }

    .wrapper-products{
        display: flex;
        justify-content: space-around;
        margin-top: 30px;
    }

    .div-products-indi{
        display: flex;
        flex-direction: column;
        width: 400px;
    }

    .product-odd{
        background-color: #F3F9FE;
    }

    .product-even{
        background-color: #F4FAE6;
    }

    .img-product{
        height: auto;
        width: 400px;
    }

    .div-products-info{
        font-family: 'Mulish', sans-serif;
        display: flex;
        flex-direction: column;
        padding: 20px 40px;
        font-weight: 400;
    }

    .div-products-info p{
        font-size: 16px;
    }

    .div-products-info h3{
        font-size: 24px;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .products-info-odd p{
        font-family: 'Mulish', sans-serif;
        color: #00042D;
    }

    .products-info-even p{
        color: #202D00;
    }

    .products-info-even h3{
        color: #4C6214;
    }

    .products-info-odd h3{
        color: #345EC9;
    }

    .div-order-btn{
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    
    .btn-order{
        display: flex;
        align-items: center;
        justify-content: space-around;
        font-family: 'Mulish', sans-serif;
        border: none;
        width: 170px;
        height: 48px;
        font-weight: 700;
        color: #fff;
    }
    
    .order-odd{
        background: #345EC9;
    }

    .order-even{
        background: #A7C460;
    }

    .btn-read-cont{
        background: #fff;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 600;
    }

    .segment-3{
        display: flex;
        justify-content: center;
        background-color: #fff;
        padding: 50px 100px;
        font-family: 'Mulish', sans-serif;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
    }

    .left-segment-3{
        width: 60%;
        padding-right: 7%;
    }

    .left-segment-3 p{
        text-align: justify;
        font-size: 20px;
        font-weight: 500;
    }

    .segment-3 h2 {
        font-weight: 800;
        font-size: 40px;
        color: #142362;
    }

    .segment-4{
        display: flex;
        padding: 2% 7%;
        height: 300px;
        background-color: #fff;
        align-items: center;
    }

    .left-segment-4 h2{
        font-size: 40px;
        font-weight: 800;
    }

    .btn-bottom-order{

    }
}

@media screen and (max-width: 780px) {
    .div-content-about{
        /* padding: 0 15%; */
        flex-direction: column;
    }

    .segment{
        min-height: 100vh;
    }

    .segment-1{
        flex-direction: row;
        background-color: #fff;
    }

    .wrap-left-about-1{
        font-family: 'Mulish', sans-serif;
        padding: 30px 0 80px 20px;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-catalog.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-about-1 button {
        margin-top: 25px;
    }

    .wrap-right-about-1{
        padding: 0;
    }

    .img-front-about{
        width: 100%;
    }

    .h1-text {
        font-size: 56px;
        font-weight: 900;
    }

    .h1-indi{
        font-size: 130px;
        font-weight: 900;
        line-height: 115px;
    }
    
    .btn-get-start{
        display: flex;
        align-items: center;
        justify-content: space-around;
        background: #000;
        border: 3px solid #000;
        width: 190px;
        height: 60px;
        font-weight: 700;
        color: #fff;
    }

    .icon-arrow-down{
        font-size: 16px;
        /* margin-left: 10px; */
    }

    .icon-arrow-right{
        font-size: 16px;
        /* margin-left: 10px; */
    }

    .segment-2{
        background-color: #fff;
    }

    .div-section-3{
        padding: 0 6%;
    }

    .div-section-3 h1{
        font-family: 'Mulish', sans-serif;
        margin-top: 40px;
        font-size: 48px;
        font-weight: 800;
    }

    .wrapper-products{
        display: flex;
        justify-content: space-around;
        margin-top: 30px;
    }

    .div-products-indi{
        display: flex;
        flex-direction: column;
        width: 400px;
    }

    .product-odd{
        background-color: #F3F9FE;
    }

    .product-even{
        background-color: #F4FAE6;
    }

    .img-product{
        height: auto;
        width: 400px;
    }

    .div-products-info{
        font-family: 'Mulish', sans-serif;
        display: flex;
        flex-direction: column;
        padding: 20px 40px;
        font-weight: 400;
    }

    .div-products-info p{
        font-size: 16px;
    }

    .div-products-info h3{
        font-size: 24px;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .products-info-odd p{
        font-family: 'Mulish', sans-serif;
        color: #00042D;
    }

    .products-info-even p{
        color: #202D00;
    }

    .products-info-even h3{
        color: #4C6214;
    }

    .products-info-odd h3{
        color: #345EC9;
    }

    .div-order-btn{
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    
    .btn-order{
        display: flex;
        align-items: center;
        justify-content: space-around;
        font-family: 'Mulish', sans-serif;
        border: none;
        width: 170px;
        height: 48px;
        font-weight: 700;
        color: #fff;
    }
    
    .order-odd{
        background: #345EC9;
    }

    .order-even{
        background: #A7C460;
    }

    .btn-read-cont{
        background: #fff;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 600;
    }

    .segment-3{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        font-family: 'Mulish', sans-serif;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
    }

    .left-segment-3{
        width: 90%;
        padding-right: 7%;
    }

    .left-segment-3 p{
        text-align: justify;
        font-size: 20px;
        font-weight: 500;
    }

    .segment-3 h2 {
        font-weight: 800;
        font-size: 40px;
        color: #142362;
    }

    .segment-4{
        display: flex;
        padding: 2% 7%;
        height: 300px;
        background-color: #fff;
        align-items: center;
    }

    .left-segment-4 h2{
        font-size: 40px;
        font-weight: 800;
    }

    .btn-bottom-order{

    }
}
</style>
