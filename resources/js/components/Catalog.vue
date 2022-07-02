<template>
  <div class="flex-column">
    <div class="d-flex justify-content-center flex-column">
      <div class="segment-1 flex-row justify-content-center">
        <div class="col-lg-7 wrap-left-catalog-1 text-center text-md-start py-5 px-2 ps-md-5 pe-md-3">
          <h1 class="h1-text text-uppercase header-indi">
            Layanan
          </h1>
          <h1 class="h1-indi text-uppercase header-indi">
            INDI-CIRCULAR
          </h1>
          <button
            class="btn-get-start mx-auto mx-md-0"
            @click="scrollToElement"
          >
            Lihat selengkapnya <font-awesome-icon
              class="icon-arrow-down"
              icon="fa-solid fa-arrow-down"
            />
          </button>
        </div>
        <div class="col-lg-5 p-0">
          <div class="img-wrapper-1">
            <img
              class="img-front-catalog w-100"
              src="images/img-front-catalog.png"
              alt="img catalog"
            >
          </div>
        </div>
      </div>
      <div class="justify-content-center">
        <div class="col-12">
          <div class="div-section-3">
            <div id="product-indi-scroll" />
            <h1 class="px-0 px-lg-3 mb-4">Jasa Reproduksi</h1>
            <div class="d-flex flex-column px-3 px-md-0 w-100 mx-0">
              <div
                v-for="(item, index) in packages"
                :key="index"
                class="d-md-flex flex-row col-12 mb-3 div-products-info product-card bg-white shadow-sm"
              >
                <div class="d-flex col-md-5 px-0">
                  <img 
                    v-if="item.media[0]" 
                    class="my-auto w-100 h-100"
                    :src="item.photo_path[0].url" 
                    alt="product image"
                    style="max-height: 410px; object-fit: cover;"
                  >
                  <img
                    v-else
                    class="my-auto w-100 h-100"
                    style="max-height: 410px; object-fit: cover;"
                    src="/images/default-placeholder.png"
                    alt="product image"
                  >
                </div>
                <div class="d-flex flex-column col-md-7 card-body justify-content-between">
                  <div class="mb-2">
                    <h2 class="card-title text-header mb-2" style="font-size: 36px">
                      <b>{{ item.name }}</b>
                    </h2>
                    <h4 class="card-text package-price mb-3" style="font-size: 20px">
                      Harga Rp {{ item.min_price }} - {{ item.max_price }} per helai
                    </h4>
                    <p class="card-text text-area" style="font-size: 18px">{{ item.description }}</p>
                  </div>
                  <div>
                    <div class="div-order-btn">
                      <a
                        class="btn btn-order"
                        style="background: #345EC9;"
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
              <div class="text-secondary text-center">
                Indi menggunakan pewarna dari bahan alami sehingga warna yang muncul tidak seperti pewarna kimia.
                <br>
                Pewarna alami Indi akan terlihat bagus pada pakaian yang berwarna cerah khususnya pakaian putih.
                <br>
                Silakan menghubungi admin jika memiliki pertanyaan seputar produk Indi. 
              </div>
            </div>
          </div>
          <div v-if="products.length" class="div-section-3 mt-4">
            <hr>
            <h1 class="px-0 px-lg-3 mb-4">Produk Siap Pakai</h1>
            <div class="row mx-0 px-3 px-md-0 w-100">
              <div
                v-for="(item, index) in products"
                :key="index"
                class="col-12 col-md-4 px-2 mb-3"
              >
                <div class="div-products-info product-card bg-white shadow-sm h-100">
                  <div class="d-flex px-0">
                    <img 
                      v-if="item.media[0]" 
                      class="my-auto w-100 h-100"
                      :src="item.photo_path[0].url" 
                      alt="product image"
                      style="max-height: 300px; object-fit: cover;"
                    >
                    <img
                      v-else
                      class="my-auto w-100 h-100"
                      style="max-height: 300px; object-fit: cover;"
                      src="/images/default-placeholder.png"
                      alt="product image"
                    >
                  </div>
                  <div class="d-flex flex-column card-body justify-content-between">
                    <div class="mb-3">
                      <h3 class="card-title text-header mb-2" style="font-size: 28px">
                        <b>{{ item.name }}</b>
                      </h3>
                      <h4 class="card-text package-price mb-2" style="font-size: 18px">
                        Rp {{ item.price }}
                      </h4>
                      <p class="card-text text-area" style="font-size: 14px">{{ item.description }}</p>
                    </div>
                    <div>
                      <div class="div-order-btn">
                        <a
                          class="btn btn-order"
                          style="background: #345EC9;"
                          :href="'https://api.whatsapp.com/send?phone=6282260945766&text=' + 'Halo, saya tertarik untuk memesan ' + item.name"
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
            </div>
          </div>
          <div class="div-section-3 mt-4">
            <hr>
            <h1 class="px-0 px-lg-3 mb-4">Galeri INDI-Circular</h1>
            <div class="container">
              <div class="row">
                <div 
                  v-for="(item, index) in galleryList"
                  :key="index"
                  class="col-md-4 col-12"
                >
                  <img 
                    class="img img-fluid mx-auto my-3 px-2 px-md-0" 
                    :src="'images/gallery-'+ index +'.png'"
                    alt="gallery"
                    style="max-height: 400px; object-fit: contain;"
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="div-section-3">
            <div class="d-md-flex my-5 px-3">
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
    </div>
  </div>
</template>

<script>
export default {
  props: {
    packages: {
      type: Array,
      default: null,
    },
    products: {
      type: Array,
      default: null,
    },
  },
  data() {
    return {
      galleryList: [
        'gallery-0',
        'gallery-1',
        'gallery-2',
        'gallery-3',
        'gallery-4',
        'gallery-5',
      ]
    }
  },
  methods: {
    scrollToElement() {
      const element = document.getElementById('product-indi-scroll');
      element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    },
  },
};
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
        margin-top: 40px;
        font-size: 48px;
        font-weight: 800;
    }

    .div-products-info{
        font-family: 'Mulish', sans-serif;
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
        max-height: 250px;
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
        margin-left: 20px;
        margin-top: 40px;
        font-size: 38px;
        font-weight: 800;
    }

    .div-products-info{
        font-family: 'Mulish', sans-serif;
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
