<template>
	<div class="messaging">
		<div class="inbox_msg">
			<h3 class="text-center" style="background-color: #FAF9FF;padding: 20px;">Diskusi</h3>
			<div class="mesgs">
				<div class="msg_history" v-chat-scroll>
					<div class="incoming_msg" v-for="message,index in messages" :key="message.index">
						<div class="received_msg" v-if="message.user.role == 'Konfeksi'">
							<div class="received_withd_msg">
								<strong>{{message.user.nama}}</strong>
								<p>{{message.teks}}</p>
								<span class="time_date"> 11:01 AM    |    June 9</span>
							</div>
						</div>
						<div class="outgoing_msg" v-else>
							<div class="sent_msg">
								<p>{{message.teks}}</p>
								<span class="time_date"> 11:01 AM    |    June 9</span> 
							</div>
						</div>
					</div>
				</div>
				<div class="type_msg">
					<div class="input_msg_write">
						<button class="msg_send_btn" type="button" @click="sendMessage"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
						<input type="text" class="write_msg" placeholder="Type a message" name="teks" v-model="teks" @keyup.enter="sendMessage"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default{
		props:['user'],

		data() {
			return {
				teks: '',
				messages: [],
				kodePesanan:window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
			}
		},
		mounted() {
			this.fetchMessages();
			console.log('mounted bro');
			window.Echo.private('chat')
			.listen('.PesanTerkirim', (e) => {
				console.log(e);
				this.messages.push(e.pesan);
			});
		},
		methods: {
			sendMessage() {
				this.addMessage({
					teks: this.teks,
					user: this.user
				});
				this.teks = '';
			},
			fetchMessages() {
				axios.get('/messages/'+this.kodePesanan).then(response => {
					this.messages = response.data;
				});
			},
			addMessage(teks) {
				this.messages.push(teks);

				axios.post('/messages/'+this.kodePesanan, teks).then(response => {});
			}
		}    
	};
</script>