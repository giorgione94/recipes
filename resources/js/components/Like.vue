<template>
    <div>
        <i @click="toggle"  class="bi" :class="[isActive ? 'bi-suit-heart-fill': 'bi-suit-heart']"></i>
    </div>
</template>

<script>

export default {
    data() { return { recipeId: "", userId: "" } },
    props: ['recipeId', 'userId'],
    methods: {
        toggle() {

            axios.post(
                '/api/recipe/' + this.recipeId + '/like/' + this.userId
            ).then((response) => {
                console.log(response)
            })
        }
    },
    created() {
        axios.get(
            '/api/recipe/' + this.recipeId + '/like/' + this.userId
        ).then((response) => {
            console.log(response)
        })
    }
}
</script>