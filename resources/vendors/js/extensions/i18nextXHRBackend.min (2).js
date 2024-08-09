!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t=t||self).i18nextXHRBackend=e()}(this,(function(){"use strict";function t(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}var e=[],n=e.forEach,o=e.slice;function i(t){return n.call(o.call(arguments,1),(function(e){if(e)for(var n in e)void 0===t[n]&&(t[n]=e[n])})),t}function r(t){return(r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function a(t){return(a="function"==typeof Symbol&&"symbol"===r(Symbol.iterator)?function(t){return r(t)}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":r(t)})(t)}function s(t,e){if(e&&"object"===a(e)){var n="",o=encodeURIComponent;for(var i in e)n+="&"+o(i)+"="+o(e[i]);if(!n)return t;t=t+(-1!==t.indexOf("?")?"&":"?")+n.slice(1)}return t}function l(t,e,n,o,i){o&&"object"===a(o)&&(i||(o._t=new Date),o=s("",o).slice(1)),e.queryStringParams&&(t=s(t,e.queryStringParams));try{var r;(r=XMLHttpRequest?new XMLHttpRequest:new ActiveXObject("MSXML2.XMLHTTP.3.0")).open(o?"POST":"GET",t,1),e.crossDomain||r.setRequestHeader("X-Requested-With","XMLHttpRequest"),r.withCredentials=!!e.withCredentials,o&&r.setRequestHeader("Content-type","application/x-www-form-urlencoded"),r.overrideMimeType&&r.overrideMimeType("application/json");var l=e.customHeaders;if(l="function"==typeof l?l():l)for(var u in l)r.setRequestHeader(u,l[u]);r.onreadystatechange=function(){r.readyState>3&&n&&n(r.responseText,r)},r.send(o)}catch(t){console&&console.log(t)}}function u(){return{loadPath:"/locales/{{lng}}/{{ns}}.json",addPath:"/locales/add/{{lng}}/{{ns}}",allowMultiLoading:!1,parse:JSON.parse,parsePayload:function(t,e,n){return function(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}({},e,n||"")},crossDomain:!1,ajax:l}}var c=function(){function e(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e),this.init(t,n),this.type="backend"}var n,o,r;return n=e,(o=[{key:"init",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};this.services=t,this.options=i(e,this.options||{},u())}},{key:"readMulti",value:function(t,e,n){var o=this.options.loadPath;"function"==typeof this.options.loadPath&&(o=this.options.loadPath(t,e));var i=this.services.interpolator.interpolate(o,{lng:t.join("+"),ns:e.join("+")});this.loadUrl(i,n)}},{key:"read",value:function(t,e,n){var o=this.options.loadPath;"function"==typeof this.options.loadPath&&(o=this.options.loadPath([t],[e]));var i=this.services.interpolator.interpolate(o,{lng:t,ns:e});this.loadUrl(i,n)}},{key:"loadUrl",value:function(t,e){var n=this;this.options.ajax(t,this.options,(function(o,i){if(i.status>=500&&i.status<600)return e("failed loading "+t,!0);if(i.status>=400&&i.status<500)return e("failed loading "+t,!1);var r,a;try{r=n.options.parse(o,t)}catch(e){a="failed parsing "+t+" to json"}if(a)return e(a,!1);e(null,r)}))}},{key:"create",value:function(t,e,n,o){var i=this;"string"==typeof t&&(t=[t]);var r=this.options.parsePayload(e,n,o);t.forEach((function(t){var n=i.services.interpolator.interpolate(i.options.addPath,{lng:t,ns:e});i.options.ajax(n,i.options,(function(t,e){}),r)}))}}])&&t(n.prototype,o),r&&t(n,r),e}();return c.type="backend",c}));