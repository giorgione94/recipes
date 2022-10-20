<template>
    <div>
        <i @click="toggle" class="bi bi-suit-heart"></i>
    </div>
</template>

<script>

export default {
    data() { return { recipeId: "" } },
    props: ['recipeId'],
    methods: {
        toggle() {
            //const token = localStorage.getItem('XSRF-TOKEN');
            let token = document.head.querySelector('meta[name="csrf-token"]');
            //axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            console.log(token.content);
            const headers = {
                "XSRF-TOKEN": token.content
            };
            axios.post(
                '/api/like', { recipeId: this.recipeId }, {headers: headers}
            ).then((response) => {
                this.$emit('create-post', true)
            })
        }
    }
}
</script>