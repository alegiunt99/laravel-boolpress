<template>
  <div>
      <h1>
          BLOG COMPONENT
      </h1>

      <router-link :to="{ name: 'home' }">Torna alla home</router-link>
  </div>
</template>

<script>
	export default {
    		name: 'BlogComponent',
	}
</script>

<style lang="scss" scoped>
</style>