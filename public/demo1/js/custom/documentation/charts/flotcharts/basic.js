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

/***/ "./resources/assets/core/js/custom/documentation/charts/flotcharts/basic.js":
/*!**********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/charts/flotcharts/basic.js ***!
  \**********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFlotDemoBasic = function () {\n  // Private functions\n  var exampleBasic = function exampleBasic() {\n    var data = [];\n    var totalPoints = 250; // random data generator for plot charts\n\n    function getRandomData() {\n      if (data.length > 0) data = data.slice(1); // do a random walk\n\n      while (data.length < totalPoints) {\n        var prev = data.length > 0 ? data[data.length - 1] : 50;\n        var y = prev + Math.random() * 10 - 5;\n        if (y < 0) y = 0;\n        if (y > 100) y = 100;\n        data.push(y);\n      } // zip the generated y values with the x values\n\n\n      var res = [];\n\n      for (var i = 0; i < data.length; ++i) {\n        res.push([i, data[i]]);\n      }\n\n      return res;\n    }\n\n    var d1 = [];\n\n    for (var i = 0; i < Math.PI * 2; i += 0.25) {\n      d1.push([i, Math.sin(i)]);\n    }\n\n    var d2 = [];\n\n    for (var i = 0; i < Math.PI * 2; i += 0.25) {\n      d2.push([i, Math.cos(i)]);\n    }\n\n    var d3 = [];\n\n    for (var i = 0; i < Math.PI * 2; i += 0.1) {\n      d3.push([i, Math.tan(i)]);\n    }\n\n    $.plot($(\"#kt_docs_flot_basic\"), [{\n      label: \"sin(x)\",\n      data: d1,\n      lines: {\n        lineWidth: 1\n      },\n      shadowSize: 0\n    }, {\n      label: \"cos(x)\",\n      data: d2,\n      lines: {\n        lineWidth: 1\n      },\n      shadowSize: 0\n    }, {\n      label: \"tan(x)\",\n      data: d3,\n      lines: {\n        lineWidth: 1\n      },\n      shadowSize: 0\n    }], {\n      colors: [KTUtil.getCssVariableValue('--bs-active-success'), KTUtil.getCssVariableValue('--bs-active-primary'), KTUtil.getCssVariableValue('--bs-active-danger')],\n      series: {\n        lines: {\n          show: true\n        },\n        points: {\n          show: true,\n          fill: true,\n          radius: 3,\n          lineWidth: 1\n        }\n      },\n      xaxis: {\n        tickColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n        ticks: [0, [Math.PI / 2, \"\\u03C0/2\"], [Math.PI, \"\\u03C0\"], [Math.PI * 3 / 2, \"3\\u03C0/2\"], [Math.PI * 2, \"2\\u03C0\"]]\n      },\n      yaxis: {\n        tickColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n        ticks: 10,\n        min: -2,\n        max: 2\n      },\n      grid: {\n        borderColor: KTUtil.getCssVariableValue('--bs-light-dark'),\n        borderWidth: 1\n      }\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleBasic();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoBasic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvYmFzaWMuanMuanMiLCJtYXBwaW5ncyI6IkNBRUE7O0FBQ0EsSUFBSUEsZUFBZSxHQUFHLFlBQVk7RUFDOUI7RUFDQSxJQUFJQyxZQUFZLEdBQUcsU0FBZkEsWUFBZSxHQUFZO0lBQzNCLElBQUlDLElBQUksR0FBRyxFQUFYO0lBQ0EsSUFBSUMsV0FBVyxHQUFHLEdBQWxCLENBRjJCLENBSTNCOztJQUVBLFNBQVNDLGFBQVQsR0FBeUI7TUFDckIsSUFBSUYsSUFBSSxDQUFDRyxNQUFMLEdBQWMsQ0FBbEIsRUFBcUJILElBQUksR0FBR0EsSUFBSSxDQUFDSSxLQUFMLENBQVcsQ0FBWCxDQUFQLENBREEsQ0FFckI7O01BQ0EsT0FBT0osSUFBSSxDQUFDRyxNQUFMLEdBQWNGLFdBQXJCLEVBQWtDO1FBQzlCLElBQUlJLElBQUksR0FBR0wsSUFBSSxDQUFDRyxNQUFMLEdBQWMsQ0FBZCxHQUFrQkgsSUFBSSxDQUFDQSxJQUFJLENBQUNHLE1BQUwsR0FBYyxDQUFmLENBQXRCLEdBQTBDLEVBQXJEO1FBQ0EsSUFBSUcsQ0FBQyxHQUFHRCxJQUFJLEdBQUdFLElBQUksQ0FBQ0MsTUFBTCxLQUFnQixFQUF2QixHQUE0QixDQUFwQztRQUNBLElBQUlGLENBQUMsR0FBRyxDQUFSLEVBQVdBLENBQUMsR0FBRyxDQUFKO1FBQ1gsSUFBSUEsQ0FBQyxHQUFHLEdBQVIsRUFBYUEsQ0FBQyxHQUFHLEdBQUo7UUFDYk4sSUFBSSxDQUFDUyxJQUFMLENBQVVILENBQVY7TUFDSCxDQVRvQixDQVVyQjs7O01BQ0EsSUFBSUksR0FBRyxHQUFHLEVBQVY7O01BQ0EsS0FBSyxJQUFJQyxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHWCxJQUFJLENBQUNHLE1BQXpCLEVBQWlDLEVBQUVRLENBQW5DLEVBQXNDO1FBQ2xDRCxHQUFHLENBQUNELElBQUosQ0FBUyxDQUFDRSxDQUFELEVBQUlYLElBQUksQ0FBQ1csQ0FBRCxDQUFSLENBQVQ7TUFDSDs7TUFFRCxPQUFPRCxHQUFQO0lBQ0g7O0lBRUQsSUFBSUUsRUFBRSxHQUFHLEVBQVQ7O0lBQ0EsS0FBSyxJQUFJRCxDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHSixJQUFJLENBQUNNLEVBQUwsR0FBVSxDQUE5QixFQUFpQ0YsQ0FBQyxJQUFJLElBQXRDO01BQ0lDLEVBQUUsQ0FBQ0gsSUFBSCxDQUFRLENBQUNFLENBQUQsRUFBSUosSUFBSSxDQUFDTyxHQUFMLENBQVNILENBQVQsQ0FBSixDQUFSO0lBREo7O0lBR0EsSUFBSUksRUFBRSxHQUFHLEVBQVQ7O0lBQ0EsS0FBSyxJQUFJSixDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHSixJQUFJLENBQUNNLEVBQUwsR0FBVSxDQUE5QixFQUFpQ0YsQ0FBQyxJQUFJLElBQXRDO01BQ0lJLEVBQUUsQ0FBQ04sSUFBSCxDQUFRLENBQUNFLENBQUQsRUFBSUosSUFBSSxDQUFDUyxHQUFMLENBQVNMLENBQVQsQ0FBSixDQUFSO0lBREo7O0lBR0EsSUFBSU0sRUFBRSxHQUFHLEVBQVQ7O0lBQ0EsS0FBSyxJQUFJTixDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHSixJQUFJLENBQUNNLEVBQUwsR0FBVSxDQUE5QixFQUFpQ0YsQ0FBQyxJQUFJLEdBQXRDO01BQ0lNLEVBQUUsQ0FBQ1IsSUFBSCxDQUFRLENBQUNFLENBQUQsRUFBSUosSUFBSSxDQUFDVyxHQUFMLENBQVNQLENBQVQsQ0FBSixDQUFSO0lBREo7O0lBR0FRLENBQUMsQ0FBQ0MsSUFBRixDQUFPRCxDQUFDLENBQUMscUJBQUQsQ0FBUixFQUFpQyxDQUFDO01BQzlCRSxLQUFLLEVBQUUsUUFEdUI7TUFFOUJyQixJQUFJLEVBQUVZLEVBRndCO01BRzlCVSxLQUFLLEVBQUU7UUFDSEMsU0FBUyxFQUFFO01BRFIsQ0FIdUI7TUFNOUJDLFVBQVUsRUFBRTtJQU5rQixDQUFELEVBTzlCO01BQ0NILEtBQUssRUFBRSxRQURSO01BRUNyQixJQUFJLEVBQUVlLEVBRlA7TUFHQ08sS0FBSyxFQUFFO1FBQ0hDLFNBQVMsRUFBRTtNQURSLENBSFI7TUFNQ0MsVUFBVSxFQUFFO0lBTmIsQ0FQOEIsRUFjOUI7TUFDQ0gsS0FBSyxFQUFFLFFBRFI7TUFFQ3JCLElBQUksRUFBRWlCLEVBRlA7TUFHQ0ssS0FBSyxFQUFFO1FBQ0hDLFNBQVMsRUFBRTtNQURSLENBSFI7TUFNQ0MsVUFBVSxFQUFFO0lBTmIsQ0FkOEIsQ0FBakMsRUFxQkk7TUFDQUMsTUFBTSxFQUFFLENBQUNDLE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIscUJBQTNCLENBQUQsRUFBb0RELE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIscUJBQTNCLENBQXBELEVBQXVHRCxNQUFNLENBQUNDLG1CQUFQLENBQTJCLG9CQUEzQixDQUF2RyxDQURSO01BRUFDLE1BQU0sRUFBRTtRQUNKTixLQUFLLEVBQUU7VUFDSE8sSUFBSSxFQUFFO1FBREgsQ0FESDtRQUlKQyxNQUFNLEVBQUU7VUFDSkQsSUFBSSxFQUFFLElBREY7VUFFSkUsSUFBSSxFQUFFLElBRkY7VUFHSkMsTUFBTSxFQUFFLENBSEo7VUFJSlQsU0FBUyxFQUFFO1FBSlA7TUFKSixDQUZSO01BYUFVLEtBQUssRUFBRTtRQUNIQyxTQUFTLEVBQUVSLE1BQU0sQ0FBQ0MsbUJBQVAsQ0FBMkIsaUJBQTNCLENBRFI7UUFFSFEsS0FBSyxFQUFFLENBQUMsQ0FBRCxFQUFJLENBQUM1QixJQUFJLENBQUNNLEVBQUwsR0FBVSxDQUFYLEVBQWMsVUFBZCxDQUFKLEVBQ0gsQ0FBQ04sSUFBSSxDQUFDTSxFQUFOLEVBQVUsUUFBVixDQURHLEVBRUgsQ0FBQ04sSUFBSSxDQUFDTSxFQUFMLEdBQVUsQ0FBVixHQUFjLENBQWYsRUFBa0IsV0FBbEIsQ0FGRyxFQUdILENBQUNOLElBQUksQ0FBQ00sRUFBTCxHQUFVLENBQVgsRUFBYyxTQUFkLENBSEc7TUFGSixDQWJQO01BcUJBdUIsS0FBSyxFQUFFO1FBQ0hGLFNBQVMsRUFBRVIsTUFBTSxDQUFDQyxtQkFBUCxDQUEyQixpQkFBM0IsQ0FEUjtRQUVIUSxLQUFLLEVBQUUsRUFGSjtRQUdIRSxHQUFHLEVBQUUsQ0FBQyxDQUhIO1FBSUhDLEdBQUcsRUFBRTtNQUpGLENBckJQO01BMkJBQyxJQUFJLEVBQUU7UUFDRkMsV0FBVyxFQUFFZCxNQUFNLENBQUNDLG1CQUFQLENBQTJCLGlCQUEzQixDQURYO1FBRUZjLFdBQVcsRUFBRTtNQUZYO0lBM0JOLENBckJKO0VBcURILENBMUZEOztFQTRGQSxPQUFPO0lBQ0g7SUFDQUMsSUFBSSxFQUFFLGdCQUFZO01BQ2QzQyxZQUFZO0lBQ2Y7RUFKRSxDQUFQO0FBTUgsQ0FwR3FCLEVBQXRCLEMsQ0FzR0E7OztBQUNBMkIsTUFBTSxDQUFDaUIsa0JBQVAsQ0FBMEIsWUFBWTtFQUNsQzdDLGVBQWUsQ0FBQzRDLElBQWhCO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9jaGFydHMvZmxvdGNoYXJ0cy9iYXNpYy5qcz82NTQ3Il0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgZGVmaW5pdGlvblxyXG52YXIgS1RGbG90RGVtb0Jhc2ljID0gZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlQmFzaWMgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIGRhdGEgPSBbXTtcclxuICAgICAgICB2YXIgdG90YWxQb2ludHMgPSAyNTA7XHJcblxyXG4gICAgICAgIC8vIHJhbmRvbSBkYXRhIGdlbmVyYXRvciBmb3IgcGxvdCBjaGFydHNcclxuXHJcbiAgICAgICAgZnVuY3Rpb24gZ2V0UmFuZG9tRGF0YSgpIHtcclxuICAgICAgICAgICAgaWYgKGRhdGEubGVuZ3RoID4gMCkgZGF0YSA9IGRhdGEuc2xpY2UoMSk7XHJcbiAgICAgICAgICAgIC8vIGRvIGEgcmFuZG9tIHdhbGtcclxuICAgICAgICAgICAgd2hpbGUgKGRhdGEubGVuZ3RoIDwgdG90YWxQb2ludHMpIHtcclxuICAgICAgICAgICAgICAgIHZhciBwcmV2ID0gZGF0YS5sZW5ndGggPiAwID8gZGF0YVtkYXRhLmxlbmd0aCAtIDFdIDogNTA7XHJcbiAgICAgICAgICAgICAgICB2YXIgeSA9IHByZXYgKyBNYXRoLnJhbmRvbSgpICogMTAgLSA1O1xyXG4gICAgICAgICAgICAgICAgaWYgKHkgPCAwKSB5ID0gMDtcclxuICAgICAgICAgICAgICAgIGlmICh5ID4gMTAwKSB5ID0gMTAwO1xyXG4gICAgICAgICAgICAgICAgZGF0YS5wdXNoKHkpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIC8vIHppcCB0aGUgZ2VuZXJhdGVkIHkgdmFsdWVzIHdpdGggdGhlIHggdmFsdWVzXHJcbiAgICAgICAgICAgIHZhciByZXMgPSBbXTtcclxuICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgKytpKSB7XHJcbiAgICAgICAgICAgICAgICByZXMucHVzaChbaSwgZGF0YVtpXV0pO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICByZXR1cm4gcmVzO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgdmFyIGQxID0gW107XHJcbiAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBNYXRoLlBJICogMjsgaSArPSAwLjI1KVxyXG4gICAgICAgICAgICBkMS5wdXNoKFtpLCBNYXRoLnNpbihpKV0pO1xyXG5cclxuICAgICAgICB2YXIgZDIgPSBbXTtcclxuICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IE1hdGguUEkgKiAyOyBpICs9IDAuMjUpXHJcbiAgICAgICAgICAgIGQyLnB1c2goW2ksIE1hdGguY29zKGkpXSk7XHJcblxyXG4gICAgICAgIHZhciBkMyA9IFtdO1xyXG4gICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgTWF0aC5QSSAqIDI7IGkgKz0gMC4xKVxyXG4gICAgICAgICAgICBkMy5wdXNoKFtpLCBNYXRoLnRhbihpKV0pO1xyXG5cclxuICAgICAgICAkLnBsb3QoJChcIiNrdF9kb2NzX2Zsb3RfYmFzaWNcIiksIFt7XHJcbiAgICAgICAgICAgIGxhYmVsOiBcInNpbih4KVwiLFxyXG4gICAgICAgICAgICBkYXRhOiBkMSxcclxuICAgICAgICAgICAgbGluZXM6IHtcclxuICAgICAgICAgICAgICAgIGxpbmVXaWR0aDogMSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgc2hhZG93U2l6ZTogMFxyXG4gICAgICAgIH0sIHtcclxuICAgICAgICAgICAgbGFiZWw6IFwiY29zKHgpXCIsXHJcbiAgICAgICAgICAgIGRhdGE6IGQyLFxyXG4gICAgICAgICAgICBsaW5lczoge1xyXG4gICAgICAgICAgICAgICAgbGluZVdpZHRoOiAxLFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBzaGFkb3dTaXplOiAwXHJcbiAgICAgICAgfSwge1xyXG4gICAgICAgICAgICBsYWJlbDogXCJ0YW4oeClcIixcclxuICAgICAgICAgICAgZGF0YTogZDMsXHJcbiAgICAgICAgICAgIGxpbmVzOiB7XHJcbiAgICAgICAgICAgICAgICBsaW5lV2lkdGg6IDEsXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHNoYWRvd1NpemU6IDBcclxuICAgICAgICB9XSwge1xyXG4gICAgICAgICAgICBjb2xvcnM6IFtLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtc3VjY2VzcycpLCBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtcHJpbWFyeScpLCBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtZGFuZ2VyJyldLFxyXG4gICAgICAgICAgICBzZXJpZXM6IHtcclxuICAgICAgICAgICAgICAgIGxpbmVzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgc2hvdzogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBwb2ludHM6IHtcclxuICAgICAgICAgICAgICAgICAgICBzaG93OiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgIGZpbGw6IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgcmFkaXVzOiAzLFxyXG4gICAgICAgICAgICAgICAgICAgIGxpbmVXaWR0aDogMVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB4YXhpczoge1xyXG4gICAgICAgICAgICAgICAgdGlja0NvbG9yOiBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1saWdodC1kYXJrJyksXHJcbiAgICAgICAgICAgICAgICB0aWNrczogWzAsIFtNYXRoLlBJIC8gMiwgXCJcXHUwM2MwLzJcIl0sXHJcbiAgICAgICAgICAgICAgICAgICAgW01hdGguUEksIFwiXFx1MDNjMFwiXSxcclxuICAgICAgICAgICAgICAgICAgICBbTWF0aC5QSSAqIDMgLyAyLCBcIjNcXHUwM2MwLzJcIl0sXHJcbiAgICAgICAgICAgICAgICAgICAgW01hdGguUEkgKiAyLCBcIjJcXHUwM2MwXCJdXHJcbiAgICAgICAgICAgICAgICBdXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHlheGlzOiB7XHJcbiAgICAgICAgICAgICAgICB0aWNrQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWxpZ2h0LWRhcmsnKSxcclxuICAgICAgICAgICAgICAgIHRpY2tzOiAxMCxcclxuICAgICAgICAgICAgICAgIG1pbjogLTIsXHJcbiAgICAgICAgICAgICAgICBtYXg6IDJcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgZ3JpZDoge1xyXG4gICAgICAgICAgICAgICAgYm9yZGVyQ29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWxpZ2h0LWRhcmsnKSxcclxuICAgICAgICAgICAgICAgIGJvcmRlcldpZHRoOiAxXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVCYXNpYygpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RGbG90RGVtb0Jhc2ljLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEZsb3REZW1vQmFzaWMiLCJleGFtcGxlQmFzaWMiLCJkYXRhIiwidG90YWxQb2ludHMiLCJnZXRSYW5kb21EYXRhIiwibGVuZ3RoIiwic2xpY2UiLCJwcmV2IiwieSIsIk1hdGgiLCJyYW5kb20iLCJwdXNoIiwicmVzIiwiaSIsImQxIiwiUEkiLCJzaW4iLCJkMiIsImNvcyIsImQzIiwidGFuIiwiJCIsInBsb3QiLCJsYWJlbCIsImxpbmVzIiwibGluZVdpZHRoIiwic2hhZG93U2l6ZSIsImNvbG9ycyIsIktUVXRpbCIsImdldENzc1ZhcmlhYmxlVmFsdWUiLCJzZXJpZXMiLCJzaG93IiwicG9pbnRzIiwiZmlsbCIsInJhZGl1cyIsInhheGlzIiwidGlja0NvbG9yIiwidGlja3MiLCJ5YXhpcyIsIm1pbiIsIm1heCIsImdyaWQiLCJib3JkZXJDb2xvciIsImJvcmRlcldpZHRoIiwiaW5pdCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/charts/flotcharts/basic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/charts/flotcharts/basic.js"]();
/******/ 	
/******/ })()
;