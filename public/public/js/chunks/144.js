(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[144],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/video.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/blog/video.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "video",
  data: function data() {
    return {
      videos: [{
        title: '',
        video: ''
      }, {
        title: '',
        video: ''
      }, {
        title: '',
        video: ''
      }]
    };
  },
  methods: {
    updateVideos: function updateVideos() {
      var _this = this;

      if (this.videos[0].title == "" && this.videos[1].title == "" && this.videos[2].title == "") {
        this.alert('Please Enter All Values', 'All Values are Necessary', 'danger', 'top-center');
      } else if (this.videos[0].video == "" && this.videos[1].video == "" && this.videos[2].video == "") {
        this.alert('Please Enter All Values', 'All Values are Necessary', 'danger', 'top-center');
      } else {
        axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/options/blog_video', {
          blog_video: JSON.stringify(this.videos)
        }).then(function (res) {
          if (res.data.status == 1) {
            _this.alert('Videos Updated Successfully', '', 'success', 'top-center');
          }
        }).catch();
      }
    },
    getVideo: function getVideo() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post('/api/options/blog_video/get', {
        data: 'blog_video'
      }).then(function (res) {
        _this2.videos = JSON.parse(res.data[0].option_value);
      }).catch();
    },
    alert: function alert(title, text, color, position) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: position
      });
    }
  },
  mounted: function mounted() {
    this.getVideo();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/video.vue?vue&type=template&id=d53e2950&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/blog/video.vue?vue&type=template&id=d53e2950&scoped=true& ***!
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
  return _c("div", [
    _c("h2", [_vm._v("Blog Videos")]),
    _vm._v(" "),
    _c("br"),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "vx-row" },
      [
        _vm._l(_vm.videos, function(data, i) {
          return _c(
            "div",
            { key: i, staticClass: "vx-col w-full md:w-1/2 mb-3" },
            [
              _c("vx-card", { staticClass: "py-6" }, [
                _c(
                  "div",
                  { staticClass: "flex flex-wrap" },
                  [
                    _c("label", [_vm._v("Title")]),
                    _vm._v(" "),
                    _c("vs-input", {
                      staticClass: "mb-3",
                      staticStyle: { width: "100%" },
                      attrs: { placeholder: "Title" },
                      model: {
                        value: data.title,
                        callback: function($$v) {
                          _vm.$set(data, "title", $$v)
                        },
                        expression: "data.title"
                      }
                    }),
                    _vm._v(" "),
                    _c("label", [
                      _vm._v("Youtube Video Embed Code"),
                      _c("br"),
                      _vm._v(" (EX: https://www.youtube.com/watch?v="),
                      _c("strong", [_c("u", [_vm._v("abdefgk")])]),
                      _vm._v(")")
                    ]),
                    _vm._v(" "),
                    _c("vs-input", {
                      staticClass: "mt-3",
                      staticStyle: { width: "100%" },
                      attrs: { placeholder: "Video Embed Link" },
                      model: {
                        value: data.video,
                        callback: function($$v) {
                          _vm.$set(data, "video", $$v)
                        },
                        expression: "data.video"
                      }
                    })
                  ],
                  1
                )
              ])
            ],
            1
          )
        }),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "vx-col md:w-1/2 w-full" },
          [
            _c(
              "vs-button",
              {
                staticClass: "mt-4 mr-2 float-right shadow-lg",
                attrs: {
                  type: "gradient",
                  color: "primary",
                  "gradient-color-secondary": "#CE9FFC"
                },
                on: { click: _vm.updateVideos }
              },
              [_vm._v("UPDATE\n            ")]
            )
          ],
          1
        )
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/blog/video.vue":
/*!***********************************************!*\
  !*** ./resources/js/src/views/blog/video.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _video_vue_vue_type_template_id_d53e2950_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./video.vue?vue&type=template&id=d53e2950&scoped=true& */ "./resources/js/src/views/blog/video.vue?vue&type=template&id=d53e2950&scoped=true&");
/* harmony import */ var _video_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./video.vue?vue&type=script&lang=js& */ "./resources/js/src/views/blog/video.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _video_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _video_vue_vue_type_template_id_d53e2950_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _video_vue_vue_type_template_id_d53e2950_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "d53e2950",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/blog/video.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/blog/video.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/src/views/blog/video.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_video_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./video.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/video.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_video_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/blog/video.vue?vue&type=template&id=d53e2950&scoped=true&":
/*!******************************************************************************************!*\
  !*** ./resources/js/src/views/blog/video.vue?vue&type=template&id=d53e2950&scoped=true& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_video_vue_vue_type_template_id_d53e2950_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./video.vue?vue&type=template&id=d53e2950&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/blog/video.vue?vue&type=template&id=d53e2950&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_video_vue_vue_type_template_id_d53e2950_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_video_vue_vue_type_template_id_d53e2950_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);