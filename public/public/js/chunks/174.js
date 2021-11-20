(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[174],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/status/AllStatus.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/status/AllStatus.vue?vue&type=script&lang=js& ***!
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      status: []
    };
  },
  methods: {
    getStatus: function getStatus() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/status/all').then(function (res) {
        console.log(res);
        _this.status = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateName: function updateName(name, id) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/status/update', {
        type: "name",
        name: name,
        id: id
      }).then(function (res) {
        alert(res.data);
        window.location.reload();
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateMsg: function updateMsg(msg, id) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/status/update', {
        type: "message",
        msg: msg,
        id: id
      }).then(function (res) {
        alert(res.data);
        window.location.reload();
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateColor: function updateColor(color, id) {
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/status/update', {
        type: "color",
        color: color,
        id: id
      }).then(function (res) {
        alert(res.data);
        window.location.reload();
      }).catch(function (err) {
        console.log(err);
      });
    }
  },
  beforeMount: function beforeMount() {
    this.getStatus();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/status/AllStatus.vue?vue&type=template&id=07fb8e00&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/status/AllStatus.vue?vue&type=template&id=07fb8e00& ***!
  \******************************************************************************************************************************************************************************************************************/
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
    { attrs: { title: "All Status" } },
    [
      _c("p", { staticClass: "mb-4" }, [
        _vm._v("Click to "),
        _c("strong", [_vm._v("Edit")])
      ]),
      _vm._v(" "),
      _c(
        "vs-table",
        {
          attrs: { data: _vm.status },
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
                      _c(
                        "vs-td",
                        { attrs: { data: tr.name } },
                        [
                          _vm._v(
                            "\n                " +
                              _vm._s(tr.name) +
                              "\n                "
                          ),
                          _c(
                            "template",
                            { slot: "edit" },
                            [
                              _c("vs-input", {
                                staticClass: "inputx",
                                attrs: { placeholder: "Email" },
                                model: {
                                  value: tr.name,
                                  callback: function($$v) {
                                    _vm.$set(tr, "name", $$v)
                                  },
                                  expression: "tr.name"
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "vs-button",
                                {
                                  on: {
                                    click: function($event) {
                                      return _vm.updateName(tr.name, tr.id)
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
                        { attrs: { data: tr.message } },
                        [
                          _vm._v(
                            "\n                " +
                              _vm._s(tr.message) +
                              "\n                "
                          ),
                          _c(
                            "template",
                            { slot: "edit" },
                            [
                              _c("vs-input", {
                                model: {
                                  value: tr.message,
                                  callback: function($$v) {
                                    _vm.$set(tr, "message", $$v)
                                  },
                                  expression: "tr.message"
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "vs-button",
                                {
                                  on: {
                                    click: function($event) {
                                      return _vm.updateMsg(tr.message, tr.id)
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
                        { attrs: { data: tr.color } },
                        [
                          _c("vs-chip", { attrs: { color: tr.color } }, [
                            _vm._v(_vm._s(tr.color))
                          ]),
                          _vm._v(" "),
                          _c(
                            "template",
                            { slot: "edit" },
                            [
                              _c("vs-input", {
                                attrs: { type: "color" },
                                model: {
                                  value: tr.color,
                                  callback: function($$v) {
                                    _vm.$set(tr, "color", $$v)
                                  },
                                  expression: "tr.color"
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "vs-button",
                                {
                                  on: {
                                    click: function($event) {
                                      return _vm.updateColor(tr.color, tr.id)
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
              _c("vs-th", [_vm._v("Name")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Message")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Color Code")])
            ],
            1
          )
        ],
        2
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/status/AllStatus.vue":
/*!*****************************************************!*\
  !*** ./resources/js/src/views/status/AllStatus.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AllStatus_vue_vue_type_template_id_07fb8e00___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AllStatus.vue?vue&type=template&id=07fb8e00& */ "./resources/js/src/views/status/AllStatus.vue?vue&type=template&id=07fb8e00&");
/* harmony import */ var _AllStatus_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AllStatus.vue?vue&type=script&lang=js& */ "./resources/js/src/views/status/AllStatus.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AllStatus_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AllStatus_vue_vue_type_template_id_07fb8e00___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AllStatus_vue_vue_type_template_id_07fb8e00___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/status/AllStatus.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/status/AllStatus.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/src/views/status/AllStatus.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AllStatus_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AllStatus.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/status/AllStatus.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AllStatus_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/status/AllStatus.vue?vue&type=template&id=07fb8e00&":
/*!************************************************************************************!*\
  !*** ./resources/js/src/views/status/AllStatus.vue?vue&type=template&id=07fb8e00& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AllStatus_vue_vue_type_template_id_07fb8e00___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AllStatus.vue?vue&type=template&id=07fb8e00& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/status/AllStatus.vue?vue&type=template&id=07fb8e00&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AllStatus_vue_vue_type_template_id_07fb8e00___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AllStatus_vue_vue_type_template_id_07fb8e00___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);