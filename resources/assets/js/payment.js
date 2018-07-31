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

var stripe = Stripe('pk_test_YR1aafLuF3A9nQWupxnQ7z33');
var elements = stripe.elements();

 //Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#32325d",
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#example1-card');


card.addEventListener('change', function(event) {
   var displayError = document.getElementById('card-errors');
   if (event.error) {
       displayError.textContent = event.error.message;
   } 
   else {
        displayError.textContent = '';
   }
});

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});


function stripeTokenHandler(token) {
    console.log(token);
   // Insert the token ID into the form so it gets submitted to the server
   var form = document.getElementById('payment-form');
   var hiddenInput = document.createElement('input');
   hiddenInput.setAttribute('type', 'hidden');
   hiddenInput.setAttribute('name', 'stripeToken');
   hiddenInput.setAttribute('value', token.id);
   form.appendChild(hiddenInput);

   // Submit the form
  form.submit();
}
