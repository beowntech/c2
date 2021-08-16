(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[116],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/placement/placement.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "images-gallery",
  data: function data() {
    return {
      images: [],
      val: null,
      imagescurrent: null,
      activePrompt: false,
      mainid: localStorage.getItem('globalIns')
    };
  },
  methods: {
    openPrompt: function openPrompt(val) {
      this.activePrompt = true;
      this.val = val;
    },
    resetGallery: function resetGallery() {
      document.getElementById("galleryImage").value = "";
      this.images = [];
      this.selectedFiles = [];
    },
    uploadImage: function uploadImage(e) {
      var _this = this;

      var vm = this;
      var selectedFiles = e.target.files;

      for (var i = 0; i < selectedFiles.length; i++) {
        console.log(selectedFiles[i]);
        this.images.push(selectedFiles[i]);
      }

      var _loop = function _loop(_i) {
        var reader = new FileReader();

        reader.onload = function (e) {
          _this.$refs.image[_i].src = reader.result;
          console.log(_this.$refs.image[_i].src);
        };

        reader.readAsDataURL(_this.images[_i]);
      };

      for (var _i = 0; _i < this.images.length; _i++) {
        _loop(_i);
      }
    },
    getImage: function getImage() {
      var _this2 = this;

      var prop_id = localStorage.getItem('globalIns');
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/properties/placements', {
        'prop_id': prop_id
      }).then(function (res) {
        if (res.data['success'] == 1) {
          _this2.imagescurrent = JSON.parse(res.data['placement'][0]['placements']);
        }
      }).catch(function (err) {
        console.log(err);
      });
    },
    deleteImage: function deleteImage() {
      var _this3 = this;

      var prop_id = localStorage.getItem('globalIns');
      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get('/api/properties/placement/delete?id=' + prop_id + '&image=' + this.val).then(function (res) {
        if (res.data == 1) {
          _this3.alert('Placement Deleted', 'Placement Deleted Successfully', 'green');

          _this3.getImage();
        } else {
          _this3.alert('Problem Deleting', 'There is Some Problem Deleting Placement', 'red');
        }
      }).catch(function (err) {
        _this3.alert('Problem Deleting', 'There is Some Problem Deleting Placement', 'red');

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
    successUpload: function successUpload(e) {
      console.log(e);
      this.getImage();
    }
  },
  mounted: function mounted() {
    this.getImage();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".xGallery[data-v-6e15b5a1]{\n  /*z-index: 99999;*/\n  position: absolute;\n  color: white;\n}[dir] .xGallery[data-v-6e15b5a1]{\n  padding: 1px 8px;\n  background: #ff5722;\n  cursor: pointer;\n}[dir=ltr] .xGallery[data-v-6e15b5a1]{\n  right: 0;\n  border-bottom-left-radius: 10px;\n  float: right;\n}[dir=rtl] .xGallery[data-v-6e15b5a1]{\n  left: 0;\n  border-bottom-right-radius: 10px;\n  float: left;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=template&id=6e15b5a1&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/placement/placement.vue?vue&type=template&id=6e15b5a1&scoped=true& ***!
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
  return _c(
    "div",
    { staticClass: "vx-row" },
    [
      _c(
        "div",
        { staticClass: "vx-col w-full" },
        [
          _c(
            "vx-card",
            { staticClass: "mt-3" },
            [
              _c(
                "vs-collapse-item",
                [
                  _c("div", { attrs: { slot: "header" }, slot: "header" }, [
                    _vm._v(
                      "\n                    Add more Image\n                "
                    )
                  ]),
                  _vm._v(" "),
                  _c(
                    "vs-row",
                    [
                      _c("vs-upload", {
                        attrs: {
                          multiple: "",
                          automatic: "",
                          text: "Upload Images",
                          action: "/api/properties/placement/upload",
                          data: { id: _vm.mainid },
                          fileName: "photos[]"
                        },
                        on: { "on-success": _vm.successUpload }
                      })
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "vx-card",
            {
              staticClass: "mt-3",
              attrs: { title: "Placements Images", "collapse-action": "" }
            },
            [
              _vm.imagescurrent == null || _vm.imagescurrent == []
                ? _c("div", [
                    _c("img", {
                      staticStyle: { width: "15%" },
                      attrs: { src: "/assets/images/placeholder/no-image.jpg" }
                    })
                  ])
                : _c("div", [
                    _c(
                      "div",
                      { staticClass: "vx-row" },
                      _vm._l(_vm.imagescurrent, function(image, key) {
                        return _c(
                          "div",
                          {
                            key: key,
                            staticClass: "vs-col md:w-1/6 mb-2",
                            staticStyle: {
                              position: "relative",
                              height: "142px !important",
                              "margin-right": "10px"
                            }
                          },
                          [
                            _c("div", [
                              _c(
                                "div",
                                {
                                  staticClass: "xGallery",
                                  on: {
                                    click: function($event) {
                                      return _vm.openPrompt(image)
                                    }
                                  }
                                },
                                [_vm._v("X")]
                              ),
                              _vm._v(" "),
                              _c("img", {
                                ref: "image",
                                refInFor: true,
                                staticClass: "preview",
                                staticStyle: { width: "100%", height: "142px" },
                                attrs: {
                                  src:
                                    "/property/" +
                                    _vm.mainid +
                                    "/placement/images/" +
                                    image
                                }
                              })
                            ])
                          ]
                        )
                      }),
                      0
                    )
                  ])
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "vs-prompt",
        {
          attrs: { active: _vm.activePrompt },
          on: {
            cancel: function($event) {
              _vm.val = null
            },
            accept: this.deleteImage,
            close: function($event) {
              _vm.val = null
            },
            "update:active": function($event) {
              _vm.activePrompt = $event
            }
          }
        },
        [
          _c("div", { staticClass: "con-exemple-prompt" }, [
            _c("span", [_vm._v("Are You Sure You Want To Delete Image?")])
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

/***/ "./resources/js/src/views/placement/placement.vue":
/*!********************************************************!*\
  !*** ./resources/js/src/views/placement/placement.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _placement_vue_vue_type_template_id_6e15b5a1_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./placement.vue?vue&type=template&id=6e15b5a1&scoped=true& */ "./resources/js/src/views/placement/placement.vue?vue&type=template&id=6e15b5a1&scoped=true&");
/* harmony import */ var _placement_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./placement.vue?vue&type=script&lang=js& */ "./resources/js/src/views/placement/placement.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _placement_vue_vue_type_style_index_0_id_6e15b5a1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css& */ "./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _placement_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _placement_vue_vue_type_template_id_6e15b5a1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _placement_vue_vue_type_template_id_6e15b5a1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "6e15b5a1",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/placement/placement.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/placement/placement.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/views/placement/placement.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./placement.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css&":
/*!*****************************************************************************************************************!*\
  !*** ./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css& ***!
  \*****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_style_index_0_id_6e15b5a1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--7-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=style&index=0&id=6e15b5a1&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_style_index_0_id_6e15b5a1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_style_index_0_id_6e15b5a1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_style_index_0_id_6e15b5a1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_style_index_0_id_6e15b5a1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/src/views/placement/placement.vue?vue&type=template&id=6e15b5a1&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/src/views/placement/placement.vue?vue&type=template&id=6e15b5a1&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_template_id_6e15b5a1_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./placement.vue?vue&type=template&id=6e15b5a1&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/placement/placement.vue?vue&type=template&id=6e15b5a1&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_template_id_6e15b5a1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_placement_vue_vue_type_template_id_6e15b5a1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);