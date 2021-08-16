(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[151],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostel/hostel.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/hostel/hostel.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_4__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "AddTeachers.vue",
  data: function data() {
    return {
      image: null,
      boyFees: "",
      boyContent: "",
      girlFees: "",
      girlContent: ""
    };
  },
  methods: {
    addHostelBoy: function addHostelBoy() {
      var _this = this;

      var fd = new FormData();
      fd.append("boyF", this.boyFees);
      fd.append("boyC", this.boyContent);
      fd.append("type", 0);
      fd.append("prop", localStorage.getItem('globalIns'));
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/hostel/add', fd).then(function (res) {
        _this.alert('Hostels Content Updated Successfully', '', 'green');
      }).catch(function (err) {
        _this.alert('Hostels Not Updated', 'There is Some Problem Updating Hostel', 'red'); // this.$vs.loading.close();


        console.log(err);
      });
    },
    addHostelGirl: function addHostelGirl() {
      var _this2 = this;

      var fd = new FormData();
      fd.append("girlF", this.girlFees);
      fd.append("girlC", this.girlContent);
      fd.append("type", 1);
      fd.append("prop", localStorage.getItem('globalIns'));
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/hostel/add', fd).then(function (res) {
        _this2.alert('Hostels Content Updated Successfully', '', 'green');
      }).catch(function (err) {
        // this.$vs.loading.close();
        console.log(err);
      });
    },
    getHostel: function getHostel() {
      var _this3 = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/hostel/get?id=' + localStorage.getItem('globalIns')).then(function (res) {
        console.log(res);

        for (var i = 0; i < res.data.length; i++) {
          if (res.data[i]['male_female'] == 0) {
            _this3.boyContent = res.data[i]['html'];
            _this3.boyFees = res.data[i]['price'];
          } else {
            _this3.girlContent = res.data[i]['html'];
            _this3.girlFees = res.data[i]['price'];
          }
        }

        _this3.$vs.loading.close();
      }).catch(function (err) {
        // this.$vs.loading.close();
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
    }
  },
  components: {
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_4__["quillEditor"]
  },
  beforeMount: function beforeMount() {
    this.getHostel();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostel/hostel.vue?vue&type=template&id=c4dc3016&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/hostel/hostel.vue?vue&type=template&id=c4dc3016&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************/
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
      { staticClass: "vx-col w-full mb-base" },
      [
        _c("vx-card", { attrs: { title: "Boys Hostel" } }, [
          _c("div", { staticClass: "vx-row mb-6" }, [
            _c(
              "div",
              { staticClass: "vx-col sm:w-1/3 w-full" },
              [
                _c("vs-input", {
                  staticClass: "w-full",
                  attrs: { placeholder: "Fees in Rupees" },
                  model: {
                    value: _vm.boyFees,
                    callback: function($$v) {
                      _vm.boyFees = $$v
                    },
                    expression: "boyFees"
                  }
                })
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "vx-row md-6" }, [
            _c(
              "div",
              { staticClass: "vx-col w-full" },
              [
                _c("quill-editor", {
                  model: {
                    value: _vm.boyContent,
                    callback: function($$v) {
                      _vm.boyContent = $$v
                    },
                    expression: "boyContent"
                  }
                })
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "vx-row mt-2" }, [
            _c(
              "div",
              { staticClass: "vx-col w-full ml-auto" },
              [
                _c(
                  "vs-button",
                  {
                    staticClass: "mr-3 mb-2 float-right",
                    on: { click: _vm.addHostelBoy }
                  },
                  [_vm._v("Submit")]
                )
              ],
              1
            )
          ])
        ])
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-col w-full mb-base" },
      [
        _c("vx-card", { attrs: { title: "Girls Hostel" } }, [
          _c("div", { staticClass: "vx-row mb-6" }, [
            _c(
              "div",
              { staticClass: "vx-col sm:w-1/3 w-full" },
              [
                _c("vs-input", {
                  staticClass: "w-full",
                  attrs: { placeholder: "Fees in Rupees" },
                  model: {
                    value: _vm.girlFees,
                    callback: function($$v) {
                      _vm.girlFees = $$v
                    },
                    expression: "girlFees"
                  }
                })
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "vx-row md-6" }, [
            _c(
              "div",
              { staticClass: "vx-col w-full" },
              [
                _c("quill-editor", {
                  model: {
                    value: _vm.girlContent,
                    callback: function($$v) {
                      _vm.girlContent = $$v
                    },
                    expression: "girlContent"
                  }
                })
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "vx-row mt-2" }, [
            _c(
              "div",
              { staticClass: "vx-col w-full ml-auto" },
              [
                _c(
                  "vs-button",
                  {
                    staticClass: "mr-3 mb-2 float-right",
                    on: { click: _vm.addHostelGirl }
                  },
                  [_vm._v("Submit")]
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

/***/ "./resources/js/src/views/hostel/hostel.vue":
/*!**************************************************!*\
  !*** ./resources/js/src/views/hostel/hostel.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _hostel_vue_vue_type_template_id_c4dc3016_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./hostel.vue?vue&type=template&id=c4dc3016&scoped=true& */ "./resources/js/src/views/hostel/hostel.vue?vue&type=template&id=c4dc3016&scoped=true&");
/* harmony import */ var _hostel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./hostel.vue?vue&type=script&lang=js& */ "./resources/js/src/views/hostel/hostel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _hostel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _hostel_vue_vue_type_template_id_c4dc3016_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _hostel_vue_vue_type_template_id_c4dc3016_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "c4dc3016",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/hostel/hostel.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/hostel/hostel.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/src/views/hostel/hostel.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_hostel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./hostel.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostel/hostel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_hostel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/hostel/hostel.vue?vue&type=template&id=c4dc3016&scoped=true&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/src/views/hostel/hostel.vue?vue&type=template&id=c4dc3016&scoped=true& ***!
  \*********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_hostel_vue_vue_type_template_id_c4dc3016_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./hostel.vue?vue&type=template&id=c4dc3016&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostel/hostel.vue?vue&type=template&id=c4dc3016&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_hostel_vue_vue_type_template_id_c4dc3016_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_hostel_vue_vue_type_template_id_c4dc3016_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);