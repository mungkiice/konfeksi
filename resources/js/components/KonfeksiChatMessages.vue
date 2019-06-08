<style>
strong{
	line-height: 24px;
	font-size: 14px;
	font-family: "Roboto", sans-serif;
	font-weight: 400;
	color: #777777;
}
</style>
<template>
	<div class="inbox_msg row" id="chat-box">
		<div class="inbox_people col-sm-4">
			<div class="headind_srch">
				<div class="srch_bar">
					<div class="stylish-input-group">
						<h5>Pelanggan</h5>
					</div>
				</div>
			</div>
			<div class="inbox_chat">
				<div class="chat_list" v-for="pesanan,index in pesanans" :key="pesanan.index">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<a href="#" class="chat_ib" style="text-decoration: none" @click="fetchMessages(pesanan.kode_pesanan)">
							<h5>{{pesanan.user.nama}}<br><span>#{{pesanan.kode_pesanan}}</span></h5>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="mesgs col-sm-8">
			<h5>Kotak Diskusi</h5>
			<hr>
			<div class="msg_history" v-chat-scroll>
				<div class="incoming_msg" v-for="message,index in messages" :key="message.index">
					<div class="received_msg" v-if="message.user.role == 'Pelanggan'">
						<div class="received_withd_msg">
							<strong>{{message.user.nama}}</strong>
							<p>{{message.teks}}</p>
							<span class="time_date"> {{messageTime(message.created_at)}} </span>
						</div>
					</div>
					<div class="outgoing_msg" v-else>
						<div class="sent_msg">
							<p>{{message.teks}}</p>
							<span class="time_date"> {{messageTime(message.created_at)}} </span> 
						</div>
					</div>
				</div>
			</div>
			<div class="type_msg">
				<div class="input_msg_write">
					<input type="text" class="write_msg" placeholder="Type a message" @keyup.enter="sendMessage" v-model="teks" name="teks"/>
					<button class="msg_send_btn" type="button" @click="sendMessage"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>      
</template>
<script>
	import moment from 'moment';
	export default{
		props:['user'],

		data() {
			return {
				teks: '',
				messages: [],
				pesanans:[],
				kodePesanan:'',
			}
		},
		mounted() {
			this.fetchPesanans();
			window.Echo.private('chat')
			.listen('.PesanTerkirim', (e) => {
				console.log(e);
				this.messages.push(e.pesan);
			});
		},
		methods: {
			messageTime(time){
				return moment(time, 'YYYY-MM-DD HH:mm:ss').format('Do MMMM | h:mm A');
			},
			sendMessage() {
				this.addMessage({
					teks: this.teks,
					created_at: moment().format('YYYY-MM-DD HH:mm:ss'),
					user: this.user
				});
				this.teks = '';
			},
			fetchPesanans(){
				axios.get('/konfeksi/pesanan/json').then(response => {
					this.pesanans = response.data;
				});
			},
			fetchMessages(kodePesanan) {
				axios.get('/messages/'+kodePesanan).then(response => {
					this.messages = response.data;
					this.kodePesanan = kodePesanan;
				});
			},
			addMessage(teks) {
				this.messages.push(teks);

				axios.post('/messages/'+this.kodePesanan, teks).then(response => {});
			}
		}    
	}
</script>