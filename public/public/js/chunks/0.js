(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/quill/dist/quill.bubble.css":
/*!**********************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/postcss-loader/src??ref--7-2!./node_modules/quill/dist/quill.bubble.css ***!
  \**********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "/*!\n * Quill Editor v1.3.7\n * https://quilljs.com/\n * Copyright (c) 2014, Jason Chen\n * Copyright (c) 2013, salesforce.com\n */\n\n.ql-container {\n  box-sizing: border-box;\n  font-family: Helvetica, Arial, sans-serif;\n  font-size: 13px;\n  height: 100%;\n  position: relative;\n}\n\n[dir] .ql-container {\n  margin: 0px;\n}\n\n.ql-container.ql-disabled .ql-tooltip {\n  visibility: hidden;\n}\n\n.ql-container.ql-disabled .ql-editor ul[data-checked] > li::before {\n  pointer-events: none;\n}\n\n.ql-clipboard {\n  height: 1px;\n  overflow-y: hidden;\n  position: absolute;\n  top: 50%;\n}\n\n[dir=ltr] .ql-clipboard {\n  left: -100000px;\n}\n\n[dir=rtl] .ql-clipboard {\n  right: -100000px;\n}\n\n[dir] .ql-clipboard p {\n  margin: 0;\n  padding: 0;\n}\n\n.ql-editor {\n  box-sizing: border-box;\n  line-height: 1.42;\n  height: 100%;\n  outline: none;\n  overflow-y: auto;\n  -o-tab-size: 4;\n     tab-size: 4;\n  -moz-tab-size: 4;\n  white-space: pre-wrap;\n  word-wrap: break-word;\n}\n\n[dir] .ql-editor {\n  padding: 12px 15px;\n}\n\n[dir=ltr] .ql-editor {\n  text-align: left;\n}\n\n[dir=rtl] .ql-editor {\n  text-align: right;\n}\n\n[dir] .ql-editor > * {\n  cursor: text;\n}\n\n.ql-editor p,\n.ql-editor ol,\n.ql-editor ul,\n.ql-editor pre,\n.ql-editor blockquote,\n.ql-editor h1,\n.ql-editor h2,\n.ql-editor h3,\n.ql-editor h4,\n.ql-editor h5,\n.ql-editor h6 {\n  counter-reset: list-1 list-2 list-3 list-4 list-5 list-6 list-7 list-8 list-9;\n}\n\n[dir] .ql-editor p, [dir] .ql-editor ol, [dir] .ql-editor ul, [dir] .ql-editor pre, [dir] .ql-editor blockquote, [dir] .ql-editor h1, [dir] .ql-editor h2, [dir] .ql-editor h3, [dir] .ql-editor h4, [dir] .ql-editor h5, [dir] .ql-editor h6 {\n  margin: 0;\n  padding: 0;\n}\n\n[dir=ltr] .ql-editor ol, [dir=ltr] .ql-editor ul {\n  padding-left: 1.5em;\n}\n\n[dir=rtl] .ql-editor ol, [dir=rtl] .ql-editor ul {\n  padding-right: 1.5em;\n}\n\n.ql-editor ol > li,\n.ql-editor ul > li {\n  list-style-type: none;\n}\n\n.ql-editor ul > li::before {\n  content: '\\2022';\n}\n\n.ql-editor ul[data-checked=true],\n.ql-editor ul[data-checked=false] {\n  pointer-events: none;\n}\n\n.ql-editor ul[data-checked=true] > li *,\n.ql-editor ul[data-checked=false] > li * {\n  pointer-events: all;\n}\n\n.ql-editor ul[data-checked=true] > li::before,\n.ql-editor ul[data-checked=false] > li::before {\n  color: #777;\n  pointer-events: all;\n}\n\n[dir] .ql-editor ul[data-checked=true] > li::before, [dir] .ql-editor ul[data-checked=false] > li::before {\n  cursor: pointer;\n}\n\n.ql-editor ul[data-checked=true] > li::before {\n  content: '\\2611';\n}\n\n.ql-editor ul[data-checked=false] > li::before {\n  content: '\\2610';\n}\n\n.ql-editor li::before {\n  display: inline-block;\n  white-space: nowrap;\n  width: 1.2em;\n}\n\n[dir=ltr] .ql-editor li:not(.ql-direction-rtl)::before {\n  margin-left: -1.5em;\n  margin-right: 0.3em;\n  text-align: right;\n}\n\n[dir=rtl] .ql-editor li:not(.ql-direction-rtl)::before {\n  margin-right: -1.5em;\n  margin-left: 0.3em;\n  text-align: left;\n}\n\n[dir=ltr] .ql-editor li.ql-direction-rtl::before {\n  margin-left: 0.3em;\n  margin-right: -1.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-direction-rtl::before {\n  margin-right: 0.3em;\n  margin-left: -1.5em;\n}\n\n[dir=ltr] .ql-editor ol li:not(.ql-direction-rtl), [dir=ltr] .ql-editor ul li:not(.ql-direction-rtl) {\n  padding-left: 1.5em;\n}\n\n[dir=rtl] .ql-editor ol li:not(.ql-direction-rtl), [dir=rtl] .ql-editor ul li:not(.ql-direction-rtl) {\n  padding-right: 1.5em;\n}\n\n[dir=ltr] .ql-editor ol li.ql-direction-rtl, [dir=ltr] .ql-editor ul li.ql-direction-rtl {\n  padding-right: 1.5em;\n}\n\n[dir=rtl] .ql-editor ol li.ql-direction-rtl, [dir=rtl] .ql-editor ul li.ql-direction-rtl {\n  padding-left: 1.5em;\n}\n\n.ql-editor ol li {\n  counter-reset: list-1 list-2 list-3 list-4 list-5 list-6 list-7 list-8 list-9;\n  counter-increment: list-0;\n}\n\n.ql-editor ol li:before {\n  content: counter(list-0, decimal) '. ';\n}\n\n.ql-editor ol li.ql-indent-1 {\n  counter-increment: list-1;\n}\n\n.ql-editor ol li.ql-indent-1:before {\n  content: counter(list-1, lower-alpha) '. ';\n}\n\n.ql-editor ol li.ql-indent-1 {\n  counter-reset: list-2 list-3 list-4 list-5 list-6 list-7 list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-2 {\n  counter-increment: list-2;\n}\n\n.ql-editor ol li.ql-indent-2:before {\n  content: counter(list-2, lower-roman) '. ';\n}\n\n.ql-editor ol li.ql-indent-2 {\n  counter-reset: list-3 list-4 list-5 list-6 list-7 list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-3 {\n  counter-increment: list-3;\n}\n\n.ql-editor ol li.ql-indent-3:before {\n  content: counter(list-3, decimal) '. ';\n}\n\n.ql-editor ol li.ql-indent-3 {\n  counter-reset: list-4 list-5 list-6 list-7 list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-4 {\n  counter-increment: list-4;\n}\n\n.ql-editor ol li.ql-indent-4:before {\n  content: counter(list-4, lower-alpha) '. ';\n}\n\n.ql-editor ol li.ql-indent-4 {\n  counter-reset: list-5 list-6 list-7 list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-5 {\n  counter-increment: list-5;\n}\n\n.ql-editor ol li.ql-indent-5:before {\n  content: counter(list-5, lower-roman) '. ';\n}\n\n.ql-editor ol li.ql-indent-5 {\n  counter-reset: list-6 list-7 list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-6 {\n  counter-increment: list-6;\n}\n\n.ql-editor ol li.ql-indent-6:before {\n  content: counter(list-6, decimal) '. ';\n}\n\n.ql-editor ol li.ql-indent-6 {\n  counter-reset: list-7 list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-7 {\n  counter-increment: list-7;\n}\n\n.ql-editor ol li.ql-indent-7:before {\n  content: counter(list-7, lower-alpha) '. ';\n}\n\n.ql-editor ol li.ql-indent-7 {\n  counter-reset: list-8 list-9;\n}\n\n.ql-editor ol li.ql-indent-8 {\n  counter-increment: list-8;\n}\n\n.ql-editor ol li.ql-indent-8:before {\n  content: counter(list-8, lower-roman) '. ';\n}\n\n.ql-editor ol li.ql-indent-8 {\n  counter-reset: list-9;\n}\n\n.ql-editor ol li.ql-indent-9 {\n  counter-increment: list-9;\n}\n\n.ql-editor ol li.ql-indent-9:before {\n  content: counter(list-9, decimal) '. ';\n}\n\n[dir=ltr] .ql-editor .ql-indent-1:not(.ql-direction-rtl) {\n  padding-left: 3em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-1:not(.ql-direction-rtl) {\n  padding-right: 3em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-1:not(.ql-direction-rtl) {\n  padding-left: 4.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-1:not(.ql-direction-rtl) {\n  padding-right: 4.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-1.ql-direction-rtl.ql-align-right {\n  padding-right: 3em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-1.ql-direction-rtl.ql-align-right {\n  padding-left: 3em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-1.ql-direction-rtl.ql-align-right {\n  padding-right: 4.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-1.ql-direction-rtl.ql-align-right {\n  padding-left: 4.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-2:not(.ql-direction-rtl) {\n  padding-left: 6em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-2:not(.ql-direction-rtl) {\n  padding-right: 6em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-2:not(.ql-direction-rtl) {\n  padding-left: 7.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-2:not(.ql-direction-rtl) {\n  padding-right: 7.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-2.ql-direction-rtl.ql-align-right {\n  padding-right: 6em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-2.ql-direction-rtl.ql-align-right {\n  padding-left: 6em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-2.ql-direction-rtl.ql-align-right {\n  padding-right: 7.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-2.ql-direction-rtl.ql-align-right {\n  padding-left: 7.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-3:not(.ql-direction-rtl) {\n  padding-left: 9em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-3:not(.ql-direction-rtl) {\n  padding-right: 9em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-3:not(.ql-direction-rtl) {\n  padding-left: 10.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-3:not(.ql-direction-rtl) {\n  padding-right: 10.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-3.ql-direction-rtl.ql-align-right {\n  padding-right: 9em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-3.ql-direction-rtl.ql-align-right {\n  padding-left: 9em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-3.ql-direction-rtl.ql-align-right {\n  padding-right: 10.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-3.ql-direction-rtl.ql-align-right {\n  padding-left: 10.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-4:not(.ql-direction-rtl) {\n  padding-left: 12em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-4:not(.ql-direction-rtl) {\n  padding-right: 12em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-4:not(.ql-direction-rtl) {\n  padding-left: 13.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-4:not(.ql-direction-rtl) {\n  padding-right: 13.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-4.ql-direction-rtl.ql-align-right {\n  padding-right: 12em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-4.ql-direction-rtl.ql-align-right {\n  padding-left: 12em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-4.ql-direction-rtl.ql-align-right {\n  padding-right: 13.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-4.ql-direction-rtl.ql-align-right {\n  padding-left: 13.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-5:not(.ql-direction-rtl) {\n  padding-left: 15em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-5:not(.ql-direction-rtl) {\n  padding-right: 15em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-5:not(.ql-direction-rtl) {\n  padding-left: 16.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-5:not(.ql-direction-rtl) {\n  padding-right: 16.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-5.ql-direction-rtl.ql-align-right {\n  padding-right: 15em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-5.ql-direction-rtl.ql-align-right {\n  padding-left: 15em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-5.ql-direction-rtl.ql-align-right {\n  padding-right: 16.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-5.ql-direction-rtl.ql-align-right {\n  padding-left: 16.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-6:not(.ql-direction-rtl) {\n  padding-left: 18em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-6:not(.ql-direction-rtl) {\n  padding-right: 18em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-6:not(.ql-direction-rtl) {\n  padding-left: 19.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-6:not(.ql-direction-rtl) {\n  padding-right: 19.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-6.ql-direction-rtl.ql-align-right {\n  padding-right: 18em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-6.ql-direction-rtl.ql-align-right {\n  padding-left: 18em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-6.ql-direction-rtl.ql-align-right {\n  padding-right: 19.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-6.ql-direction-rtl.ql-align-right {\n  padding-left: 19.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-7:not(.ql-direction-rtl) {\n  padding-left: 21em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-7:not(.ql-direction-rtl) {\n  padding-right: 21em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-7:not(.ql-direction-rtl) {\n  padding-left: 22.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-7:not(.ql-direction-rtl) {\n  padding-right: 22.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-7.ql-direction-rtl.ql-align-right {\n  padding-right: 21em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-7.ql-direction-rtl.ql-align-right {\n  padding-left: 21em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-7.ql-direction-rtl.ql-align-right {\n  padding-right: 22.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-7.ql-direction-rtl.ql-align-right {\n  padding-left: 22.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-8:not(.ql-direction-rtl) {\n  padding-left: 24em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-8:not(.ql-direction-rtl) {\n  padding-right: 24em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-8:not(.ql-direction-rtl) {\n  padding-left: 25.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-8:not(.ql-direction-rtl) {\n  padding-right: 25.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-8.ql-direction-rtl.ql-align-right {\n  padding-right: 24em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-8.ql-direction-rtl.ql-align-right {\n  padding-left: 24em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-8.ql-direction-rtl.ql-align-right {\n  padding-right: 25.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-8.ql-direction-rtl.ql-align-right {\n  padding-left: 25.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-9:not(.ql-direction-rtl) {\n  padding-left: 27em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-9:not(.ql-direction-rtl) {\n  padding-right: 27em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-9:not(.ql-direction-rtl) {\n  padding-left: 28.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-9:not(.ql-direction-rtl) {\n  padding-right: 28.5em;\n}\n\n[dir=ltr] .ql-editor .ql-indent-9.ql-direction-rtl.ql-align-right {\n  padding-right: 27em;\n}\n\n[dir=rtl] .ql-editor .ql-indent-9.ql-direction-rtl.ql-align-right {\n  padding-left: 27em;\n}\n\n[dir=ltr] .ql-editor li.ql-indent-9.ql-direction-rtl.ql-align-right {\n  padding-right: 28.5em;\n}\n\n[dir=rtl] .ql-editor li.ql-indent-9.ql-direction-rtl.ql-align-right {\n  padding-left: 28.5em;\n}\n\n.ql-editor .ql-video {\n  display: block;\n  max-width: 100%;\n}\n\n[dir] .ql-editor .ql-video.ql-align-center {\n  margin: 0 auto;\n}\n\n[dir=ltr] .ql-editor .ql-video.ql-align-right {\n  margin: 0 0 0 auto;\n}\n\n[dir=rtl] .ql-editor .ql-video.ql-align-right {\n  margin: 0 auto 0 0;\n}\n\n[dir] .ql-editor .ql-bg-black {\n  background-color: #000;\n}\n\n[dir] .ql-editor .ql-bg-red {\n  background-color: #e60000;\n}\n\n[dir] .ql-editor .ql-bg-orange {\n  background-color: #f90;\n}\n\n[dir] .ql-editor .ql-bg-yellow {\n  background-color: #ff0;\n}\n\n[dir] .ql-editor .ql-bg-green {\n  background-color: #008a00;\n}\n\n[dir] .ql-editor .ql-bg-blue {\n  background-color: #06c;\n}\n\n[dir] .ql-editor .ql-bg-purple {\n  background-color: #93f;\n}\n\n.ql-editor .ql-color-white {\n  color: #fff;\n}\n\n.ql-editor .ql-color-red {\n  color: #e60000;\n}\n\n.ql-editor .ql-color-orange {\n  color: #f90;\n}\n\n.ql-editor .ql-color-yellow {\n  color: #ff0;\n}\n\n.ql-editor .ql-color-green {\n  color: #008a00;\n}\n\n.ql-editor .ql-color-blue {\n  color: #06c;\n}\n\n.ql-editor .ql-color-purple {\n  color: #93f;\n}\n\n.ql-editor .ql-font-serif {\n  font-family: Georgia, Times New Roman, serif;\n}\n\n.ql-editor .ql-font-monospace {\n  font-family: Monaco, Courier New, monospace;\n}\n\n.ql-editor .ql-size-small {\n  font-size: 0.75em;\n}\n\n.ql-editor .ql-size-large {\n  font-size: 1.5em;\n}\n\n.ql-editor .ql-size-huge {\n  font-size: 2.5em;\n}\n\n[dir] .ql-editor .ql-direction-rtl {\n  text-align: inherit;\n}\n\n[dir=ltr] .ql-editor .ql-direction-rtl {\n  direction: rtl;\n}\n\n[dir=rtl] .ql-editor .ql-direction-rtl {\n  direction: ltr;\n}\n\n[dir] .ql-editor .ql-align-center {\n  text-align: center;\n}\n\n[dir] .ql-editor .ql-align-justify {\n  text-align: justify;\n}\n\n[dir=ltr] .ql-editor .ql-align-right {\n  text-align: right;\n}\n\n[dir=rtl] .ql-editor .ql-align-right {\n  text-align: left;\n}\n\n.ql-editor.ql-blank::before {\n  color: rgba(0,0,0,0.6);\n  content: attr(data-placeholder);\n  font-style: italic;\n  pointer-events: none;\n  position: absolute;\n}\n\n[dir=ltr] .ql-editor.ql-blank::before {\n  left: 15px;\n  right: 15px;\n}\n\n[dir=rtl] .ql-editor.ql-blank::before {\n  right: 15px;\n  left: 15px;\n}\n\n.ql-bubble.ql-toolbar:after,\n.ql-bubble .ql-toolbar:after {\n  content: '';\n  display: table;\n}\n\n[dir] .ql-bubble.ql-toolbar:after, [dir] .ql-bubble .ql-toolbar:after {\n  clear: both;\n}\n\n.ql-bubble.ql-toolbar button,\n.ql-bubble .ql-toolbar button {\n  display: inline-block;\n  height: 24px;\n  width: 28px;\n}\n\n[dir] .ql-bubble.ql-toolbar button, [dir] .ql-bubble .ql-toolbar button {\n  background: none;\n  border: none;\n  cursor: pointer;\n  padding: 3px 5px;\n}\n\n[dir=ltr] .ql-bubble.ql-toolbar button, [dir=ltr] .ql-bubble .ql-toolbar button {\n  float: left;\n}\n\n[dir=rtl] .ql-bubble.ql-toolbar button, [dir=rtl] .ql-bubble .ql-toolbar button {\n  float: right;\n}\n\n.ql-bubble.ql-toolbar button svg,\n.ql-bubble .ql-toolbar button svg {\n  height: 100%;\n}\n\n[dir=ltr] .ql-bubble.ql-toolbar button svg, [dir=ltr] .ql-bubble .ql-toolbar button svg {\n  float: left;\n}\n\n[dir=rtl] .ql-bubble.ql-toolbar button svg, [dir=rtl] .ql-bubble .ql-toolbar button svg {\n  float: right;\n}\n\n.ql-bubble.ql-toolbar button:active:hover,\n.ql-bubble .ql-toolbar button:active:hover {\n  outline: none;\n}\n\n.ql-bubble.ql-toolbar input.ql-image[type=file],\n.ql-bubble .ql-toolbar input.ql-image[type=file] {\n  display: none;\n}\n\n.ql-bubble.ql-toolbar button:hover,\n.ql-bubble .ql-toolbar button:hover,\n.ql-bubble.ql-toolbar button:focus,\n.ql-bubble .ql-toolbar button:focus,\n.ql-bubble.ql-toolbar button.ql-active,\n.ql-bubble .ql-toolbar button.ql-active,\n.ql-bubble.ql-toolbar .ql-picker-label:hover,\n.ql-bubble .ql-toolbar .ql-picker-label:hover,\n.ql-bubble.ql-toolbar .ql-picker-label.ql-active,\n.ql-bubble .ql-toolbar .ql-picker-label.ql-active,\n.ql-bubble.ql-toolbar .ql-picker-item:hover,\n.ql-bubble .ql-toolbar .ql-picker-item:hover,\n.ql-bubble.ql-toolbar .ql-picker-item.ql-selected,\n.ql-bubble .ql-toolbar .ql-picker-item.ql-selected {\n  color: #fff;\n}\n\n.ql-bubble.ql-toolbar button:hover .ql-fill,\n.ql-bubble .ql-toolbar button:hover .ql-fill,\n.ql-bubble.ql-toolbar button:focus .ql-fill,\n.ql-bubble .ql-toolbar button:focus .ql-fill,\n.ql-bubble.ql-toolbar button.ql-active .ql-fill,\n.ql-bubble .ql-toolbar button.ql-active .ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-label:hover .ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-label:hover .ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-label.ql-active .ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-label.ql-active .ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-item:hover .ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-item:hover .ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-item.ql-selected .ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-item.ql-selected .ql-fill,\n.ql-bubble.ql-toolbar button:hover .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar button:hover .ql-stroke.ql-fill,\n.ql-bubble.ql-toolbar button:focus .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar button:focus .ql-stroke.ql-fill,\n.ql-bubble.ql-toolbar button.ql-active .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar button.ql-active .ql-stroke.ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-label:hover .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-label:hover .ql-stroke.ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-label.ql-active .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-label.ql-active .ql-stroke.ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-item:hover .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-item:hover .ql-stroke.ql-fill,\n.ql-bubble.ql-toolbar .ql-picker-item.ql-selected .ql-stroke.ql-fill,\n.ql-bubble .ql-toolbar .ql-picker-item.ql-selected .ql-stroke.ql-fill {\n  fill: #fff;\n}\n\n.ql-bubble.ql-toolbar button:hover .ql-stroke,\n.ql-bubble .ql-toolbar button:hover .ql-stroke,\n.ql-bubble.ql-toolbar button:focus .ql-stroke,\n.ql-bubble .ql-toolbar button:focus .ql-stroke,\n.ql-bubble.ql-toolbar button.ql-active .ql-stroke,\n.ql-bubble .ql-toolbar button.ql-active .ql-stroke,\n.ql-bubble.ql-toolbar .ql-picker-label:hover .ql-stroke,\n.ql-bubble .ql-toolbar .ql-picker-label:hover .ql-stroke,\n.ql-bubble.ql-toolbar .ql-picker-label.ql-active .ql-stroke,\n.ql-bubble .ql-toolbar .ql-picker-label.ql-active .ql-stroke,\n.ql-bubble.ql-toolbar .ql-picker-item:hover .ql-stroke,\n.ql-bubble .ql-toolbar .ql-picker-item:hover .ql-stroke,\n.ql-bubble.ql-toolbar .ql-picker-item.ql-selected .ql-stroke,\n.ql-bubble .ql-toolbar .ql-picker-item.ql-selected .ql-stroke,\n.ql-bubble.ql-toolbar button:hover .ql-stroke-miter,\n.ql-bubble .ql-toolbar button:hover .ql-stroke-miter,\n.ql-bubble.ql-toolbar button:focus .ql-stroke-miter,\n.ql-bubble .ql-toolbar button:focus .ql-stroke-miter,\n.ql-bubble.ql-toolbar button.ql-active .ql-stroke-miter,\n.ql-bubble .ql-toolbar button.ql-active .ql-stroke-miter,\n.ql-bubble.ql-toolbar .ql-picker-label:hover .ql-stroke-miter,\n.ql-bubble .ql-toolbar .ql-picker-label:hover .ql-stroke-miter,\n.ql-bubble.ql-toolbar .ql-picker-label.ql-active .ql-stroke-miter,\n.ql-bubble .ql-toolbar .ql-picker-label.ql-active .ql-stroke-miter,\n.ql-bubble.ql-toolbar .ql-picker-item:hover .ql-stroke-miter,\n.ql-bubble .ql-toolbar .ql-picker-item:hover .ql-stroke-miter,\n.ql-bubble.ql-toolbar .ql-picker-item.ql-selected .ql-stroke-miter,\n.ql-bubble .ql-toolbar .ql-picker-item.ql-selected .ql-stroke-miter {\n  stroke: #fff;\n}\n\n@media (pointer: coarse) {\n  .ql-bubble.ql-toolbar button:hover:not(.ql-active),\n  .ql-bubble .ql-toolbar button:hover:not(.ql-active) {\n    color: #ccc;\n  }\n\n  .ql-bubble.ql-toolbar button:hover:not(.ql-active) .ql-fill,\n  .ql-bubble .ql-toolbar button:hover:not(.ql-active) .ql-fill,\n  .ql-bubble.ql-toolbar button:hover:not(.ql-active) .ql-stroke.ql-fill,\n  .ql-bubble .ql-toolbar button:hover:not(.ql-active) .ql-stroke.ql-fill {\n    fill: #ccc;\n  }\n\n  .ql-bubble.ql-toolbar button:hover:not(.ql-active) .ql-stroke,\n  .ql-bubble .ql-toolbar button:hover:not(.ql-active) .ql-stroke,\n  .ql-bubble.ql-toolbar button:hover:not(.ql-active) .ql-stroke-miter,\n  .ql-bubble .ql-toolbar button:hover:not(.ql-active) .ql-stroke-miter {\n    stroke: #ccc;\n  }\n}\n\n.ql-bubble {\n  box-sizing: border-box;\n}\n\n.ql-bubble * {\n  box-sizing: border-box;\n}\n\n.ql-bubble .ql-hidden {\n  display: none;\n}\n\n.ql-bubble .ql-out-bottom,\n.ql-bubble .ql-out-top {\n  visibility: hidden;\n}\n\n.ql-bubble .ql-tooltip {\n  position: absolute;\n}\n\n[dir] .ql-bubble .ql-tooltip {\n  transform: translateY(10px);\n}\n\n.ql-bubble .ql-tooltip a {\n  text-decoration: none;\n}\n\n[dir] .ql-bubble .ql-tooltip a {\n  cursor: pointer;\n}\n\n[dir] .ql-bubble .ql-tooltip.ql-flip {\n  transform: translateY(-10px);\n}\n\n.ql-bubble .ql-formats {\n  display: inline-block;\n  vertical-align: middle;\n}\n\n.ql-bubble .ql-formats:after {\n  content: '';\n  display: table;\n}\n\n[dir] .ql-bubble .ql-formats:after {\n  clear: both;\n}\n\n.ql-bubble .ql-stroke {\n  fill: none;\n  stroke: #ccc;\n  stroke-linecap: round;\n  stroke-linejoin: round;\n  stroke-width: 2;\n}\n\n.ql-bubble .ql-stroke-miter {\n  fill: none;\n  stroke: #ccc;\n  stroke-miterlimit: 10;\n  stroke-width: 2;\n}\n\n.ql-bubble .ql-fill,\n.ql-bubble .ql-stroke.ql-fill {\n  fill: #ccc;\n}\n\n.ql-bubble .ql-empty {\n  fill: none;\n}\n\n.ql-bubble .ql-even {\n  fill-rule: evenodd;\n}\n\n.ql-bubble .ql-thin,\n.ql-bubble .ql-stroke.ql-thin {\n  stroke-width: 1;\n}\n\n.ql-bubble .ql-transparent {\n  opacity: 0.4;\n}\n\n.ql-bubble .ql-direction svg:last-child {\n  display: none;\n}\n\n.ql-bubble .ql-direction.ql-active svg:last-child {\n  display: inline;\n}\n\n.ql-bubble .ql-direction.ql-active svg:first-child {\n  display: none;\n}\n\n.ql-bubble .ql-editor h1 {\n  font-size: 2em;\n}\n\n.ql-bubble .ql-editor h2 {\n  font-size: 1.5em;\n}\n\n.ql-bubble .ql-editor h3 {\n  font-size: 1.17em;\n}\n\n.ql-bubble .ql-editor h4 {\n  font-size: 1em;\n}\n\n.ql-bubble .ql-editor h5 {\n  font-size: 0.83em;\n}\n\n.ql-bubble .ql-editor h6 {\n  font-size: 0.67em;\n}\n\n.ql-bubble .ql-editor a {\n  text-decoration: underline;\n}\n\n[dir] .ql-bubble .ql-editor blockquote {\n  margin-bottom: 5px;\n  margin-top: 5px;\n}\n\n[dir=ltr] .ql-bubble .ql-editor blockquote {\n  border-left: 4px solid #ccc;\n  padding-left: 16px;\n}\n\n[dir=rtl] .ql-bubble .ql-editor blockquote {\n  border-right: 4px solid #ccc;\n  padding-right: 16px;\n}\n\n[dir] .ql-bubble .ql-editor code, [dir] .ql-bubble .ql-editor pre {\n  background-color: #f0f0f0;\n  border-radius: 3px;\n}\n\n.ql-bubble .ql-editor pre {\n  white-space: pre-wrap;\n}\n\n[dir] .ql-bubble .ql-editor pre {\n  margin-bottom: 5px;\n  margin-top: 5px;\n  padding: 5px 10px;\n}\n\n.ql-bubble .ql-editor code {\n  font-size: 85%;\n}\n\n[dir] .ql-bubble .ql-editor code {\n  padding: 2px 4px;\n}\n\n.ql-bubble .ql-editor pre.ql-syntax {\n  color: #f8f8f2;\n  overflow: visible;\n}\n\n[dir] .ql-bubble .ql-editor pre.ql-syntax {\n  background-color: #23241f;\n}\n\n.ql-bubble .ql-editor img {\n  max-width: 100%;\n}\n\n.ql-bubble .ql-picker {\n  color: #ccc;\n  display: inline-block;\n  font-size: 14px;\n  font-weight: 500;\n  height: 24px;\n  position: relative;\n  vertical-align: middle;\n}\n\n[dir=ltr] .ql-bubble .ql-picker {\n  float: left;\n}\n\n[dir=rtl] .ql-bubble .ql-picker {\n  float: right;\n}\n\n.ql-bubble .ql-picker-label {\n  display: inline-block;\n  height: 100%;\n  position: relative;\n  width: 100%;\n}\n\n[dir] .ql-bubble .ql-picker-label {\n  cursor: pointer;\n}\n\n[dir=ltr] .ql-bubble .ql-picker-label {\n  padding-left: 8px;\n  padding-right: 2px;\n}\n\n[dir=rtl] .ql-bubble .ql-picker-label {\n  padding-right: 8px;\n  padding-left: 2px;\n}\n\n.ql-bubble .ql-picker-label::before {\n  display: inline-block;\n  line-height: 22px;\n}\n\n.ql-bubble .ql-picker-options {\n  display: none;\n  min-width: 100%;\n  position: absolute;\n  white-space: nowrap;\n}\n\n[dir] .ql-bubble .ql-picker-options {\n  background-color: #444;\n  padding: 4px 8px;\n}\n\n.ql-bubble .ql-picker-options .ql-picker-item {\n  display: block;\n}\n\n[dir] .ql-bubble .ql-picker-options .ql-picker-item {\n  cursor: pointer;\n  padding-bottom: 5px;\n  padding-top: 5px;\n}\n\n.ql-bubble .ql-picker.ql-expanded .ql-picker-label {\n  color: #777;\n  z-index: 2;\n}\n\n.ql-bubble .ql-picker.ql-expanded .ql-picker-label .ql-fill {\n  fill: #777;\n}\n\n.ql-bubble .ql-picker.ql-expanded .ql-picker-label .ql-stroke {\n  stroke: #777;\n}\n\n.ql-bubble .ql-picker.ql-expanded .ql-picker-options {\n  display: block;\n  top: 100%;\n  z-index: 1;\n}\n\n[dir] .ql-bubble .ql-picker.ql-expanded .ql-picker-options {\n  margin-top: -1px;\n}\n\n.ql-bubble .ql-color-picker,\n.ql-bubble .ql-icon-picker {\n  width: 28px;\n}\n\n[dir] .ql-bubble .ql-color-picker .ql-picker-label, [dir] .ql-bubble .ql-icon-picker .ql-picker-label {\n  padding: 2px 4px;\n}\n\n[dir=ltr] .ql-bubble .ql-color-picker .ql-picker-label svg, [dir=ltr] .ql-bubble .ql-icon-picker .ql-picker-label svg {\n  right: 4px;\n}\n\n[dir=rtl] .ql-bubble .ql-color-picker .ql-picker-label svg, [dir=rtl] .ql-bubble .ql-icon-picker .ql-picker-label svg {\n  left: 4px;\n}\n\n[dir] .ql-bubble .ql-icon-picker .ql-picker-options {\n  padding: 4px 0px;\n}\n\n.ql-bubble .ql-icon-picker .ql-picker-item {\n  height: 24px;\n  width: 24px;\n}\n\n[dir] .ql-bubble .ql-icon-picker .ql-picker-item {\n  padding: 2px 4px;\n}\n\n.ql-bubble .ql-color-picker .ql-picker-options {\n  width: 152px;\n}\n\n[dir] .ql-bubble .ql-color-picker .ql-picker-options {\n  padding: 3px 5px;\n}\n\n.ql-bubble .ql-color-picker .ql-picker-item {\n  height: 16px;\n  width: 16px;\n}\n\n[dir] .ql-bubble .ql-color-picker .ql-picker-item {\n  border: 1px solid transparent;\n  margin: 2px;\n  padding: 0px;\n}\n\n[dir=ltr] .ql-bubble .ql-color-picker .ql-picker-item {\n  float: left;\n}\n\n[dir=rtl] .ql-bubble .ql-color-picker .ql-picker-item {\n  float: right;\n}\n\n.ql-bubble .ql-picker:not(.ql-color-picker):not(.ql-icon-picker) svg {\n  position: absolute;\n  top: 50%;\n  width: 18px;\n}\n\n[dir] .ql-bubble .ql-picker:not(.ql-color-picker):not(.ql-icon-picker) svg {\n  margin-top: -9px;\n}\n\n[dir=ltr] .ql-bubble .ql-picker:not(.ql-color-picker):not(.ql-icon-picker) svg {\n  right: 0;\n}\n\n[dir=rtl] .ql-bubble .ql-picker:not(.ql-color-picker):not(.ql-icon-picker) svg {\n  left: 0;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-label]:not([data-label=''])::before,\n.ql-bubble .ql-picker.ql-font .ql-picker-label[data-label]:not([data-label=''])::before,\n.ql-bubble .ql-picker.ql-size .ql-picker-label[data-label]:not([data-label=''])::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-label]:not([data-label=''])::before,\n.ql-bubble .ql-picker.ql-font .ql-picker-item[data-label]:not([data-label=''])::before,\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-label]:not([data-label=''])::before {\n  content: attr(data-label);\n}\n\n.ql-bubble .ql-picker.ql-header {\n  width: 98px;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item::before {\n  content: 'Normal';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-value=\"1\"]::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"1\"]::before {\n  content: 'Heading 1';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-value=\"2\"]::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"2\"]::before {\n  content: 'Heading 2';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-value=\"3\"]::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"3\"]::before {\n  content: 'Heading 3';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-value=\"4\"]::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"4\"]::before {\n  content: 'Heading 4';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-value=\"5\"]::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"5\"]::before {\n  content: 'Heading 5';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-label[data-value=\"6\"]::before,\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"6\"]::before {\n  content: 'Heading 6';\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"1\"]::before {\n  font-size: 2em;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"2\"]::before {\n  font-size: 1.5em;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"3\"]::before {\n  font-size: 1.17em;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"4\"]::before {\n  font-size: 1em;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"5\"]::before {\n  font-size: 0.83em;\n}\n\n.ql-bubble .ql-picker.ql-header .ql-picker-item[data-value=\"6\"]::before {\n  font-size: 0.67em;\n}\n\n.ql-bubble .ql-picker.ql-font {\n  width: 108px;\n}\n\n.ql-bubble .ql-picker.ql-font .ql-picker-label::before,\n.ql-bubble .ql-picker.ql-font .ql-picker-item::before {\n  content: 'Sans Serif';\n}\n\n.ql-bubble .ql-picker.ql-font .ql-picker-label[data-value=serif]::before,\n.ql-bubble .ql-picker.ql-font .ql-picker-item[data-value=serif]::before {\n  content: 'Serif';\n}\n\n.ql-bubble .ql-picker.ql-font .ql-picker-label[data-value=monospace]::before,\n.ql-bubble .ql-picker.ql-font .ql-picker-item[data-value=monospace]::before {\n  content: 'Monospace';\n}\n\n.ql-bubble .ql-picker.ql-font .ql-picker-item[data-value=serif]::before {\n  font-family: Georgia, Times New Roman, serif;\n}\n\n.ql-bubble .ql-picker.ql-font .ql-picker-item[data-value=monospace]::before {\n  font-family: Monaco, Courier New, monospace;\n}\n\n.ql-bubble .ql-picker.ql-size {\n  width: 98px;\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-label::before,\n.ql-bubble .ql-picker.ql-size .ql-picker-item::before {\n  content: 'Normal';\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-label[data-value=small]::before,\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-value=small]::before {\n  content: 'Small';\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-label[data-value=large]::before,\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-value=large]::before {\n  content: 'Large';\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-label[data-value=huge]::before,\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-value=huge]::before {\n  content: 'Huge';\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-value=small]::before {\n  font-size: 10px;\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-value=large]::before {\n  font-size: 18px;\n}\n\n.ql-bubble .ql-picker.ql-size .ql-picker-item[data-value=huge]::before {\n  font-size: 32px;\n}\n\n[dir] .ql-bubble .ql-color-picker.ql-background .ql-picker-item {\n  background-color: #fff;\n}\n\n[dir] .ql-bubble .ql-color-picker.ql-color .ql-picker-item {\n  background-color: #000;\n}\n\n[dir=ltr] .ql-bubble .ql-toolbar .ql-formats {\n  margin: 8px 12px 8px 0px;\n}\n\n[dir=rtl] .ql-bubble .ql-toolbar .ql-formats {\n  margin: 8px 0px 8px 12px;\n}\n\n[dir=ltr] .ql-bubble .ql-toolbar .ql-formats:first-child {\n  margin-left: 12px;\n}\n\n[dir=rtl] .ql-bubble .ql-toolbar .ql-formats:first-child {\n  margin-right: 12px;\n}\n\n[dir] .ql-bubble .ql-color-picker svg {\n  margin: 1px;\n}\n\n[dir] .ql-bubble .ql-color-picker .ql-picker-item.ql-selected, [dir] .ql-bubble .ql-color-picker .ql-picker-item:hover {\n  border-color: #fff;\n}\n\n.ql-bubble .ql-tooltip {\n  color: #fff;\n}\n\n[dir] .ql-bubble .ql-tooltip {\n  background-color: #444;\n  border-radius: 25px;\n}\n\n.ql-bubble .ql-tooltip-arrow {\n  content: \" \";\n  display: block;\n  position: absolute;\n}\n\n[dir=ltr] .ql-bubble .ql-tooltip-arrow {\n  border-left: 6px solid transparent;\n  border-right: 6px solid transparent;\n  left: 50%;\n  margin-left: -6px;\n}\n\n[dir=rtl] .ql-bubble .ql-tooltip-arrow {\n  border-right: 6px solid transparent;\n  border-left: 6px solid transparent;\n  right: 50%;\n  margin-right: -6px;\n}\n\n.ql-bubble .ql-tooltip:not(.ql-flip) .ql-tooltip-arrow {\n  top: -6px;\n}\n\n[dir] .ql-bubble .ql-tooltip:not(.ql-flip) .ql-tooltip-arrow {\n  border-bottom: 6px solid #444;\n}\n\n.ql-bubble .ql-tooltip.ql-flip .ql-tooltip-arrow {\n  bottom: -6px;\n}\n\n[dir] .ql-bubble .ql-tooltip.ql-flip .ql-tooltip-arrow {\n  border-top: 6px solid #444;\n}\n\n.ql-bubble .ql-tooltip.ql-editing .ql-tooltip-editor {\n  display: block;\n}\n\n.ql-bubble .ql-tooltip.ql-editing .ql-formats {\n  visibility: hidden;\n}\n\n.ql-bubble .ql-tooltip-editor {\n  display: none;\n}\n\n.ql-bubble .ql-tooltip-editor input[type=text] {\n  color: #fff;\n  font-size: 13px;\n  height: 100%;\n  outline: none;\n  position: absolute;\n  width: 100%;\n}\n\n[dir] .ql-bubble .ql-tooltip-editor input[type=text] {\n  background: transparent;\n  border: none;\n  padding: 10px 20px;\n}\n\n.ql-bubble .ql-tooltip-editor a {\n  top: 10px;\n  position: absolute;\n}\n\n[dir=ltr] .ql-bubble .ql-tooltip-editor a {\n  right: 20px;\n}\n\n[dir=rtl] .ql-bubble .ql-tooltip-editor a {\n  left: 20px;\n}\n\n.ql-bubble .ql-tooltip-editor a:before {\n  color: #ccc;\n  content: \"\\D7\";\n  font-size: 16px;\n  font-weight: bold;\n}\n\n.ql-container.ql-bubble:not(.ql-disabled) a {\n  position: relative;\n  white-space: nowrap;\n}\n\n.ql-container.ql-bubble:not(.ql-disabled) a::before {\n  top: -5px;\n  font-size: 12px;\n  color: #fff;\n  content: attr(href);\n  font-weight: normal;\n  overflow: hidden;\n  text-decoration: none;\n  z-index: 1;\n}\n\n[dir] .ql-container.ql-bubble:not(.ql-disabled) a::before {\n  background-color: #444;\n  border-radius: 15px;\n  padding: 5px 15px;\n}\n\n.ql-container.ql-bubble:not(.ql-disabled) a::after {\n  top: 0;\n  content: \" \";\n  height: 0;\n  width: 0;\n}\n\n[dir] .ql-container.ql-bubble:not(.ql-disabled) a::after {\n  border-top: 6px solid #444;\n}\n\n[dir=ltr] .ql-container.ql-bubble:not(.ql-disabled) a::after {\n  border-left: 6px solid transparent;\n  border-right: 6px solid transparent;\n}\n\n[dir=rtl] .ql-container.ql-bubble:not(.ql-disabled) a::after {\n  border-right: 6px solid transparent;\n  border-left: 6px solid transparent;\n}\n\n.ql-container.ql-bubble:not(.ql-disabled) a::before,\n.ql-container.ql-bubble:not(.ql-disabled) a::after {\n  position: absolute;\n  transition: visibility 0s ease 200ms;\n  visibility: hidden;\n}\n\n[dir=ltr] .ql-container.ql-bubble:not(.ql-disabled) a::before, [dir=ltr] .ql-container.ql-bubble:not(.ql-disabled) a::after {\n  left: 0;\n  margin-left: 50%;\n  transform: translate(-50%, -100%);\n}\n\n[dir=rtl] .ql-container.ql-bubble:not(.ql-disabled) a::before, [dir=rtl] .ql-container.ql-bubble:not(.ql-disabled) a::after {\n  right: 0;\n  margin-right: 50%;\n  transform: translate(50%, -100%);\n}\n\n.ql-container.ql-bubble:not(.ql-disabled) a:hover::before,\n.ql-container.ql-bubble:not(.ql-disabled) a:hover::after {\n  visibility: visible;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/quill/dist/quill.bubble.css":
/*!**************************************************!*\
  !*** ./node_modules/quill/dist/quill.bubble.css ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../css-loader??ref--7-1!../../postcss-loader/src??ref--7-2!./quill.bubble.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/quill/dist/quill.bubble.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ })

}]);