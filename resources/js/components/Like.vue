<template>
    <div>
        <i @click="toggle" class="bi bi-suit-heart"></i>
    </div>
</template>

<script>
export default {
    data() { return { recipeId: "", userId: ""} },
    props: ['recipeId', 'userId'],
    methods: {
        toggle() {
            console.log(this.userId);
            axios.post(
                '/api/like', { recipeId: this.recipeId, userId: this.userId}
            ).then((response) => {
                this.$emit('create-post', true)
            })
        }
    }
}
</script>