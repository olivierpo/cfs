<template>
  <div id="emptypage">
    
  </div>
</template>

<script>
export default {
  name: 'menu',
  data() {
    return {
      essentialLinks: [
        {
          label: 'Docssss',
          link: 'https://onsen.io/v2/docs/guide/vue/',
          icon: 'fa-book',
        },
        {
          label: 'Gitter Chat',
          link: 'https://gitter.im/OnsenUI/OnsenUI',
          icon: 'fa-commenting',
        },
        {
          label: 'Forum',
          link: 'https://community.onsen.io',
          icon: 'ion-chatboxes',
        },
        {
          label: 'Twitter',
          link: 'https://twitter.com/Onsen_UI',
          icon: 'fa-twitter',
        },
        {
          label: 'Playground',
          link: 'https://tutorial.onsen.io/',
          icon: 'fa-graduation-cap',
        },
      ],
    };
  },
  methods: {
    goTo(url) {
      window.open(url, '_blank');
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#emptypage{
  min-height: 800px;
}
.header {
  text-align: center;
  margin-bottom: 20px;
}

img {
  max-width: 150px;
}

ons-list-title {
  text-transform: none;
}

ons-list-item {
  cursor: pointer;
}
</style>
