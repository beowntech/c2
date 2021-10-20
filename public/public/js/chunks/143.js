(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[143],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/update.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/property/update.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_form_wizard__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-form-wizard */ "./node_modules/vue-form-wizard/dist/vue-form-wizard.js");
/* harmony import */ var vue_form_wizard__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_form_wizard__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _apiUrls_index__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../apiUrls/index */ "./resources/js/src/views/apiUrls/index.js");
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









/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      amenities: [],
      counterDanger: false,
      property_name: "",
      email: "",
      district: "",
      roadName: "",
      pinCode: "",
      citySelect: {},
      stateSelect: {},
      addressValue: "",
      selectedLogo: null,
      featuredImage: null,
      selectedFeatured: null,
      EmailEnter: "",
      cityOptions: [],
      college_type: "",
      stateOptions: [],
      Hotel: "",
      Language: "",
      textarea: "",
      disableC: false,
      status: "plannning",
      currPropId: null,
      property_short_name: "",
      parkingSelect: "0",
      propSize: "",
      village: "",
      policy: "",
      images: [],
      selectedFiles: [],
      local_area: "",
      nationality: "",
      RoomLength: "",
      affiliated_by: "",
      approved_by: "",
      established_on: "",
      RoomBreadth: "",
      textareaLong: "",
      gallery: [],
      dataLoaded: false,
      managersSelect: null,
      amenitiesValue: []
    };
  },
  watch: {
    amenitiesValue: function amenitiesValue() {
      if (this.dataLoaded) {
        this.updateCategory();
      }
    }
  },
  methods: {
    updateBasic: function updateBasic() {
      var _this = this;

      var bodyFormData = new FormData();
      bodyFormData.append('name', this.property_name);
      bodyFormData.append('prop_id', parseInt(this.$route.params.PropId));
      bodyFormData.append('sname', this.property_short_name); //bodyFormData.append('language', this.Language);
      //bodyFormData.append('type', this.selectedCategory);

      bodyFormData.append('sdescription', this.textarea);
      bodyFormData.append('email', this.EmailEnter);
      bodyFormData.append('hotel', Number(this.Hotel));

      if (this.selectedLogo != null) {
        bodyFormData.append('logo', this.selectedLogo);
      }

      if (this.selectedFeatured != null) {
        bodyFormData.append('featured', this.selectedFeatured);
      }

      bodyFormData.append('aff', this.affiliated_by);
      bodyFormData.append('app', this.approved_by);
      bodyFormData.append('est', this.established_on);
      bodyFormData.append('program', this.program_type);
      bodyFormData.append('college', this.college_type);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/update/basic', bodyFormData).then(function (res) {
        console.log(res);

        if (res.data['status'] == 1) {
          _this.alert('Basic Updated Successfully', '', 'success');
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateLocation: function updateLocation() {
      var _this2 = this;

      var bodyFormData = new FormData();
      bodyFormData.append('street_name', this.addressValue);
      bodyFormData.append('local_area', this.local_area);
      bodyFormData.append('pincode', parseInt(this.pinCode));
      bodyFormData.append('state', parseInt(this.stateSelect.id));
      bodyFormData.append('city', parseInt(this.citySelect.id));
      bodyFormData.append('nationality', this.nationality);
      bodyFormData.append('prop_id', parseInt(this.$route.params.PropId));
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/update/location', bodyFormData).then(function (res) {
        console.log(res);

        if (res.data['status'] == 1) {
          _this2.alert('Locations Updated Successfully', '', 'success');
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateDescription: function updateDescription() {
      var _this3 = this;

      var bodyFormData = new FormData();
      bodyFormData.append('description', this.textareaLong);
      bodyFormData.append('prop_id', parseInt(this.$route.params.PropId));
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/update/description', bodyFormData).then(function (res) {
        console.log(res);

        if (res.data['status'] == 1) {
          _this3.alert('Description Updated Successfully', '', 'success');
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    getAmen: function getAmen() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/get').then(function (res) {
        _this4.amenities = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getCat: function getCat() {
      var _this5 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/categories/getNames').then(function (res) {
        console.log(res);
        _this5.categories = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getData: function getData() {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/cities/get').then(function (res) {
        // this.cityOptions = res.data.city;
        _this6.stateOptions = res.data.state;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getCity: function getCity() {
      var _this7 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/city/get', {
        id: this.stateSelect.id
      }).then(function (res) {
        _this7.cityOptions = [];
        _this7.cityOptions = res.data;
        _this7.disableC = false;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getBasic: function getBasic() {
      var _this8 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/getProp', {
        prop_id: this.$route.params.PropId
      }).then(function (res) {
        _this8.property_name = res.data[0].name;
        _this8.property_short_name = res.data[0].short_name;
        _this8.textarea = res.data[0].short_description;
        _this8.textareaLong = res.data[0].description;
        _this8.approved_by = res.data[0].approved_by;
        _this8.affiliated_by = res.data[0].affiliated_by;
        _this8.established_on = res.data[0].established_on;
        _this8.EmailEnter = res.data[0].email;
        _this8.college_type = res.data[0].college_type;
        _this8.amenitiesValue = JSON.parse(res.data[0].property_type);
        _this8.Hotel = res.data[0].hotel_contact;
        _this8.featuredImage = _apiUrls_index__WEBPACK_IMPORTED_MODULE_8__["default"].mediaUrl + "property/" + res.data[0].id + '/gallery/featured/' + res.data[0].images[0].featured + '-xl.webp';
        _this8.image = _apiUrls_index__WEBPACK_IMPORTED_MODULE_8__["default"].mediaUrl + "property/" + res.data[0].id + '/logo/' + res.data[0].logo + '-md.webp';

        _this8.$vs.loading.close();

        _this8.dataLoaded = true;
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateCategory: function updateCategory() {
      var _this9 = this;

      if (this.amenitiesValue.length != 0) {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/step3', {
          catg: this.amenitiesValue,
          prop_id: this.$route.params.PropId
        }).then(function (res) {
          if (res.data['status'] == 1) {
            _this9.alert('Category Updated Successfully', '', 'green');
          }
        }).catch(function (err) {
          _this9.alert('Problem while updating Category!', '', 'red');

          console.log(err);
        });
      }
    },
    getLocation: function getLocation() {
      var _this10 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/getLocation', {
        prop_id: this.$route.params.PropId
      }).then(function (res) {
        if (res.data != 0) {
          _this10.addressValue = res.data[0].street_name;
          _this10.local_area = res.data[0].local_area;
          _this10.pinCode = res.data[0].pincode;
          _this10.nationality = res.data[0].nationality;
          _this10.stateSelect = res.data[0].stat;

          _this10.getCity();

          _this10.citySelect = res.data[0].cit;
        }

        _this10.$vs.loading.close();
      }).catch(function (err) {
        console.log(err);
      });
    },
    onFileChange: function onFileChange(e) {
      var file = e.target.files[0];
      this.selectedLogo = file;
      this.url = URL.createObjectURL(file);
    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: 'top-right'
      });
    },
    enableCity: function enableCity() {
      this.getCity();
    },
    showImage: function showImage(e) {
      var file = e.target.files[0];
      this.selectedLogo = file;
      this.image = URL.createObjectURL(file);
    },
    showFeatured: function showFeatured(e) {
      var file = e.target.files[0];
      this.selectedFeatured = file;
      this.featuredImage = URL.createObjectURL(file);
    }
  },
  components: {
    FormWizard: vue_form_wizard__WEBPACK_IMPORTED_MODULE_2__["FormWizard"],
    TabContent: vue_form_wizard__WEBPACK_IMPORTED_MODULE_2__["TabContent"],
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_7__["quillEditor"],
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_3___default.a
  },
  beforeMount: function beforeMount() {
    this.getData();
    this.getAmen();
    this.getBasic();
    this.getLocation(); // this.getCat()
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/update.vue?vue&type=template&id=9dd92aae&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/property/update.vue?vue&type=template&id=9dd92aae&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "vx-row" }, [
    _c(
      "div",
      { staticClass: "vx-col w-full" },
      [
        _c(
          "vx-card",
          { staticClass: "mb-4", attrs: { title: "Update Basic Info" } },
          [
            _c("div", { staticClass: "vx-row" }, [
              _c("div", { staticClass: "vx-col w-full" }, [
                _c("div", { staticClass: "vx-row" }, [
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _vm.image
                        ? _c("img", {
                            staticStyle: { "max-width": "30%" },
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
                        [_vm._v("Change Logo")]
                      ),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.image")))
                      ])
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "vx-col md:w-1/2 w-full" },
                    [
                      _vm.featuredImage
                        ? _c("img", {
                            staticStyle: { "max-width": "60%" },
                            attrs: { src: _vm.featuredImage }
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
                        ref: "uploadFeaturedInput",
                        staticClass: "hidden",
                        attrs: {
                          type: "file",
                          name: "image",
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
                              return _vm.$refs.uploadFeaturedInput.click()
                            }
                          }
                        },
                        [_vm._v("Change Featured")]
                      ),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("span", { staticClass: "text-danger" }, [
                        _vm._v(_vm._s(_vm.errors.first("step-1.image")))
                      ])
                    ],
                    1
                  )
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
                        _vm._v(_vm._s(_vm.errors.first("step-1.property_name")))
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
                          _vm._s(_vm.errors.first("step-1.property_short_name"))
                        )
                      ])
                    ],
                    1
                  )
                ])
              ]),
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
                        _vm.errors.first("step-1.property_short_description")
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
                    attrs: { label: "Established On", name: "establishedon" },
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
                      attrs: { name: "college_type", label: "College Type" },
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
                        value: "required|digits:10",
                        expression: "'required|digits:10'"
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
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full" },
                [
                  _c(
                    "vs-button",
                    {
                      staticStyle: { float: "right" },
                      on: { click: _vm.updateBasic }
                    },
                    [_vm._v("UPDATE")]
                  )
                ],
                1
              )
            ])
          ]
        )
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-col w-full" },
      [
        _c("vx-card", { staticClass: "mb-4", attrs: { title: "Category" } }, [
          _c(
            "div",
            { staticClass: "vx-row" },
            _vm._l(_vm.amenities, function(items, index) {
              return _c(
                "ul",
                { key: index, staticClass: "demo-alignment" },
                _vm._l(_vm.amenities[index].children, function(items, indexs) {
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
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-col w-full" },
      [
        _c(
          "vx-card",
          { staticClass: "mb-4", attrs: { title: "Long Description" } },
          [
            _c("div", { staticClass: "vx-row" }, [
              _c(
                "div",
                { staticClass: "vx-col w-full" },
                [
                  _c("quill-editor", {
                    staticClass: "md:mt-10 mt-6 mb-0",
                    attrs: { name: "property_description" },
                    model: {
                      value: _vm.textareaLong,
                      callback: function($$v) {
                        _vm.textareaLong = $$v
                      },
                      expression: "textareaLong"
                    }
                  }),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-danger" }, [
                    _vm._v(
                      _vm._s(_vm.errors.first("step-2.property_description"))
                    )
                  ])
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full mt-3" },
                [
                  _c(
                    "vs-button",
                    {
                      staticStyle: { float: "right" },
                      on: { click: _vm.updateDescription }
                    },
                    [_vm._v("UPDATE")]
                  )
                ],
                1
              )
            ])
          ]
        )
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-col w-full" },
      [
        _c("vx-card", { staticClass: "mb-4", attrs: { title: "Address" } }, [
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
                _c("h6", [_vm._v("State")]),
                _vm._v(" "),
                _c("v-select", {
                  staticClass: "mt-1",
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
                _c("h6", [_vm._v("City")]),
                _vm._v(" "),
                _c("v-select", {
                  staticClass: "mt-1",
                  attrs: {
                    disabled: _vm.disableC || _vm.stateSelect == null,
                    autocomplete: "nope",
                    placeholder: "Select City",
                    options: _vm.cityOptions,
                    dir: _vm.$vs.rtl ? "rtl" : "ltr"
                  },
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
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "vx-col w-full" },
              [
                _c(
                  "vs-button",
                  {
                    staticStyle: { float: "right" },
                    on: { click: _vm.updateLocation }
                  },
                  [_vm._v("UPDATE")]
                )
              ],
              1
            )
          ])
        ])
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/apiUrls/index.js":
/*!*************************************************!*\
  !*** ./resources/js/src/views/apiUrls/index.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  mediaUrl: 'https://admissionjockey.com/'
});

/***/ }),

/***/ "./resources/js/src/views/property/update.vue":
/*!****************************************************!*\
  !*** ./resources/js/src/views/property/update.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _update_vue_vue_type_template_id_9dd92aae_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./update.vue?vue&type=template&id=9dd92aae&scoped=true& */ "./resources/js/src/views/property/update.vue?vue&type=template&id=9dd92aae&scoped=true&");
/* harmony import */ var _update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./update.vue?vue&type=script&lang=js& */ "./resources/js/src/views/property/update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _update_vue_vue_type_template_id_9dd92aae_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _update_vue_vue_type_template_id_9dd92aae_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "9dd92aae",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/property/update.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/property/update.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/src/views/property/update.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./update.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/property/update.vue?vue&type=template&id=9dd92aae&scoped=true&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/src/views/property/update.vue?vue&type=template&id=9dd92aae&scoped=true& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_template_id_9dd92aae_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./update.vue?vue&type=template&id=9dd92aae&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/update.vue?vue&type=template&id=9dd92aae&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_template_id_9dd92aae_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_template_id_9dd92aae_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);