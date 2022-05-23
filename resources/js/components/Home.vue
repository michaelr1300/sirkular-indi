<template>
  <div class="flex-column">
    <div
      class="justify-content-center"
      style="background-color: #F3F9FE;"
    >
      <div class="d-md-flex segment-1 flex-row justify-content-center px-0">
        <div class="col-lg-7 wrap-left-home-1 py-5 px-0 ps-md-5 pe-md-3">
          <h1
            class="h1-text text-uppercase text-center text-md-start"
            style="font-size: 5vw"
          >
            Re-produksi Batikmu
          </h1>
          <h1
            class="h1-text text-uppercase text-center text-md-start"
            style="font-size: 5vw"
          >
            Dengan pewarna alami
          </h1>
          <div class="d-none d-md-block">
            <h1
              class="h1-indi text-uppercase"
              style="font-size: 17vw; line-height: 14vw"
            >
              INDI
            </h1>
            <h1
              class="h1-text text-uppercase text-center text-md-start"
              style="font-size: 2vw"
            >
              (Indonesia Natural Dye Institute)
            </h1>
          </div>
          <div class="d-block d-md-none">
            <h1
              class="d-block d-md-none h1-indi text-uppercase text-center mb-4"
              style="font-size: 35vw; line-height: 24vw"
            >
              INDI
            </h1>
            <h1
              class="h1-text text-uppercase text-center text-md-start"
              style="font-size: 4vw"
            >
              (Indonesia Natural Dye Institute)
            </h1>
          </div>
          <h3 class="h3-sub-text text-center text-md-start mt-3">
            Mari jalani circular fashion dan re-produksi batikmu dengan pewarna alami INDI
          </h3>
            <a
              class="btn-get-start mx-auto mx-md-0"
              style="text-decoration: none"
              href="/order"
            >
              Pesan sekarang <font-awesome-icon
                class="icon-arrow-right"
                icon="fa-solid fa-arrow-right"
              />
            </a>
        </div>
        <div class="col-lg-5 wrap-right-home-1 px-2">
          <div class="img-wrapper-1">
            <img
              class="img-person-home"
              src="images/img-person-home.png"
              alt="img person"
            >
            <div class="div-subtext-right-1">
              <img
                class="icon-recycle"
                src="images/recycle-icon.png"
                alt="icon-recycle"
              >
              <span class="span-text-home-1">Mari lestarikan warisan leluhur kita <br> dengan pewarna alami terbaik dari INDI.</span>
            </div>
          </div>
        </div>
      </div>
      <div class="d-md-flex justify-content-center">
        <div class="col-12 col-md-6">
          <img
            class="img img-fluid "
            src="images/image-home-section-2.png"
            alt="img-batik-2"
          >
        </div>
        <div class="d-md-flex flex-column col-12 col-md-6 px-3 my-auto">
          <div class="mx-3">
            <div class="my-auto">
              <h1 class="mt-4" style="font-weight: 900;">
                Tentang Kami
              </h1>
              <p
                class="text-justify"
                style="font-size: 20px;"
              >
                Indi merupakan sebuah konsep circular fashion
                yang berfokus pada perbaikan nilai-nilai pakaian batik.
                Kami bekerja sama dengan <b>GamaIndigo</b>, di mana kami menggunakan
                pewarna alami untuk tekstil dan bahan serat lainnya dari tanaman
                <i>Indigofera tinctoria</i>
              </p>
              <a
                href="/about"
                class="btn btn-read-cont"
              >Baca lebih lanjut <font-awesome-icon
                class="icon-arrow-right"
                icon="fa-solid fa-arrow-right"
              /></a>
            </div>
          </div>
        </div>
      </div>
      <!-- <img class="img img-fluid ellipse-ornament" src="images/ellipse-half.png" alt="ellipse"/> -->
      <div class="justify-content-center mx-3 mt-4 mt-md-2 p-3">
        <hr>
        <div class="col-lg-12">
          <div class="div-section-3 px-3">
            <h1 class="mb-4">
              Keunggulan INDI
            </h1>
            <div class="d-md-flex mt-4">
              <div class="div-point-indi px-3 col-12 col-md-4 text-center mb-2">
                <img
                  class="img img-fluid mx-auto icon-point-indi"
                  src="images/ic-points-1.png"
                  alt=""
                >
                <h3>Lebih hemat</h3>
                <p>
                  Layanan reparasi INDI lebih terjangkau
                  dibandingkan dengan membeli pakaian baru
                </p>
              </div>
              <div class="div-point-indi px-3 col-12 col-md-4 text-center mb-2">
                <img
                  class="img img-fluid mx-auto icon-point-indi"
                  src="images/ic-points-2.png"
                  alt=""
                >
                <h3>Lebih nyaman</h3>
                <p>
                  Pewarna yang kami gunakan adalah bahan alami,
                  karenanya Anda tidak perlu khawatir dengan kemungkinan alergi
                </p>
              </div>
              <div class="div-point-indi px-3 col-12 col-md-4 text-center mb-2">
                <img
                  class="img img-fluid mx-auto icon-point-indi"
                  src="images/ic-points-3.png"
                  alt=""
                >
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
        <hr>
      </div>
      <div v-if="reviews.length" class="justify-content-center mx-3 mt-md-2 p-3">
        <div class="col-lg-12">
          <div class="div-review-section">
            <div class="d-flex justify-content-between mb-3">
              <h1
                class="d-block d-md-none my-auto"
                style="font-weight: 900;"
              >
                Testimoni
              </h1>
              <h1
                class="d-none d-md-block my-auto"
                style="font-weight: 900;"
              >
                Testimoni dari Pelanggan Kami
              </h1>
              <a
                href="/reviews"
                class="d-flex my-auto me-md-3"
                style="font-size: 16px; text-decoration: none"
              >
                <b>Lihat semua</b>
                <font-awesome-icon
                  class="icon-arrow-right ms-2"
                  icon="fa-solid fa-arrow-right"
                />
              </a>
            </div>
            <div class="d-md-flex row">
              <div v-for="item in reviews" :key="item.id" class="col-12 col-md-4 px-0 px-md-3 mb-3">
                <div class="card-review flex-column px-3 pb-4 h-100">
                  <div class="img-fluid text-center">
                    <img 
                      class="img img-fluid my-3" 
                      :src="'/storage/' + item.photo_path" 
                      alt="review-image"
                      style="max-height: 200px; border-radius: 5px"
                    >
                  </div>
                  <div class="mt-2">
                    {{ item.reviewer_name }}
                  </div>
                  <div class="text-area mt-2">
                    {{ item.content }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="segment-5 justify-content-center mx-3 mb-4 p-3">
        <div class="d-md-flex">
          <div class="col-12 col-md-9 left-segment-4">
            <h2>Daftar sekarang untuk investasi pakaian yang berkelanjutan</h2>
          </div>
          <div class="d-flex col-12 col-md-3 mt-3 mt-md-0 text-center">
            <a
              class="btn btn-get-start my-auto"
              href="/order"
            >
              Pesan sekarang
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    reviews: {
      type: Array,
      default: [],
    },
  },
};
</script>

<style scoped>

@media screen and (min-width: 780px) {
    .segment-1{
        flex-direction: row;
    }

    /* .batik-cover-background{
        background-image: url("../../assets/background-home.png");
    } */

    .wrap-left-home-1{
        font-family: 'Mulish', sans-serif;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-home.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-home-1 button {
        margin-top: 40px;
    }

    .wrap-right-home-1{
        background: #001b34;
    }

    .img-wrapper-1{
        background-image: url("../../assets/background-ornament.png");
        background-size: contain;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .img-person-home{
        border-radius: 0 0 200px 200px;
        width: 70%;
    }

    .div-subtext-right-1{
        display: flex;
        margin-top: 30px;
        align-items: center;
    }

    .icon-recycle{
        width: 34px;
        height: 35px;
    }

    .span-text-home-1{
        color: #fff;
        font-size: 18px;
        padding-bottom: 0;
        margin-left: 10px;
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
        height: 60px;
        font-weight: 700;
        color: #fff;
    }

    .icon-arrow-right{
        margin-left: 25px;
        width: 25px;
        height: 25px;
    }

    .btn-read-cont{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border: 3px solid #000;
        width: 210px;
        height: 60px;
        font-weight: 600;
        margin-top: 40px;
        font-weight: 700;
    }
    
    .div-section-3{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .wrapper-points{
        display: flex;
        justify-content: space-around;
    }

    .div-point-indi{
        display: flex;
        flex-direction: column;
    }

    .div-point-indi h3{
        font-size: 20;
        font-weight: 700;
        color: #345EC9;
    }

    .div-point-indi p{
        font-size: 16;
        font-weight: 600;
    }

    .icon-point-indi{
        width: 70px;
        height: auto;
        margin-bottom: 20px;
    }

    .div-section-3 h1{
        font-weight: 900;
    }

    .div-review-section{
        display: flex;
        flex-direction: column;
    }

    .card-review{
        position: relative;
        display: flex;
        background-color: #fff;
        border: none;
        border-radius: 0.75rem;
        box-shadow: 0px 10px 20px rgba(137, 166, 239, 0.15), 0px 3px 6px rgba(137, 166, 239, 0.1);
        border-radius: 20px;
    }
    .segment-5{
        font-family: 'Mulish', sans-serif;
    }

    .segment-5 h2 {
        font-weight: 800;
    }
}

@media screen and (max-width: 780px){
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
        color: #142362;
        background-image: url("../../assets/background-home.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-home-1 button {
        margin-top: 40px;
    }

    .wrap-right-home-1{
        display: none;
        background: #001b34;
    }

    .img-wrapper-1{
        background-image: url("../../assets/background-ornament.png");
        background-size: contain;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .img-person-home{
        border-radius: 0 0 200px 200px;
        width: 70%;
    }

    .div-subtext-right-1{
        display: flex;
        margin-top: 30px;
        align-items: center;
    }

    .icon-recycle{
        width: 34px;
        height: 35px;
    }

    .span-text-home-1{
        color: #fff;
        font-size: 18px;
        padding-bottom: 0;
        margin-left: 10px;
    }

    .h3-sub-text{
        color: #00042D;
        font-size: 20px;
    }

    .btn-get-start{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
        border: 3px solid #000;
        width: 180px;
        height: 48px;
        font-weight: 700;
        color: #fff;
    }

    .icon-arrow-right{
        margin-left: 25px;
        width: 25px;
        height: 25px;
    }

    .btn-read-cont{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border: 3px solid #000;
        width: 210px;
        height: 60px;
        font-weight: 600;
        margin-top: 40px;
        font-weight: 700;
    }

    .div-section-3{
        display: flex;
        flex-direction: column;
        justify-content:flex-start;
        align-items: center;
    }

    .wrapper-points{
        display: flex;
        flex-direction: column;
        /* justify-content: space-around; */
        padding: 5% 10px;
    }

    .div-point-indi{
        display: flex;
        flex-direction: column;
    }

    .div-point-indi h3{
        font-size: 20;
        font-weight: 700;
        color: #345EC9;
    }

    .div-point-indi p{
        font-size: 16;
        font-weight: 600;
    }

    .icon-point-indi{
        width: 70px;
        height: auto;
        margin-bottom: 20px;
    }

    .div-section-3 h1{
        font-weight: 900;
    }

    .div-review-section{
        display: flex;
        flex-direction: column;
    }

    .card-review{
        position: relative;
        background-color: #fff;
        border: none;
        border-radius: 0.75rem;
        box-shadow: 0px 10px 20px rgba(137, 166, 239, 0.15), 0px 3px 6px rgba(137, 166, 239, 0.1);
        border-radius: 20px;
    }
    .segment-5{
        font-family: 'Mulish', sans-serif;
    }

    .segment-5 h2 {
        font-weight: 800;
    }

}
</style>
