<template>
  <div class="autocomplete">
    <input type="text" v-model="search" @input="onChange" class="input-bar" />
    <ul v-show="isOpen" class="autocomplete-results">
      <li v-for="(result, i) in results" :key="i" @click="setResult(result)" class="autocomplete-result">
        {{ result }}
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    props: {
      rooms: {
        type: Array,
        required: false,
        default: () => [],
      },
    },
    data() {
      return {
        serach: '',
        results: [],
        isOpen: false,
      };
    },
    methods: {
      onChange() {
        this.isOpen = true;
        this.filterResults();
      },
      filterResults() {
        this.results = this.rooms.filter(item =>
          item.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
      },
      setResult(result) {
        this.search = result;
        this.isOpen = false;
      },
    },
  };
</script>

<style>
  .autocomplete-results {
    padding: 0;
    margin: 0;
    border: 1px solid #eeeeee;
    height: 120px;
    width: 160px;
    margin-left: 20px;
    overflow: auto;
  }
  .autocomplete-result {
    list-style: none;
    text-align: left;
    padding: 4px 2px;
    cursor: pointer;
  }
  .autocomplete-result:hover {
    background-color: #4AAE9B;
    color: white;
  }
  .input-bar {
    margin: 20px 20px;
  }
</style>
