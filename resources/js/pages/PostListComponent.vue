<template>
  <div>
        <div v-for="(post, index) in posts" :key="index">
            <CardComponent :post="post"/>
        </div>
  </div>
</template>

<script>
    import CardComponent from './CardComponent'

	export default {
    		name: 'PostListComponent',

            /*data(){

                return {
                    posts: this.posts,
                }
            
    },*/

    components: {
                CardComponent
            },

            props: {
                posts: Array,
            }
	}
</script>

<style lang="scss" scoped>
</style>