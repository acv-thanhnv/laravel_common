<template>
    <select name="combox" style="width: 200px;">
        <option v-bind:value="item.id" v-for="item in itemSourceData">{{item.module_code}}</option>
    </select>
</template>
<script>
    export default {
        props: ['dataUrl'],
        data: function () {
            return {itemSourceData: [{'id': 0, 'module_code': '---'}]}
        },
        mounted() {
            this.loading = true;
            axios.get(this.dataUrl)
                .then((response) => {
                    this.loading = false;
                    this.itemSourceData = response.data['data'];
                }, (error) => {
                    this.loading = false;
                })
        },
    }
</script>
