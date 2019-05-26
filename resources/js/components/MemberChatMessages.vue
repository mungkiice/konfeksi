<template>
	<div class="messaging">
		<div class="inbox_msg">
			<h3 class="text-center" style="background-color: #FAF9FF;padding: 20px;">Diskusi</h3>
			<div class="mesgs">
				<div class="msg_history">
					<div class="incoming_msg" v-for="messages in message">
						<div class="received_msg" v-if="message.user.role == 'Konfeksi'">
							<div class="received_withd_msg">
								<strong>Penitishop</strong>
								<p>{{message.message}}</p>
								<span class="time_date"> 11:01 AM    |    June 9</span>
							</div>
						</div>
						<div class="outgoing_msg" v-else>
							<div class="sent_msg">
								<p>{{message.message}}</p>
								<span class="time_date"> 11:01 AM    |    June 9</span> 
							</div>
						</div>
					</div>
				</div>
				<div class="type_msg">
					<div class="input_msg_write">
						<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true" @click="sendMessage"></i></button>
						<input type="text" class="write_msg" placeholder="Type a message" v-model="newMessage" @keyup.enter="sendMessage"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default{
		props:['messages', 'user'],

		data() {
			return {
				newMessage: ''
			}
		},

		methods: {
			sendMessage() {
				this.$emit('messagesent', {
					user: this.user,
					message: this.newMessage
				});
				this.newMessage = ''
			}
		}    
	};
</script>