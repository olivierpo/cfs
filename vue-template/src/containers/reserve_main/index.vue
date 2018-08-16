<template>
  <div>
      <!-- commented out spans are mostly to test for outputs  -->
      <div class="enterText">
        <p>Please enter your name:
        <input v-model="messageName" placeholder="Required"></p>
        <!-- <span>Selected: {{messageName}}</span> -->
    </div>

    <div class="enterText">
        <p>Name of event:
        <input v-model="messageEvent" placeholder="Required"></p>
        <!-- <span>Selected: {{messageEvent}}</span> -->
    </div>

    <div class="enterText">
        <p>Name of organizer:
        <input v-model="messageOrginizer" placeholder="Required"></p>
        <!-- <span>Selected: {{messageOrginizer}}</span> -->
    </div>

    <div class="enterText">
        <p>Number of people:
        <input v-model="messageNum" placeholder="Required"></p>
        <!-- <span>Selected: {{messageNum}}</span> -->
    </div>

    <div class="enterText">
        <p>Extra details:
        <input v-model="messageOption" placeholder="Optional"></p>
        <!-- <span>Selected: {{messageOption}}</span> -->
    </div>


    <div class="checkBuildings">
      <select v-model="building">
          <option disabled value="">Please select building</option>
          <option>Carnegie</option>
          <option>Darrin</option>
          <option>J-Rowl</option>
      </select>
      <!-- <span>Selected: {{ building }}</span> -->
    </div>

    <div class="tests3" style="position:absolute; right:500px; top:70px;">
        <datepicker :inline="true"></datepicker>
    </div>

    <div class="checkRooms">
    <span v-if="seen">
       <select v-model="room">
          <option disabled value="">Please select room</option>
          <option>101</option>
          <option>102</option>
          <option>103</option>
      </select>
    </span>
      <!-- <span>Selected: {{ room }}</span> -->
  </div>

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
      messageName: '',
      messageEvent: '',
      messageOrginizer: '',
      messageNum: '',
      messageOption: '',
      building: '',
      room: '',
      time: '',
      hour: '',
      minute: '',
      seen: true,
    };
  },
};
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
