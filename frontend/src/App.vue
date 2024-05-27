<template>
  <div id="app">
    <TheHeader/>
    <main id="main">
      <Transition mode="out-in">
        <router-view/>
      </Transition>
    </main>
    <TheFooter/>
  </div>
</template>

<script>
import TheHeader from './components/TheHeader.vue';
import TheFooter from './components/TheFooter.vue';


export default {
  components: {
    TheHeader,
    TheFooter
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
body{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
</style>
