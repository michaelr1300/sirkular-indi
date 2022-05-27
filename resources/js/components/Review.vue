<template>
  <div class="flex-column" style="background-color: #F3F9FE;">
    <div class="d-flex justify-content-center flex-column">
      <div class="segment-1 flex-row justify-content-center">
        <div class="col-lg-7 wrap-left-review-1 text-center text-lg-start py-5 px-2 ps-md-5 pe-md-3">
          <h1 class="h1-text text-uppercase header-top">
            Testimoni Pelanggan
          </h1>
          <h1 class="h1-indi text-uppercase header-indi">
            INDI-CIRCULAR
          </h1>
          <h3 class="h3-sub-text text-center text-md-start my-3">
            Bagaimana pendapat mereka tentang INDI-CIRCULAR?  
          </h3>
          <button
            class="btn-get-start mx-auto mx-lg-0"
            @click="scrollToElement"
          >
            Lihat selengkapnya <font-awesome-icon
              class="icon-arrow-down"
              icon="fa-solid fa-arrow-down"
            />
          </button>
        </div>
        <div class="d-none d-lg-block col-lg-5 p-0">
          <div class="img-wrapper-1">
            <img
              class="img-front-review w-100 img img-fluid"
              src="images/image-front-review.png"
              alt="image front review"
              style="object-fit: cover; height:inherit"
            >
          </div>
        </div>
      </div>
    </div>
    <div style="min-height: 100vh">
      <div class="row my-4 mx-0 mx-md-5">
        <div id="product-indi-scroll" />
        <h1 class="text-center my-3" style="font-weight: 900;">
          Testimoni Pelanggan
        </h1>
        <div
          v-for="(item, index) in reviews"
          :key="index"
          class="col-12 col-md-4 px-3 mb-3 div-products-info h-100"
        >
          <div class="card product-card shadow border-0  p-3">
            <div
              v-if="item.media[0]" 
              class="d-flex"
            >
              <img 
                class="img img-fluid mx-auto my-3" 
                :src="item.photo_path[0].url" 
                alt="review-image"
                style="max-height: 400px; max-width: 400px; object-fit: contain;"
              >
            </div>
            <div class="card-body">
              <div v-if="item.reviewer_name" class="text-header my-2" style="font-size:16px">
                <b>{{ item.reviewer_name }}</b>
              </div>
              <p class="card-text text-area">{{ item.content }}</p>
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
    reviews: {
      type: Array,
      default() { return []; },
    },
  },
  computed: {
    carouselItems() {
      return this.reviews.slice(0, 5);
    },
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
    .segment{
        min-height: 100vh;
    }

    .segment-1{
        display: flex;
        flex-direction: row;
        background-color: #fff;
    }

    .wrap-left-review-1{
        font-family: 'Mulish', sans-serif;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-review.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-review-1 button {
        margin-top: 25px;
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

    .wrapper-reviews{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 30px;
    }

    .div-reviews-indi{
        display: flex;
    }

    .div-img-bfaf{
        display: flex;
        width: 920px;
    }

    .img-product{
        height: auto;
        width: 400px;
    }

    .div-reviews-detail{
        font-family: 'Mulish', sans-serif;
        /* padding: 20px 40px; */
        font-weight: 400;
    }
    .div-slider-reviews{
        display: flex;
    }

    .container {
      max-width: 1044px;
      margin: 0 auto;
      padding: 0 20px;
    }
}

@media screen and (max-width: 780px) {
    .segment-1{
        flex-direction: row;
        background-color: #fff;
    }

    .wrap-left-review-1{
        font-family: 'Mulish', sans-serif;
        padding: 8% 3% 10% 9%;
        display: flex;
        flex-direction: column;
        color: #142362;
        background-image: url("../../assets/background-review.png");
        background-size: contain;
        box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
    }

    .wrap-left-review-1 button {
        margin-top: 25px;
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

    .img-wrapper-1{
        overflow: hidden;
        width: 100%;
        position: relative;
    }

    .img-front-review{
        background-size: cover;
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

    .wrapper-reviews{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 30px;
    }

    .div-reviews-indi{
        display: flex;
    }

    .div-img-bfaf{
        display: flex;
        width: 920px;
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

    .div-reviews-detail{
        font-family: 'Mulish', sans-serif;
        /* padding: 20px 40px; */
        font-weight: 400;
    }

    .div-slider-reviews{
        display: flex;

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

    .container {
      max-width: 1044px;
      margin: 0 auto;
      padding: 0 20px;
    }
}
</style>
