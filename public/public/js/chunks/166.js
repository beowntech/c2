(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[166],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/search-ads/index.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/search-ads/index.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      topImage: null,
      bottomImage: null,
      topPreview: "",
      bottomPreview: "",
      topAd: {
        name: "",
        url: ""
      },
      bottomAd: {
        name: "",
        url: ""
      }
    };
  },
  methods: {
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: "top-right"
      });
    },
    getAds: function getAds() {
      var _this = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/api/ads/index").then(function (res) {
        console.log(res);

        for (var i = 0; i < res.data.length; i++) {
          if (res.data[i].position == "top") {
            _this.topPreview = "/ads/images/" + res.data[i].image;
            _this.topAd = JSON.parse(res.data[i].data);
            _this.topAd.id = res.data[i].id;
          }

          if (res.data[i].position == "bottom") {
            _this.bottomPreview = "/ads/images/" + res.data[i].image;
            _this.bottomAd = JSON.parse(res.data[i].data);
            _this.bottomAd.id = res.data[i].id;
          }
        }

        _this.$vs.loading.close();
      }).catch(function (err) {
        _this.$vs.loading.close();

        console.log(err);
      });
    },
    addTopAd: function addTopAd() {
      var _this2 = this;

      var bodyFormData = new FormData();
      bodyFormData.append("ad", JSON.stringify(this.topAd));
      bodyFormData.append("position", "top");

      if (Object.keys(this.topAd).includes('id')) {
        bodyFormData.append("id", this.topAd.id);
      }

      if (this.topImage != null) {
        bodyFormData.append("image", this.topImage);
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/ads/create", bodyFormData).then(function (res) {
        _this2.alert("Ad Updated Succesfully", "", "green");

        _this2.$vs.loading.close();
      }).catch(function (err) {
        _this2.$vs.loading.close();

        _this2.alert("Problem Adding Ad", "", "red");

        console.log(err);
      });
    },
    addBottomAd: function addBottomAd() {
      var _this3 = this;

      var bodyFormData = new FormData();
      bodyFormData.append("ad", JSON.stringify(this.bottomAd));
      bodyFormData.append("position", "bottom");

      if (Object.keys(this.bottomAd).includes('id')) {
        bodyFormData.append("id", this.bottomAd.id);
      }

      if (this.bottomImage != null) {
        bodyFormData.append("image", this.bottomImage);
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/ads/create", bodyFormData).then(function (res) {
        _this3.alert("Ad Updated Succesfully", "", "green");

        _this3.$vs.loading.close();
      }).catch(function (err) {
        _this3.$vs.loading.close();

        _this3.alert("Problem Adding Ad", "", "red");

        console.log(err);
      });
    },
    topImages: function topImages(e) {
      var file = e.target.files[0];
      this.topImage = file;
      this.topPreview = URL.createObjectURL(file);
    },
    bottomImages: function bottomImages(e) {
      var file = e.target.files[0];
      this.bottomImage = file;
      this.bottomPreview = URL.createObjectURL(file);
    }
  },
  mounted: function mounted() {
    this.getAds();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/search-ads/index.vue?vue&type=template&id=cbc74250&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/search-ads/index.vue?vue&type=template&id=cbc74250&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("div", { staticClass: "vx-row" }, [
      _c(
        "div",
        { staticClass: "vx-col w-full mb-base" },
        [
          _c("vx-card", { attrs: { title: "Top Ad" } }, [
            _c("div", { staticClass: "vx-row" }, [
              _c(
                "div",
                { staticClass: "vx-col w-full mb-base" },
                [
                  _vm.topPreview
                    ? _c("img", {
                        staticStyle: { "max-width": "40%" },
                        attrs: { src: _vm.topPreview }
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
                    ref: "uploadImgTop",
                    staticClass: "hidden",
                    attrs: { type: "file", name: "image", accept: "image/*" },
                    on: { change: _vm.topImages }
                  }),
                  _vm._v(" "),
                  _c(
                    "vs-button",
                    {
                      staticClass: "mt-3",
                      on: {
                        click: function($event) {
                          return _vm.$refs.uploadImgTop.click()
                        }
                      }
                    },
                    [_vm._v("Upload Image")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full md:w-1/2 mb-base" },
                [
                  _c("vs-input", {
                    staticStyle: { width: "100%" },
                    attrs: { placeholder: "Enter Ad Name" },
                    model: {
                      value: _vm.topAd.name,
                      callback: function($$v) {
                        _vm.$set(_vm.topAd, "name", $$v)
                      },
                      expression: "topAd.name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full md:w-1/2 mb-base" },
                [
                  _c("vs-input", {
                    staticStyle: { width: "100%" },
                    attrs: { placeholder: "Enter Full Url" },
                    model: {
                      value: _vm.topAd.url,
                      callback: function($$v) {
                        _vm.$set(_vm.topAd, "url", $$v)
                      },
                      expression: "topAd.url"
                    }
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
                    "vs-button",
                    {
                      staticStyle: { float: "right" },
                      attrs: { color: "primary" },
                      on: { click: _vm.addTopAd }
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
        { staticClass: "vx-col w-full" },
        [
          _c("vx-card", { attrs: { title: "Bottom Ad" } }, [
            _c("div", { staticClass: "vx-row" }, [
              _c(
                "div",
                { staticClass: "vx-col w-full mb-base" },
                [
                  _vm.bottomPreview
                    ? _c("img", {
                        staticStyle: { "max-width": "40%" },
                        attrs: { src: _vm.bottomPreview }
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
                    ref: "uploadImgBttom",
                    staticClass: "hidden",
                    attrs: { type: "file", name: "image", accept: "image/*" },
                    on: { change: _vm.bottomImages }
                  }),
                  _vm._v(" "),
                  _c(
                    "vs-button",
                    {
                      staticClass: "mt-3",
                      on: {
                        click: function($event) {
                          return _vm.$refs.uploadImgBttom.click()
                        }
                      }
                    },
                    [_vm._v("Upload Image")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full md:w-1/2 mb-base" },
                [
                  _c("vs-input", {
                    staticStyle: { width: "100%" },
                    attrs: { placeholder: "Enter Ad Name" },
                    model: {
                      value: _vm.bottomAd.name,
                      callback: function($$v) {
                        _vm.$set(_vm.bottomAd, "name", $$v)
                      },
                      expression: "bottomAd.name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full md:w-1/2 mb-base" },
                [
                  _c("vs-input", {
                    staticStyle: { width: "100%" },
                    attrs: { placeholder: "Enter Full Url" },
                    model: {
                      value: _vm.bottomAd.url,
                      callback: function($$v) {
                        _vm.$set(_vm.bottomAd, "url", $$v)
                      },
                      expression: "bottomAd.url"
                    }
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
                    "vs-button",
                    {
                      staticStyle: { float: "right" },
                      attrs: { color: "primary" },
                      on: { click: _vm.addBottomAd }
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
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/search-ads/index.vue":
/*!*****************************************************!*\
  !*** ./resources/js/src/views/search-ads/index.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_cbc74250_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=cbc74250&scoped=true& */ "./resources/js/src/views/search-ads/index.vue?vue&type=template&id=cbc74250&scoped=true&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/src/views/search-ads/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_cbc74250_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_cbc74250_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "cbc74250",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/search-ads/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/search-ads/index.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/src/views/search-ads/index.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/search-ads/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/search-ads/index.vue?vue&type=template&id=cbc74250&scoped=true&":
/*!************************************************************************************************!*\
  !*** ./resources/js/src/views/search-ads/index.vue?vue&type=template&id=cbc74250&scoped=true& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_cbc74250_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=cbc74250&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/search-ads/index.vue?vue&type=template&id=cbc74250&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_cbc74250_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_cbc74250_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);