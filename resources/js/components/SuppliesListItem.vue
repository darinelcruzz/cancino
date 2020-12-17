<template>
	<tr>
		<td>
			<a @click="destroy" style="color: red;">
				<i class="fa fa-times"></i>
			</a>
		</td>
		<td>
			{{ supply.supply.description }}
			<input type="hidden" :name="'supplies[' + index + '][supply_id]'" :value="supply.supply.id">
		</td>
		<td>
			{{ price.toFixed(2) }}
            <input :name="'supplies[' + index + '][price]'" type="hidden" :value="price">
		</td>
		<td>
			<div class="input-group input-group-sm">
                <input :name="'supplies[' + index + '][quantity]'" type="number" v-model.number="quantity" @change="update" class="form-control" min="1" :max=" model == 'sale' ? supply.quantity * supply.supply.ratio: 999">
            </div>
		</td>
		<td>
			{{ total.toFixed(2) }}
		</td>
	</tr>	
</template>

<script>
	export default {
		props: ['supply', 'index', 'model'],
		data() {
			return {
				quantity: 1,
				sizes: [],
				price: 0
			}
		},
		computed: {
			total() {
				return this.quantity * this.price
			}
		},
		methods: {
			destroy() {
				this.$root.$emit('delete', this.index)
			},
			update() {
				this.$root.$emit('sum', this.index, this.total)
			},
		},
		created() {
			this.price = this.model == 'sale' ? this.supply.supply.sale_price: this.supply.supply.purchase_price
		}
	};
</script>
