<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat App</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.list-group{
			overflow-y: scroll;
			height: 230px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" id="app">
			<div class="col-6 offset-3">
				<li class="list-group-item active">Chat Room</li>
				<ul class="list-group" v-chat-scroll>
					<message
					v-for="(item,index) in chat.messages"
					:key="item.index"
					:color= chat.color[index]
					:user = chat.user[index]
					:time = chat.time[index]
					> @{{ item }} </message>


				</ul>
				<li class="" style="list-style: none" v-if="typing"> @{{ typetext }} </li>
				<li class="" style="list-style: none"> @{{ singleText }}</li>
				<input type="text" class="form-control" @keyup.enter="send" v-model="singleText">
			</div>
		</div>
	</div>
	
	<script src="{{ asset('js/app.js')  }}"></script>
</body>
</html>