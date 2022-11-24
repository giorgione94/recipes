<template>
    <div>
        <div v-for="(comment, index) in comments" :key="index">
            <list-comment 
            :comment="comment" 
            class="comment" 
            />
        </div>
    </div>
</template>

<script>
import ListComment from './ListComment.vue'
export default {
    components: {
        ListComment
    },
    data: function () {
        return {
            comments: []
        }
    },
    props: ['recipeId'],
    methods: {
        getList() {
            axios.get('/api/recipe/' + this.recipeId + '/comment/')
                .then(response => {
                    this.comments = response.data
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