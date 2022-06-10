<template>
  <div>
      <h1>
          404 - Page not found
      </h1>

      <router-link :to="{ name: 'home' }">Torna alla home</router-link>
  </div>
</template>

<script>
	export default {
    		name: 'NotFoundComponent',
	}
</script>

<style lang="scss" scoped>
</style>