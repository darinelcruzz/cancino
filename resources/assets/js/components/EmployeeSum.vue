<template>
    <div class="col-md-2">
        ${{ total.toFixed(2) }}
    </div>
</template>

<script>
export default {
    props: ['employee'],
    data(){
        return {
            total: 0,
            weeks:[],
        };
    },
    methods: {
        updateSum(week) {
            this.weeks[week.index] = week.amount;
            this.total = this.weeks.reduce((total, item) => total + item, 0) ;
        }
    },
    created() {
        this.$root.$on('employeesum' + this.employee, (week) => {
            this.updateSum(week);
        });
    }
}
</script>
