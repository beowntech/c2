(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[172],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/testimonial/index.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/testimonial/index.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      selected: [],
      fileName: "",
      image: null,
      userName: "",
      propertyName: "",
      content: "",
      formats: ["xlsx", "csv", "txt"],
      cellAutoWidth: true,
      selectedFormat: "xlsx",
      headerTitle: ["User", "Stars", "Porperty", "No. Of Traveller"],
      headerVal: ["name", "email", "contact", "no_traveller"],
      'tableList': ['vs-th: Component', 'vs-tr: Component', 'vs-td: Component', 'thread: Slot', 'tbody: Slot', 'header: Slot'],
      enquiry: [],
      updateselected: [],
      activePrompt: false,
      status: []
    };
  },
  methods: {
    getEnquiry: function getEnquiry() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/testimonials/list').then(function (res) {
        console.log(res);
        _this.enquiry = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    createTestimonial: function createTestimonial() {
      var _this2 = this;

      var formData = new FormData();
      formData.append('image', this.image);
      formData.append('user', this.userName);
      formData.append('property', this.propertyName);
      formData.append('text', this.content);
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/testimonial/add', formData, {
        headers: {
          'Content-Type': 'multipart/form-data;'
        }
      }).then(function (res) {
        _this2.getEnquiry();

        _this2.alert('Testimonial Added Successfully', '', 'green');
      }).catch(function (err) {
        console.log(err);
      });
    },
    exportToExcel: function exportToExcel() {
      var _this3 = this;

      Promise.all(/*! import() */[__webpack_require__.e(3), __webpack_require__.e(11)]).then(__webpack_require__.bind(null, /*! @/vendor/Export2Excel */ "./resources/js/src/vendor/Export2Excel.js")).then(function (excel) {
        var list = _this3.enquiry;

        var data = _this3.formatJson(_this3.headerVal, list);

        excel.export_json_to_excel({
          header: _this3.headerTitle,
          data: data,
          filename: _this3.fileName,
          autoWidth: _this3.cellAutoWidth,
          bookType: _this3.selectedFormat
        });

        _this3.clearFields();
      });
    },
    formatJson: function formatJson(filterVal, jsonData) {
      return jsonData.map(function (v) {
        return filterVal.map(function (j) {
          // Add col name which needs to be translated
          // if (j === 'timestamp') {
          //   return parseTime(v[j])
          // } else {
          //   return v[j]
          // }
          return v[j];
        });
      });
    },
    getStatus: function getStatus() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/status/all').then(function (res) {
        console.log(res);
        _this4.status = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateStatus: function updateStatus(data, id) {
      var _this5 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/testimonial/update', {
        status: data.id,
        id: id
      }).then(function (res) {
        _this5.alert('Status Updated Successfully!', 'Testimonial Status Updated Successfully!', 'success');

        window.location.reload();
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
    showImage: function showImage(e) {
      this.image = e.target.files[0];
    },
    clearFields: function clearFields() {
      this.filename = "", this.cellAutoWidth = true, this.selectedFormat = "xlsx";
    }
  },
  beforeMount: function beforeMount() {
    this.getEnquiry();
    this.getStatus();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/testimonial/index.vue?vue&type=template&id=885bd670&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/testimonial/index.vue?vue&type=template&id=885bd670& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
    { attrs: { title: "Testimonials" } },
    [
      _c(
        "vs-prompt",
        {
          staticClass: "export-options",
          attrs: {
            title: "Add Testimonial",
            "accept-text": "ADD",
            active: _vm.activePrompt
          },
          on: {
            cancle: _vm.clearFields,
            accept: _vm.createTestimonial,
            close: _vm.clearFields,
            "update:active": function($event) {
              _vm.activePrompt = $event
            }
          }
        },
        [
          _c("vs-input", {
            staticStyle: { width: "100%" },
            attrs: { type: "file" },
            on: { change: _vm.showImage }
          }),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c("vs-input", {
            staticClass: "w-full",
            attrs: { placeholder: "Enter User Name.." },
            model: {
              value: _vm.userName,
              callback: function($$v) {
                _vm.userName = $$v
              },
              expression: "userName"
            }
          }),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c("vs-input", {
            staticClass: "w-full",
            attrs: { placeholder: "Enter College Name.." },
            model: {
              value: _vm.propertyName,
              callback: function($$v) {
                _vm.propertyName = $$v
              },
              expression: "propertyName"
            }
          }),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c("vs-textarea", {
            staticClass: "w-full",
            attrs: { rows: "6", placeholder: "Enter Testimonial Content" },
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
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "export-table" },
        [
          _c(
            "vs-table",
            {
              attrs: {
                pagination: "",
                "max-items": "10",
                search: "",
                data: _vm.enquiry
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
                          _c(
                            "vs-td",
                            { attrs: { data: data[indextr].user_name } },
                            [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(data[indextr].user_name) +
                                  "\n                    "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            { attrs: { data: data[indextr].property_name } },
                            [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(data[indextr].property_name) +
                                  "\n                    "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            { attrs: { data: data[indextr].image } },
                            [
                              _c(
                                "a",
                                {
                                  attrs: {
                                    href: /testimonials/ + data[indextr].image,
                                    target: "_blank"
                                  }
                                },
                                [_vm._v("Open Image")]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            { attrs: { data: data[indextr].content } },
                            [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(data[indextr].content) +
                                  "\n                    "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            { attrs: { data: tr.stat[0].color } },
                            [
                              _c(
                                "vs-chip",
                                {
                                  staticClass: "product-order-status",
                                  attrs: { color: tr.stat[0].color }
                                },
                                [_vm._v(_vm._s(tr.stat[0].name))]
                              ),
                              _vm._v(" "),
                              _c(
                                "template",
                                { slot: "edit" },
                                [
                                  _c(
                                    "vs-select",
                                    {
                                      staticClass: "select-large",
                                      on: {
                                        input: function($event) {
                                          return _vm.updateStatus(
                                            _vm.updateselected,
                                            data[indextr].id
                                          )
                                        }
                                      },
                                      model: {
                                        value: (_vm.updateselected =
                                          tr.stat[0].id),
                                        callback: function($$v) {
                                          _vm.$set(
                                            (_vm.updateselected = tr.stat[0]),
                                            "id",
                                            $$v
                                          )
                                        },
                                        expression:
                                          "updateselected = tr.stat[0].id"
                                      }
                                    },
                                    _vm._l(_vm.status, function(status, index) {
                                      return _c("vs-select-item", {
                                        key: index,
                                        staticClass: "w-full",
                                        attrs: {
                                          value: status.id,
                                          text: status.name
                                        }
                                      })
                                    }),
                                    1
                                  )
                                ],
                                1
                              )
                            ],
                            2
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
                { slot: "header" },
                [
                  _c(
                    "vs-button",
                    {
                      staticClass: "float-right",
                      on: {
                        click: function($event) {
                          _vm.activePrompt = true
                        }
                      }
                    },
                    [_vm._v("Add New")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "template",
                { slot: "thead" },
                [
                  _c("vs-th", { attrs: { "sort-key": "image" } }, [
                    _vm._v("Image")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "User" } }, [
                    _vm._v("User")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "User" } }, [
                    _vm._v("Property")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "content" } }, [
                    _vm._v("Content")
                  ]),
                  _vm._v(" "),
                  _c("vs-th", { attrs: { "sort-key": "id" } }, [
                    _vm._v("Status")
                  ])
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

/***/ "./resources/js/src/views/testimonial/index.vue":
/*!******************************************************!*\
  !*** ./resources/js/src/views/testimonial/index.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_885bd670___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=885bd670& */ "./resources/js/src/views/testimonial/index.vue?vue&type=template&id=885bd670&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/src/views/testimonial/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_885bd670___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_885bd670___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/testimonial/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/testimonial/index.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/src/views/testimonial/index.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/testimonial/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/testimonial/index.vue?vue&type=template&id=885bd670&":
/*!*************************************************************************************!*\
  !*** ./resources/js/src/views/testimonial/index.vue?vue&type=template&id=885bd670& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_885bd670___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=885bd670& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/testimonial/index.vue?vue&type=template&id=885bd670&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_885bd670___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_885bd670___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);