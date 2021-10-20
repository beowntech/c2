(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[163],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/scholarship/scholar.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/scholarship/scholar.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
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
//
//
//
//
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
      content: "",
      addSelected: false,
      scholar: []
    };
  },
  methods: {
    addScholarChange: function addScholarChange(val) {
      if (val == 1) {
        this.addSelected = true;
      } else {
        this.addSelected = false;
      }
    },
    addScholar: function addScholar() {
      var _this = this;

      this.$vs.loading();
      var fd = new FormData();
      fd.append("text", this.content);
      fd.append("prop", localStorage.getItem('globalIns'));
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/scholarship/add', fd).then(function (res) {
        _this.alert('Scholarship Added Successfully', '', 'green');

        _this.$vs.loading.close();

        _this.getScholars();
      }).catch(function (err) {
        _this.$vs.loading.close();

        _this.alert('Error Adding Scholarship', 'There is Some Problem While Adding Scholarship', 'red');

        console.log(err);
      });
    },
    getScholars: function getScholars() {
      var _this2 = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/scholarship/get?prop=' + localStorage.getItem('globalIns')).then(function (res) {
        _this2.scholar = res.data;

        _this2.$vs.loading.close();
      }).catch(function (err) {
        _this2.$vs.loading.close();

        _this2.alert('Error Adding Scholarship', 'There is Some Problem While Adding Scholarship', 'red');

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
  filters: {
    strippedContent: function strippedContent(string) {
      return string.replace(/<\/?[^>]+>/ig, " ").substring(0, 20);
    }
  },
  components: {
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_4__["quillEditor"]
  },
  beforeMount: function beforeMount() {
    this.getScholars();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/scholarship/scholar.vue?vue&type=template&id=304e565f&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/scholarship/scholar.vue?vue&type=template&id=304e565f&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
        _vm.addSelected
          ? _c(
              "vs-button",
              {
                staticStyle: { float: "right" },
                attrs: {
                  color: "danger",
                  type: "gradient",
                  "icon-pack": "feather",
                  icon: "icon-x"
                },
                on: {
                  click: function($event) {
                    return _vm.addScholarChange(0)
                  }
                }
              },
              [_vm._v(" Close")]
            )
          : _c(
              "vs-button",
              {
                staticStyle: { float: "right" },
                attrs: {
                  color: "success",
                  type: "gradient",
                  "icon-pack": "feather",
                  icon: "icon-plus"
                },
                on: {
                  click: function($event) {
                    return _vm.addScholarChange(1)
                  }
                }
              },
              [_vm._v(" Add Scholarship")]
            )
      ],
      1
    ),
    _vm._v(" "),
    _vm.addSelected
      ? _c(
          "div",
          { staticClass: "vx-col w-full mb-base" },
          [
            _c("vx-card", { attrs: { title: "Add Scholarship" } }, [
              _c("div", { staticClass: "vx-row md-6" }, [
                _c(
                  "div",
                  { staticClass: "vx-col w-full" },
                  [
                    _c("quill-editor", {
                      model: {
                        value: _vm.content,
                        callback: function($$v) {
                          _vm.content = $$v
                        },
                        expression: "content"
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
                        on: { click: _vm.addScholar }
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
      : _c(
          "div",
          { staticClass: "vx-col w-full mb-base" },
          [
            _c(
              "vx-card",
              { attrs: { title: "ScholarShip List" } },
              [
                _c(
                  "vs-table",
                  {
                    attrs: {
                      data: _vm.scholar,
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
                                _c("vs-td", { attrs: { data: indextr + 1 } }, [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(indextr + 1) +
                                      "\n                        "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.content } }, [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(
                                        _vm._f("strippedContent")(tr.content)
                                      ) +
                                      "\n                        "
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "vs-td",
                                  { attrs: { data: tr.statuse[0].name } },
                                  [
                                    _vm._v(
                                      "\n                            " +
                                        _vm._s(tr.statuse[0].name) +
                                        "\n                        "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "vs-td",
                                  { staticClass: "whitespace-no-wrap" },
                                  [
                                    _c("feather-icon", {
                                      attrs: {
                                        icon: "EditIcon",
                                        svgClasses:
                                          "w-5 h-5 hover:text-primary stroke-current"
                                      },
                                      on: {
                                        click: function($event) {
                                          $event.stopPropagation()
                                          return _vm.editData(tr.id)
                                        }
                                      }
                                    })
                                  ],
                                  1
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
                        _c("vs-th", [_vm._v("Id")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Content")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Status")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Actions")])
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
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/scholarship/scholar.vue":
/*!********************************************************!*\
  !*** ./resources/js/src/views/scholarship/scholar.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scholar_vue_vue_type_template_id_304e565f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scholar.vue?vue&type=template&id=304e565f&scoped=true& */ "./resources/js/src/views/scholarship/scholar.vue?vue&type=template&id=304e565f&scoped=true&");
/* harmony import */ var _scholar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scholar.vue?vue&type=script&lang=js& */ "./resources/js/src/views/scholarship/scholar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _scholar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _scholar_vue_vue_type_template_id_304e565f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _scholar_vue_vue_type_template_id_304e565f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "304e565f",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/scholarship/scholar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/scholarship/scholar.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/views/scholarship/scholar.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_scholar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./scholar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/scholarship/scholar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_scholar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/scholarship/scholar.vue?vue&type=template&id=304e565f&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/src/views/scholarship/scholar.vue?vue&type=template&id=304e565f&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_scholar_vue_vue_type_template_id_304e565f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./scholar.vue?vue&type=template&id=304e565f&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/scholarship/scholar.vue?vue&type=template&id=304e565f&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_scholar_vue_vue_type_template_id_304e565f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_scholar_vue_vue_type_template_id_304e565f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);