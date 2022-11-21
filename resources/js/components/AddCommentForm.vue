<template>
    <div class="addComment">
        <textarea name="" id="" cols="30" rows="10" v-model="comment.body"></textarea>
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