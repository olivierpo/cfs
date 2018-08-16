<template>
  <div>
    <div id="overlay"></div>
    <div class="container2 calendar">
      <div class="header">
        <div class="icon arr prev"></div>
        <div class="month">May 2014</div>
        <div class="icon arr next"></div>
      </div>
      <table>
        <tr>
          <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
        </tr>
        <tr>
          <td class="notCurMonth">29</td><td class="notCurMonth">30</td>
          <td>1</td><td>2</td><td class="curDay">3</td><td>4</td><td>5</td>
        </tr>
        <tr>
          <td>6</td><td class="holiday">7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
        </tr>
        <tr>
          <td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td>
        </tr>
        <tr>
          <td>20</td><td>21</td><td>22</td><td class="holiday">23</td><td>24</td><td>25</td><td>26</td>
        </tr>
        <tr>
          <td>27</td><td>28</td><td>29</td><td>30</td>
          <td class="notCurMonth">1</td><td class="notCurMonth">2</td class="notCurMonth"><td class="notCurMonth">3</td>
        </tr>
      </table>
      <button class="button-big" id="add_event">Add event</button>
    </div>


    <form class="container2 booking" name="booking" @submit.prevent="handeSearch">
      <div class="header">
        <div>
          <h2>Page Search</h2>
          <div class="icon"></div>
          <p>125, 15th street</p>
        </div>
      </div>

      <div class="dates">
        <label for="startTime">Start time</label>
        <div class="input-text">
          <select name="adults">
              <option value="1">1:00</option>
              <option value="2" selected="selected">2:00</option>
              <option value="3">3:00</option>
              <option value="4">4:00</option>
            </select>
        </div>

        <label for="endTime">End time</label>
        <div class="input-text">
          <select name="adults">
              <option value="1">1:00</option>
              <option value="2" selected="selected">2:00</option>
              <option value="3">3:00</option>
              <option value="4">4:00</option>
            </select>
        </div>

      </div>

      <ul class="persons">
        <li>
          <label>Facility</label>
          <div class="input-text">
            <search-bar class="input-group" :items="facilityList" :value="currentFacility" @input="changeCurrentFacility" />
          </div>
        </li>
        <li>
        </li>
      </ul>

      <button class="button-big" id="search"><div class="icon"></div>Search rooms</button>
    </form>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import SearchBar from '../../components/SearchBar';

const ONE_HOUR = 1000 * 3600;

export default {
  name: 'search-main',
  components: {
    SearchBar,
  },
  data() {
    return {
    };
  },
  computed: {
    scheduleData() {
      const facility = this.facilities[this.currentFacility];
      const x = {
        date: this.currentDate,
        startHour: 9,
        endHour: 12 + 9,
        timeIncrement: ONE_HOUR,
        ...(this.facilitySelected && { rows: facility.rooms }),
      };
      return x;
    },
    ...mapState({
      facilityList: 'facilityList',
      facilities: 'facilities',
      currentDate: 'currentDate',
      currentFacility: 'currentFacility',
    }),
    facilitySelected() {
      return this.facilities[this.currentFacility] !== undefined;
    },
  },
};
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;
  outline: none;
}
body {
  /*background-color: #d9d9d9;*/
  font-size: 14px;
  font-family: "Gotham Book", sans-serif;
}
a {
  text-decoration: none;
  color: #fb6362;
}
a:hover {
  color: #f98584;
}
li {
  list-style: none;
}
h2 {
  font-weight: normal;

}
/* for container2s */
.container2 {
  margin: 20px auto;
  background-color: #fff;
  overflow: hidden;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2), 0 2px 3px rgba(0,0,0,0.4);
}
.container2 .icon {
  background-image: url('https://res.cloudinary.com/dw369yzsh/image/upload/v1483213851/icons_wykol9.png');
  width: 27px;
  height: 30px;
}
.calendar th, .graph {
  font-family: "Gotham Medium", sans-serif;
  color: #666666;
}
/*buttons*/
.container2 button {
  text-transform: uppercase;
  border: none;
  background-color: #fb6362;
  color: #fff;
  margin: 0 auto;
  display: block;
  box-shadow: 0 3px 5px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.8);
  border-radius: 4px;
  font-size: 15px;
  font-family: "Gotham Book", sans-serif;
  cursor: pointer;
  -webkit-transition: background-color 0.2s;
     -moz-transition: background-color 0.2s;
    -ms-transition: background-color 0.2s;
     -o-transition: background-color 0.2s;
      transition: background-color 0.2s;
}
.container2 button:hover {
  background-color: #f98584;
}
.container2 button:active {
  background-color: #f98584;
  position: relative;
  top: 2px;
}
button.button-big {
  width: 296px;
  height: 58px;
}
/*inputs*/
.input-text {
  border-radius: 2px;
  background-color: #f4f4f4;
  box-shadow: inset 0px 1px 1px 0px rgba(0, 0, 0, 0.25);
  padding-left: 11px;
  position: relative;
  height: 46px;
  line-height: 46px;
}
.input-text .icon {
  position: absolute;
  right: 4px;
  top: 4px;
}
.input-text input, .input-text textarea, .div-file label {
  border: none;
  background-color: transparent;
  font-family: "Gotham Light", sans-serif;
  color:#999999;
}
/*placeholders hell*/
.container2 .input-text input::-webkit-input-placeholder, .container2 .input-text textarea::-webkit-input-placeholder {
  color:#999999;
  font-family: "Gotham Light", sans-serif;
  font-size: 14px;
}
.container2 .input-text input::-moz-placeholder, .container2 .input-text textarea::-moz-placeholder {
  color:#999999;
  font-family: "Gotham Light", sans-serif;
  font-size: 14px;
}
.container2 .input-text input:-moz-placeholder, .container2 .input-text textarea:-moz-placeholder {
  color:#999999;
  font-family: "Gotham Light", sans-serif;
  font-size: 14px;
}
.container2 .input-text input:-ms-input-placeholder, .container2 .input-text textarea:-ms-input-placeholder {
  color:#999999;
  font-family: "Gotham Light", sans-serif;
  font-size: 14px;
}


#overlay {
  z-index:3; /* пoдлoжкa дoлжнa быть выше слoев элементoв сaйтa, нo ниже слoя мoдaльнoгo oкнa */
  position:fixed; /* всегдa перекрывaет весь сaйт */
  background-color:#000; /* чернaя */
  opacity:0.8; /* нo немнoгo прoзрaчнa */
  width:100%;
  height:100%; /* рaзмерoм вo весь экрaн */
  top:0; /* сверху и слевa 0, oбязaтельные свoйствa! */
  left:0;
  display: none;
}


/***** Calendar *****/

.calendar {
  width: 346px;
  height: 426px;
  position: fixed;
  top: 50%; /* oтступaем сверху 45%, oстaльные 5% пoдвинет скрипт */
  left: 50%; /* пoлoвинa экрaнa слевa */
  margin-top: -213px;
  margin-left: -173px;
  z-index: 5;
  display: none;
}
.calendar .header {
  background-color: #404a58;
  color: #fff;
  font-size: 17px;
  height: 64px;
  line-height: 64px;
  text-align: center;
  position: relative;
}
.calendar .arr {
  position: absolute;
  width: 13px;
  height: 30px;
  cursor: pointer;
  top: 25px;
}
.calendar .prev {
  left: 38px;
}
.calendar .next {
  background-position: 0 -30px;
  right: 38px;

}
/*table*/
.calendar table {
  width: 287px;
  height: 248px;
  margin: 11px auto 20px auto;
  text-align: center;
  vertical-align: middle;
  color: #666666;
}
.calendar tr, td {
  width: 41px;
}
.calendar td:not(.notCurMonth) {
  cursor: pointer;
  -webkit-transition: background-color 0.2s;
     -moz-transition: background-color 0.2s;
    -ms-transition: background-color 0.2s;
     -o-transition: background-color 0.2s;
      transition: background-color 0.2s;
}
.calendar td:not(.notCurMonth):not(.curDay):hover {
  background-color: #f4f4f4;
  border-radius: 19px;
}
.calendar .holiday {
  font-weight: bold;
  color: #fb6362;
}
.calendar .curDay {
  font-weight: bold;
  color: #fff;
  background-color: #fb6362;
  border-radius: 19px;
}
.calendar .notCurMonth {
  color: #c5c5c5;
}



/***** Booking form *****/

.booking {
  width: 800px;
  height: 636px;
}
.is-sent{
  animation: launch 1s ease-in-out forwards
}
@keyframes launch {
  0% {
            transform: translateY(0);
  }
  10%, 15% {
            transform: translateY(20px);
  }
  100% {
            transform: translateY(-700px);
  }

}
.booking .header {
  width: 100%;
  height: 185px;
  background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/RPIQuad.jpg/700px-RPIQuad.jpg');
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  position: relative;
  color: #fff;
  text-align: center;
}
.booking .header div {
  border-radius: 4px;
  border-color: black;
  position: absolute;
  left: 320px;
  top: 30px;
}
.booking .header h2 {
  font-size: 25px;
}
.booking .header p {
  font-family: "Gotham Light", sans-serif;
  margin: 4px 0 0 21px;
}
.booking .header .icon {
  background-position: 0 -60px;
  position: absolute;
  left: 4px;
  top: 33px;

}
/*inputs*/
.booking .dates, .booking .persons {
  width: 296px;
  margin: 26px auto 0 auto;
}
.booking label:not(.checkbox) {
  display: block;
}
.booking .dates .input-text {
  margin-top: 10px;
}
.booking .dates .input-text:nth-child(2) {
  margin-bottom: 20px;
}
.booking .input-text .icon {
  width: 36px;
  height: 36px;
  background-color: #404a58;
  border-radius: 2px;
  background-position: 10px -80px;
  cursor: pointer;
}
/*checkbox*/
.div-chck {
  position: relative;
  margin-top: 16px;
}
.div-chck input, .div-chck .icon.input-text  {
  top: -2px;
  left: 0;
  position: absolute;
  width: 23px;
  height: 23px;
}
.div-chck input {
  opacity: 0;
  z-index: 1;
}
.div-chck .icon.input-text {
  background-position: -30px -415px;
  background-repeat: no-repeat;
  padding: 0;
  margin: 0;
}
.div-chck input:checked+.icon {
  background-position: 4px -415px;
}
.div-chck label{
  margin-left: 34px;
}
/*selects*/
.booking .persons li {
  display: inline-block;
  font-size: 0;
  width: 45%;
}
.booking .persons li:last-child {
  padding-left: 20px;
}
.booking .persons label {
  font-size: 14px;
}
.booking .persons .input-text {
  width: 138px;
  height: 45px;
  padding: 0;
  margin-top: 9px;
}
.booking .persons select {
  font-size: 14px;
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  font-size: 16px;
  color: #404a58;
  padding-left: 9px;
  position: relative;
  z-index: 1;
  -webkit-appearance: none;
     -moz-appearance: none;
    -ms-appearance: none;
     -o-appearance: none;
      appearance: none;
}
.booking .persons option {
  background-color: #f4f4f4;
}
.booking .persons option:hover {
  background-color: red;
}
.booking .persons .icon {
  background-position: 15px -106px;
}

/*button*/
.booking .button-big {
  position: relative;
  padding-left: 20px;
  margin-top: 40px;
}
.booking .button-big .icon {
  background-position: 0 -150px;
  position: absolute;
  left: 59px;
}

</style>
