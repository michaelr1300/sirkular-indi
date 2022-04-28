<template>
  <div style="background-color: #F3F9FE;">
    <div class="d-flex flex-row justify-content-center">
      <div class="col-12 col-lg-7 wrap-left-review-1">
        <h1
          class="h1-text text-uppercase"
          style="font-size: 6vw"
        >
          Testimoni Pelanggan
        </h1>
        <h1
          class="d-none d-md-block h1-indi text-uppercase"
          style="font-size: 17vw; line-height: 14vw"
        >
          INDI
        </h1>
        <h1
          class="d-block d-md-none h1-indi text-uppercase mb-4"
          style="font-size: 35vw; line-height: 24vw"
        >
          INDI
        </h1>
        <button class="btn-get-start">
          Lihat selengkapnya <font-awesome-icon
            class="icon-arrow-down"
            icon="fa-solid fa-arrow-down"
          />
        </button>
      </div>
      <div
        class="col-lg-5 wrap-right-review-1"
      >
        <div class="img-wrapper-1">
          <img
            class="d-none d-md-block img-front-review w-100 img img-fluid"
            src="images/image-front-review.png"
            alt="image front review"
            style="object-fit: cover; height:inherit"
          >
        </div>
      </div>
    </div>
    <div style="min-height: 100vh">
      <div
        id="review-carousel"
        class="carousel slide col-12 w-md-75 mx-auto mt-5"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            v-for="(item, index) in carouselItems"
            :key="item.id"
            type="button"
            class="bg-primary"
            data-bs-target="#review-carousel"
            :data-bs-slide-to="index"
            :class="!index ? 'active' : ''"
            :aria-current="!index ? true : false"
            :aria-label="'Slide ' + index "
          />
        </div>
        <div class="carousel-inner" style="height: 60vh;">
          <div
            v-for="(item, index) in carouselItems"
            :key="item.id"
            class="carousel-item text-center"
            :class="!index ? 'active' : ' '"
            style="max-height: 60vh;"
          >
            <div class="d-flex align-items-start">
              <img
                :src="'/storage/' + item.photo_path"
                class="col-md-8 img img-fluid"
                alt=""
                style="object-fit: contain;"
              >
              <div class="col-4 text-start d-none d-md-block ms-4">
                <p>{{ item.content }}</p>
              </div>
            </div>
          </div>
        </div>
        <!-- <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#review-carousel"
          data-bs-slide="prev"
          style="color: #142362"
        >
          <span
            class="carousel-control-prev-icon"
            aria-hidden="true"
          />
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#review-carousel"
          data-bs-slide="next"
          style="color: #142362"
        >
          <span
            class="carousel-control-next-icon"
            aria-hidden="true"
          />
          <span class="visually-hidden">Next</span>
        </button> -->
        <hr>
      </div>
      <div class="row mt-4 mx-5">
        <h1 class="text-center my-3" style="font-weight: 900;">
          Testimoni Pelanggan
        </h1>
        <div
          v-for="(item, index) in reviews"
          :key="index"
          class="col-12 col-md-4 px-3 mb-3 div-products-info h-100"
        >
          <div class="card product-card shadow border-0  p-3">
            <div class="d-flex">
              <img
                :src="'/storage/' + item.photo_path"
                class="img img-fluid mx-auto"
                alt=""
                style="object-fit: contain; border-radius: 15px; max-height: 200px"
              >
            </div>
            <div class="card-body">
              <p class="card-text">
                {{ item.content }}
              </p>
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
};
</script>
<style scoped>
@media screen and (min-width: 780px) {
    .div-content-review{
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

    .wrap-left-review-1{
        font-family: 'Mulish', sans-serif;
        padding: 8% 3% 0 9%;
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
    .div-content-review{
        /* padding: 0 15%; */
        flex-direction: column;
    }

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

    .h1-text {
        font-size: 44px;
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
