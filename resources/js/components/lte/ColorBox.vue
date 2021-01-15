<template lang="html">
    <div :class="[colorBox, 'box ', {'box-solid': isSolid, 'collapsed-box': isCollapsed}]">
        <div class="box-header with-border">
            <h3 class="box-title">{{ title }}</h3>
            &nbsp;&nbsp;&nbsp;
            <span v-if="showLabel" :class="'label label-' + color">
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
            showLabel: false,
            colorBox: 'box-',
        };
    },

    props: ['title', 'label', 'color', 'button', 'collapsed', 'solid'],
    created() {
        this.isCollapsed = this.collapsed == '';
        this.isSolid = this.solid == '';
        this.showButton = this.button == '';
        this.showLabel = this.label > 0 && !this.label == '';
        this.colorBox += this.color;
    }
}
</script>
