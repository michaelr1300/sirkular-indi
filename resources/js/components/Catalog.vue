<template>
    <div class="flex-column">
        <div class="row justify-content-center div-content-catalog">
            <div class="segment segment-1 flex-row justify-content-center">
                <!-- <div class="col-lg-7 batik-cover-background px-0"> -->
                    <div class="col-lg-7 wrap-left-catalog-1">
                        <h1 class="h1-text text-uppercase">Katalog</h1>
                        <h1 class="h1-indi text-uppercase">INDI</h1>
                        <button class="btn-get-start">Lihat selengkapnya <font-awesome-icon class="icon-arrow-down" icon="fa-solid fa-arrow-down"/></button>
                    </div>
                <!-- </div> -->
                <div class="col-lg-5 wrap-right-catalog-1">
                    <div class="img-wrapper-1">
                        <img class="img-front-catalog" src="images/img-front-catalog.png" alt="img catalog">
                    </div>
                </div>
            </div>
            <div class="segment-2 justify-content-center">
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
                                    <button class="btn-order order-even">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                                </div>
                            </div>
                            <div class="div-products-indi product-odd">
                                <img class="img-product img-product-3" src="images/img-product-3.png" alt=""/>
                                <div class="div-products-info products-info-odd">
                                    <h3>Batik Siap Pakai</h3>
                                    <p>
                                        Kain dan ready-to-wear batik dengan
                                        pewarna alami untuk pria, wanita, maupun
                                        anak-anak
                                    </p>
                                    <p>Mulai Rp 120.000</p>
                                </div>
                                <div class="div-order-btn">
                                    <button class="btn-order order-odd">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="segment-3 row justify-content-center">
                <div class="col-lg-10">
                    <h2>Tertarik untuk menggunakan jasa kami?</h2>
                </div>
                <div class="col-lg-2">
                    <button class="btn-get-start">Pesan sekarang <font-awesome-icon class="icon-arrow-right" icon="fa-solid fa-arrow-right"/></button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@media screen and (min-width: 780px) {
    .div-content-catalog{
        /* padding: 0 5%; */
        flex-direction: column;
    }

    .segment{
        min-height: 100vh;
    }

    .segment-1{
        display: flex;
        flex-direction: row;
        padding: 0 7%;
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

    .wrap-right-catalog-1{
        padding: 0;
    }

    .wrap-left-catalog-1 button {
        margin-top: 25px;
    }

    .img-front-catalog{
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
        padding: 0 7.5%;
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

    .btn-bottom-order{

    }
}

@media screen and (max-width: 780px) {
    .div-content-catalog{
        /* padding: 0 5%; */
        flex-direction: column;
    }

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

    .wrap-right-catalog-1{
        padding: 0;
    }

    .wrap-left-catalog-1 button {
        margin-top: 25px;
    }

    .img-wrapper-1{
        overflow: hidden;
        width: 100%;
        height: 250px;
        position: relative;
    }

    .img-front-catalog{
        background-size: cover;
        left: 0%;
        position: absolute;
        top: -60%;
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

    .segment-2{
        background-color: #fff;
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

    .wrapper-products{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 30px;
    }

    .div-products-indi{
        display: flex;
        flex-direction: column;
    }

    .product-odd{
        background-color: #F3F9FE;
    }

    .product-even{
        background-color: #F4FAE6;
    }

    .img-product{
        height: auto;
        width: 100%;
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

    .btn-bottom-order{

    }
}
</style>
