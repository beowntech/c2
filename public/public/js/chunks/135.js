(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[135],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/list.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/blog/list.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_video_player__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-video-player */ "./node_modules/vue-video-player/dist/vue-video-player.js");
/* harmony import */ var vue_video_player__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_video_player__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var video_js_dist_video_js_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! video.js/dist/video-js.css */ "./node_modules/video.js/dist/video-js.css");
/* harmony import */ var video_js_dist_video_js_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(video_js_dist_video_js_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var ckeditor4_vue__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ckeditor4-vue */ "./node_modules/ckeditor4-vue/dist/ckeditor.js");
/* harmony import */ var ckeditor4_vue__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(ckeditor4_vue__WEBPACK_IMPORTED_MODULE_8__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      title: '',
      tags: [],
      currentPage: 1,
      content: '',
      categories: [],
      activePrompt: false,
      isAddBlog: false,
      originalImage: null,
      selectedCatg: [],
      blogs: [],
      image: null,
      selectedBlogId: null
    };
  },
  computed: {},
  methods: {
    openAlert: function openAlert(val) {
      this.selectedBlogId = val;
      this.activePrompt = true;
    },
    editData: function editData(prop) {
      this.$vs.loading();
      this.$router.push("/blog/update/" + prop).catch(function () {});
    },
    showImage: function showImage(e) {
      var file = e.target.files[0];
      this.originalImage = file;
      this.image = URL.createObjectURL(file);
    },
    alert: function alert(title, text, color, position) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: position
      });
    },
    getBlog: function getBlog() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_5___default.a.post('/api/blog/all').then(function (res) {
        _this.blogs = res.data;

        _this.$vs.loading.close();
      }).catch(function (err) {
        _this.$vs.loading.close();

        console.log(err);
      });
    },
    deleteBlog: function deleteBlog() {
      var _this2 = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_5___default.a.post('/api/blog/delete', {
        id: this.selectedBlogId
      }).then(function (res) {
        _this2.alert('Blog Deleted', 'Blog Deleted Successfully', 'green');

        _this2.getBlog();

        _this2.$vs.loading.close();
      }).catch(function (err) {
        _this2.$vs.loading.close();

        console.log(err);
      });
    },
    addBlog: function addBlog() {
      var _this3 = this;

      if (this.title == "") {
        this.alert('Please Enter Title', 'Title Field is Required', 'red', 'bottom-right');
      } else if (this.content == "") {
        this.alert('Please Enter Content', 'Content is Required', 'red', 'bottom-right');
      } else if (this.selectedCatg == [] || this.selectedCatg == "") {
        this.alert('Select Category', 'Select at least 1 Option in Category', 'red', 'bottom-right');
      } else {
        var bodyFormData = new FormData();
        bodyFormData.append('user', localStorage.getItem('userId'));
        bodyFormData.append('title', this.title);
        bodyFormData.append('text', this.content);
        bodyFormData.append('catg', this.selectedCatg);

        if (this.originalImage != null) {
          bodyFormData.append('image', this.originalImage);
        }

        axios__WEBPACK_IMPORTED_MODULE_5___default.a.post('/api/blog/add', bodyFormData).then(function (res) {
          if (res.data == 1) {
            _this3.$vs.loading.close();

            _this3.alert('Blog Added Successfully!', 'Redirecting to All Blog Page...', 'success', 'bottom-right');

            _this3.title = "";
            _this3.content = "";
            _this3.selectedCatg = [];
            _this3.isAddBlog = false;
          }
        }).catch(function (err) {
          _this3.alert('Error Occurred!', 'Error While Adding Blog!', 'red', 'bottom-right');

          _this3.$vs.loading.close();

          console.log(err);
        });
      }
    },
    getCatg: function getCatg() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_5___default.a.post('/api/categories/parent').then(function (res) {
        _this4.categories = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getStatus: function getStatus() {
      var _this5 = this;

      axios__WEBPACK_IMPORTED_MODULE_5___default.a.get('/api/status/property/get').then(function (res) {
        console.log(res);
        _this5.status = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    updateStatus: function updateStatus(data, id) {
      var _this6 = this;

      axios__WEBPACK_IMPORTED_MODULE_5___default.a.post('/api/blog/updateStatus', {
        status: data.id,
        id: id
      }).then(function (res) {
        if (res.data['status'] == 1) {
          _this6.alert('Status Updated Successfully!', 'Blog Status Updated Successfully!', 'success'); // window.location.reload()


          jquery__WEBPACK_IMPORTED_MODULE_6___default()("h4").click();
        } else {
          _this6.alert('Error Occured!', 'There is some Error changing Status!', 'danger');
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    seoEdit: function seoEdit(prop) {
      this.$vs.loading();
      this.$router.push("/blog/seo/" + prop).catch(function () {});
    }
  },
  components: {
    videoPlayer: vue_video_player__WEBPACK_IMPORTED_MODULE_0__["videoPlayer"],
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_7__["quillEditor"],
    CKEditor: ckeditor4_vue__WEBPACK_IMPORTED_MODULE_8___default.a
  },
  filters: {
    strippedContent: function strippedContent(string) {
      return string.replace(/<\/?[^>]+>/ig, " ").substring(0, 20);
    }
  },
  beforeMount: function beforeMount() {
    this.getCatg();
    this.getBlog();
    this.getStatus();
  },
  mounted: function mounted() {// if (document.getElementById('selectize')) return; // was already loaded
    // var scriptTag = document.createElement("script");
    // scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js";
    // scriptTag.id = "selectize";
    // document.getElementsByTagName('footer')[0].appendChild(scriptTag);
    //
    // $("#input-tags").selectize({
    //     delimiter: ",",
    //     persist: false,
    //     create: function (input) {
    //         return {
    //             value: input,
    //             text: input,
    //         };
    //     },
    // });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/list.vue?vue&type=template&id=7bb03dd1&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/blog/list.vue?vue&type=template&id=7bb03dd1&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
    { staticClass: "vx-row" },
    [
      _c("div", { staticClass: "vx-col w-full mb-3" }, [
        _c(
          "div",
          { attrs: { id: "all-blog-page" } },
          [
            _c(
              "vx-card",
              { attrs: { title: "Blogs" } },
              [
                _c(
                  "vs-table",
                  {
                    attrs: {
                      data: _vm.blogs,
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
                                _c("vs-td", [
                                  _vm._v(
                                    "\n                        " +
                                      _vm._s(indextr + 1) +
                                      "\n                    "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.image } }, [
                                  _c("img", {
                                    staticClass: "blog_list_img",
                                    staticStyle: { width: "100px" },
                                    attrs: {
                                      src:
                                        "/blogs/" + tr.id + "/image/" + tr.image
                                    }
                                  })
                                ]),
                                _vm._v(" "),
                                _c("vs-td", { attrs: { data: tr.title } }, [
                                  _vm._v(
                                    "\n                        " +
                                      _vm._s(tr.title) +
                                      "\n                    "
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "vs-td",
                                  {
                                    attrs: {
                                      data: _vm._f("strippedContent")(
                                        tr.content
                                      )
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          _vm._f("strippedContent")(tr.content)
                                        ) +
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
                                                  tr.id
                                                )
                                              }
                                            },
                                            model: {
                                              value: (_vm.updateselected =
                                                tr.stat[0].id),
                                              callback: function($$v) {
                                                _vm.$set(
                                                  (_vm.updateselected =
                                                    tr.stat[0]),
                                                  "id",
                                                  $$v
                                                )
                                              },
                                              expression:
                                                "updateselected = tr.stat[0].id"
                                            }
                                          },
                                          _vm._l(_vm.status, function(
                                            status,
                                            index
                                          ) {
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
                                          return _vm.openAlert(tr.id)
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
                        _c("vs-th", [_vm._v("Sno.")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Image")]),
                        _vm._v(" "),
                        _c("vs-th", [_vm._v("Title")]),
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
      ]),
      _vm._v(" "),
      _c(
        "vs-prompt",
        {
          attrs: { active: _vm.activePrompt },
          on: {
            cancel: function($event) {
              _vm.selectedBlogId = null
            },
            accept: this.deleteBlog,
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
                  "Are You Sure You Want To Delete this Blog?"
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

/***/ "./resources/js/src/views/blog/list.vue":
/*!**********************************************!*\
  !*** ./resources/js/src/views/blog/list.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _list_vue_vue_type_template_id_7bb03dd1_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./list.vue?vue&type=template&id=7bb03dd1&scoped=true& */ "./resources/js/src/views/blog/list.vue?vue&type=template&id=7bb03dd1&scoped=true&");
/* harmony import */ var _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list.vue?vue&type=script&lang=js& */ "./resources/js/src/views/blog/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _list_vue_vue_type_template_id_7bb03dd1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _list_vue_vue_type_template_id_7bb03dd1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "7bb03dd1",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/blog/list.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/blog/list.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/src/views/blog/list.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/blog/list.vue?vue&type=template&id=7bb03dd1&scoped=true&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/src/views/blog/list.vue?vue&type=template&id=7bb03dd1&scoped=true& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_7bb03dd1_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=template&id=7bb03dd1&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/list.vue?vue&type=template&id=7bb03dd1&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_7bb03dd1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_7bb03dd1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 15:
/*!******************************!*\
  !*** min-document (ignored) ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ })

}]);