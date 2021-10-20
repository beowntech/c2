(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[166],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/disclaimer.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/static-template/disclaimer.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _seo_SeoComponent_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./seo/SeoComponent.vue */ "./resources/js/src/views/static-template/seo/SeoComponent.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// require styles






/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      content: "Write Disclaimer Here",
      seoShow: false,
      seoData: null,
      pageId: 0
    };
  },
  components: {
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_3__["quillEditor"],
    SeoComponent: _seo_SeoComponent_vue__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  methods: {
    openSEO: function openSEO() {
      this.seoData = this.pageId;
      this.seoShow = true;
      this.$vs.loading();
    },
    updatePrivacy: function updatePrivacy() {
      axios__WEBPACK_IMPORTED_MODULE_4___default.a.post('/api/pages/update', {
        type: "disclaimer",
        disclaimer: this.content
      }).then(function (res) {
        alert(res.data);
        window.location.reload();
      }).catch(function (err) {
        console.log(err);
      });
    },
    getContent: function getContent() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_4___default.a.get('/api/pages/all?type=disclaimer').then(function (res) {
        _this.content = res.data[0]['content'];
        _this.pageId = res.data[0]['id'];
      }).catch(function (err) {
        console.log(err);
      });
    }
  },
  beforeMount: function beforeMount() {
    this.getContent();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/disclaimer.vue?vue&type=template&id=5b7d3a7b&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/static-template/disclaimer.vue?vue&type=template&id=5b7d3a7b& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "vx-row" }, [
        _c(
          "div",
          { staticClass: "vx-col mb-3", staticStyle: { float: "right" } },
          [
            _vm.seoShow
              ? _c(
                  "vs-button",
                  {
                    staticStyle: { float: "right" },
                    attrs: { color: "red" },
                    on: {
                      click: function($event) {
                        _vm.seoShow = false
                      }
                    }
                  },
                  [_vm._v("Close SEO\n                Settings\n            ")]
                )
              : _c(
                  "vs-button",
                  {
                    staticStyle: { float: "right" },
                    attrs: { color: "green" },
                    on: { click: _vm.openSEO }
                  },
                  [_vm._v("SEO Settings")]
                )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("seo-component", {
        staticClass: "mt-3 mb-3",
        attrs: { isSEOActive: _vm.seoShow, seoId: _vm.seoData }
      }),
      _vm._v(" "),
      _c(
        "vx-card",
        [
          _c("quill-editor", {
            model: {
              value: _vm.content,
              callback: function($$v) {
                _vm.content = $$v
              },
              expression: "content"
            }
          }),
          _vm._v(" "),
          _c("vs-button", { on: { click: _vm.updatePrivacy } }, [
            _vm._v("Submit")
          ])
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/static-template/disclaimer.vue":
/*!***************************************************************!*\
  !*** ./resources/js/src/views/static-template/disclaimer.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _disclaimer_vue_vue_type_template_id_5b7d3a7b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./disclaimer.vue?vue&type=template&id=5b7d3a7b& */ "./resources/js/src/views/static-template/disclaimer.vue?vue&type=template&id=5b7d3a7b&");
/* harmony import */ var _disclaimer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./disclaimer.vue?vue&type=script&lang=js& */ "./resources/js/src/views/static-template/disclaimer.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _disclaimer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _disclaimer_vue_vue_type_template_id_5b7d3a7b___WEBPACK_IMPORTED_MODULE_0__["render"],
  _disclaimer_vue_vue_type_template_id_5b7d3a7b___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/static-template/disclaimer.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/static-template/disclaimer.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/src/views/static-template/disclaimer.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_disclaimer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./disclaimer.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/disclaimer.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_disclaimer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/static-template/disclaimer.vue?vue&type=template&id=5b7d3a7b&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/src/views/static-template/disclaimer.vue?vue&type=template&id=5b7d3a7b& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_disclaimer_vue_vue_type_template_id_5b7d3a7b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./disclaimer.vue?vue&type=template&id=5b7d3a7b& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/static-template/disclaimer.vue?vue&type=template&id=5b7d3a7b&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_disclaimer_vue_vue_type_template_id_5b7d3a7b___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_disclaimer_vue_vue_type_template_id_5b7d3a7b___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);