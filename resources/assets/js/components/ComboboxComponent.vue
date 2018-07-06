<template>
    <div class="card-body form-group basic-menu">
        <ul class="basic">
            <span v-for="(item,index) in itemSourceData">
                    <li v-if="item.level_value === itemSourceData[index-1].level_value">{{item.name}}</li>
                <li v-if="item.level_value > itemSourceData[index-1].level_value">{{item.name}}</li>
            </span>
        </ul>
    </div>
</template>
<script>
    export default {
        props: ['dataUrl','prevLevel'],
        data: function () {
            return {itemSourceData: [{'id': 0, 'name': '---'}]}
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
