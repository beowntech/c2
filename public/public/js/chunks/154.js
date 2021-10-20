(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[154],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/courses/list.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/courses/list.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
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
      props: [],
      updateselected: [],
      status: [],
      courseName: "",
      courseId: null,
      activePrompt2: false,
      changeStatus: [{
        color: null,
        name: null
      }],
      user: localStorage.getItem('userId')
    };
  },
  methods: {
    getProps: function getProps() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/course/get-all?prop_id=' + localStorage.getItem('globalIns')).then(function (res) {
        console.log(res);
        _this.props = res.data;

        _this.props.reverse();
      }).catch(function (err) {
        console.log(err);
      });
    },
    getStatus: function getStatus() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/status/all').then(function (res) {
        console.log(res);
        _this2.status = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateStatus: function updateStatus(data, id) {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/updateStatus', {
        status: data.id,
        id: id
      }).then(function (res) {
        if (res.data['status'] == 1) {
          _this3.alert('Status Updated Successfully!', 'Property Status Updated Successfully!', 'success'); // window.location.reload()


          jquery__WEBPACK_IMPORTED_MODULE_1___default()("h4").click();
        } else {
          _this3.alert('Error Occured!', 'There is some Error changing Status!', 'danger');
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
        position: 'bottom-right'
      });
    },
    editData: function editData(prop) {
      this.$vs.loading();
      this.$router.push("/course/update/" + prop).catch(function () {});
    },
    deleteCourse: function deleteCourse() {
      var _this4 = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/course/delete', {
        id: this.courseId
      }).then(function (res) {
        _this4.getProps();

        if (res.data['status'] == 1) {
          _this4.$vs.loading.close();

          _this4.alert('Course Deleted Successfully!', 'Course/Stream Deleted Successfully!', 'success');
        } else {
          _this4.$vs.loading.close();

          _this4.alert('Error Occured!', 'There is some Error!', 'danger');
        }
      }).catch(function (err) {
        _this4.$vs.loading.close();

        console.log(err);
      });
    }
  },
  beforeMount: function beforeMount() {
    this.getProps();
    this.getStatus();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/courses/list.vue?vue&type=template&id=4ac4241f&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/courses/list.vue?vue&type=template&id=4ac4241f& ***!
  \**************************************************************************************************************************************************************************************************************/
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
        { attrs: { title: "Course List" } },
        [
          _c(
            "vs-table",
            {
              attrs: {
                data: _vm.props,
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
                          _c(
                            "vs-td",
                            {
                              attrs: {
                                data:
                                  tr.catg.length != 0
                                    ? tr.catg[0].name
                                    : "No Category"
                              }
                            },
                            [
                              _vm._v(
                                "\r\n                        " +
                                  _vm._s(
                                    tr.catg.length != 0
                                      ? tr.catg[0].name
                                      : "No Category"
                                  ) +
                                  "\r\n                    "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.streams[0].name } }, [
                            _vm._v(
                              "\r\n                        " +
                                _vm._s(tr.streams[0].name) +
                                "\r\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            {
                              attrs: {
                                data:
                                  tr.substream.length != 0
                                    ? tr.substream[0].name
                                    : "No Sub-Stream"
                              }
                            },
                            [
                              _vm._v(
                                "\r\n                        " +
                                  _vm._s(
                                    tr.substream.length != 0
                                      ? tr.substream[0].name
                                      : "No Sub-Stream"
                                  ) +
                                  "\r\n                    "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.type } }, [
                            _vm._v(
                              "\r\n                        " +
                                _vm._s(tr.type) +
                                "\r\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.program_type } }, [
                            _vm._v(
                              "\r\n                    " +
                                _vm._s(
                                  tr.program_type == 1
                                    ? "Full Time"
                                    : "Part Time"
                                ) +
                                "\r\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", { attrs: { data: tr.price } }, [
                            _vm._v(
                              "\r\n                        " +
                                _vm._s(tr.price) +
                                "\r\n                    "
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            { attrs: { data: tr.brochure } },
                            [
                              tr.brochure != null
                                ? _c(
                                    "vs-button",
                                    {
                                      attrs: {
                                        href:
                                          "/property/" +
                                          tr.prop_id +
                                          "/brochure/" +
                                          tr.brochure
                                      }
                                    },
                                    [_vm._v("Download Brochure")]
                                  )
                                : _c("p", [_vm._v("--")])
                            ],
                            1
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
                              }),
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
                                    ;(_vm.activePrompt2 = true),
                                      (_vm.courseId = tr.id),
                                      (_vm.courseName = tr.streams[0].name)
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
                  _c("vs-th", [_vm._v("Category")]),
                  _vm._v(" "),
                  _c("vs-th", [_vm._v("Stream")]),
                  _vm._v(" "),
                  _c("vs-th", [_vm._v("Sub Stream")]),
                  _vm._v(" "),
                  _c("vs-th", [_vm._v("Course Type")]),
                  _vm._v(" "),
                  _c("vs-th", [_vm._v("Program Type")]),
                  _vm._v(" "),
                  _c("vs-th", [_vm._v("Price")]),
                  _vm._v(" "),
                  _c("vs-th", [_vm._v("Brochure")]),
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
      ),
      _vm._v(" "),
      _c(
        "vs-prompt",
        {
          attrs: {
            title: "Are you Sure you want to Delete?",
            active: _vm.activePrompt2
          },
          on: {
            cancel: function($event) {
              ;(_vm.courseId = null), (_vm.courseName = "")
            },
            close: function($event) {
              ;(_vm.courseId = null), (_vm.courseName = "")
            },
            accept: _vm.deleteCourse,
            "update:active": function($event) {
              _vm.activePrompt2 = $event
            }
          }
        },
        [
          _c("div", { staticClass: "con-exemple-prompt" }, [
            _c("p", {
              domProps: {
                textContent: _vm._s(
                  "Are you sure you want to Delete " + _vm.courseName
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

/***/ "./resources/js/src/views/courses/list.vue":
/*!*************************************************!*\
  !*** ./resources/js/src/views/courses/list.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _list_vue_vue_type_template_id_4ac4241f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./list.vue?vue&type=template&id=4ac4241f& */ "./resources/js/src/views/courses/list.vue?vue&type=template&id=4ac4241f&");
/* harmony import */ var _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list.vue?vue&type=script&lang=js& */ "./resources/js/src/views/courses/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _list_vue_vue_type_template_id_4ac4241f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _list_vue_vue_type_template_id_4ac4241f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/courses/list.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/courses/list.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/src/views/courses/list.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/courses/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/courses/list.vue?vue&type=template&id=4ac4241f&":
/*!********************************************************************************!*\
  !*** ./resources/js/src/views/courses/list.vue?vue&type=template&id=4ac4241f& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_4ac4241f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=template&id=4ac4241f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/courses/list.vue?vue&type=template&id=4ac4241f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_4ac4241f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_4ac4241f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);