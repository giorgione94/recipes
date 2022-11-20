<template>
    <div>
        <div v-for="(comment, index) in comments" :key="index">
            <list-view-vue 
            :comment="comment" 
            class="comment" 
            v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
import ListCommentVue from './ListComment.vue'
export default {
    props: ['comments'],
    components: {
        ListCommentVue
    }
}
</script>