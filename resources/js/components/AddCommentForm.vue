<template>
    <div class="addComment">
        <textarea v-model="comment.body" placeholder="Add Comment..." ></textarea>
        <br>
        <button type="submit" class="btn btn-primary" @click="addComment()">Add Comment</button>
    </div>
</template>

<script>

export default {
    data: function () {
        return {
            comment: {
                body: ""
            }
        }
    },
    props: ['recipeId', 'userId'],

    methods: {
        addComment() {
            if (this.comment.body == '') {
                return;
            }
            axios.post('/api/recipe/' + this.recipeId + '/comment/' + this.userId, {
                comment: this.comment
            })
                .then(response => {
                    if (response.status == 201) {
                        this.$emit('reloadlist');
                        this.comment.body == '';

                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
};
</script>