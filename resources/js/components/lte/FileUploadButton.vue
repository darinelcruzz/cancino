<template>
	<div :class="'fileUpload btn btn-sm btn-' + buttonColor">
        <span><i :class="icon" aria-hidden="true"></i>&nbsp;&nbsp; {{ buttonName }}</span>
        <input type="file" :name="fname" :accept="ext" class="upload" @change="changeIcon">
    </div>
</template>

<script>
export default {
	data() {
        return {
            icon: 'fa fa-upload',
            buttonColor: 'default',
            buttonName: 'XML'
        }
    },
    props: ['fname', 'ext', 'color', 'bname'],
    methods: {
    	changeIcon() {
    		this.icon = 'fa fa-check-double';
            this.buttonColor = 'success';
    	}
    },
    created() {
        this.buttonColor = this.color != '' ? this.color: 'default'
        this.buttonName = this.bname != '' ? this.bname: 'XML'
    }
};
	
</script>

<style lang="css">
	.fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 16px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>