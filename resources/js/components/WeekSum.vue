<template>
    <div class="col-md-2">
        ${{ total.toFixed(2) }}
    </div>
</template>

<script>
export default {
    props: ['week'],
    data(){
        return {
            total: 0,
            employees:[],
        };
    },
    methods: {
        updateSum(week) {
            this.employees[week.index] = week.amount;
            this.total = this.employees.reduce((total, item) => total + item, 0) ;
        }
    },
    created() {
        this.$root.$on('weeksum' + this.week, (week) => {
            this.updateSum(week);
        });
    },
    updated() {
        this.$root.$emit('goalsum', {index: this.week, amount: this.total});
    }
}
</script>
