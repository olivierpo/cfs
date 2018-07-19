<template>
<!-- <b-navbar toggleable="md" type="dark" variant="dark" fixed="top"> -->
  <v-ons-toolbar class="navbar">
      <div class="left">
        <v-ons-toolbar-button @click="$store.commit('splitter/toggle')">
          <v-ons-icon class="menu-icon" icon="ion-navicon, material:md-menu"></v-ons-icon>
        </v-ons-toolbar-button>
      </div>
    
    <div class="center">WOOOOOOO!</div>
    <div class="right">
    <v-ons-toolbar-button @click="$store.commit('splitter/toggle')">
          <v-ons-icon class="menu-icon" icon="ion-navicon, material:md-menu"></v-ons-icon>
        </v-ons-toolbar-button></div>
      </v-ons-toolbar>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style>
.center{
  color: #fff;
}
.navbar{
  height: 48px;
  background-color: #ef3e29;
  background-image: linear-gradient(to right,#ef2929,#f05429);
}
.menu-icon{
  color:white;
}

</style>
