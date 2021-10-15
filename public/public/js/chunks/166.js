(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[166],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/landing-page.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/static-template/landing-page.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "seo",
  props: {
    isSEOActive: {
      type: Boolean,
      required: true
    },
    seoId: null
  },
  computed: {
    isSeoActiveLocal: {
      get: function get() {
        return this.isSEOActive;
      },
      set: function set(val) {
        if (!val) {
          // this.$emit('closeSEO')
          this.title = "";
          this.slug = "";
          this.author = "";
          this.canonical = "";
          this.focusK = "";
          this.description = "";
          this.scheme = "";
        }
      }
    }
  },
  watch: {
    isSEOActive: function isSEOActive(val) {
      if (!val) return;

      if (this.seoId == null) {
        this.initValues();
        this.$validator.reset();
      } else {
        this.seoID = this.seoId;
        this.getData();
        this.initValues();
      } // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))

    }
  },
  data: function data() {
    return {
      seoID: null,
      title: "",
      slug: "",
      author: "",
      canonical: "",
      focusK: "",
      description: "",
      seo_id: null,
      readingTime: "",
      scheme: ""
    };
  },
  methods: {
    getData: function getData() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/pages/getSEO', {
        type: "home",
        page_id: this.seoId
      }).then(function (res) {
        console.log(res);
        _this.seoId = res.data.id;
        _this.title = res.data.seo[0].title;
        _this.slug = res.data.seo[0].permalink;
        _this.canonical = res.data.seo[0].canonical;
        _this.author = res.data.seo[0].author_name;
        _this.description = res.data.seo[0].description;
        _this.focusK = res.data.seo[0].primary_focus_keyword;
        _this.readingTime = res.data.seo[0].estimated_reading_time_minutes;
        _this.scheme = res.data.seo[0].json_schema;

        _this.$vs.loading.close();
      }).catch(function (err) {
        _this.$vs.loading.close();

        console.log(err);
      });
    },
    updateData: function updateData() {
      var _this2 = this;

      console.log(this.seoId);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/pages/updateSEO', {
        title: this.title,
        slug: this.slug,
        canonical: this.canonical,
        author: this.author,
        description: this.description,
        focus: this.focusK,
        page_id: this.seoId,
        schema: this.scheme
      }).then(function (res) {
        _this2.alert('SEO Details Updated', 'SEO Details Update Successfully', 'green');

        console.log(res);
      }).catch(function (err) {
        console.log(err);
      });
    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: 'bottom-right'
      });
    }
  },
  beforeMount: function beforeMount() {
    this.$vs.loading();
    this.getData();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/landing-page.vue?vue&type=template&id=066b6e65&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/static-template/landing-page.vue?vue&type=template&id=066b6e65&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "vx-col w-full mb-base" },
    [
      _c("vx-card", { attrs: { title: "Landing Page SEO Settings" } }, [
        _c("div", { staticClass: "vx-row" }, [
          _c(
            "div",
            { staticClass: "vx-col sm:w-1/2 w-full mb-2" },
            [
              _c("vs-input", {
                staticClass: "w-full",
                attrs: { "label-placeholder": "Title" },
                model: {
                  value: _vm.title,
                  callback: function($$v) {
                    _vm.title = $$v
                  },
                  expression: "title"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "vx-col sm:w-1/2 w-full mb-2" },
            [
              _c("vs-input", {
                staticClass: "w-full",
                attrs: { "label-placeholder": "Slug" },
                model: {
                  value: _vm.slug,
                  callback: function($$v) {
                    _vm.slug = $$v
                  },
                  expression: "slug"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "vx-row" }, [
          _c(
            "div",
            { staticClass: "vx-col sm:w-1/2 w-full mb-2" },
            [
              _c("vs-input", {
                staticClass: "w-full",
                attrs: { "label-placeholder": "Canonical" },
                model: {
                  value: _vm.canonical,
                  callback: function($$v) {
                    _vm.canonical = $$v
                  },
                  expression: "canonical"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "vx-col sm:w-1/2 w-full mb-2" },
            [
              _c("vs-input", {
                staticClass: "w-full",
                attrs: { "label-placeholder": "Primary Focus Keyword" },
                model: {
                  value: _vm.focusK,
                  callback: function($$v) {
                    _vm.focusK = $$v
                  },
                  expression: "focusK"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "vx-row" }, [
          _c(
            "div",
            { staticClass: "vx-col sm:w-1/2 w-full mb-6" },
            [
              _c("vs-input", {
                staticClass: "w-full",
                attrs: { "label-placeholder": "Reading Time" },
                model: {
                  value: _vm.readingTime,
                  callback: function($$v) {
                    _vm.readingTime = $$v
                  },
                  expression: "readingTime"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "vx-row" }, [
          _c(
            "div",
            { staticClass: "vx-col  w-full mb-6" },
            [
              _c("vs-textarea", {
                attrs: { label: "Description" },
                model: {
                  value: _vm.description,
                  callback: function($$v) {
                    _vm.description = $$v
                  },
                  expression: "description"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "vx-row" }, [
          _c(
            "div",
            { staticClass: "vx-col  w-full mb-6" },
            [
              _c("vs-textarea", {
                attrs: { label: "JSON Schema" },
                model: {
                  value: _vm.scheme,
                  callback: function($$v) {
                    _vm.scheme = $$v
                  },
                  expression: "scheme"
                }
              })
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "vx-row" }, [
          _c(
            "div",
            { staticClass: "vx-col w-full" },
            [
              _c(
                "vs-button",
                { staticClass: "mr-3 mb-2", on: { click: _vm.updateData } },
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
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/static-template/landing-page.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/src/views/static-template/landing-page.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _landing_page_vue_vue_type_template_id_066b6e65_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./landing-page.vue?vue&type=template&id=066b6e65&scoped=true& */ "./resources/js/src/views/static-template/landing-page.vue?vue&type=template&id=066b6e65&scoped=true&");
/* harmony import */ var _landing_page_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./landing-page.vue?vue&type=script&lang=js& */ "./resources/js/src/views/static-template/landing-page.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _landing_page_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _landing_page_vue_vue_type_template_id_066b6e65_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _landing_page_vue_vue_type_template_id_066b6e65_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "066b6e65",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/static-template/landing-page.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/static-template/landing-page.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/src/views/static-template/landing-page.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_landing_page_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./landing-page.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/landing-page.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_landing_page_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/static-template/landing-page.vue?vue&type=template&id=066b6e65&scoped=true&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/src/views/static-template/landing-page.vue?vue&type=template&id=066b6e65&scoped=true& ***!
  \************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_landing_page_vue_vue_type_template_id_066b6e65_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./landing-page.vue?vue&type=template&id=066b6e65&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/landing-page.vue?vue&type=template&id=066b6e65&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_landing_page_vue_vue_type_template_id_066b6e65_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_landing_page_vue_vue_type_template_id_066b6e65_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);