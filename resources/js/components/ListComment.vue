<template>
    <div class="comment">
        <button type="submit" 
        @click="removeComment()" 
        v-on:itemchanged="$emit('reloadlist')" 
        class="btn btn-danger">Remove</button>
    </div>
</template>

<script>
export default {
    props: ['comment'],
    methods: {
        removeComment() {
            axios.delete('api/recipe/' + this.comment.body)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit('commentchanged');
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>