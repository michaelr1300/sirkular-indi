<template>
    <div class="flex-column">
        <div class="row justify-content-center flex-column">
            <div class="segment segment-1 flex-row justify-content-center">
                <!-- <div class="col-lg-7 batik-cover-background px-0"> -->
                    <div class="col-lg-7 wrap-left-catalog-1">
                        <h1 class="h1-text text-uppercase">Katalog</h1>
                        <h1 class="h1-indi text-uppercase">INDI</h1>
                        <button class="btn-get-start" @click="scrollToElement">Lihat selengkapnya <font-awesome-icon class="icon-arrow-down" icon="fa-solid fa-arrow-down"/></button>
                    </div>
                <!-- </div> -->
                <div class="col-lg-5 wrap-right-catalog-1">
                    <div class="img-wrapper-1">
                        <img class="img-front-catalog" src="images/img-front-catalog.png" alt="img catalog">
                    </div>
                </div>
            </div>
            <div class="bg-white justify-content-center">
                <div class="col-lg-12">
                    <div class="div-section-3">
                        <h1>Produk Indi</h1>
                        <div class="wrapper-products">
                            <div class="div-products-indi product-odd">
                                <img class="img-product img-product-1" src="images/img-product-1.png" alt=""/>
                                <div class="div-products-info products-info-odd">
                                    <h3>Pewarnaan Ulang</h3>
                                    <p>
                                        Pewarnaan ulang kain batik yang luntur dimakan zaman
                                        maupun karena cucian, untuk mengurangi limbah pakaian
                                        serta menjaga nilai historisnya
                                    </p>
                                    <p>Mulai Rp 120.000</p>
                                </div>
                                <div class="div-order-btn">
                                    <button class="btn-order order-odd">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                                </div>
                            </div>
                            <div id="product-indi-scroll"></div>
                            <div class="div-products-indi product-even">
                                <img class="img-product img-product-2" src="images/img-product-2.png" alt=""/>
                                <div class="div-products-info products-info-even">
                                    <h3>Pewarna Alami</h3>
                                    <p>
                                        Pewarna alami untuk tekstil dari ekstrak daun 
                                        tanaman indigofera tinctoria, dalam bentuk
                                        serbuk maupun cairan
                                    </p>
                                    <p>Mulai Rp 50.000</p>
                                </div>
                                <div class="div-order-btn">
                                  <button class="btn-order" style="background: #345EC9;">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0 segment-4">
                <div class="col-12 col-md-9 left-segment-4">
                    <h2>Tertarik untuk menggunakan jasa kami?</h2>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <button class="btn-get-start">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        scrollToElement() {
            let element = document.getElementById("product-indi-scroll");
            element.scrollIntoView({behavior: "smooth", block: "end"});
        }
    }
}
</script>

<style scoped>
@media screen and (min-width: 780px) {
    .segment-1{
        display: flex;
        flex-direction: row;
        background-color: #fff;
    }

    .wrap-left-catalog-1{
        font-family: 'Mulish', sans-serif;
        padding: 8% 3% 0 9%;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-catalog.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-catalog-1 button {
        margin-top: 25px;
    }

    .img-front-catalog{
        width: 100%;
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

    .div-section-3{
        padding: 0 7.5%;
    }

    .div-section-3 h1{
        font-family: 'Mulish', sans-serif;
        margin-top: 40px;
        font-size: 48px;
        font-weight: 800;
    }
    
    .div-products-info{
        font-family: 'Mulish', sans-serif;
        display: flex;
        flex-direction: column;
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

    .btn-read-cont{
        background: #fff;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 600;
    }

    .segment-3{
        background-color: #fff;
        padding: 50px 100px;
        height: 300px;
        font-family: 'Mulish', sans-serif;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
    }

    .segment-3 h2 {
        font-weight: 800;
        font-size: 40px;
        color: #142362;
    }
}

@media screen and (max-width: 780px) {
    .segment-1{
        flex-direction: row;
        background-color: #fff;
    }

    .wrap-left-catalog-1{
        font-family: 'Mulish', sans-serif;
        padding: 8% 3% 15% 9%;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-catalog.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-catalog-1 button {
        margin-top: 25px;
    }

    .img-wrapper-1{
        overflow: hidden;
        width: 100%;
        height: 370px;
        position: relative;
    }

    .img-front-catalog{
        background-size: cover;
        left: 0%;
        position: absolute;
        top: -60%;
    }
    
    .btn-get-start{
        display: flex;
        align-items: center;
        justify-content: space-around;
        background: #000;
        border: 3px solid #000;
        width: 180px;
        height: 48px;
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

    .div-section-3{
        padding: 0;
    }

    .div-section-3 h1{
        font-family: 'Mulish', sans-serif;
        margin-left: 20px;
        margin-top: 40px;
        font-size: 38px;
        font-weight: 800;
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
    
    .btn-read-cont{
        background: #fff;
        border: 3px solid #000;
        width: 150px;
        height: 40px;
        font-weight: 600;
    }

    .segment-3{
        background-color: #fff;
        padding: 50px;
        height: 300px;
        font-family: 'Mulish', sans-serif;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
    }

    .segment-3 h2 {
        font-weight: 800;
        font-size: 40px;
        margin-bottom: 22px;
        color: #142362;
    }
}
</style>

<script>
export default {
  props: {
    packages: {
      type: Array,
      default: null 
    },
  },
}
</script>
