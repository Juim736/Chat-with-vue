require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('message', require('./components/Message.vue').default);



const app = new Vue({
    el: '#app',
    data : {
    	chat : {
    		messages : [],
            user : [],
            color : [],
            time : []
    	},
    	singleText : '',
        typing : false,
        typetext : ''
    },
    methods : {
    	send () {
    		if(this.singleText.length > 0)
                this.chat.messages.push(this.singleText)
                this.chat.user.push('you')
                this.chat.color.push('success')
    			this.chat.time.push(this.gtTime())

            axios.post('/send', {
                message: this.singleText,
              
              })
              .then(function (response) {
                // console.log(response);
                console.log('success response')
              })
              .catch(function (error) {
                // console.log(error);
                console.log('error response')
              });

    		this.singleText = ''
    	},
        gtTime () {
            let time = new Date()
            return  time.getHours()+':'+time.getMinutes()
        }
    },
    watch : {
        singleText () {
            Echo.private('channelOne')
                .whisper('typing', {
                 typingtext: this.singleText
            });
        }
    },
    mounted () {
        Echo.private('channelOne')
            .listen('ChatEvent', (e) => {
            console.log(e);
            this.chat.messages.push(e.text)
            this.chat.user.push(e.user)
            this.chat.color.push('warning')
            this.chat.time.push(this.gtTime())
        }).listenForWhisper('typing', (e) => {
                if(e.typingtext.length > 0){
                    this.typetext = e.typingtext
                    this.typing = true
                }
                else{
                    this.typing = false
                    this.typetext = ''
                }
         });
    }
});
