(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[140],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/amenities/add.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/amenities/add.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      check1: '',
      name: '',
      subname: '',
      updateId: '',
      desc: '',
      color: '',
      selected: '',
      updateselected: '',
      parent: [],
      subParent: []
    };
  },
  methods: {
    addAmen: function addAmen() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/add', {
        name: this.name
      }).then(function (res) {
        if (res.data === 1) {
          alert("Added");

          _this.getAmen();

          _this.name = "";
        } else if (res.data === 2) {
          alert("Already Exist");
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    addSubAmen: function addSubAmen() {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/sub-add', {
        name: this.subname,
        parent: this.selected
      }).then(function (res) {
        if (res.data === 1) {
          alert("Added");
        } else if (res.data === 2) {
          alert("Already Exist");
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    getAmen: function getAmen() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/parent').then(function (res) {
        _this2.parent = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getSubAmen: function getSubAmen() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/subamen').then(function (res) {
        console.log(res.data);
        _this3.subParent = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    setSelected: function setSelected(value) {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/update', {
        id: value.id,
        parent: value.parent,
        type: 1
      }).then(function (res) {
        console.log(res);

        _this4.alert('Updated Successfully!', 'Parent Updated Successfully!', 'success');
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateAmen: function updateAmen(name, id) {
      var _this5 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/update', {
        id: id,
        name: name,
        type: 2
      }).then(function (res) {
        console.log(res);

        _this5.alert('Updated Successfully!', 'Name Updated Successfully!', 'success');
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateSubAmen: function updateSubAmen(name, id) {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/amenities/update', {
        id: id,
        name: name,
        type: 3
      }).then(function (res) {
        console.log(res);

        _this6.alert('Updated Successfully!', 'Sub Amenity Name Updated Successfully!', 'success');
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
    }
  },
  beforeMount: function beforeMount() {
    this.getAmen();
    this.getSubAmen();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/amenities/add.vue?vue&type=template&id=1129d88f&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/amenities/add.vue?vue&type=template&id=1129d88f& ***!
  \***************************************************************************************************************************************************************************************************************/
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
      { staticClass: "vx-col md:w-1/2 w-full mb-base" },
      [
        _c("vx-card", { attrs: { title: "Add Amenities" } }, [
          _c("div", { staticClass: "vx-row mb-6" }, [
            _c("div", { staticClass: "vx-col sm:w-1/3 w-full" }, [
              _c("span", [_vm._v("Name")])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "vx-col sm:w-2/3 w-full" },
              [
                _c("vs-input", {
                  staticClass: "w-full",
                  model: {
                    value: _vm.name,
                    callback: function($$v) {
                      _vm.name = $$v
                    },
                    expression: "name"
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
              { staticClass: "vx-col sm:w-2/3 w-full ml-auto" },
              [
                _c(
                  "vs-button",
                  { staticClass: "mr-3 mb-2", on: { click: _vm.addAmen } },
                  [_vm._v("Submit")]
                ),
                _vm._v(" "),
                _c(
                  "vs-button",
                  {
                    staticClass: "mb-2",
                    attrs: { color: "warning", type: "border" },
                    on: {
                      click: function($event) {
                        _vm.name = _vm.desc = _vm.color = ""
                        _vm.check1 = false
                      }
                    }
                  },
                  [_vm._v("Reset")]
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
      { staticClass: "vx-col md:w-1/2 w-full mb-base" },
      [
        _c("vx-card", { attrs: { title: "Add Sub Amenities" } }, [
          _c("div", { staticClass: "vx-row mb-6" }, [
            _c("div", { staticClass: "vx-col sm:w-1/3 w-full" }, [
              _c("span", [_vm._v("Parent")])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "vx-col sm:w-2/3 w-full" },
              [
                _c(
                  "vs-select",
                  {
                    staticClass: "w-full select-large",
                    model: {
                      value: _vm.selected,
                      callback: function($$v) {
                        _vm.selected = $$v
                      },
                      expression: "selected"
                    }
                  },
                  _vm._l(_vm.parent, function(parent, index) {
                    return _c("vs-select-item", {
                      key: index,
                      staticClass: "w-full",
                      attrs: { value: parent.id, text: parent.name }
                    })
                  }),
                  1
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "vx-row mb-6" }, [
            _c("div", { staticClass: "vx-col sm:w-1/3 w-full" }, [
              _c("span", [_vm._v("Name")])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "vx-col sm:w-2/3 w-full" },
              [
                _c("vs-input", {
                  staticClass: "w-full",
                  model: {
                    value: _vm.subname,
                    callback: function($$v) {
                      _vm.subname = $$v
                    },
                    expression: "subname"
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
              { staticClass: "vx-col sm:w-2/3 w-full ml-auto" },
              [
                _c(
                  "vs-button",
                  { staticClass: "mr-3 mb-2", on: { click: _vm.addSubAmen } },
                  [_vm._v("Submit")]
                ),
                _vm._v(" "),
                _c(
                  "vs-button",
                  {
                    staticClass: "mb-2",
                    attrs: { color: "warning", type: "border" },
                    on: {
                      click: function($event) {
                        _vm.name = _vm.desc = _vm.color = ""
                        _vm.check1 = false
                      }
                    }
                  },
                  [_vm._v("Reset")]
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
      { staticClass: "vx-col md:w-1/2 w-full mb-base" },
      [
        _c(
          "vx-card",
          { attrs: { title: "Amenities" } },
          [
            _c(
              "vs-table",
              {
                attrs: {
                  search: "",
                  data: _vm.parent,
                  pagination: "",
                  "max-items": "5"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(ref) {
                      var data = ref.data
                      return _vm._l(data, function(parent, indextr) {
                        return _c(
                          "vs-tr",
                          { key: indextr },
                          [
                            _c("vs-td", { attrs: { data: data[indextr].id } }, [
                              _vm._v(
                                "\n                                " +
                                  _vm._s(data[indextr].id) +
                                  "\n                            "
                              )
                            ]),
                            _vm._v(" "),
                            _c(
                              "vs-td",
                              { attrs: { data: data[indextr].name } },
                              [
                                _vm._v(
                                  "\n                                " +
                                    _vm._s(data[indextr].name) +
                                    "\n                                "
                                ),
                                _c(
                                  "template",
                                  { slot: "edit" },
                                  [
                                    _c("vs-input", {
                                      model: {
                                        value: data[indextr].name,
                                        callback: function($$v) {
                                          _vm.$set(data[indextr], "name", $$v)
                                        },
                                        expression: "data[indextr].name"
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "vs-button",
                                      {
                                        on: {
                                          click: function($event) {
                                            return _vm.updateAmen(
                                              data[indextr].name,
                                              data[indextr].id
                                            )
                                          }
                                        }
                                      },
                                      [_vm._v("Update")]
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
                  { slot: "thead" },
                  [
                    _c("vs-th", { attrs: { "sort-key": "sno" } }, [
                      _vm._v("Sno")
                    ]),
                    _vm._v(" "),
                    _c("vs-th", { attrs: { "sort-key": "name" } }, [
                      _vm._v("Name")
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
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-col md:w-1/2 w-full mb-base" },
      [
        _c(
          "vx-card",
          { attrs: { title: "Sub Amenities" } },
          [
            _c(
              "vs-table",
              {
                attrs: {
                  search: "",
                  data: _vm.subParent,
                  pagination: "",
                  "max-items": "5"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(ref) {
                      var data = ref.data
                      return _vm._l(data, function(subParent, indextr) {
                        return _c(
                          "vs-tr",
                          { key: indextr },
                          [
                            _c("vs-td", { attrs: { data: data[indextr].id } }, [
                              _vm._v(
                                "\n                                " +
                                  _vm._s(data[indextr].id) +
                                  "\n                            "
                              )
                            ]),
                            _vm._v(" "),
                            _c(
                              "vs-td",
                              { attrs: { data: data[indextr].name } },
                              [
                                _vm._v(
                                  "\n                                " +
                                    _vm._s(data[indextr].name) +
                                    "\n                                "
                                ),
                                _c(
                                  "template",
                                  { slot: "edit" },
                                  [
                                    _c("vs-input", {
                                      model: {
                                        value: data[indextr].name,
                                        callback: function($$v) {
                                          _vm.$set(data[indextr], "name", $$v)
                                        },
                                        expression: "data[indextr].name"
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "vs-button",
                                      {
                                        on: {
                                          click: function($event) {
                                            return _vm.updateSubAmen(
                                              data[indextr].name,
                                              data[indextr].id
                                            )
                                          }
                                        }
                                      },
                                      [_vm._v("Update")]
                                    )
                                  ],
                                  1
                                )
                              ],
                              2
                            ),
                            _vm._v(" "),
                            _c(
                              "vs-td",
                              {
                                attrs: { data: data[indextr].parent[0]["name"] }
                              },
                              [
                                _vm._v(
                                  "\n                                " +
                                    _vm._s(data[indextr].parent[0]["name"]) +
                                    "\n                                "
                                ),
                                _c(
                                  "template",
                                  { slot: "edit" },
                                  [
                                    _c(
                                      "vs-select",
                                      {
                                        staticClass: "select-large",
                                        on: { input: _vm.setSelected },
                                        model: {
                                          value: _vm.updateselected,
                                          callback: function($$v) {
                                            _vm.updateselected = $$v
                                          },
                                          expression: "updateselected"
                                        }
                                      },
                                      _vm._l(_vm.parent, function(
                                        parent,
                                        index
                                      ) {
                                        return _c("vs-select-item", {
                                          key: index,
                                          staticClass: "w-full",
                                          attrs: {
                                            value: {
                                              parent: parent.id,
                                              id: data[indextr].id
                                            },
                                            text: parent.name
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
                  { slot: "thead" },
                  [
                    _c("vs-th", { attrs: { "sort-key": "sno" } }, [
                      _vm._v("Sno")
                    ]),
                    _vm._v(" "),
                    _c("vs-th", { attrs: { "sort-key": "name" } }, [
                      _vm._v("Name")
                    ]),
                    _vm._v(" "),
                    _c("vs-th", { attrs: { "sort-key": "parent" } }, [
                      _vm._v("Parent")
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
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/amenities/add.vue":
/*!**************************************************!*\
  !*** ./resources/js/src/views/amenities/add.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_vue_vue_type_template_id_1129d88f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add.vue?vue&type=template&id=1129d88f& */ "./resources/js/src/views/amenities/add.vue?vue&type=template&id=1129d88f&");
/* harmony import */ var _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./add.vue?vue&type=script&lang=js& */ "./resources/js/src/views/amenities/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _add_vue_vue_type_template_id_1129d88f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _add_vue_vue_type_template_id_1129d88f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/amenities/add.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/amenities/add.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/src/views/amenities/add.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/amenities/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/amenities/add.vue?vue&type=template&id=1129d88f&":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/views/amenities/add.vue?vue&type=template&id=1129d88f& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_1129d88f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=template&id=1129d88f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/amenities/add.vue?vue&type=template&id=1129d88f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_1129d88f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_1129d88f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);