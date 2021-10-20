(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[97],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/add.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _forms_form_elements_input_Input__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../forms/form-elements/input/Input */ "./resources/js/src/views/forms/form-elements/input/Input.vue");
/* harmony import */ var vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-flatpickr-component */ "./node_modules/vue-flatpickr-component/dist/vue-flatpickr.min.js");
/* harmony import */ var vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var flatpickr_dist_flatpickr_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! flatpickr/dist/flatpickr.css */ "./node_modules/flatpickr/dist/flatpickr.css");
/* harmony import */ var flatpickr_dist_flatpickr_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(flatpickr_dist_flatpickr_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    bank_name: {
      required: 'Bank Name is Required'
    },
    bank_short_name: {
      required: 'Short Name is Required'
    }
  }
}; // register custom messages

vee_validate__WEBPACK_IMPORTED_MODULE_6__["Validator"].localize('en', dict);
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "add-room.vue",
  components: {
    Input: _forms_form_elements_input_Input__WEBPACK_IMPORTED_MODULE_1__["default"],
    flatPickr: vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_2___default.a,
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_4___default.a
  },
  data: function data() {
    return {
      max_loan_woc: "",
      penal_charges: "",
      loan_security: "",
      processing_fee: "",
      rate_of_interest: "",
      repayment_period: "",
      loan_institution: "",
      max_loan_wc: "",
      eligibility_concession: "",
      prepayment_charges: "",
      bank_transfer: "",
      count: 1,
      age_limit: false,
      age_data: "",
      bank_name: "",
      bank_short_name: "",
      image: null,
      textarea: "",
      margin: "",
      tax_benefit: false,
      tax_benefit_data: "",
      concession_benefit: "",
      interest_schemes: "",
      top_loan_availability: ""
    };
  },
  methods: {
    submitForm: function submitForm() {
      this.$validator.validateAll().then(function (result) {
        if (result) {
          // if form have no errors
          alert("form submitted!");
        } else {// form have errors
        }
      });
    },
    addRoom: function addRoom() {
      var _this = this;

      var config = {
        headers: {
          'content-type': 'multipart/form-data'
        }
      };
      var fd = new FormData(); // fd.append("prop_id", localStorage.getItem('globalIns'));

      fd.append("name", this.bank_name);
      fd.append("short_name", this.bank_short_name);
      fd.append("age_limit", this.age_data);
      fd.append("tax_benefit", this.tax_benefit_data);
      fd.append("rate_of_interest", this.rate_of_interest);
      fd.append("loan_security", this.loan_security);
      fd.append("penal_charges", this.penal_charges);
      fd.append("margin", this.margin);
      fd.append("max_loan_collateral", this.max_loan_wc);
      fd.append("max_loan_w_collateral", this.max_loan_woc);
      fd.append("processing_fee", this.processing_fee);
      fd.append("repayment_period", this.repayment_period);
      fd.append("loan_for_top_inst", this.loan_institution);
      fd.append("eligibility_concession", this.eligibility_concession);
      fd.append("prepayment_charges", this.prepayment_charges);
      fd.append("bank_transfer", this.bank_transfer);
      fd.append("topup_loan", this.top_loan_availability);
      fd.append("insterest_subsidy_schemes", this.interest_schemes);
      fd.append("benefits", this.concession_benefit);
      fd.append("bank_type", 1);
      fd.append("image", this.image); // fd.append("file", this.file);

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/bank/add', fd, config).then(function (res) {
        // this.textarea = res.data;
        _this.alert('Bank Added Successful', 'Bank Added Successfully Go Back to create New', 'success');

        console.log(res.data);
      }).catch(function (err) {
        _this.alert('There is some Problem Adding Bank', 'Check if any field is Not filled', 'danger'); // this.$vs.loading.close();


        console.log(err);
      });
    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: 'top-right'
      });
    },
    onFileChange: function onFileChange(e) {
      // console.log(e.target.files[0]);
      this.file = e.target.files[0];
    },
    successUpload: function successUpload(e) {
      this.originalImage = e.target.files[0];
    },
    showImage: function showImage(e) {
      this.image = e.target.files[0];
    },
    getCategories: function getCategories() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/categories/course-catg').then(function (res) {
        _this2.categories = res.data; // this.getStream()
      }).catch(function (err) {
        // this.$vs.loading.close();
        console.log(err);
      });
    },
    getStream: function getStream() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/categories/course-stream', {
        'id': this.selectedCatg.id
      }).then(function (res) {
        if (res.data != 0) {
          jquery__WEBPACK_IMPORTED_MODULE_5___default()("#stream").show();
          _this3.streams = res.data;
        } else {
          jquery__WEBPACK_IMPORTED_MODULE_5___default()("#stream").hide();
        }
      }).catch(function (err) {
        // this.$vs.loading.close();
        console.log(err);
      });
    },
    getSubStream: function getSubStream() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/categories/course-sub-stream', {
        'id': this.selectedStream.id
      }).then(function (res) {
        if (res.data != 0) {
          jquery__WEBPACK_IMPORTED_MODULE_5___default()("#substream").show();
          _this4.substreams = res.data;
        } else {
          jquery__WEBPACK_IMPORTED_MODULE_5___default()("#substream").hide();
        }
      }).catch(function (err) {
        // this.$vs.loading.close();
        console.log(err);
      });
    }
  },
  mounted: function mounted() {
    this.getCategories();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/list.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/list.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add */ "./resources/js/src/views/bank/add.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      props: [],
      updateselected: [],
      addNew: false,
      status: [],
      changeStatus: [{
        color: null,
        name: null
      }],
      user: localStorage.getItem('userId')
    };
  },
  methods: {
    addNewData: function addNewData() {
      this.addNew = !this.addNew;
    },
    getBank: function getBank() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get('/api/bank/list').then(function (res) {
        console.log(res);
        _this.props = res.data;

        _this.props.reverse();
      }).catch(function (err) {
        console.log(err);
      });
    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: 'top-right'
      });
    },
    editData: function editData(prop) {
      this.$vs.loading();
      this.$router.push("/property/update/" + prop).catch(function () {});
    }
  },
  components: {
    AddData: _add__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  beforeMount: function beforeMount() {
    this.getBank();
    this.getStatus();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".con-input-upload[data-v-27721658]{\n  width: 120px !important;\n  height: 120px !important;\n}\n.img-upload[data-v-27721658]{\n  width: 120px !important;\n  height: 120px !important;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".vs__actions{\n  display: none !important;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=style&index=1&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=template&id=27721658&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/add.vue?vue&type=template&id=27721658&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
    "div",
    [
      _c("vx-card", { attrs: { title: "Add Bank" } }, [
        _c(
          "form",
          [
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
              attrs: { type: "file", name: "image", accept: "image/*" },
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
              [_vm._v("Upload Bank Image")]
            ),
            _vm._v(" "),
            _c("br"),
            _vm._v(" "),
            _c(
              "span",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.errors.has("image"),
                    expression: "errors.has('image')"
                  }
                ],
                staticClass: "text-danger text-sm"
              },
              [_vm._v(_vm._s(_vm.errors.first("image")))]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-4" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("h6", { staticClass: "mb-1" }, [_vm._v("Name")]),
                  _vm._v(" "),
                  _c("vs-input", {
                    directives: [
                      {
                        name: "validate",
                        rawName: "v-validate",
                        value: "required",
                        expression: "'required'"
                      }
                    ],
                    staticStyle: { width: "100%" },
                    attrs: { type: "text", name: "bank_name" },
                    model: {
                      value: _vm.bank_name,
                      callback: function($$v) {
                        _vm.bank_name = $$v
                      },
                      expression: "bank_name"
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "span",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.errors.has("bank_name"),
                          expression: "errors.has('bank_name')"
                        }
                      ],
                      staticClass: "text-danger text-sm"
                    },
                    [_vm._v(_vm._s(_vm.errors.first("bank_name")))]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/4 w-full mb-2" },
                [
                  _c("h6", { staticClass: "mb-1" }, [_vm._v("Short Name")]),
                  _vm._v(" "),
                  _c("vs-input", {
                    directives: [
                      {
                        name: "validate",
                        rawName: "v-validate",
                        value: "required",
                        expression: "'required'"
                      }
                    ],
                    staticStyle: { width: "100%" },
                    attrs: { name: "bank_short_name" },
                    model: {
                      value: _vm.bank_short_name,
                      callback: function($$v) {
                        _vm.bank_short_name = $$v
                      },
                      expression: "bank_short_name"
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "span",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.errors.has("bank_short_name"),
                          expression: "errors.has('bank_short_name')"
                        }
                      ],
                      staticClass: "text-danger text-sm"
                    },
                    [_vm._v(_vm._s(_vm.errors.first("bank_short_name")))]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/6 w-full mb-1" },
                [
                  _c(
                    "vs-checkbox",
                    {
                      staticClass: "mt-5",
                      model: {
                        value: _vm.age_limit,
                        callback: function($$v) {
                          _vm.age_limit = $$v
                        },
                        expression: "age_limit"
                      }
                    },
                    [_vm._v("Age Limit?")]
                  ),
                  _vm._v(" "),
                  _vm.age_limit
                    ? _c(
                        "div",
                        [
                          _c("h6", { staticClass: "mb-1" }, [
                            _vm._v("Enter if Any")
                          ]),
                          _vm._v(" "),
                          _c("vs-input", {
                            staticStyle: { width: "100%" },
                            model: {
                              value: _vm.age_data,
                              callback: function($$v) {
                                _vm.age_data = $$v
                              },
                              expression: "age_data"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e()
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/5 w-full mb-1" },
                [
                  _c(
                    "vs-checkbox",
                    {
                      staticClass: "mt-5",
                      model: {
                        value: _vm.tax_benefit,
                        callback: function($$v) {
                          _vm.tax_benefit = $$v
                        },
                        expression: "tax_benefit"
                      }
                    },
                    [_vm._v("Tax Benefits?")]
                  ),
                  _vm._v(" "),
                  _vm.tax_benefit
                    ? _c(
                        "div",
                        [
                          _c("h6", { staticClass: "mb-1" }, [
                            _vm._v("Enter if Any")
                          ]),
                          _vm._v(" "),
                          _c("vs-input", {
                            staticStyle: { width: "100%" },
                            model: {
                              value: _vm.tax_benefit_data,
                              callback: function($$v) {
                                _vm.tax_benefit_data = $$v
                              },
                              expression: "tax_benefit_data"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e()
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-3" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: {
                      label: "Applicable Rate of Interest",
                      height: "100"
                    },
                    model: {
                      value: _vm.rate_of_interest,
                      callback: function($$v) {
                        _vm.rate_of_interest = $$v
                      },
                      expression: "rate_of_interest"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Loan Security", height: "100" },
                    model: {
                      value: _vm.loan_security,
                      callback: function($$v) {
                        _vm.loan_security = $$v
                      },
                      expression: "loan_security"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Penal Charges", height: "100" },
                    model: {
                      value: _vm.penal_charges,
                      callback: function($$v) {
                        _vm.penal_charges = $$v
                      },
                      expression: "penal_charges"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-3" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Margin", height: "100" },
                    model: {
                      value: _vm.margin,
                      callback: function($$v) {
                        _vm.margin = $$v
                      },
                      expression: "margin"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Max Loan with Collateral", height: "100" },
                    model: {
                      value: _vm.max_loan_wc,
                      callback: function($$v) {
                        _vm.max_loan_wc = $$v
                      },
                      expression: "max_loan_wc"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: {
                      label: "Max loan without collateral",
                      height: "100"
                    },
                    model: {
                      value: _vm.max_loan_woc,
                      callback: function($$v) {
                        _vm.max_loan_woc = $$v
                      },
                      expression: "max_loan_woc"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-3" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Processing Fee", height: "100" },
                    model: {
                      value: _vm.processing_fee,
                      callback: function($$v) {
                        _vm.processing_fee = $$v
                      },
                      expression: "processing_fee"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Repayment Period", height: "100" },
                    model: {
                      value: _vm.repayment_period,
                      callback: function($$v) {
                        _vm.repayment_period = $$v
                      },
                      expression: "repayment_period"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Loan for Top Institution", height: "100" },
                    model: {
                      value: _vm.loan_institution,
                      callback: function($$v) {
                        _vm.loan_institution = $$v
                      },
                      expression: "loan_institution"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-3" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: {
                      label: "Eligibility concession for SC/ST",
                      height: "100"
                    },
                    model: {
                      value: _vm.eligibility_concession,
                      callback: function($$v) {
                        _vm.eligibility_concession = $$v
                      },
                      expression: "eligibility_concession"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Prepayment charges", height: "100" },
                    model: {
                      value: _vm.prepayment_charges,
                      callback: function($$v) {
                        _vm.prepayment_charges = $$v
                      },
                      expression: "prepayment_charges"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Bank transfter allowance", height: "100" },
                    model: {
                      value: _vm.bank_transfer,
                      callback: function($$v) {
                        _vm.bank_transfer = $$v
                      },
                      expression: "bank_transfer"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-3" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Top up loan availability", height: "100" },
                    model: {
                      value: _vm.top_loan_availability,
                      callback: function($$v) {
                        _vm.top_loan_availability = $$v
                      },
                      expression: "top_loan_availability"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Interest Subsidy Schemes", height: "100" },
                    model: {
                      value: _vm.interest_schemes,
                      callback: function($$v) {
                        _vm.interest_schemes = $$v
                      },
                      expression: "interest_schemes"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mb-2" },
                [
                  _c("vs-textarea", {
                    attrs: { label: "Concession/benefits", height: "100" },
                    model: {
                      value: _vm.concession_benefit,
                      callback: function($$v) {
                        _vm.concession_benefit = $$v
                      },
                      expression: "concession_benefit"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mt-4" }, [
              _c(
                "div",
                { staticClass: "vx-col w-full mb-2" },
                [
                  _c(
                    "vs-button",
                    {
                      staticStyle: { float: "right", width: "15%" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.addRoom($event)
                        }
                      }
                    },
                    [_vm._v("Submit")]
                  )
                ],
                1
              )
            ])
          ],
          1
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/list.vue?vue&type=template&id=634f3477&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/bank/list.vue?vue&type=template&id=634f3477& ***!
  \***********************************************************************************************************************************************************************************************************/
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
        _c("vs-button", {
          staticClass: "mb-3 float-right",
          attrs: { color: _vm.addNew ? "danger" : "success", type: "gradient" },
          domProps: { textContent: _vm._s(_vm.addNew ? "Close" : "Add New") },
          on: { click: _vm.addNewData }
        })
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-col w-full" },
      [
        _c(
          "transition",
          { attrs: { name: "fade", mode: "out-in" } },
          [
            _vm.addNew
              ? _c("add-data")
              : _c(
                  "vx-card",
                  { attrs: { title: "Banks List" } },
                  [
                    _c(
                      "vs-table",
                      {
                        attrs: {
                          data: _vm.props,
                          pagination: "",
                          "max-items": "5",
                          search: ""
                        },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(ref) {
                              var data = ref.data
                              return _vm._l(data, function(tr, indextr) {
                                return _c(
                                  "vs-tr",
                                  { key: indextr },
                                  [
                                    _c("vs-td", { attrs: { data: tr.name } }, [
                                      _vm._v(
                                        "\n                                " +
                                          _vm._s(tr.name) +
                                          "\n                            "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "vs-td",
                                      { attrs: { data: tr.short_name } },
                                      [
                                        _vm._v(
                                          "\n                                " +
                                            _vm._s(tr.short_name) +
                                            "\n                            "
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "vs-td",
                                      { attrs: { data: tr.created_at } },
                                      [
                                        _vm._v(
                                          "\n                                " +
                                            _vm._s(tr.created_at) +
                                            "\n                            "
                                        )
                                      ]
                                    )
                                  ],
                                  1
                                )
                              })
                            }
                          }
                        ])
                      },
                      [
                        _c(
                          "template",
                          { slot: "thead" },
                          [
                            _c("vs-th", [_vm._v("Name")]),
                            _vm._v(" "),
                            _c("vs-th", [_vm._v("Short Name")]),
                            _vm._v(" "),
                            _c("vs-th", [_vm._v("Added On")])
                          ],
                          1
                        )
                      ],
                      2
                    )
                  ],
                  1
                )
          ],
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/bank/add.vue":
/*!*********************************************!*\
  !*** ./resources/js/src/views/bank/add.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_vue_vue_type_template_id_27721658_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add.vue?vue&type=template&id=27721658&scoped=true& */ "./resources/js/src/views/bank/add.vue?vue&type=template&id=27721658&scoped=true&");
/* harmony import */ var _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./add.vue?vue&type=script&lang=js& */ "./resources/js/src/views/bank/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _add_vue_vue_type_style_index_0_id_27721658_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css& */ "./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css&");
/* harmony import */ var _add_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./add.vue?vue&type=style&index=1&lang=css& */ "./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");







/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_4__["default"])(
  _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _add_vue_vue_type_template_id_27721658_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _add_vue_vue_type_template_id_27721658_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "27721658",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/bank/add.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/bank/add.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/src/views/bank/add.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css& ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_0_id_27721658_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=0&id=27721658&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_0_id_27721658_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_0_id_27721658_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_0_id_27721658_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_0_id_27721658_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css&":
/*!******************************************************************************!*\
  !*** ./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css& ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=style&index=1&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=style&index=1&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/src/views/bank/add.vue?vue&type=template&id=27721658&scoped=true&":
/*!****************************************************************************************!*\
  !*** ./resources/js/src/views/bank/add.vue?vue&type=template&id=27721658&scoped=true& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_27721658_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=template&id=27721658&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/add.vue?vue&type=template&id=27721658&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_27721658_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_27721658_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/src/views/bank/list.vue":
/*!**********************************************!*\
  !*** ./resources/js/src/views/bank/list.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _list_vue_vue_type_template_id_634f3477___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./list.vue?vue&type=template&id=634f3477& */ "./resources/js/src/views/bank/list.vue?vue&type=template&id=634f3477&");
/* harmony import */ var _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list.vue?vue&type=script&lang=js& */ "./resources/js/src/views/bank/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _list_vue_vue_type_template_id_634f3477___WEBPACK_IMPORTED_MODULE_0__["render"],
  _list_vue_vue_type_template_id_634f3477___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/bank/list.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/bank/list.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/src/views/bank/list.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/bank/list.vue?vue&type=template&id=634f3477&":
/*!*****************************************************************************!*\
  !*** ./resources/js/src/views/bank/list.vue?vue&type=template&id=634f3477& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_634f3477___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=template&id=634f3477& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/bank/list.vue?vue&type=template&id=634f3477&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_634f3477___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_634f3477___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);