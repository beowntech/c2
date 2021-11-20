(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[186],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostels/update.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/hostels/update.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
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
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_5__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "hostelCreate",
  data: function data() {
    return {
      hostelId: null,
      images: [],
      name: "",
      featured: false,
      city: {},
      state: {},
      disableC: true,
      gender: "",
      about: "",
      states: [],
      selecteTags: null,
      tempCity: null,
      selectedTags: [],
      cities: [],
      nearbyInst: [{
        property: "",
        distance: ""
      }],
      nearbyFacility: [{
        name: "",
        distance: ""
      }],
      properties: []
    };
  },
  watch: {
    selecteTags: function selecteTags(val) {
      if (val != null) {
        if (!this.selectedTags.includes(val)) {
          this.selectedTags.push(val);
        }

        this.selecteTags = null;
      }
    }
  },
  methods: {
    getProp: function getProp(val) {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/api/properties/search-college").then(function (res) {
        _this.properties = res.data;
      }).catch(function (err) {
        console.log(err);
      });
      console.log(val);
    },
    getHostel: function getHostel() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/hostels/get", {
        hostel: this.$route.params.hostelId
      }).then(function (res) {
        console.log(res);
        _this2.name = res.data.name;
        _this2.tempCity = res.data.city;
        _this2.state = res.data.state;

        _this2.enableCity();

        _this2.gender = res.data.gender;
        _this2.about = res.data.about;
        _this2.featured = res.data.featured == 1 ? true : false;
        _this2.nearbyInst = JSON.parse(res.data.nearby_properties);
        _this2.nearbyFacility = JSON.parse(res.data.facilities_nearby);
        _this2.selectedTags = JSON.parse(res.data.amenities);

        _this2.$vs.loading.close();
      }).catch(function (err) {
        _this2.$vs.loading.close();

        console.log(err);
      });
    },
    updateHostel: function updateHostel() {
      var _this3 = this;

      this.$vs.loading();
      var fd = new FormData();
      fd.append("hostel_id", this.$route.params.hostelId);
      fd.append("name", this.name);
      fd.append("city", this.city);
      fd.append("state", this.state);
      fd.append("gender", this.gender);
      fd.append("about", this.about);
      fd.append("featured", this.featured ? 1 : 0);
      fd.append("nearby_properties", JSON.stringify(this.nearbyInst));
      fd.append("facilities_nearby", JSON.stringify(this.nearbyFacility));
      fd.append("amenities", JSON.stringify(this.selectedTags));

      for (var i = 0; i < this.images.length; i++) {
        var file = this.images[i];
        fd.append("images[" + i + "]", file);
      }

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/hostels/update", fd).then(function (res) {
        console.log(res);

        _this3.$vs.loading.close();

        _this3.alert("Hostel Update Successfully", "", "green");
      }).catch(function (err) {
        _this3.alert("Hostels Not Created", "There is Some Problem Creating Hostel", "red");

        _this3.$vs.loading.close();

        console.log(err);
      });
    },
    getState: function getState() {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/state/get").then(function (res) {
        console.log(res);
        _this4.states = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getCity: function getCity() {
      var _this5 = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/city/get", {
        id: this.state
      }).then(function (res) {
        _this5.cities = [];
        _this5.cities = res.data;

        if (_this5.tempCity != null) {
          _this5.city = _this5.tempCity;
        } //   this.disableC = false;

      }).catch(function (err) {
        console.log(err);
      });
    },
    successUpload: function successUpload(event) {
      // console.log(this.$refs.upload_featured.$data.filesx)
      var files = this.$refs.upload_featured.$data.filesx;
      this.images = [];

      for (var i = 0; i < files.length; i++) {
        if (!files[i].remove) {
          this.images.push(files[i]);
        }
      }

      console.log(this.featuredFiles);
    },
    enableCity: function enableCity() {
      this.getCity(this.tempCity);
    },
    addFacility: function addFacility() {
      if (this.nearbyFacility.length < 4) {
        this.nearbyFacility.push({
          name: "",
          distance: "",
          remove: true
        });
      }
    },
    addNear: function addNear() {
      if (this.nearbyInst.length < 4) {
        this.nearbyInst.push({
          property: "",
          distance: "",
          remove: true
        });
      }
    },
    removeNear: function removeNear(i) {
      this.nearbyInst.splice(i, 1);
    },
    removeFacility: function removeFacility(i) {
      this.nearbyFacility.splice(i, 1);
    },
    removeSelected: function removeSelected(val) {
      this.selectedTags.splice(this.selectedTags.indexOf(val), 1);
    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: "top-right"
      });
    }
  },
  components: {
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_4__["quillEditor"],
    "v-select": vue_select__WEBPACK_IMPORTED_MODULE_5___default.a
  },
  beforeMount: function beforeMount() {
    this.$vs.loading();
    this.getHostel();
    this.getState();
    this.getProp();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostels/update.vue?vue&type=template&id=96881a84&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/hostels/update.vue?vue&type=template&id=96881a84&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
        _c(
          "vx-card",
          { attrs: { title: "Update Hostel" } },
          [
            _c("div", { staticClass: "vx-row mb-6" }, [
              _c("div", { staticClass: "vx-col w-full" })
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row mb-6" }, [
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full" },
                [
                  _c("label", [_vm._v("Hostel Name")]),
                  _vm._v(" "),
                  _c("vs-input", {
                    staticClass: "w-full",
                    attrs: { placeholder: "Hostel Name" },
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
              _c(
                "div",
                { staticClass: "vx-col md:w-1/3 w-full" },
                [
                  _c("label", [_vm._v("State")]),
                  _vm._v(" "),
                  _c("v-select", {
                    attrs: {
                      autocomplete: "nope",
                      reduce: function(st) {
                        return st.id
                      },
                      label: "name",
                      placeholder: "Select State",
                      options: _vm.states,
                      dir: _vm.$vs.rtl ? "rtl" : "ltr"
                    },
                    on: { input: _vm.enableCity },
                    model: {
                      value: _vm.state,
                      callback: function($$v) {
                        _vm.state = $$v
                      },
                      expression: "state"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col md:w-1/3 w-full" },
                [
                  _c("label", [_vm._v("City")]),
                  _vm._v(" "),
                  _c("v-select", {
                    attrs: {
                      reduce: function(ci) {
                        return ci.id
                      },
                      autocomplete: "nope",
                      placeholder: "Select City",
                      options: _vm.cities,
                      dir: _vm.$vs.rtl ? "rtl" : "ltr"
                    },
                    model: {
                      value: _vm.city,
                      callback: function($$v) {
                        _vm.city = $$v
                      },
                      expression: "city"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mt-4" },
                [
                  _c("label", [_vm._v("Gender")]),
                  _vm._v(" "),
                  _c("vs-input", {
                    staticClass: "w-full",
                    attrs: { placeholder: "Enter Gender" },
                    model: {
                      value: _vm.gender,
                      callback: function($$v) {
                        _vm.gender = $$v
                      },
                      expression: "gender"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col sm:w-1/3 w-full mt-4" },
                [
                  _c("label", [_vm._v("Featured")]),
                  _vm._v(" "),
                  _c("vs-checkbox", {
                    staticClass: "w-full",
                    attrs: { placeholder: "Featured?" },
                    model: {
                      value: _vm.featured,
                      callback: function($$v) {
                        _vm.featured = $$v
                      },
                      expression: "featured"
                    }
                  })
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c("h4", { staticClass: "mb-3" }, [
              _c("strong", [_vm._v("Facilites Near By:")])
            ]),
            _vm._v(" "),
            _vm._l(_vm.nearbyFacility, function(data, i) {
              return _c("div", { key: i, staticClass: "vx-row" }, [
                _c("div", { staticClass: "vx-col w-full mb-base" }, [
                  _c("div", { staticClass: "vx-row mb-2" }, [
                    _c(
                      "div",
                      { staticClass: "vx-col sm:w-2/5 w-full" },
                      [
                        _c("vs-input", {
                          staticStyle: { width: "100%" },
                          attrs: { placeholder: "Facilty Name" },
                          model: {
                            value: data.name,
                            callback: function($$v) {
                              _vm.$set(data, "name", $$v)
                            },
                            expression: "data.name"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "vx-col sm:w-1/4 w-full" },
                      [
                        _c("vs-input", {
                          attrs: { placeholder: "Distance (in Minutes)" },
                          model: {
                            value: data.distance,
                            callback: function($$v) {
                              _vm.$set(data, "distance", $$v)
                            },
                            expression: "data.distance"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "vx-col sm:w-1/4 w-full" },
                      [
                        _c(
                          "vs-button",
                          {
                            attrs: { color: "success" },
                            on: { click: _vm.addFacility }
                          },
                          [_vm._v("+")]
                        ),
                        _vm._v(" "),
                        data.remove
                          ? _c(
                              "vs-button",
                              {
                                attrs: { color: "danger" },
                                on: {
                                  click: function($event) {
                                    return _vm.removeFacility(i)
                                  }
                                }
                              },
                              [_vm._v("-")]
                            )
                          : _vm._e()
                      ],
                      1
                    )
                  ])
                ])
              ])
            }),
            _vm._v(" "),
            _c("h4", { staticClass: "mb-3" }, [
              _c("strong", [_vm._v("NearBy Properties:")])
            ]),
            _vm._v(" "),
            _vm._l(_vm.nearbyInst, function(data, i) {
              return _c("div", { key: i, staticClass: "vx-row" }, [
                _c("div", { staticClass: "vx-col w-full mb-base" }, [
                  _c("div", { staticClass: "vx-row mb-2" }, [
                    _c(
                      "div",
                      { staticClass: "vx-col sm:w-2/5 w-full" },
                      [
                        _c("v-select", {
                          staticStyle: { width: "100%" },
                          attrs: {
                            placeholder: "Select Property",
                            options: _vm.properties,
                            label: "name",
                            reduce: function(property) {
                              return property.name
                            },
                            dir: _vm.$vs.rtl ? "rtl" : "ltr"
                          },
                          on: { change: _vm.getProp },
                          model: {
                            value: data.property,
                            callback: function($$v) {
                              _vm.$set(data, "property", $$v)
                            },
                            expression: "data.property"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "vx-col sm:w-1/4 w-full" },
                      [
                        _c("vs-input", {
                          attrs: { placeholder: "Distance (in Minutes)" },
                          model: {
                            value: data.distance,
                            callback: function($$v) {
                              _vm.$set(data, "distance", $$v)
                            },
                            expression: "data.distance"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "vx-col sm:w-1/4 w-full" },
                      [
                        _c(
                          "vs-button",
                          {
                            attrs: { color: "success" },
                            on: { click: _vm.addNear }
                          },
                          [_vm._v("+")]
                        ),
                        _vm._v(" "),
                        data.remove
                          ? _c(
                              "vs-button",
                              {
                                attrs: { color: "danger" },
                                on: {
                                  click: function($event) {
                                    return _vm.removeNear(i)
                                  }
                                }
                              },
                              [_vm._v("-")]
                            )
                          : _vm._e()
                      ],
                      1
                    )
                  ])
                ])
              ])
            }),
            _vm._v(" "),
            _c("div", { staticClass: "vx-row" }, [
              _c(
                "div",
                { staticClass: "vx-col w-full mb-3" },
                [
                  _c("label", [_vm._v("Amenities")]),
                  _vm._v(" "),
                  _c(
                    "vs-chips",
                    {
                      staticClass: "my-3",
                      attrs: {
                        color: "rgb(145, 32, 159)",
                        placeholder: "Type Amenity and press Enter to add.",
                        "icon-pack": "feather",
                        "remove-icon": "icon-trash-2"
                      },
                      model: {
                        value: _vm.selectedTags,
                        callback: function($$v) {
                          _vm.selectedTags = $$v
                        },
                        expression: "selectedTags"
                      }
                    },
                    _vm._l(_vm.selectedTags, function(chip) {
                      return _c(
                        "vs-chip",
                        {
                          key: chip,
                          attrs: {
                            closable: "",
                            "icon-pack": "feather",
                            "close-icon": "icon-trash-2"
                          },
                          on: {
                            click: function($event) {
                              return _vm.removeSelected(chip)
                            }
                          }
                        },
                        [
                          _vm._v(
                            "\n              " + _vm._s(chip) + "\n            "
                          )
                        ]
                      )
                    }),
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col w-full" },
                [
                  _c("h5", [_vm._v("About Hostel")]),
                  _vm._v(" "),
                  _c("quill-editor", {
                    staticClass: "mt-2 mb-0",
                    attrs: { name: "property_description" },
                    model: {
                      value: _vm.about,
                      callback: function($$v) {
                        _vm.about = $$v
                      },
                      expression: "about"
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
                      on: { click: _vm.updateHostel }
                    },
                    [_vm._v("Update")]
                  )
                ],
                1
              )
            ])
          ],
          2
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/hostels/update.vue":
/*!***************************************************!*\
  !*** ./resources/js/src/views/hostels/update.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _update_vue_vue_type_template_id_96881a84_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./update.vue?vue&type=template&id=96881a84&scoped=true& */ "./resources/js/src/views/hostels/update.vue?vue&type=template&id=96881a84&scoped=true&");
/* harmony import */ var _update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./update.vue?vue&type=script&lang=js& */ "./resources/js/src/views/hostels/update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _update_vue_vue_type_template_id_96881a84_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _update_vue_vue_type_template_id_96881a84_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "96881a84",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/hostels/update.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/hostels/update.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/src/views/hostels/update.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./update.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostels/update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/hostels/update.vue?vue&type=template&id=96881a84&scoped=true&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/src/views/hostels/update.vue?vue&type=template&id=96881a84&scoped=true& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_template_id_96881a84_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./update.vue?vue&type=template&id=96881a84&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/hostels/update.vue?vue&type=template&id=96881a84&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_template_id_96881a84_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_update_vue_vue_type_template_id_96881a84_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);