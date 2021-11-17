<template>
  <div>
    <div class="vx-row">
      <div class="vx-col w-full mb-base">
        <vx-card title="Top Ad">
          <div class="vx-row">
            <div class="vx-col w-full mb-base">
              <img v-if="topPreview" :src="topPreview" style="max-width: 40%" />
              <input
                type="file"
                class="hidden"
                ref="uploadImgTop"
                name="image"
                @change="topImages"
                accept="image/*"
                v-validate="'required'"
              />
              <vs-button @click="$refs.uploadImgTop.click()" class="mt-3"
                >Upload Image</vs-button
              >
            </div>
            <div class="vx-col w-full md:w-1/2 mb-base">
              <vs-input
                v-model="topAd.name"
                placeholder="Enter Ad Name"
                style="width: 100%"
              ></vs-input>
            </div>
            <div class="vx-col w-full md:w-1/2 mb-base">
              <vs-input
                v-model="topAd.url"
                placeholder="Enter Full Url"
                style="width: 100%"
              ></vs-input>
            </div>
            <div class="vx-col w-full">
              <vs-button color="primary" style="float: right" @click="addTopAd"
                >Submit</vs-button
              >
            </div>
          </div>
        </vx-card>
      </div>
      <div class="vx-col w-full">
        <vx-card title="Bottom Ad">
          <div class="vx-row">
            <div class="vx-col w-full mb-base">
              <img
                v-if="bottomPreview"
                :src="bottomPreview"
                style="max-width: 40%"
              />
              <input
                type="file"
                class="hidden"
                ref="uploadImgBttom"
                name="image"
                @change="bottomImages"
                accept="image/*"
                v-validate="'required'"
              />
              <vs-button @click="$refs.uploadImgBttom.click()" class="mt-3"
                >Upload Image</vs-button
              >
            </div>
            <div class="vx-col w-full md:w-1/2 mb-base">
              <vs-input
                v-model="bottomAd.name"
                placeholder="Enter Ad Name"
                style="width: 100%"
              ></vs-input>
            </div>
            <div class="vx-col w-full md:w-1/2 mb-base">
              <vs-input
                v-model="bottomAd.url"
                placeholder="Enter Full Url"
                style="width: 100%"
              ></vs-input>
            </div>
            <div class="vx-col w-full">
              <vs-button
                color="primary"
                style="float: right"
                @click="addBottomAd"
                >Submit</vs-button
              >
            </div>
          </div>
        </vx-card>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      topImage: null,
      bottomImage: null,
      topPreview: "",
      bottomPreview: "",
      topAd: {
        name: "",
        url: "",
      },
      bottomAd: {
        name: "",
        url: "",
      },
    };
  },
  methods: {
    alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: "top-right",
      });
    },
    getAds() {
        this.$vs.loading()
      axios
        .get("/api/ads/index")
        .then((res) => {
            console.log(res)
          for (var i = 0; i < res.data.length; i++) {
            if (res.data[i].position == "top") {
                this.topPreview = "/ads/images/"+res.data[i].image
              this.topAd = JSON.parse(res.data[i].data);
              this.topAd.id = res.data[i].id
            }
             if (res.data[i].position == "bottom") {
                  this.bottomPreview = "/ads/images/"+res.data[i].image
              this.bottomAd = JSON.parse(res.data[i].data);
               this.bottomAd.id = res.data[i].id
            }
          }
           this.$vs.loading.close()
        })
        .catch((err) => {
          this.$vs.loading.close();
          console.log(err);
        });
    },
    addTopAd() {
      const bodyFormData = new FormData();
      bodyFormData.append("ad", JSON.stringify(this.topAd));
      bodyFormData.append("position", "top");
      if(Object.keys(this.topAd).includes('id')){
           bodyFormData.append("id", this.topAd.id);
      }
      if(this.topImage != null){
          bodyFormData.append("image", this.topImage);
      }
      axios
        .post("/api/ads/create", bodyFormData)
        .then((res) => {
          this.alert("Ad Updated Succesfully", "", "green");
          this.$vs.loading.close();
        })
        .catch((err) => {
          this.$vs.loading.close();
          this.alert("Problem Adding Ad", "", "red");
          console.log(err);
        });
    },
    addBottomAd() {
      const bodyFormData = new FormData();
      bodyFormData.append("ad", JSON.stringify(this.bottomAd));
      bodyFormData.append("position", "bottom");
      if(Object.keys(this.bottomAd).includes('id')){
           bodyFormData.append("id", this.bottomAd.id);
      }
       if(this.bottomImage != null){
           bodyFormData.append("image", this.bottomImage);
      }
      axios
        .post("/api/ads/create", bodyFormData)
        .then((res) => {
          this.alert("Ad Updated Succesfully", "", "green");
          this.$vs.loading.close();
        })
        .catch((err) => {
          this.$vs.loading.close();
          this.alert("Problem Adding Ad", "", "red");
          console.log(err);
        });
    },
    topImages(e) {
      const file = e.target.files[0];
      this.topImage = file;
      this.topPreview = URL.createObjectURL(file);
    },
    bottomImages(e) {
      const file = e.target.files[0];
      this.bottomImage = file;
      this.bottomPreview = URL.createObjectURL(file);
    },
  },
  mounted(){
      this.getAds()
  }
};
</script>

<style scoped>
</style>
