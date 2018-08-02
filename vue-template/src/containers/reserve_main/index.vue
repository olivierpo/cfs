<template>
  <div>
      <div class="tests1">
        <p>Please enter your name:</p>
        <input v-model="message" placeholder="Enter here">
        <span>Selected: {{message}}</span>
    </div>

    <div class="tests2">
      <select v-model="building">
          <option disabled value="">Please select one</option>
          <option>Carnegie</option>
          <option>Darrin</option>
          <option>J-Rowl</option>
      </select>
      <span>Selected: {{ building }}</span>
    </div>

    <div class="tests3">
        <datepicker :inline="true"></datepicker>
    </div>

       <!-- <select v-model="room">
          <option disabled value="">Please select one</option>
          <option>101</option>
          <option>102</option>
          <option>103</option>
      </select>
      <span>Selected: {{ room }}</span> -->

      <!-- <select v-model="time">
          <input v-model="hour" placeholder="Hour">
          <span>:</span>
          <input v-model="minute" placeholder="Minute">
      </select> -->

  </div>

</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
  name: 'test',
  components: {
      Datepicker,
  },

  data() {
      return {
          message: '',
          building: '',
          room: '',
          time: '',
          hour: '',
          minute: ''
      }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
