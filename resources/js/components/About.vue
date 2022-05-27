<template>
    <div class="flex-column">
        <div class="d-flex flex-column justify-content-center">
            <div class="d-md-flex flex-row justify-content-center">
                <div class="col-lg-7 wrap-left-about-1 text-center text-md-start py-5 px-2 ps-md-5 pe-md-3">
                    <h1 class="h1-text text-uppercase header-indi">Tentang</h1>
                    <h1 class="h1-indi text-uppercase header-indi">INDI-CIRCULAR</h1>
                    <h3 class="h3-sub-text text-center text-md-start my-3">
                      Sebuah konsep <i>circular fashion</i> berfokus pada perbaikan nilai dan sikap dalam produksi, aplikasi, dan re-produksi pakaian.
                    </h3>
                    <button class="btn-get-start mx-auto mx-md-0" @click="scrollToElement">Lihat selengkapnya <font-awesome-icon class="icon-arrow-down" icon="fa-solid fa-arrow-down"/></button></div>
                <div class="col col-md-5 wrap-right-about-1">
                    <div class="img-wrapper-1">
                        <img class="w-100" src="images/image-front-about.png" alt="image front about">
                    </div>
                </div>
            </div>
            <div class="d-block d-md-flex flex-row-reverse segment-3">
              <div class="col-12 col-md-7 px-4 left-segment-3">
                  <p>
                      INDI-CIRCULAR merupakan sebuah konsep <i>circular fashion</i> 
                      yang berfokus pada perbaikan nilai dan sikap dalam produksi, aplikasi, dan re-produksi pakaian.
                      Bekerja sama dengan <b>GamaIndigo</b>, INDI-Circular menggunakan pewarna alami untuk tekstil dan bahan serat lainnya. 
                      <br/><br/>
                      Penggunaan pewarna alami dalam INDI-Circular memiliki keunggulan 
                      karena ramah lingkungan (karena tidak bersifat karsinogen), 
                      dari sumberdaya alam Indonesia yang tersedia melimpah, 
                      terstandar dan berkualitas tinggi namun tetap murah dan praktis ketika digunakan.
                  </p>
              </div>
              <div class="col-12 col-md-5">
                  <img class="img img-fluid mx-auto" src="images/img-about-par.png" alt="image about paragraph">
              </div>
            </div>
            <div class="div-section-3">
              <div class="d-md-flex my-5">
                <div class="col-12 col-md-9 left-segment-4">
                  <h2>Tertarik untuk menggunakan jasa kami?</h2>
                </div>
                <div class="col-12 col-md-3 mt-3 mt-md-0 text-center">
                  <a
                    class="btn btn-get-start my-auto"
                    href="/order"
                  >
                    Pesan sekarang <font-awesome-icon
                      class="icon-arrow-right"
                      icon="fa-solid fa-arrow-right"
                    />
                  </a>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        scrollToElement() {
            let element = document.getElementsByClassName("segment-3")[0];
            element.scrollIntoView({behavior: "smooth", block: "start"});
        }
    }
}
</script>


<style scoped>
@media screen and (min-width: 780px) {
    .wrap-left-about-1{
        font-family: 'Mulish', sans-serif;
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
        display: flex;
        justify-content: center;
        padding: 50px 100px;
        font-family: 'Mulish', sans-serif;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
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
        padding: 50px 100px;
        height: 300px;
        font-family: 'Mulish', sans-serif;
        display: flex;
        align-items: center;
    }

}

@media screen and (max-width: 780px) {
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

    .img-product{
        height: auto;
        width: 400px;
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
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'Mulish', sans-serif;
    }

    .segment-3 div{
        display: flex;
        align-items: center;
    }

    .left-segment-3{

    }

    .left-segment-3 p{
        text-align: justify;
        font-size: 20px;
        font-weight: 500;
        margin-top: 20px;
    }

    .segment-3 h2 {
        font-weight: 800;
        font-size: 40px;
        color: #142362;
    }

    .segment-4{
        background-color: #fff;
        padding: 70px 20px;
        font-family: 'Mulish', sans-serif;
        display: flex;
        align-items: center;
    }

    .left-segment-4 h2{
        padding: 20px 0;
    }
}
</style>
