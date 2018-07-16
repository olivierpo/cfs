<template>
  <div id="app">
    <!-- This needs to change -->
    <autocomplete :rooms="['DCC', 'Amos Eaton', 'West Hall', 'Union', ]" ></autocomplete>
  </div>
</template>

<script>
  import AutoComplete from './components/AutoComplete';

  export default {
    name: 'app',
    components: {
      autocomplete: AutoComplete,
    },
  };

</script>
