(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[31],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/add.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/property/add.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_form_wizard__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-form-wizard */ "./node_modules/vue-form-wizard/dist/vue-form-wizard.js");
/* harmony import */ var vue_form_wizard__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_form_wizard__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_form_wizard_dist_vue_form_wizard_min_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-form-wizard/dist/vue-form-wizard.min.css */ "./node_modules/vue-form-wizard/dist/vue-form-wizard.min.css");
/* harmony import */ var vue_form_wizard_dist_vue_form_wizard_min_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_form_wizard_dist_vue_form_wizard_min_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//







 // For custom error message



var dict = {
  custom: {
    image: {
      required: 'Logo is Required'
    },
    property_name: {
      required: 'Name is Required',
      alpha: "Name may only contain alphabetic characters"
    },
    property_short_name: {
      required: 'Short Name is Required',
      alpha: "Name may only contain alphabetic characters"
    },
    property_type: {
      required: 'Institute Type is Required'
    },
    property_description: {
      required: 'Description is Required'
    },
    property_short_description: {
      required: 'Short Description is Required'
    },
    program_type: {
      required: 'Please Select Program Type'
    },
    college_type: {
      required: 'Please Select College Type'
    },
    approvedby: {
      required: 'Approved By is Required'
    },
    affiliatedby: {
      required: 'Affiliated By is Required'
    },
    establishedon: {
      required: 'Established On is Required'
    },
    language_spoken: {
      required: 'Language Spoken is Required'
    },
    meal_option: {
      required: 'Meal Option is Required'
    },
    hotel_contact: {
      required: 'Contact Number is Required'
    },
    property_size: {
      required: 'Property Size is Required'
    },
    email: {
      required: 'Email is Required'
    },
    parking: {
      required: 'Parking is Required'
    },
    village_name: {
      required: 'Village Name is Required'
    },
    district_name: {
      required: 'District Name is Required'
    },
    road_name: {
      required: 'Road Name is Required'
    },
    pincode: {
      required: 'PinCode is Required'
    }
  }
}; // register custom messages

vee_validate__WEBPACK_IMPORTED_MODULE_9__["Validator"].localize('en', dict);
/* harmony default export */ __webpack_exports__["default"] = ({
  // props: {
  //     data: {
  //         type: Object,
  //         required: true,
  //     },
  // },
  data: function data() {
    return {
      twitter: "",
      facebook: "",
      instagram: "",
      counterDanger: false,
      disableC: true,
      // data_local: JSON.parse(JSON.stringify(this.data)),
      property_name: "",
      property_short_name: "",
      email: "",
      parkingSelect: "0",
      propSize: "",
      village: "",
      policy: "",
      district: "",
      roadName: "",
      images: [],
      selectedFiles: [],
      pinCode: "",
      citySelect: "",
      local_area: "",
      nationality: "",
      stateSelect: "",
      RoomLength: "",
      affiliated_by: "",
      approved_by: "",
      established_on: "",
      RoomBreadth: "",
      roomName: "",
      beds: "",
      noofbeds: "",
      addressValue: "",
      maximum_guest: "",
      program_type: "",
      college_type: "",
      attach_bathroom: "",
      selectedFeatured: null,
      selectedCategory: "",
      EmailEnter: "",
      Hotel: "",
      Language: "",
      textareaS: "Long Description Here",
      extra_bed: "",
      url: null,
      length: "",
      breadth: "",
      textarea: "",
      eventName: "",
      eventLocation: "san-francisco",
      status: "plannning",
      room_card: [],
      managers: [],
      amenities: [],
      selectedClass: '',
      currPropId: null,
      policyContent: [],
      b2bprice: "",
      roomTypeOptions: [{
        name: 'Premium',
        id: 1
      }, {
        name: 'Deluxe',
        id: 2
      }, {
        name: 'Normal',
        id: 3
      }],
      cityOptions: [],
      stateOptions: [],
      classes: ['danger', 'primary', 'success', 'rgb(32, 201, 192)'],
      min: 1,
      max: 3,
      number: 0,
      gallery: [],
      managersSelect: null,
      amenitiesValue: [],
      room_type: "",
      social: [],
      image: null,
      featured: null,
      originalImage: null,
      originalImageF: null,
      bedOptions: [{
        text: "1",
        value: 1
      }, {
        text: "2",
        value: 2
      }, {
        text: "3",
        value: 3
      }, {
        text: "4",
        value: 4
      }],
      maximumGuestOptions: [{
        text: "1",
        value: 1
      }, {
        text: "2",
        value: 2
      }, {
        text: "3",
        value: 3
      }, {
        text: "4",
        value: 4
      }, {
        text: "5",
        value: 5
      }, {
        text: "6",
        value: 6
      }, {
        text: "7",
        value: 7
      }, {
        text: "8",
        value: 8
      }, {
        text: "9",
        value: 9
      }, {
        text: "10",
        value: 10
      }],
      categories: [],
      MealOption: [],
      MealOptionExclude: [],
      bathroomOptions: [{
        text: "Yes",
        value: 1
      }, {
        text: "No",
        value: 0
      }]
    };
  },
  created: function created() {
    this.getRandomNumber();
  },
  methods: {
    validateStep1: function validateStep1() {
      var _this = this;

      return new Promise(function (resolve, reject) {
        _this.$validator.validateAll('step-1').then(function (result) {
          if (result) {
            if (!_this.counterDanger) {
              _this.$vs.loading();

              var bodyFormData = new FormData();
              bodyFormData.append('user_id', localStorage.getItem('userId'));
              bodyFormData.append('name', _this.property_name);
              bodyFormData.append('sname', _this.property_short_name);
              bodyFormData.append('language', _this.Language);
              bodyFormData.append('type', _this.selectedCategory);
              bodyFormData.append('sdescription', _this.textarea);
              bodyFormData.append('email', _this.EmailEnter);
              bodyFormData.append('hotel', Number(_this.Hotel));
              bodyFormData.append('logo', _this.originalImage);
              bodyFormData.append('aff', _this.affiliated_by);
              bodyFormData.append('app', _this.approved_by);
              bodyFormData.append('est', _this.established_on);
              bodyFormData.append('program', _this.program_type);
              bodyFormData.append('college', _this.college_type);
              axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/properties/step1', bodyFormData).then(function (res) {
                console.log(res);

                if (res.data['success'] == 1) {
                  _this.$vs.loading.close();

                  _this.currPropId = res.data['prop'];
                  resolve(true); // this.getState()
                  // this.getCity()
                }
              }).catch(function (err) {
                _this.$vs.loading.close();

                console.log(err);
              }); // resolve(true)
            } else {
              reject("correct all values");

              _this.alert('Words Limit Reached', 'Maximum Words Allowed are 100', 'red');
            }
          } else {
            reject("correct all values");
          }
        });
      });
    },
    validateStep2: function validateStep2() {
      var _this2 = this;

      return new Promise(function (resolve, reject) {
        _this2.$validator.validateAll("step-2").then(function (result) {
          if (result) {
            var bodyFormData = new FormData();
            bodyFormData.append('description', _this2.textareaS);
            bodyFormData.append('prop_id', _this2.currPropId);
            bodyFormData.append('featured', _this2.originalImageF);
            axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/properties/step2', bodyFormData).then(function (res) {
              console.log(res);

              if (res.data['success'] == 1) {
                _this2.$vs.loading.close(); // this.currPropId = res.data['prop'];


                resolve(true); // this.getState()
                // this.getCity()
              }
            }).catch(function (err) {
              reject("correct all values");

              _this2.$vs.loading.close();

              console.log(err);
            });
          } else {
            reject("correct all values");
          }
        });
      });
    },
    validateStep3: function validateStep3() {
      var _this3 = this;

      return new Promise(function (resolve, reject) {
        _this3.$validator.validateAll("step-3").then(function (result) {
          if (_this3.amenitiesValue.length == 0) {
            _this3.alert('Select at least one Category');

            reject("correct all values");
          } else {
            if (result) {
              _this3.$vs.loading();

              axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/properties/step3', {
                catg: _this3.amenitiesValue,
                prop_id: _this3.currPropId
              }).then(function (res) {
                if (res.data['status'] == 1) {
                  _this3.$vs.loading.close();

                  resolve(true);
                }
              }).catch(function (err) {
                reject("correct all values");
                console.log(err);
              });
            } else {
              reject("correct all values");
            }
          }
        });
      });
    },
    validateStep4: function validateStep4() {
      var _this4 = this;

      return new Promise(function (resolve, reject) {
        _this4.$validator.validateAll("step-4").then(function (result) {
          if (result) {
            _this4.$vs.loading();

            axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/properties/step4', {
              prop_id: _this4.currPropId,
              local: _this4.local_area,
              national: _this4.nationality,
              pin: Number(_this4.pinCode),
              state: Number(_this4.stateSelect.id),
              city: Number(_this4.citySelect.id),
              address: _this4.addressValue
            }).then(function (res) {
              if (res.data['success'] == 1) {
                _this4.$vs.loading.close();

                resolve(true);

                _this4.alert('College Added Successfully', 'Send to Admin for Approval', 'green');

                jquery__WEBPACK_IMPORTED_MODULE_4___default()('#fomrWizard').hide();
                jquery__WEBPACK_IMPORTED_MODULE_4___default()('#SuccessDone').show();
              }
            }).catch(function (err) {
              _this4.$vs.loading.close();

              reject("correct all values");
              console.log(err);
            });
          } else {
            reject("correct all values");
          }
        });
      });
    },
    galleryImage: function galleryImage() {
      alert(this.gallery);
    },
    enableCity: function enableCity() {
      this.getCity();
    },
    getManagers: function getManagers() {
      var _this5 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/users/managers').then(function (res) {
        console.log(res);
        _this5.managers = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getAmen: function getAmen() {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/amenities/get').then(function (res) {
        console.log(res);
        _this6.amenities = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getCat: function getCat() {
      var _this7 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/categories/getNames').then(function (res) {
        console.log(res);
        _this7.categories = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getData: function getData() {
      var _this8 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/cities/get').then(function (res) {
        // this.cityOptions = res.data.city;
        _this8.stateOptions = res.data.state;
      }).catch(function (err) {
        console.log(err);
      });
    },
    showImage: function showImage(e) {
      var file = e.target.files[0];
      this.originalImage = file;
      this.image = URL.createObjectURL(file);
    },
    showFeatured: function showFeatured(e) {
      var file = e.target.files[0];
      this.originalImageF = file;
      this.featured = URL.createObjectURL(file);
    },
    getState: function getState() {
      var _this9 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/state/get').then(function (res) {
        console.log(res);
        _this9.stateOptions = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getCity: function getCity() {
      var _this10 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/city/get', {
        id: this.stateSelect.id
      }).then(function (res) {
        _this10.cityOptions = [];
        _this10.cityOptions = res.data;
        _this10.disableC = false;
      }).catch(function (err) {
        console.log(err);
      });
    },
    resetGallery: function resetGallery() {
      document.getElementById("galleryImage").value = "";
      this.images = [];
      this.selectedFiles = [];
    },
    deleteUpload: function deleteUpload(event) {
      console.log("Delete:" + JSON.stringify(event));
    },
    createRoom: function createRoom() {
      var room = jquery__WEBPACK_IMPORTED_MODULE_4___default()("#room_card").clone();
      var $div = jquery__WEBPACK_IMPORTED_MODULE_4___default()('.cloneDiv[id^="room_card"]:last'); // Read the Number from that DIV's ID (i.e: 3 from "klon3")
      // And increment that number by 1

      var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1; // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")

      var $klon = $div.clone().prop('id', 'room_card' + num);
      jquery__WEBPACK_IMPORTED_MODULE_4___default()("#copy_room").append($klon);
      jquery__WEBPACK_IMPORTED_MODULE_4___default()("html, body").animate({
        scrollTop: jquery__WEBPACK_IMPORTED_MODULE_4___default()(document).height()
      }, 1000);
    },
    successUpload: function successUpload(event) {
      console.log(event);
    },
    getPolicy: function getPolicy() {
      var _this11 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/policies/get').then(function (res) {
        console.log(res);
        _this11.policyContent = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    removeMeal: function removeMeal() {
      this.MealOption = [];
    },
    removeMealE: function removeMealE() {
      this.MealOptionExclude = [];
    },
    removeRoom: function removeRoom(elem) {
      alert("Clicked");
      alert(jquery__WEBPACK_IMPORTED_MODULE_4___default()(elem).parent('div').attr('id'));
    },
    loadNum: function loadNum() {
      this.min = 0;
      this.max = 3;
      this.getRandomNumber();
    },
    getInput: function getInput() {
      var min = Number(this.min);
      var max = Number(this.max);

      if (min > max) {
        var _ref = [max, min];
        min = _ref[0];
        max = _ref[1];
      }

      this.min = min;
      this.max = max;
      this.getRandomNumber();
    },
    onFileChange: function onFileChange(e) {
      var file = e.target.files[0];
      this.selectedFeatured = file;
      this.url = URL.createObjectURL(file);
    },
    uploadImage: function uploadImage(e) {
      var _this12 = this;

      var vm = this;
      var selectedFiles = e.target.files;

      for (var i = 0; i < selectedFiles.length; i++) {
        console.log(selectedFiles[i]);
        this.images.push(selectedFiles[i]);
      }

      var _loop = function _loop(_i) {
        var reader = new FileReader();

        reader.onload = function (e) {
          _this12.$refs.image[_i].src = reader.result;
          console.log(_this12.$refs.image[_i].src);
        };

        reader.readAsDataURL(_this12.images[_i]);
      };

      for (var _i = 0; _i < this.images.length; _i++) {
        _loop(_i);
      }
    },
    getRandomNumber: function getRandomNumber() {
      this.number = this.generateNumber();
    },
    generateNumber: function generateNumber() {
      return Math.floor(Math.random() * (this.max - this.min + 1) + this.min);
    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: 'top-right'
      });
    },
    gotoList: function gotoList() {
      this.$router.push('/property/all').catch(function () {});
    },
    handleClick: function handleClick(e) {
      if (e.target.matches('.cloneButton, .cloneButton *')) {}
    }
  },
  components: {
    FormWizard: vue_form_wizard__WEBPACK_IMPORTED_MODULE_0__["FormWizard"],
    TabContent: vue_form_wizard__WEBPACK_IMPORTED_MODULE_0__["TabContent"],
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_8__["quillEditor"],
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_2___default.a
  },
  beforeMount: function beforeMount() {
    this.getManagers();
    this.getAmen();
    this.getPolicy();
    this.getCat();
    this.getData();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/add.vue?vue&type=template&id=1629bbf1&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/property/add.vue?vue&type=template&id=1629bbf1& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "vx-card",
    { attrs: { title: "Colleges" } },
    [
      _c(
        "form-wizard",
        {
          ref: "wizard",
          attrs: {
            id: "fomrWizard",
            color: "rgba(var(--vs-primary), 1)",
            errorColor: "rgba(var(--vs-danger), 1)",
            title: null,
            subtitle: null,
            finishButtonText: "Submit"
          }
        },
        [
          _c(
            "tab-content",
            {
              staticClass: "mb-5",
              attrs: {
                title: "Basic Info",
                icon: "feather icon-briefcase",
                "before-change": _vm.validateStep1
              }
            },
            [
              _c("form", { attrs: { "data-vv-scope": "step-1" } }, [
                _c("div", { staticClass: "vx-row" }, [
                  _c(
                    "div",
                    { staticClass: "vx-col w-full" },
                    [
                      _vm.image
                        ? _c("img", {
                            staticStyle: { "max-width": "40%" },
                            attrs: { src: _vm.image }
                          })
                        : _vm._e(),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        ref: "uploadImgInput",
                        staticClass: "hidden",
                        attrs: {
                          type: "file",
                          name: "image",
                          accept: "image/*"
                        },
                        on: { change: _vm.showImage }
                      }),
                      _vm._v(" "),
                      _c(
                        "vs-button",
                        {
                          on: {
                            click: function($event) {
                              return _vm.$refs.uploadImgInput.click()
                            }
                          }
                        },
                        [_vm._v("Upload Logo")]
                      ),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.image")))
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "vx-row" }, [
                        _c(
                          "div",
                          { staticClass: "vx-col md:w-1/2 w-full" },
                          [
                            _c("vs-input", {
                              directives: [
                                {
                                  name: "validate",
                                  rawName: "v-validate",
                                  value: "required|alpha_spaces",
                                  expression: "'required|alpha_spaces'"
                                }
                              ],
                              staticClass: "w-full mt-4",
                              attrs: {
                                label: "Name",
                                type: "text",
                                name: "property_name"
                              },
                              model: {
                                value: _vm.property_name,
                                callback: function($$v) {
                                  _vm.property_name = $$v
                                },
                                expression: "property_name"
                              }
                            }),
                            _vm._v(" "),
                            _c("span", { staticClass: "text-danger" }, [
                              _vm._v(
                                _vm._s(_vm.errors.first("step-1.property_name"))
                              )
                            ])
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "vx-col md:w-1/2 w-full" },
                          [
                            _c("vs-input", {
                              directives: [
                                {
                                  name: "validate",
                                  rawName: "v-validate",
                                  value: "required|alpha_spaces",
                                  expression: "'required|alpha_spaces'"
                                }
                              ],
                              staticClass: "w-full mt-4",
                              attrs: {
                                label: "Short Name",
                                type: "text",
                                name: "property_short_name"
                              },
                              model: {
                                value: _vm.property_short_name,
                                callback: function($$v) {
                                  _vm.property_short_name = $$v
                                },
                                expression: "property_short_name"
                              }
                            }),
                            _vm._v(" "),
                            _c("span", { staticClass: "text-danger" }, [
                              _vm._v(
                                _vm._s(
                                  _vm.errors.first("step-1.property_short_name")
                                )
                              )
                            ])
                          ],
                          1
                        )
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col w-full" },
                    [
                      _c("vs-textarea", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        staticClass: "md:mt-10 mt-6 mb-0",
                        attrs: {
                          counter: "1000",
                          "counter-danger": _vm.counterDanger,
                          label: "Short Description (Maximum 1000 Characters)",
                          name: "short_description",
                          rows: "3"
                        },
                        on: {
                          "update:counterDanger": function($event) {
                            _vm.counterDanger = $event
                          },
                          "update:counter-danger": function($event) {
                            _vm.counterDanger = $event
                          }
                        },
                        model: {
                          value: _vm.textarea,
                          callback: function($$v) {
                            _vm.textarea = $$v
                          },
                          expression: "textarea"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(
                          _vm._s(
                            _vm.errors.first(
                              "step-1.property_short_description"
                            )
                          )
                        )
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _c("vs-input", {
                        staticClass: "w-full mt-4",
                        attrs: { label: "Approved By", name: "approvedby" },
                        model: {
                          value: _vm.approved_by,
                          callback: function($$v) {
                            _vm.approved_by = $$v
                          },
                          expression: "approved_by"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.approvedby")))
                      ]),
                      _vm._v(" "),
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "numeric",
                            expression: "'numeric'"
                          }
                        ],
                        staticClass: "w-full mt-4",
                        attrs: {
                          label: "Established On",
                          name: "establishedon"
                        },
                        model: {
                          value: _vm.established_on,
                          callback: function($$v) {
                            _vm.established_on = $$v
                          },
                          expression: "established_on"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.establishedon")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _c("vs-input", {
                        staticClass: "w-full mt-4",
                        attrs: { label: "Affiliated By", name: "affiliatedby" },
                        model: {
                          value: _vm.affiliated_by,
                          callback: function($$v) {
                            _vm.affiliated_by = $$v
                          },
                          expression: "affiliated_by"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.affiliatedby")))
                      ]),
                      _vm._v(" "),
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required|email",
                            expression: "'required|email'"
                          }
                        ],
                        staticClass: "w-full mt-4",
                        attrs: { label: "College Email", name: "email" },
                        model: {
                          value: _vm.EmailEnter,
                          callback: function($$v) {
                            _vm.EmailEnter = $$v
                          },
                          expression: "EmailEnter"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.email")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _c(
                        "vs-select",
                        {
                          directives: [
                            {
                              name: "validate",
                              rawName: "v-validate",
                              value: "required|",
                              expression: "'required|'"
                            }
                          ],
                          staticClass: "w-full select-large mt-5",
                          attrs: {
                            name: "college_type",
                            label: "College Type"
                          },
                          model: {
                            value: _vm.college_type,
                            callback: function($$v) {
                              _vm.college_type = $$v
                            },
                            expression: "college_type"
                          }
                        },
                        [
                          _c("vs-select-item", {
                            staticClass: "w-full",
                            attrs: { value: "1", text: "Public" }
                          }),
                          _vm._v(" "),
                          _c("vs-select-item", {
                            staticClass: "w-full",
                            attrs: { value: "2", text: "Private" }
                          }),
                          _vm._v(" "),
                          _c("vs-select-item", {
                            staticClass: "w-full",
                            attrs: { value: "3", text: "Govt" }
                          }),
                          _vm._v(" "),
                          _c("vs-select-item", {
                            staticClass: "w-full",
                            attrs: { value: "4", text: "Deamed" }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.college_type")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required|numeric|max:13",
                            expression: "'required|numeric|max:13'"
                          }
                        ],
                        staticClass: "w-full mt-4",
                        attrs: {
                          label: "College Contact Number",
                          name: "hotel_contact"
                        },
                        model: {
                          value: _vm.Hotel,
                          callback: function($$v) {
                            _vm.Hotel = $$v
                          },
                          expression: "Hotel"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.hotel_contact")))
                      ])
                    ],
                    1
                  )
                ])
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "tab-content",
            {
              staticClass: "mb-5",
              attrs: {
                title: "College Info",
                icon: "feather icon-briefcase",
                "before-change": _vm.validateStep2
              }
            },
            [
              _c("form", { attrs: { "data-vv-scope": "step-2" } }, [
                _c("div", { staticClass: "vx-row" }, [
                  _c(
                    "div",
                    { staticClass: "vx-col w-full" },
                    [
                      _vm.featured
                        ? _c("img", {
                            staticStyle: { "max-width": "40%" },
                            attrs: { src: _vm.featured }
                          })
                        : _vm._e(),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        ref: "uploadImgInputF",
                        staticClass: "hidden",
                        attrs: {
                          type: "file",
                          name: "featured",
                          accept: "image/*"
                        },
                        on: { change: _vm.showFeatured }
                      }),
                      _vm._v(" "),
                      _c(
                        "vs-button",
                        {
                          on: {
                            click: function($event) {
                              return _vm.$refs.uploadImgInputF.click()
                            }
                          }
                        },
                        [_vm._v("Upload Featured Image")]
                      ),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-2.featured")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col w-full" },
                    [
                      _c("quill-editor", {
                        staticClass: "md:mt-10 mt-6 mb-0",
                        attrs: { name: "property_description" },
                        model: {
                          value: _vm.textareaS,
                          callback: function($$v) {
                            _vm.textareaS = $$v
                          },
                          expression: "textareaS"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(
                          _vm._s(
                            _vm.errors.first("step-2.property_description")
                          )
                        )
                      ])
                    ],
                    1
                  )
                ])
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "tab-content",
            {
              staticClass: "mb-5",
              attrs: {
                title: "Category",
                icon: "feather icon-image",
                "before-change": _vm.validateStep3
              }
            },
            [
              _c("form", { attrs: { "data-vv-scope": "step-3" } }, [
                _c(
                  "div",
                  { staticClass: "vx-row" },
                  _vm._l(_vm.amenities, function(items, index) {
                    return _c(
                      "ul",
                      { key: _vm.indexs, staticClass: "demo-alignment" },
                      _vm._l(_vm.amenities[index].children, function(
                        items,
                        indexs
                      ) {
                        return _c(
                          "li",
                          { key: indexs },
                          [
                            _c(
                              "vs-checkbox",
                              {
                                attrs: { "vs-value": items.id },
                                model: {
                                  value: _vm.amenitiesValue,
                                  callback: function($$v) {
                                    _vm.amenitiesValue = $$v
                                  },
                                  expression: "amenitiesValue"
                                }
                              },
                              [_vm._v(_vm._s(items.name))]
                            )
                          ],
                          1
                        )
                      }),
                      0
                    )
                  }),
                  0
                )
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "tab-content",
            {
              staticClass: "mb-5",
              attrs: {
                title: "Location",
                icon: "feather icon-image",
                "before-change": _vm.validateStep4
              }
            },
            [
              _c("form", { attrs: { "data-vv-scope": "step-4" } }, [
                _c("div", { staticClass: "vx-row" }, [
                  _c(
                    "div",
                    { staticClass: "vx-col w-full" },
                    [
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        staticClass: "w-full mt-5",
                        attrs: { label: "Street Name", name: "address_text" },
                        model: {
                          value: _vm.addressValue,
                          callback: function($$v) {
                            _vm.addressValue = $$v
                          },
                          expression: "addressValue"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-3.address_text")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        staticClass: "w-full mt-5",
                        attrs: { label: "Local Area", name: "village_name" },
                        model: {
                          value: _vm.local_area,
                          callback: function($$v) {
                            _vm.local_area = $$v
                          },
                          expression: "local_area"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-3.village_name")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        staticClass: "w-full mt-5",
                        attrs: {
                          label: "Nationality",
                          value: "India",
                          name: "district_name"
                        },
                        model: {
                          value: _vm.nationality,
                          callback: function($$v) {
                            _vm.nationality = $$v
                          },
                          expression: "nationality"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-3.district_name")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full mt-5" },
                    [
                      _c("v-select", {
                        staticClass: "mt-5",
                        attrs: {
                          autocomplete: "nope",
                          placeholder: "Select State",
                          options: _vm.stateOptions,
                          dir: _vm.$vs.rtl ? "rtl" : "ltr"
                        },
                        on: { input: _vm.enableCity },
                        model: {
                          value: _vm.stateSelect,
                          callback: function($$v) {
                            _vm.stateSelect = $$v
                          },
                          expression: "stateSelect"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full mt-5" },
                    [
                      _c("v-select", {
                        staticClass: "mt-5",
                        attrs: {
                          disabled: _vm.disableC || _vm.stateSelect == null,
                          autocomplete: "nope",
                          placeholder: "Select City",
                          options: _vm.cityOptions,
                          dir: _vm.$vs.rtl ? "rtl" : "ltr"
                        },
                        on: { input: _vm.getStream },
                        model: {
                          value: _vm.citySelect,
                          callback: function($$v) {
                            _vm.citySelect = $$v
                          },
                          expression: "citySelect"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full mt-5" },
                    [
                      _c("vs-input", {
                        directives: [
                          {
                            name: "validate",
                            rawName: "v-validate",
                            value: "required",
                            expression: "'required'"
                          }
                        ],
                        staticClass: "w-full",
                        attrs: { label: "Pin Code", name: "pincode" },
                        model: {
                          value: _vm.pinCode,
                          callback: function($$v) {
                            _vm.pinCode = $$v
                          },
                          expression: "pinCode"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-3.pincode")))
                      ])
                    ],
                    1
                  )
                ])
              ])
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "row",
          staticStyle: { display: "none", padding: "50px" },
          attrs: { id: "SuccessDone" }
        },
        [
          _c(
            "div",
            {
              staticClass: "col-md-12",
              staticStyle: { "text-align": "center" }
            },
            [
              _c("h3", [_vm._v("Your Request has been sent to Admin")]),
              _vm._v(" "),
              _c(
                "vs-button",
                {
                  staticClass: "mt-4",
                  attrs: { color: "success" },
                  on: { click: _vm.gotoList }
                },
                [_vm._v("Go to List")]
              )
            ],
            1
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/property/add.vue":
/*!*************************************************!*\
  !*** ./resources/js/src/views/property/add.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_vue_vue_type_template_id_1629bbf1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add.vue?vue&type=template&id=1629bbf1& */ "./resources/js/src/views/property/add.vue?vue&type=template&id=1629bbf1&");
/* harmony import */ var _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./add.vue?vue&type=script&lang=js& */ "./resources/js/src/views/property/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _add_vue_vue_type_template_id_1629bbf1___WEBPACK_IMPORTED_MODULE_0__["render"],
  _add_vue_vue_type_template_id_1629bbf1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/property/add.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/property/add.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/src/views/property/add.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/property/add.vue?vue&type=template&id=1629bbf1&":
/*!********************************************************************************!*\
  !*** ./resources/js/src/views/property/add.vue?vue&type=template&id=1629bbf1& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_1629bbf1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=template&id=1629bbf1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/add.vue?vue&type=template&id=1629bbf1&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_1629bbf1___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_1629bbf1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);