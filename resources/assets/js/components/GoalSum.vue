<template>
    <div class="col-md-2">
        ${{ total.toFixed(2) }}
    </div>
</template>

<script>
export default {
    data(){
        return {
            total: 0,
            elements:[],
        };
    },
    methods: {
        updateSum(element) {
            this.elements[element.index] = element.amount;
            this.total = this.elements.reduce((total, item) => total + item, 0) ;
        }
    },
    created() {
        this.$root.$on('goalsum', (element) => {
            this.updateSum(element);
        });
    }
}
</script>
