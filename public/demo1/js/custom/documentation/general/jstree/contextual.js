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

/***/ "./resources/assets/core/js/custom/documentation/general/jstree/contextual.js":
/*!************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/jstree/contextual.js ***!
  \************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTJSTreeContextual = function () {\n  // Private functions\n  var exampleContextual = function exampleContextual() {\n    $(\"#kt_docs_jstree_contextual\").jstree({\n      \"core\": {\n        \"themes\": {\n          \"responsive\": false\n        },\n        // so that create works\n        \"check_callback\": true,\n        'data': [{\n          \"text\": \"Parent Node\",\n          \"children\": [{\n            \"text\": \"Initially selected\",\n            \"state\": {\n              \"selected\": true\n            }\n          }, {\n            \"text\": \"Custom Icon\",\n            \"icon\": \"flaticon2-hourglass-1 text-danger\"\n          }, {\n            \"text\": \"Initially open\",\n            \"icon\": \"fa fa-folder text-success\",\n            \"state\": {\n              \"opened\": true\n            },\n            \"children\": [{\n              \"text\": \"Another node\",\n              \"icon\": \"fa fa-file text-waring\"\n            }]\n          }, {\n            \"text\": \"Another Custom Icon\",\n            \"icon\": \"flaticon2-drop text-waring\"\n          }, {\n            \"text\": \"Disabled Node\",\n            \"icon\": \"fa fa-check text-success\",\n            \"state\": {\n              \"disabled\": true\n            }\n          }, {\n            \"text\": \"Sub Nodes\",\n            \"icon\": \"fa fa-folder text-danger\",\n            \"children\": [{\n              \"text\": \"Item 1\",\n              \"icon\": \"fa fa-file text-waring\"\n            }, {\n              \"text\": \"Item 2\",\n              \"icon\": \"fa fa-file text-success\"\n            }, {\n              \"text\": \"Item 3\",\n              \"icon\": \"fa fa-file text-default\"\n            }, {\n              \"text\": \"Item 4\",\n              \"icon\": \"fa fa-file text-danger\"\n            }, {\n              \"text\": \"Item 5\",\n              \"icon\": \"fa fa-file text-info\"\n            }]\n          }]\n        }, \"Another Node\"]\n      },\n      \"types\": {\n        \"default\": {\n          \"icon\": \"fa fa-folder text-primary\"\n        },\n        \"file\": {\n          \"icon\": \"fa fa-file  text-primary\"\n        }\n      },\n      \"state\": {\n        \"key\": \"demo2\"\n      },\n      \"plugins\": [\"contextmenu\", \"state\", \"types\"]\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleContextual();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTJSTreeContextual.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9qc3RyZWUvY29udGV4dHVhbC5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxrQkFBa0IsR0FBRyxZQUFXO0VBQ2hDO0VBQ0EsSUFBSUMsaUJBQWlCLEdBQUcsU0FBcEJBLGlCQUFvQixHQUFXO0lBQy9CQyxDQUFDLENBQUMsNEJBQUQsQ0FBRCxDQUFnQ0MsTUFBaEMsQ0FBdUM7TUFDbkMsUUFBUztRQUNMLFVBQVc7VUFDUCxjQUFjO1FBRFAsQ0FETjtRQUlMO1FBQ0Esa0JBQW1CLElBTGQ7UUFNTCxRQUFRLENBQUM7VUFDRCxRQUFRLGFBRFA7VUFFRCxZQUFZLENBQUM7WUFDVCxRQUFRLG9CQURDO1lBRVQsU0FBUztjQUNMLFlBQVk7WUFEUDtVQUZBLENBQUQsRUFLVDtZQUNDLFFBQVEsYUFEVDtZQUVDLFFBQVE7VUFGVCxDQUxTLEVBUVQ7WUFDQyxRQUFRLGdCQURUO1lBRUMsUUFBUywyQkFGVjtZQUdDLFNBQVM7Y0FDTCxVQUFVO1lBREwsQ0FIVjtZQU1DLFlBQVksQ0FDUjtjQUFDLFFBQVEsY0FBVDtjQUF5QixRQUFTO1lBQWxDLENBRFE7VUFOYixDQVJTLEVBaUJUO1lBQ0MsUUFBUSxxQkFEVDtZQUVDLFFBQVE7VUFGVCxDQWpCUyxFQW9CVDtZQUNDLFFBQVEsZUFEVDtZQUVDLFFBQVEsMEJBRlQ7WUFHQyxTQUFTO2NBQ0wsWUFBWTtZQURQO1VBSFYsQ0FwQlMsRUEwQlQ7WUFDQyxRQUFRLFdBRFQ7WUFFQyxRQUFRLDBCQUZUO1lBR0MsWUFBWSxDQUNSO2NBQUMsUUFBUSxRQUFUO2NBQW1CLFFBQVM7WUFBNUIsQ0FEUSxFQUVSO2NBQUMsUUFBUSxRQUFUO2NBQW1CLFFBQVM7WUFBNUIsQ0FGUSxFQUdSO2NBQUMsUUFBUSxRQUFUO2NBQW1CLFFBQVM7WUFBNUIsQ0FIUSxFQUlSO2NBQUMsUUFBUSxRQUFUO2NBQW1CLFFBQVM7WUFBNUIsQ0FKUSxFQUtSO2NBQUMsUUFBUSxRQUFUO2NBQW1CLFFBQVM7WUFBNUIsQ0FMUTtVQUhiLENBMUJTO1FBRlgsQ0FBRCxFQXdDSixjQXhDSTtNQU5ILENBRDBCO01Ba0RuQyxTQUFVO1FBQ04sV0FBWTtVQUNSLFFBQVM7UUFERCxDQUROO1FBSU4sUUFBUztVQUNMLFFBQVM7UUFESjtNQUpILENBbER5QjtNQTBEbkMsU0FBVTtRQUFFLE9BQVE7TUFBVixDQTFEeUI7TUEyRG5DLFdBQVksQ0FBRSxhQUFGLEVBQWlCLE9BQWpCLEVBQTBCLE9BQTFCO0lBM0R1QixDQUF2QztFQTZESCxDQTlERDs7RUFnRUEsT0FBTztJQUNIO0lBQ0FDLElBQUksRUFBRSxnQkFBVztNQUNiSCxpQkFBaUI7SUFDcEI7RUFKRSxDQUFQO0FBTUgsQ0F4RXdCLEVBQXpCLEMsQ0EwRUE7OztBQUNBSSxNQUFNLENBQUNDLGtCQUFQLENBQTBCLFlBQVc7RUFDakNOLGtCQUFrQixDQUFDSSxJQUFuQjtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9qc3RyZWUvY29udGV4dHVhbC5qcz9iZDQwIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RKU1RyZWVDb250ZXh0dWFsID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVDb250ZXh0dWFsID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgJChcIiNrdF9kb2NzX2pzdHJlZV9jb250ZXh0dWFsXCIpLmpzdHJlZSh7XHJcbiAgICAgICAgICAgIFwiY29yZVwiIDoge1xyXG4gICAgICAgICAgICAgICAgXCJ0aGVtZXNcIiA6IHtcclxuICAgICAgICAgICAgICAgICAgICBcInJlc3BvbnNpdmVcIjogZmFsc2VcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAvLyBzbyB0aGF0IGNyZWF0ZSB3b3Jrc1xyXG4gICAgICAgICAgICAgICAgXCJjaGVja19jYWxsYmFja1wiIDogdHJ1ZSxcclxuICAgICAgICAgICAgICAgICdkYXRhJzogW3tcclxuICAgICAgICAgICAgICAgICAgICAgICAgXCJ0ZXh0XCI6IFwiUGFyZW50IE5vZGVcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgXCJjaGlsZHJlblwiOiBbe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJ0ZXh0XCI6IFwiSW5pdGlhbGx5IHNlbGVjdGVkXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInN0YXRlXCI6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInNlbGVjdGVkXCI6IHRydWVcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSwge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJ0ZXh0XCI6IFwiQ3VzdG9tIEljb25cIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiaWNvblwiOiBcImZsYXRpY29uMi1ob3VyZ2xhc3MtMSB0ZXh0LWRhbmdlclwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwidGV4dFwiOiBcIkluaXRpYWxseSBvcGVuXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcImljb25cIiA6IFwiZmEgZmEtZm9sZGVyIHRleHQtc3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJzdGF0ZVwiOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJvcGVuZWRcIjogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiY2hpbGRyZW5cIjogW1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtcInRleHRcIjogXCJBbm90aGVyIG5vZGVcIiwgXCJpY29uXCIgOiBcImZhIGZhLWZpbGUgdGV4dC13YXJpbmdcIn1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIF1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSwge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJ0ZXh0XCI6IFwiQW5vdGhlciBDdXN0b20gSWNvblwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJpY29uXCI6IFwiZmxhdGljb24yLWRyb3AgdGV4dC13YXJpbmdcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LCB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInRleHRcIjogXCJEaXNhYmxlZCBOb2RlXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcImljb25cIjogXCJmYSBmYS1jaGVjayB0ZXh0LXN1Y2Nlc3NcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwic3RhdGVcIjoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiZGlzYWJsZWRcIjogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LCB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBcInRleHRcIjogXCJTdWIgTm9kZXNcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIFwiaWNvblwiOiBcImZhIGZhLWZvbGRlciB0ZXh0LWRhbmdlclwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXCJjaGlsZHJlblwiOiBbXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge1widGV4dFwiOiBcIkl0ZW0gMVwiLCBcImljb25cIiA6IFwiZmEgZmEtZmlsZSB0ZXh0LXdhcmluZ1wifSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7XCJ0ZXh0XCI6IFwiSXRlbSAyXCIsIFwiaWNvblwiIDogXCJmYSBmYS1maWxlIHRleHQtc3VjY2Vzc1wifSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7XCJ0ZXh0XCI6IFwiSXRlbSAzXCIsIFwiaWNvblwiIDogXCJmYSBmYS1maWxlIHRleHQtZGVmYXVsdFwifSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7XCJ0ZXh0XCI6IFwiSXRlbSA0XCIsIFwiaWNvblwiIDogXCJmYSBmYS1maWxlIHRleHQtZGFuZ2VyXCJ9LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtcInRleHRcIjogXCJJdGVtIDVcIiwgXCJpY29uXCIgOiBcImZhIGZhLWZpbGUgdGV4dC1pbmZvXCJ9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBdXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1dXHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBcIkFub3RoZXIgTm9kZVwiXHJcbiAgICAgICAgICAgICAgICBdXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIFwidHlwZXNcIiA6IHtcclxuICAgICAgICAgICAgICAgIFwiZGVmYXVsdFwiIDoge1xyXG4gICAgICAgICAgICAgICAgICAgIFwiaWNvblwiIDogXCJmYSBmYS1mb2xkZXIgdGV4dC1wcmltYXJ5XCJcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBcImZpbGVcIiA6IHtcclxuICAgICAgICAgICAgICAgICAgICBcImljb25cIiA6IFwiZmEgZmEtZmlsZSAgdGV4dC1wcmltYXJ5XCJcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgXCJzdGF0ZVwiIDogeyBcImtleVwiIDogXCJkZW1vMlwiIH0sXHJcbiAgICAgICAgICAgIFwicGx1Z2luc1wiIDogWyBcImNvbnRleHRtZW51XCIsIFwic3RhdGVcIiwgXCJ0eXBlc1wiIF1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUNvbnRleHR1YWwoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RKU1RyZWVDb250ZXh0dWFsLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEpTVHJlZUNvbnRleHR1YWwiLCJleGFtcGxlQ29udGV4dHVhbCIsIiQiLCJqc3RyZWUiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/jstree/contextual.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/jstree/contextual.js"]();
/******/ 	
/******/ })()
;