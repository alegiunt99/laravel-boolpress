<template>
<div>
  <!-- Header con i links -->
  <HeaderComponent />

  <!-- contenuto che varia -->
  <router-view></router-view>

</div>
  
</template>

<script>
import HeaderComponent from '../components/HeaderComponent'

export default {
    name: 'App',

    components: {
    
      HeaderComponent
        
    }
}
</script>

<style>

</style>