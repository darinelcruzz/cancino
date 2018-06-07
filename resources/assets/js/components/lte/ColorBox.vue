<template lang="html">
    <div :class="[colorBox, 'box ', {'box-solid': isSolid, 'collapsed-box': isCollapsed}]">
        <div class="box-header with-border">
            <h3 class="box-title">{{ title }}</h3>
            &nbsp;&nbsp;&nbsp;
            <span v-if="showSpan" class="label label-danger">
                {{ label }}
            </span>
            <div v-if="showButton" class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse">
                <i :class="{'fa fa-minus': !isCollapsed, 'fa fa-plus': isCollapsed}"></i>
                </button>
            </div>
        </div>

        <div class="box-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isCollapsed: false,
            isSolid: false,
            showButton: false,
            showSpan: false,
            colorBox: 'box-',
        };
    },

    props: ['title', 'span', 'label', 'color', 'button', 'collapsed', 'solid'],
    created() {
        this.isCollapsed = this.collapsed == '';
        this.isSolid = this.solid == '';
        this.showButton = this.button == '';
        this.showSpan = this.span == '' ;
        this.colorBox += this.color;
    }
}
</script>
