!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):t.jqueryI18next=e()}(this,function(){"use strict";function t(t,a){function i(n,a,i){function r(t,n){return f.parseDefaultValueFromContent?e({},t,{defaultValue:n}):t}if(0!==a.length){var o="text";if(0===a.indexOf("[")){var l=a.split("]");a=l[1],o=l[0].substr(1,l[0].length-1)}if(a.indexOf(";")===a.length-1&&(a=a.substr(0,a.length-2)),"html"===o)n.html(t.t(a,r(i,n.html())));else if("text"===o)n.text(t.t(a,r(i,n.text())));else if("prepend"===o)n.prepend(t.t(a,r(i,n.html())));else if("append"===o)n.append(t.t(a,r(i,n.html())));else if(0===o.indexOf("data-")){var s=o.substr("data-".length),d=t.t(a,r(i,n.data(s)));n.data(s,d),n.attr(o,d)}else n.attr(o,t.t(a,r(i,n.attr(o))))}}function r(t,n){var r=t.attr(f.selectorAttr);if(r||void 0===r||!1===r||(r=t.text()||t.val()),r){var o=t,l=t.data(f.targetAttr);if(l&&(o=t.find(l)||t),n||!0!==f.useOptionsAttr||(n=t.data(f.optionsAttr)),n=n||{},r.indexOf(";")>=0){var s=r.split(";");a.each(s,function(t,e){""!==e&&i(o,e.trim(),n)})}else i(o,r,n);if(!0===f.useOptionsAttr){var d={};d=e({clone:d},n),delete d.lng,t.data(f.optionsAttr,d)}}}function o(t){return this.each(function(){r(a(this),t),a(this).find("["+f.selectorAttr+"]").each(function(){r(a(this),t)})})}var f=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};f=e({},n,f),a[f.tName]=t.t.bind(t),a[f.i18nName]=t,a.fn[f.handleName]=o}var e=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var a in n)Object.prototype.hasOwnProperty.call(n,a)&&(t[a]=n[a])}return t},n={tName:"t",i18nName:"i18n",handleName:"localize",selectorAttr:"data-i18n",targetAttr:"i18n-target",optionsAttr:"i18n-options",useOptionsAttr:!1,parseDefaultValueFromContent:!0};return{init:t}});
