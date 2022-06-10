<template>
  <div>
        <h1>
            BLOG
        </h1>

        <PostListComponent :posts="posts" />
        
      <router-link :to="{ name: 'home' }">Torna alla home</router-link>
  </div>
</template>

<script>
import PostListComponent from './PostListComponent';
    
	export default {
    		name: 'BlogComponent',

            data(){

                return {
                    posts: [],
                }
            
    },
            
    components: {
                PostListComponent
            },

            mounted(){

                axios.get('http://127.0.0.1:8000/api/posts').then((results) => {
                    console.log(results);

                    this.posts = results.data;

                    console.log('nuovo array: ', this.posts)
                }).catch(e=>{
                    console.log(e);
                });

            }
	}
</script>

<style lang="scss" scoped>
</style>