<template>
  <div>
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
    <div id="review-carousel" class="carousel slide col-12 mt-4" data-bs-ride="carousel" 
      style="padding: 1.5em 10vw">
      <div class="carousel-indicators">
        <button 
          v-for="(item, index) in carouselItems"
          :key="item.id" type="button" data-bs-target="#review-carousel" :data-bs-slide-to="index" :class="!index ? 'active' : ''" :aria-current="!index ? true : false" :aria-label="'Slide ' + index ">
          </button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/storage/review-photos/2UXRpvNhDyJFEkalAelOihRqnJUwTxvvegEvERnR.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/storage/review-photos/2UXRpvNhDyJFEkalAelOihRqnJUwTxvvegEvERnR.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/storage/review-photos/2UXRpvNhDyJFEkalAelOihRqnJUwTxvvegEvERnR.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#review-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#review-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- <div
      id="review-carousel"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          v-for="(item, index) in carouselItems"
          :key="item.id"
          bs-data-target="#review-carousel"
          :data-slide-to="index"
        ></li>
      </ol>
      <div class="carousel-inner">
        <div
          class="carousel-item bg-dark rounded"
          :class="{ active: index == 0 }"
          v-for="(item, index) in carouselItems"
          :key="item.id"
        >
          <img 
            class="img img-fluid" 
            :src="'/storage/' + item.photo_path" 
            alt="review-image"
          >
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#review-carousel"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#review-carousel"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> -->
    <!-- <section>
      <div class="container">
        <div class="carousel">
          <input v-for="(item,  index) in carouselItems" :key="index"
            :id="'slide-' + index"
            type="radio"
            name="slides"
          >
          <ul class="carousel__slides">
            <li v-for="(item,  index) in carouselItems" :key="index" class="carousel__slide d-md-flex" style="min-height: 200px">
              <img 
                class="img img-fluid" 
                :src="'/storage/' + item.photo_path" 
                alt="review-image"
              >
              <div class="div-reviews-detail">
                {{ item.content }}
              </div>
            </li>
          </ul>
          <ul class="carousel__thumbnails">
            <li v-for="(item,  index) in carouselItems" :key="index"> 
              <label :for="'slide-' + index"><img
                    :src="'/storage/' + item.photo_path" 
                alt=""
              ></label>
            </li>
          </ul>
        </div>
      </div>
    </section> -->
  </div>
</template>

<script>
export default {
  computed: {
    carouselItems() {
      return this.reviews.slice(0, 5);
    }
  },
  props: {
    reviews: {
      type: Array,
      default() { return []; },
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
.carousel {
  display: block;
  text-align: left;
  position: relative;
  margin-bottom: 22px;
}
.carousel > input {
  clip: rect(1px, 1px, 1px, 1px);
  clip-path: inset(50%);
  height: 1px;
  width: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
}
.carousel > input:nth-of-type(6):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -500%;
}
.carousel > input:nth-of-type(5):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -400%;
}
.carousel > input:nth-of-type(4):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -300%;
}
.carousel > input:nth-of-type(3):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -200%;
}
.carousel > input:nth-of-type(2):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -100%;
}
.carousel > input:nth-of-type(1):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: 0%;
}
.carousel > input:nth-of-type(1):checked ~ .carousel__thumbnails li:nth-of-type(1) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(2):checked ~ .carousel__thumbnails li:nth-of-type(2) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(3):checked ~ .carousel__thumbnails li:nth-of-type(3) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(4):checked ~ .carousel__thumbnails li:nth-of-type(4) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(5):checked ~ .carousel__thumbnails li:nth-of-type(5) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(6):checked ~ .carousel__thumbnails li:nth-of-type(6) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel__slides {
  position: relative;
  z-index: 1;
  padding: 0;
  margin: 0;
  overflow: hidden;
  white-space: nowrap;
  box-sizing: border-box;
  display: flex;
}
.carousel__slide {
  position: relative;
  display: block;
  flex: 1 0 100%;
  width: 100%;
  height: 100%;
  overflow: hidden;
  transition: all 300ms ease-out;
  vertical-align: top;
  box-sizing: border-box;
  white-space: normal;
}
.carousel__slide figure {
  display: flex;
  margin: 0;
}
.carousel__slide div {
  position: relative;
  width: 100%;
}
.carousel__slide div > img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}
.carousel__slide img {
  display: block;
  flex: 1 1 auto;
  object-fit: cover;
}
.carousel__slide figcaption {
  flex: 0 0 auto;
  width: 25%;
}
.carousel__slide .credit {
  margin-top: 1rem;
  color: rgba(0, 0, 0, 0.5);
  display: block;
}
.carousel__slide.scrollable {
  overflow-y: scroll;
}
.carousel__thumbnails {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: row;
  margin: 0 -10px;
  overflow-x: scroll;
}
.carousel__slides + .carousel__thumbnails {
  margin-top: 20px;
}
.carousel__thumbnails li {
  flex: 1 1 auto;
  /* max-width: calc((100% / 6) - 20px); */
  margin: 0 10px;
  transition: all 300ms ease-in-out;
}
.carousel__thumbnails label {
  display: block;
  position: relative;
}
.carousel__thumbnails label:before {
  display: block;
  content: "";
  width: 100%;
  padding-top: 100%;
}
.carousel__thumbnails label > img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}
.carousel__thumbnails label:hover, .carousel__thumbnails label:focus {
  cursor: pointer;
}
.carousel__thumbnails label:hover img, .carousel__thumbnails label:focus img {
  box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.25);
  transition: all 300ms ease-in-out;
}
.carousel__thumbnails img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.actions {
    font-size: 1.5em;
    height: 40px;
    position: absolute;
    top: 50%;
    margin-top: -20px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #585858;
}

.actions > span {
    cursor: pointer;
    transition: all 250ms;
}

.actions > span.prev {
    margin-left: 5px;
}

.actions > span.next {
    margin-right: 5px;
}

.actions > span:hover {
    color: #eee;
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
.carousel {
  display: block;
  text-align: left;
  position: relative;
  margin-bottom: 22px;
}
.carousel > input {
  clip: rect(1px, 1px, 1px, 1px);
  clip-path: inset(50%);
  height: 1px;
  width: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
}
.carousel > input:nth-of-type(6):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -500%;
}
.carousel > input:nth-of-type(5):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -400%;
}
.carousel > input:nth-of-type(4):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -300%;
}
.carousel > input:nth-of-type(3):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -200%;
}
.carousel > input:nth-of-type(2):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: -100%;
}
.carousel > input:nth-of-type(1):checked ~ .carousel__slides .carousel__slide:first-of-type {
  margin-left: 0%;
}
.carousel > input:nth-of-type(1):checked ~ .carousel__thumbnails li:nth-of-type(1) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(2):checked ~ .carousel__thumbnails li:nth-of-type(2) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(3):checked ~ .carousel__thumbnails li:nth-of-type(3) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(4):checked ~ .carousel__thumbnails li:nth-of-type(4) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(5):checked ~ .carousel__thumbnails li:nth-of-type(5) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel > input:nth-of-type(6):checked ~ .carousel__thumbnails li:nth-of-type(6) {
  box-shadow: 0px 0px 0px 5px rgba(0, 0, 255, 0.5);
}
.carousel__slides {
  position: relative;
  z-index: 1;
  padding: 0;
  margin: 0;
  overflow: hidden;
  white-space: nowrap;
  box-sizing: border-box;
  display: flex;
}
.carousel__slide {
  position: relative;
  display: block;
  flex: 1 0 100%;
  height: 100%;
  overflow: hidden;
  transition: all 300ms ease-out;
  box-sizing: border-box;
  white-space: normal;
}
.carousel__slide figure {
  display: flex;
  flex-direction: column;
  margin: 0;
}
.carousel__slide div {
  position: relative;
}
.carousel__slide div > img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.carousel__slide img {
  display: block;
  flex: 1 1 auto;
  object-fit: cover;
}
.carousel__slide figcaption {
    display: flex;
  /* align-self: flex-end;
  padding: 20px 20px 0 20px;
  flex: 0 0 auto;
  width: 25%;
  min-width: 150px; */
}
.carousel__slide .credit {
  margin-top: 1rem;
  color: rgba(0, 0, 0, 0.5);
  display: block;
}
.carousel__slide.scrollable {
  overflow-y: scroll;
}
.carousel__thumbnails {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: row;
  margin: 0 -10px;
  overflow-x: scroll;
}
.carousel__slides + .carousel__thumbnails {
  margin-top: 20px;
}
.carousel__thumbnails li {
  flex: 1 1 auto;
  /* max-width: calc((100% / 6) - 20px); */
  margin: 0 10px;
  transition: all 300ms ease-in-out;
}
.carousel__thumbnails label {
  display: block;
  position: relative;
}
.carousel__thumbnails label:before {
  display: block;
  content: "";
}
.carousel__thumbnails label > img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.carousel__thumbnails label:hover, .carousel__thumbnails label:focus {
  cursor: pointer;
}
.carousel__thumbnails label:hover img, .carousel__thumbnails label:focus img {
  box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.25);
  transition: all 300ms ease-in-out;
}
.carousel__thumbnails img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.actions {
    font-size: 1.5em;
    height: 40px;
    position: absolute;
    top: 50%;
    margin-top: -20px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #585858;
}

.actions > span {
    cursor: pointer;
    transition: all 250ms;
}

.actions > span.prev {
    margin-left: 5px;
}

.actions > span.next {
    margin-right: 5px;
}

.actions > span:hover {
    color: #eee;
}
}
</style>
