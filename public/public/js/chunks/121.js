(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[121],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/dynamic-page/index.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue-flatpickr-component */ "./node_modules/vue-flatpickr-component/dist/vue-flatpickr.min.js");
/* harmony import */ var vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var flatpickr_dist_flatpickr_css__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! flatpickr/dist/flatpickr.css */ "./node_modules/flatpickr/dist/flatpickr.css");
/* harmony import */ var flatpickr_dist_flatpickr_css__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(flatpickr_dist_flatpickr_css__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_8__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      format: "d MMMM yyyy",
      updateselected: [],
      status: [],
      addSelected: false,
      appDate: "",
      content: "",
      type: 0,
      name: "",
      categories: [],
      sidebarData: {},
      selectedCatg: {},
      selectedStream: {},
      contentSubmitted: false,
      streams: [],
      examFDate: "",
      examTDate: "",
      examEnterId: "",
      isOnline: false,
      cardClass: 'vx-col w-full',
      changeStatus: [{
        color: null,
        name: null
      }],
      examPopActive: false,
      appPopActive: false,
      user: localStorage.getItem('userId')
    };
  },
  components: {
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_2___default.a,
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_8__["quillEditor"],
    flatPickr: vue_flatpickr_component__WEBPACK_IMPORTED_MODULE_6___default.a
  },
  methods: {
    toggleDataSidebar: function toggleDataSidebar() {
      var val = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      this.addNewDataSidebar = val;
    },
    addScholarChange: function addScholarChange(val) {
      this.cardClass = 'vx-col w-full';
      this.examEnterId = "";
      this.name = "";
      this.content = "";
      this.contentSubmitted = false;
      this.addSelected = val === 1;
    },
    successUpload: function successUpload(v) {
      console.log(v);
      this.examEnterId = v.currentTarget.response;
      this.alert('Logo Uploaded Successfully', 'Logo Uploaded Successfully!', 'green');
    },
    deleteUpload: function deleteUpload(v) {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/d_page/delete_image', {
        'id': this.examEnterId,
        'type': 'logo'
      }).then(function (res) {
        console.log(res);

        if (res.data == 1) {
          _this.alert('Logo Removed Successfully', 'Logo Removed Successfully!', 'green');
        }
      }).catch(function (err) {
        // this.$vs.loading.close();
        console.log(err);
      });
    },
    deleteUploadF: function deleteUploadF(v) {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/d_page/delete_image', {
        'id': this.examEnterId,
        'type': 'featured'
      }).then(function (res) {
        console.log(res);

        if (res.data == 1) {
          _this2.alert('Featured Removed Successfully', 'Featured Removed Successfully!', 'green');
        }
      }).catch(function (err) {
        // this.$vs.loading.close();
        console.log(err);
      });
    },
    getProps: function getProps() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/d_page/all').then(function (res) {
        console.log(res);
        _this3.props = res.data;

        _this3.props.reverse();
      }).catch(function (err) {
        console.log(err);
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
    addExam: function addExam() {
      var _this5 = this;

      if (this.name === "") {
        this.alert('Please Enter Name', 'Please Enter Name of the Page', 'red');
      } else if (this.content === "") {
        this.alert('Please Enter Content', 'Please Enter Content of the Page', 'red');
      } else {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/d_page/add', {
          pageId: this.examEnterId,
          name: this.name,
          description: this.content
        }).then(function (res) {
          if (res.data['success'] == 1) {
            _this5.getProps();

            _this5.examEnterId = res.data['data'];
            _this5.cardClass = 'vx-col md:w-1/3 w-full';
            _this5.contentSubmitted = true;

            _this5.alert('Exam Added Successfully!', 'Exam Added or Updated Successfully!', 'success');
          } else if (res.data['success'] == 0) {
            _this5.alert('Failed to Add Exam', 'Check if Any Important Field Left!', 'danger');
          }
        }).catch(function (err) {
          console.log(err);
        });
      }
    },
    updateStatus: function updateStatus(data, id) {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/updateStatus', {
        status: data.id,
        id: id
      }).then(function (res) {
        if (res.data['status'] == 1) {
          _this6.alert('Status Updated Successfully!', 'Property Status Updated Successfully!', 'success'); // window.location.reload()


          jquery__WEBPACK_IMPORTED_MODULE_1___default()("h4").click();
        } else {
          _this6.alert('Error Occured!', 'There is some Error changing Status!', 'danger');
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
      this.cardClass = 'vx-col w-full';
      this.examEnterId = prop;
      this.addSelected = true;
      this.getPage(prop);
    },
    getPage: function getPage(id) {
      var _this7 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/d_page/getPage', {
        id: id
      }).then(function (res) {
        _this7.contentSubmitted = true;
        _this7.cardClass = 'vx-col md:w-1/3 w-full';
        _this7.name = res.data[0].name;
        _this7.content = res.data[0].content;

        _this7.$vs.loading.close();
      }).catch(function (err) {
        console.log(err);
      });
    },
    seoEdit: function seoEdit(prop) {
      this.$vs.loading();
      this.$router.push("/property/seo/" + prop).catch(function () {});
    }
  },
  beforeMount: function beforeMount() {
    this.getProps();
    this.getStatus();
    this.getCategories();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".vs-popup--content{\n  height: 250px!important;\n}\n.ql-container{\n  height: 340px !important;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=template&id=3ad5ffac&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/dynamic-page/index.vue?vue&type=template&id=3ad5ffac& ***!
  \********************************************************************************************************************************************************************************************************************/
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
              [_vm._v(" Close\n        ")]
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
              [_vm._v(" Add Page\n        ")]
            )
      ],
      1
    ),
    _vm._v(" "),
    _vm.addSelected
      ? _c("div", { staticClass: "vx-col w-full mb-base" }, [
          _c("div", { staticClass: "vx-row" }, [
            _c(
              "div",
              {
                class: _vm.cardClass,
                style: _vm.contentSubmitted ? "width: 65% !important;" : ""
              },
              [
                _c("vx-card", { attrs: { title: "Add Page" } }, [
                  _c("div", { staticClass: "vx-row md-6" }, [
                    _c(
                      "div",
                      { staticClass: "vx-col md:w-1/2 w-full mb-2" },
                      [
                        _c("h6", { staticClass: "mb-1" }, [_vm._v("Name")]),
                        _vm._v(" "),
                        _c("vs-input", {
                          staticStyle: { width: "100%" },
                          attrs: { placeholder: "Name" },
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
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col ml-1 mr-1 mt-3" }, [
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
                    ])
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
                            on: { click: _vm.addExam }
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
            _vm.contentSubmitted
              ? _c(
                  "div",
                  { staticClass: "vx-col md:w-1/3 w-full" },
                  [
                    _c("vx-card", { attrs: { title: "Logo/Featured Image" } }, [
                      _c("div", { staticClass: "vx-row md-6" }, [
                        _c(
                          "div",
                          { staticClass: "vx-col  w-full mt-3" },
                          [
                            _c("h6", [_vm._v("Logo")]),
                            _vm._v(" "),
                            _c("vs-upload", {
                              attrs: {
                                automatic: "",
                                action: "/api/d_page/image_upload",
                                limit: "1",
                                data: { id: _vm.examEnterId },
                                fileName: "logo",
                                text: "Upload Logo"
                              },
                              on: {
                                "on-delete": _vm.deleteUpload,
                                "on-success": _vm.successUpload
                              }
                            })
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "vx-col  w-full mt-3" },
                          [
                            _c("h6", [_vm._v("Featured Image")]),
                            _vm._v(" "),
                            _c("vs-upload", {
                              attrs: {
                                automatic: "",
                                action: "/api/d_page/image_upload",
                                limit: "1",
                                data: { id: _vm.examEnterId },
                                fileName: "featured",
                                text: "Upload Featured"
                              },
                              on: {
                                "on-delete": _vm.deleteUploadF,
                                "on-success": _vm.successUpload
                              }
                            })
                          ],
                          1
                        )
                      ])
                    ])
                  ],
                  1
                )
              : _vm._e()
          ])
        ])
      : _c(
          "div",
          { staticClass: "vx-col w-full mb-base" },
          [
            _c(
              "vx-card",
              { attrs: { title: "Exams List" } },
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
                                _c("vs-td", { attrs: { data: tr.logo } }, [
                                  _c("img", {
                                    attrs: {
                                      src:
                                        "/dynamic/" +
                                        tr.id +
                                        "/logo/" +
                                        tr.logo,
                                      width: "50px"
                                    }
                                  })
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.name } }, [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(tr.name != null ? tr.name : "--") +
                                      "\n                        "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.calls } }, [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(tr.calls) +
                                      "\n                        "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.whatsapp } }, [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(tr.whatsapp) +
                                      "\n                        "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.views } }, [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(tr.views) +
                                      "\n                        "
                                  )
                                ]),
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
                                            (_vm.courseName =
                                              tr.streams[0].name)
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
                        _c("vs-th", [_vm._v("Logo")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Name")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Calls")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("WhatsApp")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Views")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Action")])
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

/***/ "./resources/js/src/views/dynamic-page/index.vue":
/*!*******************************************************!*\
  !*** ./resources/js/src/views/dynamic-page/index.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_3ad5ffac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=3ad5ffac& */ "./resources/js/src/views/dynamic-page/index.vue?vue&type=template&id=3ad5ffac&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/src/views/dynamic-page/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.vue?vue&type=style&index=0&lang=css& */ "./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_3ad5ffac___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_3ad5ffac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/dynamic-page/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/dynamic-page/index.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/src/views/dynamic-page/index.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************!*\
  !*** ./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/src/views/dynamic-page/index.vue?vue&type=template&id=3ad5ffac&":
/*!**************************************************************************************!*\
  !*** ./resources/js/src/views/dynamic-page/index.vue?vue&type=template&id=3ad5ffac& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_3ad5ffac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=3ad5ffac& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/dynamic-page/index.vue?vue&type=template&id=3ad5ffac&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_3ad5ffac___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_3ad5ffac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);