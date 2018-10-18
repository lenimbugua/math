<script type="application/javascript">
  const app = new Vue({
        el: '#app',
        data: {
            messages: {},
            messageBox: '',
            userType:'',
            order: {!! $order->toJson() !!},
            user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
        },
        mounted() {
              this.getMessages();
        },
        methods: {
              getMessages() {
                  axios.get(`/api/orders/8/messages`)
                       .then((response) => {
                           this.messages = response.data
                       })
                       .catch(error => console.log(error.response.data)); 
                  
              },
              postMessage() {
                  axios.post(`/api/orders/8/messages`, {
                      api_token: this.user.api_token,
                      message: this.messageBox,
                      userType:this.UserType
                  })
                  .then((response) => {
                      this.messages.unshift(response.data);
                      this.messageBox = '';
                  })
                  .catch((error) => {
                      console.log(error);
                  })
              }
          }
    })
</script>