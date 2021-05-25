<template>
	<tr>
		<td v-if="editable"><span style="color: navy;"><i class="fa fa-edit"></i></span></td>
		<td v-else><span style="color: green;"><i class="fa fa-check"></i></span></td>
		<td>
			{{ supply.supply.description }}
			<input v-if="editable" :name="'supplies[' + index + '][id]'" type="hidden" :value="supply.id">
		</td>
		<td>
			
			<input v-if="editable" type="number" :name="'supplies[' + index + '][price]'" v-model.number="price" @change="update" class="form-control" min="1" step="0.01">
			<span v-else>{{ supply.price.toFixed(2) }}</span>
		</td>
		<td v-if="editable">
			<div class="input-group input-group-sm">
                <input :name="'supplies[' + index + '][quantity]'" type="number" v-model.number="quantity" @change="update" class="form-control" min="1">
            </div>
		</td>
		<td v-else>
			{{ supply.quantity }}
		</td>
		<td v-if="editable">
			{{ total.toFixed(2) }}
		</td>
		<td v-else>
			{{ (supply.price * supply.quantity).toFixed(2) }}
		</td>
	</tr>	
</template>

<script>
	export default {
		props: {supply: Object, editable: {type: Boolean, default: false}, index: Number},
		data() {
			return {
				quantity: 1,
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
			this.price = this.supply.price
			this.quantity = this.supply.quantity
		}
	};
</script>
