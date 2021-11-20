<template>
  <div class="vx-row">
    <div class="vx-col w-full mb-base">
      <vx-card title="Add Hostel">
        <div class="vx-row mb-6">
          <div class="vx-col w-full">
            <vs-upload
              multiple
              text="Upload Images (Select Multiple Images)"
              ref="upload_featured"
              @change="successUpload"
              @on-delete="successUpload"
              :show-upload-button="false"
              action=""
              @on-success="successUpload"
            />
          </div>
        </div>
        <div class="vx-row mb-6">
          <div class="vx-col sm:w-1/3 w-full">
            <label>Hostel Name</label>
            <vs-input class="w-full" v-model="name" placeholder="Hostel Name" />
          </div>
          <div class="vx-col md:w-1/3 w-full">
            <label>State</label>
            <v-select
              v-model="state"
              autocomplete="nope"
              :reduce="(st) => st.id"
              label="name"
              placeholder="Select State"
              @input="enableCity"
              :options="states"
              :dir="$vs.rtl ? 'rtl' : 'ltr'"
            />
          </div>
          <div class="vx-col md:w-1/3 w-full">
            <label>City</label>
            <v-select
              :disabled="disableC || state == null"
              :reduce="(ci) => ci.id"
              autocomplete="nope"
              v-model="city"
              placeholder="Select City"
              :options="cities"
              :dir="$vs.rtl ? 'rtl' : 'ltr'"
            />
          </div>
          <div class="vx-col sm:w-1/3 w-full mt-4">
            <label>Gender</label>
            <vs-input
              class="w-full"
              v-model="gender"
              placeholder="Enter Gender"
            />
          </div>
        </div>
        <h4 class="mb-3"><strong>Facilites Near By:</strong></h4>
        <div class="vx-row" v-for="(data, i) in nearbyFacility" :key="i">
          <div class="vx-col w-full mb-base">
            <div class="vx-row mb-2">
              <div class="vx-col sm:w-2/5 w-full">
                <vs-input
                  placeholder="Facilty Name"
                  v-model="data.name"
                  style="width: 100%"
                ></vs-input>
              </div>
              <div class="vx-col sm:w-1/4 w-full">
                <vs-input
                  v-model="data.distance"
                  placeholder="Distance (in Minutes)"
                ></vs-input>
              </div>
              <div class="vx-col sm:w-1/4 w-full">
                <vs-button color="success" @click="addFacility">+</vs-button>
                <vs-button
                  color="danger"
                  v-if="data.remove"
                  @click="removeFacility(i)"
                  >-</vs-button
                >
              </div>
            </div>
          </div>
        </div>
        <h4 class="mb-3"><strong>NearBy Properties:</strong></h4>
        <div class="vx-row" v-for="(data, i) in nearbyInst" :key="i">
          <div class="vx-col w-full mb-base">
            <div class="vx-row mb-2">
              <div class="vx-col sm:w-2/5 w-full">
                <v-select
                  placeholder="Select Property"
                  :options="properties"
                  label="name"
                  :reduce="(property) => property.name"
                  @change="getProp"
                  v-model="data.property"
                  style="width: 100%"
                  :dir="$vs.rtl ? 'rtl' : 'ltr'"
                />
              </div>
              <div class="vx-col sm:w-1/4 w-full">
                <vs-input
                  v-model="data.distance"
                  placeholder="Distance (in Minutes)"
                ></vs-input>
              </div>
              <div class="vx-col sm:w-1/4 w-full">
                <vs-button color="success" @click="addNear">+</vs-button>
                <vs-button
                  color="danger"
                  v-if="data.remove"
                  @click="removeNear(i)"
                  >-</vs-button
                >
              </div>
            </div>
          </div>
        </div>
        <div class="vx-row">
          <div class="vx-col w-full mb-3">
            <label>Amenities</label>
            <!-- <v-select
              taggable
              push-tags
              v-model="selecteTags"
              :dir="$vs.rtl ? 'rtl' : 'ltr'"
            /> -->
            <vs-chips
              color="rgb(145, 32, 159)"
              placeholder="Type Amenity and press Enter to add."
              v-model="selectedTags"
              class="my-3"
              icon-pack="feather"
              remove-icon="icon-trash-2"
            >
              <vs-chip
                :key="chip"
                @click="removeSelected(chip)"
                v-for="chip in selectedTags"
                closable
                icon-pack="feather"
                close-icon="icon-trash-2"
              >
                {{ chip }}
              </vs-chip>
            </vs-chips>
          </div>
          <div class="vx-col w-full">
            <h5>About Hostel</h5>
            <quill-editor
              v-model="about"
              name="property_description"
              class="mt-2 mb-0"
            ></quill-editor>
          </div>
        </div>
        <div class="vx-row mt-2">
          <div class="vx-col w-full ml-auto">
            <vs-button class="mr-3 mb-2 float-right" @click="addHostel"
              >Submit</vs-button
            >
          </div>
        </div>
      </vx-card>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";

import { quillEditor } from "vue-quill-editor";
import vSelect from "vue-select";
export default {
  name: "hostelCreate",
  data() {
    return {
      images: [],
      name: "",
      city: {},
      state: {},
      disableC: true,
      gender: "",
      about: "",
      states: [],
      selecteTags: null,
      selectedTags: [],
      cities: [],
      nearbyInst: [{ property: "", distance: "" }],
      nearbyFacility: [{ name: "", distance: "" }],
      properties: [],
    };
  },
  watch: {
    selecteTags: function (val) {
      if (val != null) {
        if (!this.selectedTags.includes(val)) {
          this.selectedTags.push(val);
        }
        this.selecteTags = null;
      }
    },
  },
  methods: {
    getProp(val) {
      axios
        .get("/api/properties/search-college")
        .then((res) => {
          this.properties = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
      console.log(val);
    },
    addHostel() {
      this.$vs.loading();
      let fd = new FormData();
      fd.append("name", this.name);
      fd.append("city", this.city);
      fd.append("state", this.state);
      fd.append("gender", this.gender);
      fd.append("about", this.about);
      fd.append("nearby_properties", JSON.stringify(this.nearbyInst));
      fd.append("facilities_nearby", JSON.stringify(this.nearbyFacility));
      fd.append("amenities", JSON.stringify(this.selectedTags));
      for (var i = 0; i < this.images.length; i++) {
        let file = this.images[i];
        fd.append("images[" + i + "]", file);
      }
      axios
        .post("/api/hostels/create", fd)
        .then((res) => {
          console.log(res);
          this.$vs.loading.close();
          this.alert("Hostels Created Successfully", "", "green");
          this.name = "";
          this.city = "";
          this.gender = "";
          this.nearbyInst = [{ property: "", distance: "" }];
          this.images = [];
        })
        .catch((err) => {
          this.alert(
            "Hostels Not Created",
            "There is Some Problem Creating Hostel",
            "red"
          );
          this.$vs.loading.close();
          console.log(err);
        });
    },
    getState() {
      axios
        .post("/api/state/get")
        .then((res) => {
          console.log(res);
          this.states = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getCity() {
      axios
        .post("/api/city/get", { id: this.state })
        .then((res) => {
          this.cities = [];
          this.cities = res.data;
          this.disableC = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    successUpload(event) {
      // console.log(this.$refs.upload_featured.$data.filesx)
      var files = this.$refs.upload_featured.$data.filesx;
      this.images = [];
      for (var i = 0; i < files.length; i++) {
        if (!files[i].remove) {
          this.images.push(files[i]);
        }
      }
      console.log(this.featuredFiles);
    },
    enableCity() {
      this.getCity();
    },
    addFacility() {
      if (this.nearbyFacility.length < 4) {
        this.nearbyFacility.push({
          name: "",
          distance: "",
          remove: true,
        });
      }
    },
    addNear() {
      if (this.nearbyInst.length < 4) {
        this.nearbyInst.push({
          property: "",
          distance: "",
          remove: true,
        });
      }
    },
    removeNear(i) {
      this.nearbyInst.splice(i, 1);
    },
    removeFacility(i) {
      this.nearbyFacility.splice(i, 1);
    },
    removeSelected(val){
        this.selectedTags.splice(this.selectedTags.indexOf(val),1)
    },
    alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: "top-right",
      });
    },
  },
  components: {
    quillEditor,
    "v-select": vSelect,
  },
  beforeMount() {
    this.getState();
    this.getProp();
  },
};
</script>

<style scoped>
</style>
