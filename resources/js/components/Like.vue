<template>
    <div>
        <button type="button" class="btn btn-primary" @click="toggle" v-if="userId">
            <i class="bi bi-suit-heart-fill" v-if="isActive"></i>
            <i class="bi bi-suit-heart" v-if="!isActive"></i>
            <span class="badge badge-secondary">{{ updatedLikes }}</span>
        </button>
        <button type="button" class="btn btn-primary" disabled v-if="!userId">
            <i class="bi bi-suit-heart-fill"></i>
            <span class="badge badge-secondary">{{ updatedLikes }}</span>
        </button>
    </div>
</template>
  
<script>

export default {
    data: function () {
        return { isActive: null, updatedLikes: 0 }
    },
    props: ['recipeId', 'userId', 'likes'],
    methods: {
        liked() {
            if (this.userId) {
                axios.get(
                    '/api/recipe/' + this.recipeId + '/like/' + this.userId
                ).then((response) => {
                    this.isActive = response.data;
                })
            }
            this.updatedLikes = this.likes;
        },
        toggle() {

            axios.post(
                '/api/recipe/' + this.recipeId + '/like/' + this.userId
            ).then((response) => {
                this.isActive = !this.isActive;
                this.updatedLikes = this.isActive ? this.updatedLikes + 1 : this.updatedLikes - 1;
            })
        }
    },
    beforeMount: function () {
    },
    mounted: function () {
        this.liked();
    }
}
</script>