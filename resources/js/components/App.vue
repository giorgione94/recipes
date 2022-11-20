<template>
    <div class="container">
        <div class="heading">
            <h2 id="title">Comment</h2>
            <add-comment-form-vue
            v-on:reloadlist="getList()"/>
        </div>
        <div>
            <list-view-vue 
            :comment="comment" 
            v-on:reloadlist="getList()" 
            />
        </div>
    </div>
</template>

<script>
import AddCommentFormVue from './AddCommentForm.vue';
import ListViewVue from './ListView.vue';
export default {
    components: {
        AddCommentFormVue,
        ListViewVue
    },
    data: function () {
        return {
            comment: []
        }
    },
    methods: {
        getList() {
            axios.get('api/comment')
                .then(response => {
                    this.comment = response.data
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    created() {
        this.getList();
    }
}
</script>