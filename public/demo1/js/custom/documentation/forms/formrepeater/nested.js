/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js":
/*!************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js ***!
  \************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormRepeaterNested = function () {\n  // Private functions\n  var example1 = function example1() {\n    $('#kt_docs_repeater_nested').repeater({\n      // (Required if there is a nested repeater)\n      // Specify the configuration of the nested repeaters.\n      // Nested configuration follows the same format as the base configuration,\n      // supporting options \"defaultValues\", \"show\", \"hide\", etc.\n      // Nested repeaters additionally require a \"selector\" field.\n      repeaters: [{\n        // (Required)\n        // Specify the jQuery selector for this nested repeater\n        selector: '.inner-repeater',\n        show: function show() {\n          $(this).slideDown();\n        },\n        hide: function hide(deleteElement) {\n          $(this).slideUp(deleteElement);\n        }\n      }],\n      show: function show() {\n        $(this).slideDown();\n      },\n      hide: function hide(deleteElement) {\n        $(this).slideUp(deleteElement);\n      }\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      example1();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormRepeaterNested.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZm9ybXMvZm9ybXJlcGVhdGVyL25lc3RlZC5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxvQkFBb0IsR0FBRyxZQUFXO0VBQ2xDO0VBQ0EsSUFBSUMsUUFBUSxHQUFHLFNBQVhBLFFBQVcsR0FBVztJQUN0QkMsQ0FBQyxDQUFDLDBCQUFELENBQUQsQ0FBOEJDLFFBQTlCLENBQXVDO01BQ25DO01BQ0E7TUFDQTtNQUNBO01BQ0E7TUFDQUMsU0FBUyxFQUFFLENBQUM7UUFDUjtRQUNBO1FBQ0FDLFFBQVEsRUFBRSxpQkFIRjtRQUlSQyxJQUFJLEVBQUUsZ0JBQVk7VUFDZEosQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRSyxTQUFSO1FBQ0gsQ0FOTztRQVFSQyxJQUFJLEVBQUUsY0FBVUMsYUFBVixFQUF5QjtVQUMzQlAsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUSxPQUFSLENBQWdCRCxhQUFoQjtRQUNIO01BVk8sQ0FBRCxDQU53QjtNQW1CbkNILElBQUksRUFBRSxnQkFBWTtRQUNkSixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLFNBQVI7TUFDSCxDQXJCa0M7TUF1Qm5DQyxJQUFJLEVBQUUsY0FBVUMsYUFBVixFQUF5QjtRQUMzQlAsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUSxPQUFSLENBQWdCRCxhQUFoQjtNQUNIO0lBekJrQyxDQUF2QztFQTJCSCxDQTVCRDs7RUE4QkEsT0FBTztJQUNIO0lBQ0FFLElBQUksRUFBRSxnQkFBVztNQUNiVixRQUFRO0lBQ1g7RUFKRSxDQUFQO0FBTUgsQ0F0QzBCLEVBQTNCLEMsQ0F3Q0E7OztBQUNBVyxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVc7RUFDakNiLG9CQUFvQixDQUFDVyxJQUFyQjtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZm9ybXMvZm9ybXJlcGVhdGVyL25lc3RlZC5qcz82OTlmIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGb3JtUmVwZWF0ZXJOZXN0ZWQgPSBmdW5jdGlvbigpIHtcclxuICAgIC8vIFByaXZhdGUgZnVuY3Rpb25zXHJcbiAgICB2YXIgZXhhbXBsZTEgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICAkKCcja3RfZG9jc19yZXBlYXRlcl9uZXN0ZWQnKS5yZXBlYXRlcih7XHJcbiAgICAgICAgICAgIC8vIChSZXF1aXJlZCBpZiB0aGVyZSBpcyBhIG5lc3RlZCByZXBlYXRlcilcclxuICAgICAgICAgICAgLy8gU3BlY2lmeSB0aGUgY29uZmlndXJhdGlvbiBvZiB0aGUgbmVzdGVkIHJlcGVhdGVycy5cclxuICAgICAgICAgICAgLy8gTmVzdGVkIGNvbmZpZ3VyYXRpb24gZm9sbG93cyB0aGUgc2FtZSBmb3JtYXQgYXMgdGhlIGJhc2UgY29uZmlndXJhdGlvbixcclxuICAgICAgICAgICAgLy8gc3VwcG9ydGluZyBvcHRpb25zIFwiZGVmYXVsdFZhbHVlc1wiLCBcInNob3dcIiwgXCJoaWRlXCIsIGV0Yy5cclxuICAgICAgICAgICAgLy8gTmVzdGVkIHJlcGVhdGVycyBhZGRpdGlvbmFsbHkgcmVxdWlyZSBhIFwic2VsZWN0b3JcIiBmaWVsZC5cclxuICAgICAgICAgICAgcmVwZWF0ZXJzOiBbe1xyXG4gICAgICAgICAgICAgICAgLy8gKFJlcXVpcmVkKVxyXG4gICAgICAgICAgICAgICAgLy8gU3BlY2lmeSB0aGUgalF1ZXJ5IHNlbGVjdG9yIGZvciB0aGlzIG5lc3RlZCByZXBlYXRlclxyXG4gICAgICAgICAgICAgICAgc2VsZWN0b3I6ICcuaW5uZXItcmVwZWF0ZXInLFxyXG4gICAgICAgICAgICAgICAgc2hvdzogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICQodGhpcykuc2xpZGVEb3duKCk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgXHJcbiAgICAgICAgICAgICAgICBoaWRlOiBmdW5jdGlvbiAoZGVsZXRlRWxlbWVudCkge1xyXG4gICAgICAgICAgICAgICAgICAgICQodGhpcykuc2xpZGVVcChkZWxldGVFbGVtZW50KTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfV0sXHJcblxyXG4gICAgICAgICAgICBzaG93OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAkKHRoaXMpLnNsaWRlRG93bigpO1xyXG4gICAgICAgICAgICB9LFxyXG5cclxuICAgICAgICAgICAgaGlkZTogZnVuY3Rpb24gKGRlbGV0ZUVsZW1lbnQpIHtcclxuICAgICAgICAgICAgICAgICQodGhpcykuc2xpZGVVcChkZWxldGVFbGVtZW50KTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gUHVibGljIEZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBleGFtcGxlMSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVEZvcm1SZXBlYXRlck5lc3RlZC5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RGb3JtUmVwZWF0ZXJOZXN0ZWQiLCJleGFtcGxlMSIsIiQiLCJyZXBlYXRlciIsInJlcGVhdGVycyIsInNlbGVjdG9yIiwic2hvdyIsInNsaWRlRG93biIsImhpZGUiLCJkZWxldGVFbGVtZW50Iiwic2xpZGVVcCIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/forms/formrepeater/nested.js"]();
/******/ 	
/******/ })()
;