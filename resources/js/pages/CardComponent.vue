<template>
  <div class="intro-post">
    <!-- foto -->
    <div class="intro-img">
        <img :src="post.cover">
    </div>
    
    <!-- titolo -->
    <h4>{{ post.title }}</h4>
  </div>

</template>

<script>
    
export default {
    name: 'CardComponent',

    props: {
        post: Object
    }
}
</script>

<style lang="scss" scoped>
    .intro-post{
        display: flex;
        align-items: center;
        .intro-img{
            width: 15%;
            img{
                width: 100%;
            }
        }
    }
</style>