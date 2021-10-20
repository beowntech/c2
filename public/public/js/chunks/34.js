(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[34],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/list.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/property/list.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      activePrompt: false,
      val: [],
      props: [],
      updateselected: [],
      status: [],
      changeStatus: [{
        color: null,
        name: null
      }],
      user: localStorage.getItem('userId')
    };
  },
  methods: {
    acceptAlert: function acceptAlert() {
      this.$vs.notify({
        color: 'success',
        title: 'Accept Selected',
        text: 'Lorem ipsum dolor sit amet, consectetur'
      });
    },
    openAlert: function openAlert(name, id) {
      this.val.push({
        'name': name,
        'id': id
      });
      this.activePrompt = true;
    },
    close: function close() {
      this.activePrompt = false;
      this.$vs.notify({
        color: 'danger',
        title: 'Closed',
        text: 'Property Delete Cancelled!'
      });
    },
    getProps: function getProps() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/getaUser', {
        'user': this.user
      }).then(function (res) {
        console.log(res);
        _this.props = res.data;

        _this.props.reverse();
      }).catch(function (err) {
        console.log(err);
      });
    },
    propDelete: function propDelete() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/delete', {
        'prop': this.val[0].id
      }).then(function (res) {
        if (res.data == 1) {
          _this2.getProps();

          _this2.activePrompt = false;

          _this2.alert('Deleted Successfully', '', 'green');
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    getStatus: function getStatus() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/status/property/get').then(function (res) {
        console.log(res);
        _this3.status = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateStatus: function updateStatus(data, id) {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/updateStatus', {
        status: data.id,
        id: id
      }).then(function (res) {
        if (res.data['status'] == 1) {
          _this4.alert('Status Updated Successfully!', 'Property Status Updated Successfully!', 'success'); // window.location.reload()


          jquery__WEBPACK_IMPORTED_MODULE_1___default()("h4").click();
        } else {
          _this4.alert('Error Occured!', 'There is some Error changing Status!', 'danger');
        }
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
    },
    seoEdit: function seoEdit(prop) {
      this.$vs.loading();
      this.$router.push("/property/seo/" + prop).catch(function () {});
    }
  },
  beforeMount: function beforeMount() {
    this.getProps();
    this.getStatus();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/list.vue?vue&type=template&id=4b8c41fe&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/property/list.vue?vue&type=template&id=4b8c41fe& ***!
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
  return _c(
    "vx-card",
    { attrs: { title: "Colleges List" } },
    [
      _c(
        "vs-table",
        {
          attrs: {
            data: _vm.props,
            pagination: "",
            "max-items": "10",
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
                          "\n                    " +
                            _vm._s(tr.name) +
                            "\n                "
                        )
                      ]),
                      _vm._v(" "),
                      _c("vs-td", { attrs: { data: tr.user[0].name } }, [
                        _vm._v(
                          "\n                    " +
                            _vm._s(tr.user[0].name) +
                            "\n                "
                        )
                      ]),
                      _vm._v(" "),
                      _c(
                        "vs-td",
                        {
                          attrs: { data: tr.language != "" ? tr.language : "" }
                        },
                        [
                          _vm._v(
                            "\n                    " +
                              _vm._s(tr.language != "" ? tr.language : "") +
                              "\n                "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "vs-td",
                        {
                          attrs: {
                            data: tr.type.length != 0 ? tr.type[0].name : ""
                          }
                        },
                        [
                          _vm._v(
                            "\n                    " +
                              _vm._s(
                                tr.type.length != 0 ? tr.type[0].name : ""
                              ) +
                              "\n                "
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
                                        tr.id
                                      )
                                    }
                                  },
                                  model: {
                                    value: (_vm.updateselected = tr.stat[0].id),
                                    callback: function($$v) {
                                      _vm.$set(
                                        (_vm.updateselected = tr.stat[0]),
                                        "id",
                                        $$v
                                      )
                                    },
                                    expression: "updateselected = tr.stat[0].id"
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
                      ),
                      _vm._v(" "),
                      _c(
                        "vs-td",
                        { staticClass: "whitespace-no-wrap" },
                        [
                          _vm.$acl.check("editor")
                            ? _c("feather-icon", {
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
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.$acl.check("editor")
                            ? _c("feather-icon", {
                                staticClass: "ml-2",
                                attrs: {
                                  icon: "AwardIcon",
                                  svgClasses:
                                    "w-5 h-5 hover:text-warning stroke-current"
                                },
                                on: {
                                  click: function($event) {
                                    $event.stopPropagation()
                                    return _vm.seoEdit(tr.id)
                                  }
                                }
                              })
                            : _vm._e(),
                          _vm._v(" "),
                          _c("feather-icon", {
                            staticClass: "ml-2",
                            attrs: {
                              icon: "TrashIcon",
                              svgClasses:
                                "w-5 h-5 hover:text-warning stroke-current"
                            },
                            on: {
                              click: function($event) {
                                $event.stopPropagation()
                                return _vm.openAlert(tr.name, tr.id)
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
              _c("vs-th", [_vm._v("Name")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Host")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Language")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Type")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Status")]),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Actions")])
            ],
            1
          )
        ],
        2
      ),
      _vm._v(" "),
      _c(
        "vs-prompt",
        {
          attrs: { active: _vm.activePrompt },
          on: {
            cancel: function($event) {
              _vm.val = []
            },
            accept: this.propDelete,
            close: _vm.close,
            "update:active": function($event) {
              _vm.activePrompt = $event
            }
          }
        },
        [
          _c("div", { staticClass: "con-exemple-prompt" }, [
            _c("span", {
              domProps: {
                textContent: _vm._s(
                  _vm.val.length != 0
                    ? "Are You Sure You Want To Delete " + _vm.val[0].name + "?"
                    : ""
                )
              }
            })
          ])
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/property/list.vue":
/*!**************************************************!*\
  !*** ./resources/js/src/views/property/list.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _list_vue_vue_type_template_id_4b8c41fe___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./list.vue?vue&type=template&id=4b8c41fe& */ "./resources/js/src/views/property/list.vue?vue&type=template&id=4b8c41fe&");
/* harmony import */ var _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list.vue?vue&type=script&lang=js& */ "./resources/js/src/views/property/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _list_vue_vue_type_template_id_4b8c41fe___WEBPACK_IMPORTED_MODULE_0__["render"],
  _list_vue_vue_type_template_id_4b8c41fe___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/property/list.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/property/list.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/src/views/property/list.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/property/list.vue?vue&type=template&id=4b8c41fe&":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/views/property/list.vue?vue&type=template&id=4b8c41fe& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_4b8c41fe___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=template&id=4b8c41fe& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/property/list.vue?vue&type=template&id=4b8c41fe&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_4b8c41fe___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_4b8c41fe___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);