<template>
  <div class="header-nav">
    <div class="link-h">
        <router-link :to="{ name: 'home' }">Home</router-link>
    </div>

    <div class="link-h">
        <router-link :to="{ name: 'blog' }">Blog</router-link>
    </div>
      
  </div>
</template>

<script>
	export default {
    		name: 'HeaderComponent',
	}
</script>

<style lang="scss" scoped>
.header-nav{
    display: flex;
    column-gap: 10px;
    padding: 15px;
    background-color: lightgray;
}
</style>