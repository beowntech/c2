<!-- =========================================================================================
  File Name: AddNewDataSidebar.vue
  Description: Add New Data - Sidebar component
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
  <vs-sidebar click-not-close position-right parent="body" default-index="1" color="primary" class="add-new-data-sidebar items-no-padding" spacer v-model="isSidebarActiveLocal">
    <div class="mt-6 flex items-center justify-between px-6">
        <h4>Update Teacher</h4>
        <feather-icon icon="XIcon" @click.stop="isSidebarActiveLocal = false" class="cursor-pointer"></feather-icon>
    </div>
    <vs-divider class="mb-0"></vs-divider>

    <VuePerfectScrollbar class="scroll-area--data-list-add-new" :settings="settings" :key="$vs.rtl">

      <div class="p-6">
          <div class="vx-row">
              <div class="vx-col w-full mb-base">
                      <div class="vx-row mb-6">
                          <div class="vx-col sm:w-1/3 w-full">
                              <span>Name</span>
                          </div>
                          <div class="vx-col sm:w-2/3 w-full">
                              <vs-input class="w-full" v-model="dataName" />
                          </div>
                      </div>
                      <div class="vx-row mb-6">
                          <div class="vx-col sm:w-1/3 w-full">
                              <span>Qualification</span>
                          </div>
                          <div class="vx-col sm:w-2/3 w-full">
                              <vs-input class="w-full" type="text" v-model="dataQual" />
                          </div>
                      </div>
                      <div class="vx-row mb-6">
                          <div class="vx-col sm:w-1/3 w-full">
                              <span>Designation</span>
                          </div>
                          <div class="vx-col sm:w-2/3 w-full">
                              <vs-input class="w-full" type="text" v-model="dataDesig" />
                          </div>
                      </div>
                      <div class="vx-row mb-6">
                          <div class="vx-col sm:w-1/3 w-full">
                              <span>Department</span>
                          </div>
                          <div class="vx-col sm:w-2/3 w-full">
                              <vs-input class="w-full" type="text" v-model="dataDepart" />
                          </div>
                      </div>
              </div>
          </div>
      </div>
    </VuePerfectScrollbar>

    <div class="flex flex-wrap items-center p-6" slot="footer">
      <vs-button class="mr-6" @click="submitData" :disabled="!isFormValid">Submit</vs-button>
      <vs-button type="border" color="danger" @click="isSidebarActiveLocal = false">Cancel</vs-button>
    </div>
  </vs-sidebar>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import axios from "axios";

export default {
  props: {
    isSidebarActive: {
      type: Boolean,
      required: true
    },
    data: {
      type: Object,
      default: () => {},
    }
  },
  watch: {
    isSidebarActive(val) {
      if(!val) return
      if(Object.entries(this.data).length === 0) {
        this.initValues()
        this.$validator.reset()
      }else {
        // let {id, name, qualification, designation, department } = JSON.parse(JSON.stringify(this.data))
          let data = JSON.parse(JSON.stringify(this.data));
        this.dataId = data.id
        this.dataDesig = data.designation
        this.dataQual = data.qualification
        this.dataName = data.name
        this.dataDepart = data.department
        // this.initValues()
      }
      // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))
    },
  },
  data() {
    return {

      dataId: null,
      dataName: "",
      dataQual: "",
      dataDesig: "",
      dataDepart: "",

      settings: { // perfectscrollbar settings
          maxScrollbarLength: 60,
          wheelSpeed: .60,
      },
    }
  },
  computed: {
    isSidebarActiveLocal: {
      get() {
        return this.isSidebarActive
      },
      set(val) {
        if(!val) {
          this.$emit('closeSidebar')
          // this.$validator.reset()
          // this.initValues()
        }
      }
    },
    isFormValid() {
      return true;
      // !this.errors.any() && this.dataName && this.dataQual &&this.dataDesig && this.dataDepart
    }
  },
  methods: {
    initValues() {
      if(this.data.id) return
        this.dataId = null
        this.dataName = ""
        this.dataQual = ""
        this.dataDesig = ""
        this.dataDepart = ""
    },
      alert(title,text,color){
          this.$vs.notify({
              color: color,
              title: title,
              text: text,
              position:'bottom-right'
          });
      },
    submitData() {
      this.$validator.validateAll().then(result => {
          if (result) {
            const obj = {
              id: this.dataId,
              name: this.dataName,
              qual: this.dataQual,
              desig: this.dataDesig,
              depart: this.dataDepart
            }
              axios.post('/api/teacher/update',obj)
                  .then((res) => {
                      console.log(res);
                      if(res.data == 1){
                          this.alert('Teacher Updated','Teacher Updated Successfully','green')
                          this.$emit('closeSidebar')
                          this.$emit('isUpdated')
                          this.initValues()
                      }
                  })
                  .catch((err) => {
                      this.$vs.loading.close()
                      console.log(err)
                  })

            // if(this.dataId !== null && this.dataId >= 0) {
            //   this.$store.dispatch("dataList/updateItem", obj).catch(err => { console.error(err) })
            // }else{
            //   delete obj.id
            //   obj.popularity = 0
            //   this.$store.dispatch("dataList/addItem", obj).catch(err => { console.error(err) })
            // }

            this.$emit('closeSidebar')
            this.initValues()
          }
      })
    },
  },
  components: {
    VuePerfectScrollbar,
  }
}
</script>

<style lang="scss" scoped>
.add-new-data-sidebar {
  ::v-deep .vs-sidebar--background {
    z-index: 52010;
  }

  ::v-deep .vs-sidebar {
    z-index: 52010;
    width: 400px;
    max-width: 90vw;

    .img-upload {
      margin-top: 2rem;

      .con-img-upload {
        padding: 0;
      }

      .con-input-upload {
        width: 100%;
        margin: 0;
      }
    }
  }
}

.scroll-area--data-list-add-new {
    // height: calc(var(--vh, 1vh) * 100 - 4.3rem);
    height: calc(var(--vh, 1vh) * 100 - 16px - 45px - 82px);
}
</style>
