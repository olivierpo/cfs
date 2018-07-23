<template>
  <div>
    <input type="text" v-model="search" class="form-control" @input="showResults = true" @focus="showResults = true" />
    <ul v-show="showResults" class="list-group autocomplete">
      <li v-for="(result, i) in results" :key="i" @click="setResult(result)" class="list-group-item">
        {{ result }}
      </li>
    </ul>
  </div>
</template>
<script>
  export default {
    props: {
      buildings: {
        type: Array,
        required: false,
        default: () => [],
      },
    },
    data() {
      return {
        search: '',
        showResults: false,
      };
    },
    computed: {
      results() {
        return this.buildings.filter(item =>
          item.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
      },
    },
    methods: {
      setResult(result) {
        this.search = result;
        this.showResults = false;
      },
    },
  };
</script>

<style scoped>
.autocomplete {
  position: fixed;
  z-index: 999;
  width: auto;
}
</style>
