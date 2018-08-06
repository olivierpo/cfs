<template>
  <div>
      <h1>output anything?</h1>
      <test/>
  </div>
</template>

<script>
import test from './containers/test.vue'

export default {
  name: 'app',
  components: {
    test,
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
