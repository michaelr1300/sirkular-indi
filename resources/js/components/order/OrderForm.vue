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
          <li :class="[ isActive3 ]">Pembayaran</li>
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
            <label for="address" class="form-label">Alamat</label>
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
            <p>Pilih paket yang Anda inginkan</p>
          </div>
          <div class="row mx-0">
            <div 
              v-for="(item, index) in packageList" 
              :key="item.id" 
              class="col-12 col-md-4 ps-0 pe-0 pe-md-4 mb-3"
            >
              <div class="product-card">
                <div class="wrap-each-package w-100">
                  <p class="packet-name">Paket {{ index + 1 }}</p>
                  <h2>{{ item.name }}</h2>
                  <div class="package-price mb-2">Rp {{ item.price }}</div>
                  <div class="form-group mt-3" >
                    <label :for="'package-' + item.id" class="form-label">Jumlah</label>
                    <input 
                      :id="'package-' + item.id" 
                      name="quantity" 
                      type="number" 
                      min="0" 
                      class="form-control" 
                      v-model="form.quantity[index]"
                      oninput="(validity.valid && value) || (value = 0)"
                    />
                  </div>    
                  <div class="form-group mt-3" >
                    <label :for="'description-' + item.id" class="form-label">
                      Catatan
                      <br>
                      <small>
                        Warna, pola, atau keterangan lain untuk memudahkan pengerjaan.
                      </small>
                    </label>
                    <textarea :id="'description-' + item.id" name="description" type="text" class="form-control" v-model="form.description[index]"></textarea>
                  </div>
                  <!-- <p class="p-text-bold">Warna yang mau dibeli:</p>
                  <div class="div-counter-color">
                    <p>Merah</p>
                    <div class="div-inc-1">
                      <div class="wrap-minus-sign" @click="onMinusInput('qt1')">   
                          <button class="btn-minus"><h1> - </h1></button>
                      </div>
                      <div class="wrap-input-number">   
                          <input id="number" class="input-number" v-model="qt1" readonly onblur="(parseInt(this.value) > 20) ? 20 : this.value"/>
                      </div>
                      <div class="wrap-plus-sign" @click="onPlusInput('qt1')">
                          <button class="btn-plus"><h1> + </h1></button>
                      </div>
                    </div>
                  </div>
                  <div class="div-counter-color">
                    <p>Kuning</p>
                    <div class="div-inc-1">
                      <div class="wrap-minus-sign" @click="onMinusInput('qt2')">   
                          <button class="btn-minus"><h1> - </h1></button>
                      </div>
                      <div class="wrap-input-number">   
                          <input id="number" class="input-number" v-model="qt2" readonly onblur="(parseInt(this.value) > 20) ? 20 : this.value"/>
                      </div>
                      <div class="wrap-plus-sign" @click="onPlusInput('qt2')">
                          <button class="btn-plus"><h1> + </h1></button>
                      </div>
                    </div>
                  </div>
                  <div class="div-counter-color">
                    <p>Hijau</p>
                    <div class="div-inc-1">
                      <div class="wrap-minus-sign" @click="onMinusInput('qt3')">   
                          <button class="btn-minus"><h1> - </h1></button>
                      </div>
                      <div class="wrap-input-number">   
                          <input id="number" class="input-number" v-model="qt3" readonly onblur="(parseInt(this.value) > 20) ? 20 : this.value"/>
                      </div>
                      <div class="wrap-plus-sign" @click="onPlusInput('qt3')">
                          <button class="btn-plus"><h1> + </h1></button>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-3 package-price">
            Total: Rp {{ totalPrice }}
          </div>
          <div class="col-12 mt-3">
            <button class="btn btn-primary" @click="backToUserDetail()">
              Kembali
            </button>
            <button class="btn btn-primary" @click="createOrder()">
              Buat Pesanan
            </button>
          </div>
        </div>
      </div>
      <!-- Payment Form -->
      <div class="body-payment-form" v-if="showPayment">
        <div class="wrapper-payment-form px-2">
          <div>
            <p>Silahkan melakukan pembayaran sebesar</p>
            <h2 class="package-price" style="font-size: 24px !important">Rp {{ totalPrice }}</h2>
          </div>
          <div class="mt-4">
            <div>
              <div>
                <img class="img-bca" src="images/bca.png" alt="bca account">
              </div>
              <div class="mt-2">
                <div><b>103 949 4950</b></div>
                <div>an. PT. indigo Indonesia</div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mt-4">
            <div class="mb-3">
              <label  
                class="btn btn-primary w-100"
              >
                <input 
                  id="payment_photo" 
                  name="payment_photo"
                  ref="payment_photo"
                  accept="image/*"
                  class="form-control" 
                  style="display: none"
                  type="file" 
                  @change="uploadPayment()"
                >
                Upload Bukti Bayar
              </label>
            </div>
            <button class="btn btn-outline-primary w-100" onclick="window.location.href = '/'">
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
        package_id: [],
        quantity: [],
        description: [],
      },
      errors: {},
      orderId: null,
      showUserDetail: true,
      showOrderDetail: false,
      showPayment: false,
      showFinish: false,
      isActive1: 'active',
      isActive2: '',
      isActive3: '',
      isActive4: '',
    }
  },
  methods: {
    async createOrder() {
      if (this.totalItem < 1) {
        alert('Silakan pilih minimal 1 item!')
      }
      else {
        try {
          let response = await axios.post("/order", this.form);
          this.nextPagePayment();
          this.orderId = response.data.order_id;
        } catch (error) {
          console.log(error.response);
        }
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
    openNextForm(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    },
    onMinusInput(dataVar){
      ( this[dataVar] === 0 ) ? 0 : this[dataVar] = this[dataVar] - 1;
    },
    onPlusInput(dataVar){
      this[dataVar] = this[dataVar] + 1;
    },
    backToUserDetail(){
      this.isActive1 = 'active';
      this.isActive2 = '';
      this.isActive3 = '';
      this.isActive4 = '';
      this.showOrderDetail = false;
      this.showPayment = false;
      this.showFinish = false;
      this.showUserDetail = true;
    },
    submitUserDetail(){
      this.isActive1 = 'done';
      this.isActive2 = 'active';
      this.isActive3 = '';
      this.isActive4 = '';
      this.showUserDetail = false;
      this.showPayment = false;
      this.showFinish = false;
      this.showOrderDetail = true;
    },
    nextPagePayment(){
      this.isActive2 = 'done';
      this.isActive3 = 'active';
      this.isActive4 = '';
      this.showUserDetail = false;
      this.showOrderDetail = false;
      this.showFinish = false;
      this.showPayment = true;
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