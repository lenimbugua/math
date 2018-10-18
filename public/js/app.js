/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\popper.js\\dist\\esm\\popper.js'");

/***/ }),
/* 4 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\jquery\\dist\\jquery.js'");

/***/ }),
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(12);
module.exports = __webpack_require__(43);


/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

__webpack_require__(13);
//require('./get_data');
// require('./clients_orders');
__webpack_require__(38);
// require('./stripe_index');
__webpack_require__(39);

window.Vue = __webpack_require__(40);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('chat-messages', require('./components/ChatMessages.vue'));
// Vue.component('chat-form', require('./components/ChatForm.vue'));

// const app = new Vue({
//     el: '#app',

//     data: {
//         messages: [],
//         message:'',
//         userType:'',
//         orderId:7

//     },

//     created() {    	
//         this.fetchMessages();        
//         Echo.private('chat7')
// 		  .listen('MessageSent', (e) => {
// 		  	console.log('listening');
// 		    this.messages.push({
// 		      message: e.message.message
// 		    }); 
// 		});
//     },

//     methods: {
//         fetchMessages() {
//             axios.get(`/messages/7`)
//             	.then(response => {
// 	            	console.log(response.data);
// 	                this.messages = response.data;
//             	})
//             	.catch(error => console.log(error.response.data));           
//         },

//         addMessage(message, userType) {        	
//             this.messages.push(message);
//             this.message = message.message;
//             this.userType =message.userType

//             console.log(this.userType);
//         	console.log(this.message);

//             axios.post('/messages', {message:this.message, userType:this.userType})
//             		.then(response => {
// 		              	console.log(response.data);
// 		            })
// 		            .catch(error => console.log(error.response.data));
//         }
//     }
// });

/***/ }),
/* 13 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_laravel_echo__ = __webpack_require__(36);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_laravel_echo___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_laravel_echo__);

window._ = __webpack_require__(14);
window.Popper = __webpack_require__(3).default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = __webpack_require__(4);

    __webpack_require__(16);
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = __webpack_require__(17);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */



window.Pusher = __webpack_require__(37);

window.Echo = new __WEBPACK_IMPORTED_MODULE_0_laravel_echo__["default"]({
    broadcaster: 'pusher',
    key: "6354a6835e4a6e9c1250",
    cluster: "ap2",
    encrypted: true
});

/***/ }),
/* 14 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\lodash\\lodash.js'");

/***/ }),
/* 15 */,
/* 16 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\bootstrap\\dist\\js\\bootstrap.js'");

/***/ }),
/* 17 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\axios\\index.js'");

/***/ }),
/* 18 */,
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */,
/* 28 */,
/* 29 */,
/* 30 */,
/* 31 */,
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */,
/* 36 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\laravel-echo\\dist\\echo.js'");

/***/ }),
/* 37 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\pusher-js\\dist\\web\\pusher.js'");

/***/ }),
/* 38 */
/***/ (function(module, exports) {

function calculateCost() {
	// y = 88x +19;
	var y = 0;
	var e = document.getElementById('academicLevel');
	var x = e.options[e.selectedIndex].value;
	y = 88 * x + 19;
	document.getElementById('totalcost').innerHtml = "$" + y;
}

/***/ }),
/* 39 */
/***/ (function(module, exports) {

// (function() {
//   'use strict';

//   var stripe = Stripe('pk_test_YR1aafLuF3A9nQWupxnQ7z33');

// function registerElements(elements, exampleName) {
//   var formClass = '.' + exampleName;
//   var example = document.querySelector(formClass);

//   var form = example.querySelector('form');
//   var resetButton = example.querySelector('a.reset');
//   var error = form.querySelector('.error');
//   var errorMessage = error.querySelector('.message');

//   function enableInputs() {
//     Array.prototype.forEach.call(
//       form.querySelectorAll(
//         "input[type='text'], input[type='email'], input[type='tel']"
//       ),
//       function(input) {
//         input.removeAttribute('disabled');
//       }
//     );
//   }

//   function disableInputs() {
//     Array.prototype.forEach.call(
//       form.querySelectorAll(
//         "input[type='text'], input[type='email'], input[type='tel']"
//       ),
//       function(input) {
//         input.setAttribute('disabled', 'true');
//       }
//     );
//   }

//   function triggerBrowserValidation() {
//     // The only way to trigger HTML5 form validation UI is to fake a user submit
//     // event.
//     var submit = document.createElement('input');
//     submit.type = 'submit';
//     submit.style.display = 'none';
//     form.appendChild(submit);
//     submit.click();
//     submit.remove();
//   }

//   // Listen for errors from each Element, and show error messages in the UI.
//   var savedErrors = {};
//   elements.forEach(function(element, idx) {
//     element.on('change', function(event) {
//       if (event.error) {
//         error.classList.add('visible');
//         savedErrors[idx] = event.error.message;
//         errorMessage.innerText = event.error.message;
//       } else {
//         savedErrors[idx] = null;

//         // Loop over the saved errors and find the first one, if any.
//         var nextError = Object.keys(savedErrors)
//           .sort()
//           .reduce(function(maybeFoundError, key) {
//             return maybeFoundError || savedErrors[key];
//           }, null);

//         if (nextError) {
//           // Now that they've fixed the current error, show another one.
//           errorMessage.innerText = nextError;
//         } else {
//           // The user fixed the last error; no more errors.
//           error.classList.remove('visible');
//         }
//       }
//     });
//   });

//   // Listen on the form's 'submit' handler...
//   form.addEventListener('submit', function(e) {
//     e.preventDefault();

//     // Trigger HTML5 validation UI on the form if any of the inputs fail
//     // validation.
//     var plainInputsValid = true;
//     Array.prototype.forEach.call(form.querySelectorAll('input'), function(
//       input
//     ) {
//       if (input.checkValidity && !input.checkValidity()) {
//         plainInputsValid = false;
//         return;
//       }
//     });
//     if (!plainInputsValid) {
//       triggerBrowserValidation();
//       return;
//     }

//     // Show a loading screen...
//     example.classList.add('submitting');

//     // Disable all inputs.
//     disableInputs();

//     // Gather additional customer data we may have collected in our form.
//     var name = form.querySelector('#' + exampleName + '-name');
//     var address1 = form.querySelector('#' + exampleName + '-address');
//     var city = form.querySelector('#' + exampleName + '-city');
//     var state = form.querySelector('#' + exampleName + '-state');
//     var zip = form.querySelector('#' + exampleName + '-zip');
//     var additionalData = {
//       name: name ? name.value : undefined,
//       address_line1: address1 ? address1.value : undefined,
//       address_city: city ? city.value : undefined,
//       address_state: state ? state.value : undefined,
//       address_zip: zip ? zip.value : undefined,
//     };

//     // Use Stripe.js to create a token. We only need to pass in one Element
//     // from the Element group in order to create a token. We can also pass
//     // in the additional customer data we collected in our form.
//     stripe.createToken(elements[0], additionalData).then(function(result) {
//       // Stop loading!
//       example.classList.remove('submitting');

//       if (result.token) {
//         // If we received a token, show the token ID.
//         example.querySelector('.token').innerText = result.token.id;
//         example.classList.add('submitted');
//       } else {
//         // Otherwise, un-disable inputs.
//         enableInputs();
//       }
//     });
//     //return true;
//   });

//   resetButton.addEventListener('click', function(e) {
//     e.preventDefault();
//     // Resetting the form (instead of setting the value to `''` for each input)
//     // helps us clear webkit autofill styles.
//     form.reset();

//     // Clear each Element.
//     elements.forEach(function(element) {
//       element.clear();
//     });

//     // Reset error state as well.
//     error.classList.remove('visible');

//     // Resetting the form does not un-disable inputs, so we need to do it separately:
//     enableInputs();
//     example.classList.remove('submitted');
//   });
// }

//   var elements = stripe.elements({
//     fonts: [
//       {
//         cssSrc: 'https://fonts.googleapis.com/css?family=Roboto',
//       },
//     ],
//     // Stripe's examples are localized to specific languages, but if
//     // you wish to have Elements automatically detect your user's locale,
//     // use `locale: 'auto'` instead.
//     locale: window.__exampleLocale
//   });

//   var card = elements.create('card', {
//     iconStyle: 'solid',
//     style: {
//       base: {
//         iconColor: '#c4f0ff',
//         color: '#fff',
//         fontWeight: 500,
//         fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
//         fontSize: '16px',
//         fontSmoothing: 'antialiased',

//         ':-webkit-autofill': {
//           color: '#fce883',
//         },
//         '::placeholder': {
//           color: '#87BBFD',
//         },
//       },
//       invalid: {
//         iconColor: '#FFC7EE',
//         color: '#FFC7EE',
//       },
//     },
//   });
//   card.mount('#example1-card');

//   registerElements([card], 'example1');
// })();

// function stripeTokenHandler(token) {
//          console.log(token);
//         // Insert the token ID into the form so it gets submitted to the server
//         var form = document.getElementById('payment-form');
//         var hiddenInput = document.createElement('input');
//         hiddenInput.setAttribute('type', 'hidden');
//         hiddenInput.setAttribute('name', 'stripeToken');
//         hiddenInput.setAttribute('value', token.id);
//         form.appendChild(hiddenInput);

//         // Submit the form
//        form.submit();
//     }

// var dataCount = document.getElementById('bgblue');
// var count = dataCount.dataset.count;

// var stripe = Stripe('pk_test_YR1aafLuF3A9nQWupxnQ7z33');
// var elements = stripe.elements();

//  //Custom styling can be passed to options when creating an Element.
// var style = {
//   base: {
//     // Add your base input styles here. For example:
//     fontSize: '16px',
//     color: "#32325d",
//   }
// };

// // Create an instance of the card Element.
// var card = elements.create('card', {style: style});

// // Add an instance of the card Element into the `card-element` <div>.
// card.mount('#card'+count);


// card.addEventListener('change', function(event) {
//    var displayError = document.getElementById('card-errors');
//    if (event.error) {
//        displayError.textContent = event.error.message;
//    } 
//    else {
//         displayError.textContent = '';
//    }
// });

// // Create a token or display an error when the form is submitted.
// var form = document.getElementById('payment-form');
// form.addEventListener('submit', function(event) {
//   event.preventDefault();

//   stripe.createToken(card).then(function(result) {
//     if (result.error) {
//       // Inform the customer that there was an error.
//       var errorElement = document.getElementById('card-errors');
//       errorElement.textContent = result.error.message;
//     } else {
//       // Send the token to your server.
//       stripeTokenHandler(result.token);
//     }
//   });
// });


// function stripeTokenHandler(token) {
//     console.log(token);
//    // Insert the token ID into the form so it gets submitted to the server
//    var form = document.getElementById('payment-form');
//    var hiddenInput = document.createElement('input');
//    hiddenInput.setAttribute('type', 'hidden');
//    hiddenInput.setAttribute('name', 'stripeToken');
//    hiddenInput.setAttribute('value', token.id);
//    form.appendChild(hiddenInput);

//    // Submit the form
//   form.submit();
// }

/***/ }),
/* 40 */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open 'C:\\xampp\\htdocs\\math\\node_modules\\vue\\dist\\vue.common.js'");

/***/ }),
/* 41 */,
/* 42 */,
/* 43 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: \r\n@import '~bootstrap/scss/bootstrap';\r\n^\r\n      File to import not found or unreadable: C:\\xampp\\htdocs\\math\\node_modules\\bootstrap\\scss\\bootstrap.scss.\r\n      in C:\\xampp\\htdocs\\math\\resources\\assets\\sass\\app.scss (line 9, column 1)\n    at runLoaders (C:\\xampp\\htdocs\\math\\node_modules\\webpack\\lib\\NormalModule.js:195:19)\n    at C:\\xampp\\htdocs\\math\\node_modules\\loader-runner\\lib\\LoaderRunner.js:364:11\n    at C:\\xampp\\htdocs\\math\\node_modules\\loader-runner\\lib\\LoaderRunner.js:230:18\n    at context.callback (C:\\xampp\\htdocs\\math\\node_modules\\loader-runner\\lib\\LoaderRunner.js:111:13)\n    at Object.asyncSassJobQueue.push [as callback] (C:\\xampp\\htdocs\\math\\node_modules\\sass-loader\\lib\\loader.js:55:13)\n    at Object.done [as callback] (C:\\xampp\\htdocs\\math\\node_modules\\neo-async\\async.js:7974:18)\n    at options.error (C:\\xampp\\htdocs\\math\\node_modules\\node-sass\\lib\\index.js:294:32)");

/***/ })
/******/ ]);