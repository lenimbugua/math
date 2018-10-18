
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('./get_data');
// require('./clients_orders');
require('./price_calculator');
// require('./stripe_index');
require('./payment');



window.Vue = require('vue');

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


