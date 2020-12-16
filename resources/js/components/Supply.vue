<template>
	<tr>
		<td>
            <a @click="add">
            	<i class="fa fa-plus"></i>
            </a>&nbsp;&nbsp;
            {{ supply.supply.code }}
            <span style="color: navy;" class="pull-right">{{ supply.supply.sat_key }}</span> <br>
            <span style="color: purple;"><em>{{ supply.supply.description }}</em></span>
        </td>
        <td style="text-align: center">{{ supply.quantity }}</td>
        <td style="text-align: right">{{ supply.supply.sale_price.toFixed(2) }}</td>
	</tr>
</template>

<script>
	export default {
		props: ['supply'],
		methods: {
			add() {
				this.$root.$emit('add', this.supply)
			}
		}
	}
</script>
