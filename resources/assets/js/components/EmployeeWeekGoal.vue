<template>
    <div>
        <input class="form-control" type="number" :name="'sellers[' + employee + '][' + week + '][goal]'" value="0" min="0" step="0.01" v-model.number="amount">
        <input type="hidden" :name="'sellers[' + employee + '][' + week + '][week]'" :value="week">
        <input type="hidden" :name="'sellers[' + employee + '][' + week + '][goal_id]'" :value="goal">
        <input type="hidden" :name="'sellers[' + employee + '][' + week + '][employer_id]'" :value="employee">
    </div>
</template>

<script>
export default {
    props: ['employee', 'week', 'goal'],
    data(){
        return {
            amount: 0,
        };
    },
    updated() {
        this.$root.$emit('employeesum' + this.employee, {index: this.week, amount: this.amount})
        this.$root.$emit('weeksum' + this.week, {index: this.employee, amount: this.amount})
    },
    created() {

    }
}
</script>
