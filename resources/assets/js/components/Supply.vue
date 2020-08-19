<template>
	<tr>
		<td>{{ supply.code }}</td>
		<td>
            <a @click="add">
            	<i class="fa fa-plus"></i>
            </a>&nbsp;&nbsp;
            {{ supply.description }} <br>
            <span style="color: purple;">{{ supply.sat_key }}</span>
        </td>
        <td style="text-align: center">{{ supply.quantity }}</td>
        <td style="text-align: right">$ {{ supply.sale_price.toFixed(2) }}</td>
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
