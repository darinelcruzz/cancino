<template>
	<tr>
		<td>
			<span style="color: green;">
				<i class="fa fa-check"></i>
			</span>
		</td>
		<td>
			{{ supply.supply.description }}
		</td>
		<td>
			{{ supply.price.toFixed(2) }}
		</td>
		<td>
			{{ supply.quantity }}
		</td>
		<td>
			{{ (supply.price * supply.quantity).toFixed(2) }}
		</td>
	</tr>	
</template>

<script>
	export default {
		props: ['supply']
	};
</script>
