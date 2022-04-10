<template>
  <div class="container-order segment">
    <div class="col-lg-4">
      <div class="wrap-left-order-1">
        <h1 class="h1-indi text-uppercase">Buat</h1>
        <h1 class="h1-text text-uppercase">Pesanan</h1>
      </div>
    </div>
    <div class="col-lg-8 container-order-form">
      <h3 class="mb-3">Buat Pesanan</h3>
      <div class="step-wrapper">
        <div class="div-progress-bar">
          <ul class="progress-bar-order">
            <li class="active">Isi data diri</li>
            <li>Isi detail pesanan</li>
            <li>Pembayaran</li>
            <li>Selesai</li>
          </ul>
        </div>
      </div>
      <div class="div-personal-info"> <!-- id="personal-info" class="" aria-labelledby="personal-info-tab">-->
        <div class="row div-form-order">
          <div class="col-12 col-md-6 mb-3">
            <label for="name" class="form-label">Nama</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Nama Anda" v-model="form.name" />
          </div>
          <div class="col-12 col-md-6 mb-3">
            <label for="phone_number" class="form-label">Nomor WhatsApp</label>
            <input 
              id="phone_number" 
              name="phone_number" 
              type="text" 
              class="form-control" 
              placeholder="Nomor WhatsApp"
              v-model="form.phone_number"
            >
          </div>
          <div class="col-12 mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input 
              id="address" 
              name="address" 
              type="text" 
              class="form-control" 
              placeholder="Alamat Anda"
              v-model="form.address"
            >
            <small>*lengkap dengan kecamatan, kabupaten, dan provinsi Anda</small>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input 
                id="flexCheckChecked" 
                class="form-check-input" 
                type="checkbox" 
                v-model="form.save_data"
                :checked="form.save_data">
              <label class="form-check-label" for="flexCheckChecked">
                Simpan data saya
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- Order Form 2 -->
      <div class="body-order-form">
        <div class="wrapper-order-form">
          <div class="div-p-title">
            <p>Pilih paket yang anda inginkan</p>
          </div>
          <div class="div-choose-packages">
            <div class="each-package">
              <div class="wrap-each-package">
                <p>Paket 1</p>
                <h2>Celup saja</h2>
                <span>Rp 100.000</span>
                <p>Warna yang mau dibeli:</p>
                <div class="div-counter-color">
                  <p>Merah</p>
                  <input type="number" name="quantity" pattern="[0-9]+">
                </div>
                <div class="div-counter-color">
                  <p>Kuning</p>
                  <input type="number" name="quantity" pattern="[0-9]+">
                </div>
                <div class="div-counter-color">
                  <p>Hijau</p>
                  <input type="number" name="quantity" pattern="[0-9]+">
                </div>
              </div>
            </div>
          </div>
          <div class="note-package-1">
            <p>Catatan</p>
            <div>
              <input 
              id="address" 
              name="address" 
              type="text" 
              class="form-control" 
              placeholder="Alamat Anda"
              v-model="form.address"
            >
            </div>
          </div>
        </div>
      </div>
    <!-- <ul id="order-tab"
      class="nav nav-tabs"
      role="tablist">
      <li
        class="nav-item"
        role="presentation"
      >
        <button
          id="personal-info-tab"
          class="nav-link active"
          data-bs-toggle="tab"
          data-bs-target="#personal-info"
          type="button"
          role="tab"
          aria-controls="personal-info"
          aria-selected="true"
        >
          Data Diri
        </button>
      </li>
      <li
        class="nav-item"
        role="presentation"
      >
        <button
          id="order-detail-tab"
          class="nav-link"
          data-bs-toggle="tab"
          data-bs-target="#order-detail"
          type="button"
          role="tab"
          aria-controls="order-detail"
          aria-selected="false"
        >
          Data Pesanan
        </button>
      </li>
    </ul> -->
      <div> <!--id="order-detail" class="" aria-labelledby="order-detail-tab">-->
        <div v-for="(item, index) in packageList" :key="item.id" class="col mb-3">
          <label :for="'package-' + item.id" class="form-label">{{ item.name }}</label>
          <input :id="'package-' + item.id" name="quantity" type="number" min="0" class="form-control" v-model="form.quantity[index]"/>
          <label :for="'description-' + item.id" class="form-label">Keterangan</label>
          <input :id="'description-' + item.id" name="description" type="text" class="form-control" v-model="form.description[index]"/>
        </div>
        <button class="btn btn-primary" @click="createOrder()">
          Submit
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    packageList: {
      type: Array,
      default: null
    },
    user: {
      type: Object,
      default: null
    },
  },
  mounted () {
    this.form.name = this.user.name;
    this.form.phone_number = this.user.phone_number;
    this.form.address = this.user.address;
    this.form.package_id = this.packageList.map(val => val.id);
    this.form.quantity = this.packageList.map(val => 0);
  },
  data() {
    return {
      form: {
        name: null,
        phone_number: null,
        address: null,
        save_data: true,
        package_id: [],
        quantity: [],
        description: [],
      }
    }
  },
  methods: {
    async createOrder() {
      try {
        let response = await axios.post("/order", this.form);
        alert("Order Created");
      } catch (error) {
        console.log(error.response);
      }
    },
  },
};
</script>

<style scoped>
  .container-order{
    display: flex;
    flex-direction: row;
  }

  .segment{
    min-height: 80vh;
  }

  .container-order-form{
    padding: 40px 50px;
  }

  .wrap-left-order-1{
    font-family: 'Mulish', sans-serif;
    min-height: 100vh;
    padding: 8% 3% 0 9%;
    display: flex;
    flex-direction: column;
    color: #142362;
    background-image: url("../../../assets/background-catalog.png");
    background-size: contain;
    box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
  }

  .h1-text {
    font-size: 60px;
    font-weight: 900;
  }

  .h1-indi{
    font-size: 120px;
    font-weight: 900;
    line-height: 175px;
  }

  .div-progress-bar{
    width: 1000px;
    position: absolute;
    z-index: 1;
  }

  .progress-bar-order{
    counter-reset: step;
    list-style-type: none;
  }

  .progress-bar-order li{
    font-family: 'Mulish', sans-serif;
    font-size: 14;
    font-weight: 500;
    float: left;
    width: 25%;
    position: relative;
    /* text-align: center; */
  }

  .progress-bar-order li.active{
    color: #345EC9;
  }

  .progress-bar-order li:before{
    content:counter(step);
    counter-increment: step;
    width: 50px;
    height: 50px;
    padding: 10px 15px;
    /* border: 2px solid #bebebe; */
    /* display: block; */
    margin: 0 10px 10px auto;
    border-radius: 50%;
    line-height: 27px;
    background: #EBEBEB;
    color: #81828F;
    text-align: center;
    font-weight: bold;
  }

  .progress-bar-order li:after{
    content: '';
    position: absolute;
    height: 3px;
    background: #979797;
    top: 12px;
    z-index: -1;
  }

  .progress-bar-order li:first-child:after{
    content: none;
  }

  .progress-bar-order li:nth-child(2):after{
    left: -38%;
    width: 34%;
  }

  .progress-bar-order li:nth-child(3):after{
    left: -22%;
    width: 19%;
  }

  .progress-bar-order li:nth-child(4):after{
    left: -36%;
    width: 33%;
  }

  .progress-bar-order li.active + li:after{
    background: #345EC9;
  }

  .progress-bar-order li.active + li:before{
    border: 3px solid #345EC9;
    background: #F3F9FE;
    color: #345EC9;
  }

  .progress-bar-order li.active:before{
    /* border-color: #3aac5d; */
    background: #345EC9;
    color: #ffffff;
  }

  /* ORDER FORM 1 */

  .div-personal-info{
    margin-top: 100px;
  }

  .div-form-order{
    padding: 10px 30px;
  }

  /* ORDER FORM 2 */

  .body-order-form{
    margin-top: 100px;
    padding: 0 20px 20px 20px;
}
  
  .wrapper-order-form{

  }
  
  .div-p-title{

  }

  .div-p-title p{
    font-family: 'Mulish', sans-serif;
    font-size: 16px;
  }

  .div-choose-packages{
    
  }

  .each-package{
    display: flex;
    width: 300px;
    height: 500px;
    border: 2px solid #142362;
    border-radius: 20px;
  }

  .wrap-each-package{
    padding: 20px;
  }

  .wrap-each-package h2{
    font-size: 24px;
    font-weight: 700;
    font-family: 'Mulish', sans-serif;
  }
  
  .div-counter-color{

  }

  input{
    font-size: 18px;
    /* height: 4rem;
    padding: 0 4rem;
    border-radius: 2rem;
    border: 0;
    background: #fff;
    color: #222;
    box-shadow: 0 10px 65px -10px rgba(0,0,0,.25);
    text-align: center;
    width: 100%;
    box-sizing: border-box; */
    font-weight: lighter;
  }
</style>