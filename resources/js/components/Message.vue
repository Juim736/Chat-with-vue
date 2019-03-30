<template>
	<div class="">
		<li class="list-group-item" :class="colorClass"> <slot></slot> </li>
		<small class="dadge fill"> {{ time }}</small>
		<small class="badge float-right" :class="badgeColor"> {{ user }} </small>
	</div>
</template>
<script>
	export default {
		props : [
			'color',
			'user',
			'time',
		],
		computed : {
			colorClass () {
				var color
				color = "list-group-item-"+this.color
				return color
			},
			badgeColor () {
				var color
				color = "badge-"+this.color
				return color
			}

		}
	}
</script>