(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[158],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/information-form/index.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/information-form/index.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      selected: [],
      enquiries: [],
      count: 0
    };
  },
  methods: {
    toggleDataSidebar: function toggleDataSidebar() {
      var val = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      this.addNewDataSidebar = val;
    },
    getData: function getData() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/information-form/all').then(function (res) {
        console.log(res);
        _this.enquiries = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    }
  },
  beforeMount: function beforeMount() {
    this.getData();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/information-form/index.vue?vue&type=template&id=1d7bb692&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/information-form/index.vue?vue&type=template&id=1d7bb692& ***!
  \************************************************************************************************************************************************************************************************************************/
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
      _c(
        "vx-card",
        { attrs: { title: "Information Form Data" } },
        [
          _c(
            "vs-table",
            {
              attrs: {
                pagination: "",
                "max-items": "10",
                search: "",
                data: _vm.enquiries
              },
              scopedSlots: _vm._u([
                {
                  key: "default",
                  fn: function(ref) {
                    var data = ref.data
                    return _vm._l(data, function(tr, indextr) {
                      return _c(
                        "vs-tr",
                        { key: indextr, attrs: { data: tr } },
                        [
                          _c("vs-td", { attrs: { data: _vm.count } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(_vm.count + 1) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.name } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(tr.name) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.email } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(tr.email) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.contact } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(tr.contact) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.location } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(tr.location) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.course } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(tr.course) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.program_type } }, [
                            _vm._v(
                              "\n                        " +
                                _vm._s(tr.program_type) +
                                "\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.from_page } }, [
                            _c(
                              "a",
                              {
                                attrs: {
                                  href: "" + tr.from_page + "",
                                  target: "_blank"
                                }
                              },
                              [_vm._v(_vm._s(tr.from_page))]
                            )
                          ])
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
                  _c("vs-th", { attrs: { "sort-key": "sno" } }, [
                    _vm._v("Sno.")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "calls" } }, [
                    _vm._v("Name")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "time" } }, [
                    _vm._v("Email")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "time" } }, [
                    _vm._v("Location")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "time" } }, [
                    _vm._v("Contact")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "whatsapps" } }, [
                    _vm._v("Course")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "date" } }, [
                    _vm._v("Program")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "url" } }, [_vm._v("URL")])
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
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/information-form/index.vue":
/*!***********************************************************!*\
  !*** ./resources/js/src/views/information-form/index.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_1d7bb692___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=1d7bb692& */ "./resources/js/src/views/information-form/index.vue?vue&type=template&id=1d7bb692&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/src/views/information-form/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_1d7bb692___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_1d7bb692___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/information-form/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/information-form/index.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/src/views/information-form/index.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/information-form/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/information-form/index.vue?vue&type=template&id=1d7bb692&":
/*!******************************************************************************************!*\
  !*** ./resources/js/src/views/information-form/index.vue?vue&type=template&id=1d7bb692& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_1d7bb692___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=1d7bb692& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/information-form/index.vue?vue&type=template&id=1d7bb692&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_1d7bb692___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_1d7bb692___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);