(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[28],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/index.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuedraggable__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuedraggable */ "./node_modules/vuedraggable/dist/vuedraggable.umd.js");
/* harmony import */ var vuedraggable__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuedraggable__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_prism_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-prism-component */ "./node_modules/vue-prism-component/dist/vue-prism-component.common.js");
/* harmony import */ var vue_prism_component__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_prism_component__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _nested__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./nested */ "./resources/js/src/views/menu/footer/nested.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_3__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      addmenuActive: false,
      categories: [],
      mainCategories: [],
      selectedCatg: [],
      selectAll: false,
      selectAllMain: false,
      // menuLimit: 7,
      customName: "",
      customLink: "",
      selectedMainCatg: [],
      list: []
    };
  },
  watch: {
    selectAll: function selectAll(val) {
      if (val) {
        this.selectedCatg = this.categories;
      } else {
        this.selectedCatg = [];
      }
    } // selectAllMain: function (val) {
    //     if (val) {
    //         for(var i=0; i < this.mainCategories.length; i++) {
    //             this.selectedMainCatg.push(this.mainCategories[i])
    //         }
    //     } else {
    //         this.selectedMainCatg = []
    //     }
    // }

  },
  methods: {
    removeMenu: function removeMenu(index) {
      this.list.splice(index, 1);
    },
    getCategories: function getCategories() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/categories/subcat').then(function (res) {
        console.log(res);
        _this.categories = res.data;
      }).catch(function (err) {
        console.log(err);
      });
    },
    getMainCategories: function getMainCategories() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/categories/parent').then(function (res) {
        console.log(res); // for(var i=0; i < res.data.length; i++) {
        //     this.mainCategories.push(res.data[i].children)
        // }

        _this2.mainCategories = res.data;
        console.log(_this2.mainCategories);
      }).catch(function (err) {
        console.log(err);
      });
    },
    saveMenu: function saveMenu() {
      var _this3 = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/menu/create/footer', {
        menu: JSON.stringify(this.list)
      }).then(function (res) {
        _this3.$vs.loading.close();

        _this3.alert('Menu Updated Successfully', 'Footer Menu Updated Successfully', 'success');
      }).catch(function (err) {
        _this3.alert('There is Some Problem Updating Menu!', '', 'danger');

        _this3.$vs.loading.close();

        console.log(err);
      });
    },
    getMenu: function getMenu() {
      var _this4 = this;

      this.$vs.loading();
      axios__WEBPACK_IMPORTED_MODULE_3___default.a.post('/api/menu/footer/get').then(function (res) {
        if (res.data != null && res.data != "") {
          _this4.list = res.data;
        }

        _this4.$vs.loading.close();
      }).catch(function (err) {
        _this4.$vs.loading.close();

        console.log(err);
      });
    },
    addCatgtoMenu: function addCatgtoMenu() {
      if (this.selectedCatg.length > 0) {
        for (var i = 0; i < this.selectedCatg.length; i++) {
          // if (this.list.length < this.menuLimit) {
          this.list.push({
            name: this.selectedCatg[i].name,
            category: this.selectedCatg[i].id,
            submenu: []
          }); // } else {
          //     this.alert('Cannot add more than ' + this.menuLimit + ' Main Menu', 'Currently Menus are limited to ' + this.menuLimit, 'danger')
          //     break;
          // }
        }

        this.selectedCatg = [];
        this.selectAll = false;
      }
    },
    addMainCatgtoMenu: function addMainCatgtoMenu() {
      if (this.selectedMainCatg.length > 0) {
        for (var i = 0; i < this.selectedMainCatg.length; i++) {
          // if (this.list.length < this.menuLimit) {
          this.list.push({
            name: this.selectedMainCatg[i].name,
            link: '#',
            submenu: []
          }); // } else {
          //     this.alert('Cannot add more than ' + this.menuLimit + ' Main Menu', 'Currently Menus are limited to ' + this.menuLimit, 'danger')
          //     break;
          // }
        }

        this.selectedMainCatg = [];
        this.selectAllMain = false;
      }
    },
    addlinktoMenu: function addlinktoMenu() {
      // if (this.list.length < this.menuLimit) {
      if (this.customName != "" && this.customLink != "") {
        this.list.push({
          name: this.customName,
          link: this.customLink,
          submenu: []
        });
        this.customName = "";
        this.customLink = "";
      } else {
        this.alert('Please Add Both Details to Submit', '', 'danger');
      } // } else {
      //     this.alert('Cannot add more than ' + this.menuLimit + ' Main Menu', 'Currently Menus are limited to ' + this.menuLimit, 'danger')
      // }

    },
    alert: function alert(title, text, color) {
      this.$vs.notify({
        color: color,
        title: title,
        text: text,
        position: 'top-center'
      });
    }
  },
  beforeMount: function beforeMount() {
    this.getMenu();
    this.getMainCategories();
    this.getCategories();
  },
  components: {
    NestedDraggable: _nested__WEBPACK_IMPORTED_MODULE_2__["default"],
    draggable: vuedraggable__WEBPACK_IMPORTED_MODULE_0___default.a,
    nested: _nested__WEBPACK_IMPORTED_MODULE_2__["default"],
    Prism: vue_prism_component__WEBPACK_IMPORTED_MODULE_1___default.a
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/nested.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuedraggable__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuedraggable */ "./node_modules/vuedraggable/dist/vuedraggable.umd.js");
/* harmony import */ var vuedraggable__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuedraggable__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: {
    submenu: {
      required: true,
      type: Array
    }
  },
  methods: {
    removeMenu: function removeMenu(index) {
      this.submenu.splice(index, 1);
    }
  },
  components: {
    draggable: vuedraggable__WEBPACK_IMPORTED_MODULE_0___default.a
  },
  name: "nested-draggable"
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "/*.blog_menu .vs-collapse-item--content{*/\n\n/*    overflow-y: scroll!important;*/\n\n/*}*/\n.blog_menu.open-item > .vs-collapse-item--content {\n  height: 350px !important;\n  max-height: 350px !important;\n}\n.list-item {\n  transition: all .5s\n}\n.categoryDiv {\n  overflow-y: scroll;\n  max-height: 150px;\n  height: 150px;\n}\n[dir] .categoryDiv {\n  border: 1px solid lightgrey;\n  border-radius: 7px;\n  padding: 10px !important;\n}\n[dir] .categories li {\n  margin-bottom: 6px !important;\n}\n[dir] .dragArea li > div {\n  cursor: move;\n  background: whitesmoke;\n  border-radius: 7px;\n  border: 1px solid #b5b8bd;\n  margin-bottom: 5px;\n  box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;\n}\n.category-label{\n  font-size: 15px;\n  font-weight: bolder;\n}\n[dir] .category-label{\n  padding: 7px;\n}\n.custom-badge{\n  color: white;\n}\n[dir] .custom-badge{\n  background: coral;\n  padding: 3px 6px;\n  border-radius: 8px;\n}\n[dir=ltr] .custom-badge{\n  margin-left: 7px;\n}\n[dir=rtl] .custom-badge{\n  margin-right: 7px;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "[dir] .dragArea[data-v-3252f245] {\n  margin-top: 10px;\n}[dir=ltr] .dragArea[data-v-3252f245] {\n  margin-left: 30px;\n}[dir=rtl] .dragArea[data-v-3252f245] {\n  margin-right: 30px;\n}\n[dir] .dragArea li > div[data-v-3252f245] {\n  cursor: move;\n  background: whitesmoke;\n  border-radius: 7px;\n  border: 1px solid #b5b8bd;\n  margin-bottom: 5px;\n  box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader??ref--7-1!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader??ref--7-1!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=template&id=7009d174&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/index.vue?vue&type=template&id=7009d174& ***!
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
  return _c("div", [
    _c("div", { staticClass: "vx-row" }, [
      _c(
        "div",
        { staticClass: "vx-col w-full md:w-1/3" },
        [
          _c("vx-card", { attrs: { title: "Categories" } }, [
            _c("div", { staticClass: "mt-5" }, [
              _c("p", { staticClass: "category-label" }, [_vm._v("Category")]),
              _vm._v(" "),
              _c("div", { staticClass: "categoryDiv" }, [
                _c(
                  "ul",
                  { staticClass: "centerx categories" },
                  _vm._l(_vm.mainCategories, function(data, i) {
                    return _c(
                      "li",
                      { key: i },
                      [
                        _c(
                          "vs-checkbox",
                          {
                            attrs: { "vs-value": data },
                            model: {
                              value: _vm.selectedMainCatg,
                              callback: function($$v) {
                                _vm.selectedMainCatg = $$v
                              },
                              expression: "selectedMainCatg"
                            }
                          },
                          [_vm._v(_vm._s(data.name))]
                        )
                      ],
                      1
                    )
                  }),
                  0
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "vx-row mt-5" }, [
                _c("div", { staticClass: "vx-col w-full md:w-1/2" }),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "vx-col w-full md:w-1/2" },
                  [
                    _c(
                      "vs-button",
                      {
                        staticStyle: {
                          float: "right",
                          padding: "8px!important"
                        },
                        attrs: { color: "rgb(62, 201, 214)" },
                        on: { click: _vm.addMainCatgtoMenu }
                      },
                      [
                        _vm._v(
                          "\n                                Add to Menu\n                            "
                        )
                      ]
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("br"),
              _vm._v(" "),
              _c("hr"),
              _vm._v(" "),
              _c("p", { staticClass: "category-label" }, [
                _vm._v("Course Categories")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "categoryDiv" }, [
                _c(
                  "ul",
                  { staticClass: "centerx categories" },
                  _vm._l(_vm.categories, function(data, i) {
                    return _c(
                      "li",
                      { key: i },
                      [
                        _c(
                          "vs-checkbox",
                          {
                            attrs: { "vs-value": data },
                            model: {
                              value: _vm.selectedCatg,
                              callback: function($$v) {
                                _vm.selectedCatg = $$v
                              },
                              expression: "selectedCatg"
                            }
                          },
                          [_vm._v(_vm._s(data.name))]
                        )
                      ],
                      1
                    )
                  }),
                  0
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "vx-row mt-5" }, [
                _c(
                  "div",
                  { staticClass: "vx-col w-full md:w-1/2" },
                  [
                    _c(
                      "vs-checkbox",
                      {
                        model: {
                          value: _vm.selectAll,
                          callback: function($$v) {
                            _vm.selectAll = $$v
                          },
                          expression: "selectAll"
                        }
                      },
                      [_vm._v("Select all")]
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "vx-col w-full md:w-1/2" },
                  [
                    _c(
                      "vs-button",
                      {
                        staticStyle: {
                          float: "right",
                          padding: "8px!important"
                        },
                        attrs: { color: "rgb(62, 201, 214)" },
                        on: { click: _vm.addCatgtoMenu }
                      },
                      [
                        _vm._v(
                          "\n                                Add to Menu\n                            "
                        )
                      ]
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "mt-6" },
                [
                  _c(
                    "vs-collapse",
                    { attrs: { type: "border", accordion: "" } },
                    [
                      _c("vs-collapse-item", [
                        _c(
                          "div",
                          { attrs: { slot: "header" }, slot: "header" },
                          [_vm._v("Custom Link")]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "vx-row" }, [
                          _c(
                            "div",
                            { staticClass: "vx-col w-full mb-2" },
                            [
                              _c("vs-input", {
                                staticClass: "w-full",
                                attrs: { placeholder: "Name" },
                                model: {
                                  value: _vm.customName,
                                  callback: function($$v) {
                                    _vm.customName = $$v
                                  },
                                  expression: "customName"
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "vx-col w-full mb-2" },
                            [
                              _c("vs-input", {
                                staticClass: "w-full",
                                attrs: { placeholder: "Link" },
                                model: {
                                  value: _vm.customLink,
                                  callback: function($$v) {
                                    _vm.customLink = $$v
                                  },
                                  expression: "customLink"
                                }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "vx-col w-full" },
                            [
                              _c(
                                "vs-button",
                                {
                                  staticClass: "float-right",
                                  on: { click: _vm.addlinktoMenu }
                                },
                                [_vm._v("ADD")]
                              )
                            ],
                            1
                          )
                        ])
                      ])
                    ],
                    1
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
        { staticClass: "vx-col w-full md:w-2/3" },
        [
          _c("vx-card", { attrs: { title: "Footer Menu" } }, [
            _c("div", { staticClass: "vx-row" }, [
              _c("div", { staticClass: "vx-col md:w-3/4 w-full" }),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "vx-col md:w-1/4 w-full" },
                [
                  _c(
                    "vs-button",
                    {
                      staticClass: "float-right",
                      staticStyle: { padding: "8px!important" },
                      attrs: { color: "rgb(62, 201, 214)" },
                      on: { click: _vm.saveMenu }
                    },
                    [_vm._v("Save Menu\n                        ")]
                  )
                ],
                1
              )
            ]),
            _vm._v(" "),
            _vm.list.length > 0
              ? _c(
                  "div",
                  { staticClass: "mt-5" },
                  [
                    _c(
                      "vs-collapse",
                      { attrs: { type: "margin", accordion: "" } },
                      [
                        _c(
                          "draggable",
                          {
                            staticClass: "dragArea",
                            attrs: {
                              tag: "ul",
                              list: _vm.list,
                              group: { name: "g1" }
                            }
                          },
                          _vm._l(_vm.list, function(el, i) {
                            return _c(
                              "li",
                              { key: i },
                              [
                                _c("div", [
                                  _c(
                                    "div",
                                    { staticClass: "flex vx-row px-6" },
                                    [
                                      _c(
                                        "div",
                                        {
                                          staticClass: "flex-1",
                                          staticStyle: {
                                            "place-self": "center"
                                          }
                                        },
                                        [
                                          _vm._v(_vm._s(el.name) + " "),
                                          _c(
                                            "span",
                                            {
                                              staticClass:
                                                "badge custom-badge badge-info"
                                            },
                                            [_vm._v("Main")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        {
                                          staticClass: "vx-col w-full md:w-1/4"
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass: "vx-row float-right"
                                            },
                                            [
                                              _c(
                                                "div",
                                                { staticClass: "vx-col-2" },
                                                [
                                                  _c("vs-avatar", {
                                                    staticStyle: {
                                                      background: "rgb(229 9 9)"
                                                    },
                                                    attrs: {
                                                      "icon-pack": "feather",
                                                      icon: "icon-trash"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.removeMenu(i)
                                                      }
                                                    }
                                                  })
                                                ],
                                                1
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ]),
                                _vm._v(" "),
                                el.submenu
                                  ? _c("nested-draggable", {
                                      attrs: { submenu: el.submenu }
                                    })
                                  : _vm._e()
                              ],
                              1
                            )
                          }),
                          0
                        )
                      ],
                      1
                    )
                  ],
                  1
                )
              : _c(
                  "div",
                  {
                    staticStyle: {
                      padding: "100px",
                      "text-align-last": "center"
                    }
                  },
                  [
                    _vm._v(
                      "\n                    No Menu Items Select to add Menu\n                "
                    )
                  ]
                )
          ])
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=template&id=3252f245&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/menu/footer/nested.vue?vue&type=template&id=3252f245&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************/
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
    "draggable",
    {
      staticClass: "dragArea",
      attrs: { tag: "ul", list: _vm.submenu, group: { name: "g1" } }
    },
    _vm._l(_vm.submenu, function(el, i) {
      return _c("li", { key: i }, [
        _c("div", [
          _c("div", { staticClass: "flex vx-row px-6" }, [
            _c(
              "div",
              {
                staticClass: "flex-1",
                staticStyle: { "place-self": "center" }
              },
              [_vm._v(_vm._s(el.name))]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "vx-col w-full md:w-1/4" }, [
              _c("div", { staticClass: "vx-row float-right" }, [
                _c(
                  "div",
                  { staticClass: "vx-col-2" },
                  [
                    _c("vs-avatar", {
                      staticStyle: { background: "rgb(229 9 9)" },
                      attrs: { "icon-pack": "feather", icon: "icon-trash" },
                      on: {
                        click: function($event) {
                          return _vm.removeMenu(i)
                        }
                      }
                    })
                  ],
                  1
                )
              ])
            ])
          ])
        ])
      ])
    }),
    0
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/menu/footer/index.vue":
/*!******************************************************!*\
  !*** ./resources/js/src/views/menu/footer/index.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_7009d174___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=7009d174& */ "./resources/js/src/views/menu/footer/index.vue?vue&type=template&id=7009d174&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/src/views/menu/footer/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.vue?vue&type=style&index=0&lang=css& */ "./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_7009d174___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_7009d174___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/menu/footer/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/menu/footer/index.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/src/views/menu/footer/index.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************!*\
  !*** ./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/style-loader!../../../../../../node_modules/css-loader??ref--7-1!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/src/views/menu/footer/index.vue?vue&type=template&id=7009d174&":
/*!*************************************************************************************!*\
  !*** ./resources/js/src/views/menu/footer/index.vue?vue&type=template&id=7009d174& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_7009d174___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=7009d174& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/index.vue?vue&type=template&id=7009d174&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_7009d174___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_7009d174___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/src/views/menu/footer/nested.vue":
/*!*******************************************************!*\
  !*** ./resources/js/src/views/menu/footer/nested.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _nested_vue_vue_type_template_id_3252f245_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./nested.vue?vue&type=template&id=3252f245&scoped=true& */ "./resources/js/src/views/menu/footer/nested.vue?vue&type=template&id=3252f245&scoped=true&");
/* harmony import */ var _nested_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./nested.vue?vue&type=script&lang=js& */ "./resources/js/src/views/menu/footer/nested.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _nested_vue_vue_type_style_index_0_id_3252f245_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css& */ "./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _nested_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _nested_vue_vue_type_template_id_3252f245_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _nested_vue_vue_type_template_id_3252f245_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "3252f245",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/menu/footer/nested.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/menu/footer/nested.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/src/views/menu/footer/nested.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./nested.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css&":
/*!****************************************************************************************************************!*\
  !*** ./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css& ***!
  \****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_style_index_0_id_3252f245_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/style-loader!../../../../../../node_modules/css-loader??ref--7-1!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--7-2!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=style&index=0&id=3252f245&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_style_index_0_id_3252f245_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_style_index_0_id_3252f245_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_style_index_0_id_3252f245_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_style_index_0_id_3252f245_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/src/views/menu/footer/nested.vue?vue&type=template&id=3252f245&scoped=true&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/src/views/menu/footer/nested.vue?vue&type=template&id=3252f245&scoped=true& ***!
  \**************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_template_id_3252f245_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./nested.vue?vue&type=template&id=3252f245&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/menu/footer/nested.vue?vue&type=template&id=3252f245&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_template_id_3252f245_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_nested_vue_vue_type_template_id_3252f245_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);