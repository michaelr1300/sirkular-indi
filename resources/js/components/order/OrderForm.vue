<template>
  <div class="container-order segment">
    <div class="d-none d-lg-block col-lg-4">
      <div class="wrap-left-order-1">
        <h1 class="h1-indi text-uppercase">Buat</h1>
        <h1 class="h1-text text-uppercase">Pesanan</h1>
      </div>
    </div>
    <div class="col-12 col-lg-8 px-0 px-md-2 container-order-form">
      <h1 class="d-flex d-lg-none mx-1 px-4 mb-3 text-uppercase">Buat Pesanan</h1>
      <div class="div-progress-bar d-none d-md-block" style="height: 50px">
        <ul class="progress-bar-order">
          <li :class="[ isActive1 ]">Isi data diri</li>
          <li :class="[ isActive2 ]">Isi detail pesanan</li>
          <li :class="[ isActive3 ]">Selesai</li>
        </ul>
      </div>
      <div id="personal-info" aria-labelledby="personal-info-tab" v-if="showUserDetail">
        <form class="row div-form-order" @submit.prevent="submitUserDetail()">
          <div class="col-12 col-md-6 mb-3">
            <label for="name" class="form-label">Nama</label>
            <input 
              id="name" 
              name="name" 
              type="text" 
              class="form-control"
              placeholder="Nama Anda" 
              required
              v-model="form.name" 
            />
          </div>
          <div class="col-12 col-md-6 mb-3">
            <label for="phone_number" class="form-label">Nomor WhatsApp</label>
            <input 
              id="phone_number" 
              name="phone_number" 
              type="text" 
              class="form-control" 
              placeholder="Nomor WhatsApp"
              required
              v-model="form.phone_number"
            >
          </div>
          <div class="col-12 mb-3">
            <label for="address" class="form-label">Alamat Pengiriman</label>
            <textarea 
              id="address" 
              name="address" 
              type="text" 
              class="form-control" 
              placeholder="Alamat Anda"
              rows="5"
              required
              v-model="form.address"
            />
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
          <div class="col-12 mt-3">
            <button 
              type="submit"
              class="btn btn-primary"
            >
              Selanjutnya
            </button>
          </div>
        </form>
      </div>
      <!-- Order Form 2 -->
      <div class="body-order-form" v-if="showOrderDetail">
        <div class="px-2">
          <div class="div-p-title">
            Pilih layanan yang Anda inginkan
          </div>
          <div class="row mx-0">
            <div class="px-0" v-for="(item, index) in orderItems">
              <div class="d-md-flex">
                <div class="form-group my-2 me-3 col-12 col-md-3" >
                  <label for="reviewer_name">Jenis Layanan</label>
                  <select 
                    name="package_id" 
                    class="form-select" 
                    v-model="orderItems[index].package_id"
                  >
                    <option selected :value='null' disabled>Pilih jenis layanan</option>
                    <option 
                      v-for="(item) in packageList"
                      :key="item.id"
                      :value="item.id"
                    >{{ item.name }}</option>
                  </select>
                </div>
                <div class="form-group my-2 me-3 col-12 col-md-3" >
                  <label for="reviewer_name">Foto Pakaian</label>
                  <div>
                    <label
                      class="btn btn-primary w-100 mx-auto"
                    >
                      <input
                        ref="photo"
                        name="photo_path"
                        accept="image/*"
                        class="form-control"
                        style="display: none"
                        type="file"
                        @change="getFileName($event, index)"
                      >
                      Pilih File
                    </label>
                    {{ orderItems[index].file_name }}
                  </div>
                </div>
                <div class="form-group my-2 me-3 col-12 col-md-4" >
                  <label for="description">Keterangan</label>
                  <textarea 
                    v-model="orderItems[index].description"
                    name="description"
                    class="form-control"
                    type="text-area" 
                  ></textarea>
                </div>
                <div v-if="index" class="form-group my-2 col-12 col-md-2" >
                  <button @click="removeItem(index)" type="button" class="btn btn-danger mt-4">
                    <b>X</b>
                  </button>
                </div>
              </div>
              <hr>
            </div>
            <div class="form-group px-0 mt-2 text-end">
              <button @click="addItem" type="button" class="btn btn-primary">Tambah barang</button>
            </div>
          </div>
          <div class="col-12 mt-4">
            <button class="btn btn-primary" @click="backToUserDetail()">
              Kembali
            </button>
            <button class="btn btn-primary" @click="createOrder()">
              Buat Pesanan
            </button>
          </div>
        </div>
      </div>
      <!-- Finish Form -->
      <div class="body-payment-form" v-if="finishPage">
        <div class="wrapper-payment-form px-2">
          <div class="mt-4">
            <div>
              <div class="d-flex">
                <img class="img-bca mx-auto" src="images/success.png" alt="success">
              </div>
              <div class="mt-2">
                <h2 class="text-primary package-price text-center" style="font-size: 24px !important">Selamat!</h2>
                <div class="text-center">Pesanan Anda telah kami terima. Kami akan segera menghubungi Anda.</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mt-4 w-100 text-center">
            <button class="btn btn-outline-primary" onclick="window.location.href = '/'">
              Kembali ke Beranda
            </button>
          </div>
        </div>
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
    this.form.description = this.packageList.map(val => '');
  },
  computed: {
    totalItem() {
      return this.form.quantity.reduce((sum, n) => sum + parseInt(n), 0);
    },
    totalPrice() {
      let totalPrice = 0;
      const price = this.form.package_id.map((id) => this.packageList.filter((item) => item.id == id)[0].price ?? 0);
      this.form.quantity
        .forEach((qty, index) => totalPrice += qty * price[index]
      )
      return totalPrice; 
    }
    
  },
  data() {
    return {
      form: {
        name: null,
        phone_number: null,
        address: null,
        save_data: true,
      },
      orderItems: [{
        package_id: null,
        photo_path: null,
        description: null,
        file_name: null,
      }],
      errors: {},
      orderId: null,
      showUserDetail: true,
      showOrderDetail: false,
      finishPage: false,
      showFinish: false,
      isActive1: 'active',
      isActive2: '',
      isActive3: '',
      isActive4: '',
    }
  },
  methods: {
    async createOrder() {
      var photoArr = this.$refs.photo;
      var photos = photoArr.map((item) => item.files[0])

      let formData = new FormData();

      formData.append("name", this.form.name);
      formData.append("phone_number", this.form.phone_number);
      formData.append("address", this.form.address);
      formData.append("save_data", this.form.save_data);

      formData.append("order_item", JSON.stringify(this.orderItems));

      for (let index = 0; index < photos.length; index++) {
        formData.append("photo_" + index, photos[index]);
      }

      try {
        let response = await axios.post(
          `/order`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        console.log(response);
        this.nextPageFinish();
      } catch (error) {
        console.log(error.response);
      }
    },
    hasErrors(key) {
      if (this.errors[key]) {
        return true;
      }
      return false;
    },
    getErrors(key) {
      if (this.hasErrors(key)) {
        return this.errors[key].join(", ");
      }
      return "";
    },
    getFileName(event, index){
      var fileData =  event.target.files[0];
      this.orderItems[index].file_name = fileData.name;
      this.addItem();
      setTimeout(() => {
       this.removeItem(index + 1);
      }, 1);
    },
    backToUserDetail(){
      this.isActive1 = 'active';
      this.isActive2 = '';
      this.isActive3 = '';
      this.isActive4 = '';
      this.showOrderDetail = false;
      this.finishPage = false;
      this.showFinish = false;
      this.showUserDetail = true;
    },
    submitUserDetail(){
      this.isActive1 = 'done';
      this.isActive2 = 'active';
      this.isActive3 = '';
      this.isActive4 = '';
      this.showUserDetail = false;
      this.finishPage = false;
      this.showFinish = false;
      this.showOrderDetail = true;
    },
    nextPageFinish(){
      this.isActive2 = 'done';
      this.isActive3 = 'active';
      this.isActive4 = '';
      this.showUserDetail = false;
      this.showOrderDetail = false;
      this.showFinish = false;
      this.finishPage = true;
    },
    addItem() {
      this.orderItems.push({
        package_id: null,
        photo_path: null,
        description: null,
      })
    },
    removeItem(index) {
      this.orderItems.splice(index, 1);
    },
    async uploadPayment() {
      var payment_photo = this.$refs.payment_photo.files[0];
      let formData = new FormData();
      formData.append("payment_photo", payment_photo);
      try {
        let response = await axios.post(
          `/order/${this.orderId}/updatePayment`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        alert("Bukti Transfer Terupload");
      } catch (error) {
        console.log(error.response);
      }
    }
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

  /* .div-progress-bar{
    width: 1000px;
    position: absolute;
    z-index: 1;
  } */

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

  .progress-bar-order li.done + li:after{
    background: #345EC9;
  }

  /* .progress-bar-order li:first-child:before{
    border: 3px solid #345EC9;
    background: #F3F9FE;
    color: #345EC9;
  } */

  .progress-bar-order li.active:before{
    border: 3px solid #345EC9;
    background: #F3F9FE;
    color: #345EC9;
  }

  .progress-bar-order li.done:before{
    /* border-color: #3aac5d; */
    background: #345EC9;
    color: #ffffff;
  }

  /* ORDER FORM 1 */
  .div-form-order{
    padding: 10px 30px;
  }

  /* ORDER FORM 2 */

  .body-order-form{
    padding: 0 20px 20px 20px;
}
  
  .div-p-title p{
    font-family: 'Mulish', sans-serif;
    font-size: 16px;
  }

  .wrap-each-package{
    padding: 20px;
  }

  .packet-name{
    font-size: 12px;
    font-weight: 400;
    font-family: 'Mulish', sans-serif;
    margin-bottom: 5px;
  }

  .wrap-each-package h2{
    font-size: 24px;
    font-weight: 700;
    font-family: 'Mulish', sans-serif;
  }

  .p-text-bold{
    font-size: 14px;
    font-weight: 700;
    font-family: 'Mulish', sans-serif;
    margin-top: 8px;
    margin-bottom: 5px;
  }

  .div-counter-color{
    margin-top: 5px;
  }
  
  .div-counter-color p{
    font-size: 14px;
    font-weight: 500;
    font-family: 'Mulish', sans-serif;
    margin-bottom: 10px;
  }

  .wrap-note-package{
    display: flex;
    flex-direction: row;
  }

  input{
    /* font-size: 18px; */
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
    /* font-weight: lighter; */
  }

  .div-inc-1{
    display: flex;
    border: 2px solid #142362;
    border-radius: 12px;
  }
  
  .wrap-minus-sign{
  }
  
  .btn-minus{
    /* color:#01E66F;
    border: #01E66F 2px solid; */
    border: none;
    background-color: transparent;
    width: 45px;
    height: 48px;
  }
  
  .input-number{
    width: 100px;
    background-color: transparent;
    text-align: center;
    border:transparent;
    font-size: 24px;
    height:48px;
    padding-top: 10px;
    resize: none;
  }
  
  .btn-plus{
    /* color:#01E66F;
    border: #01E66F 2px solid; */
    border: none;
    background-color: transparent;
    width: 45px;
    height: 48px;
  }

  /* Payment Form */

  .body-payment-form{
    padding: 0 20px 20px 20px;
  }
</style>