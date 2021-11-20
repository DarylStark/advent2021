<template>
  <div id="center">
    <Card v-if="days_left > 0" center>
      Over {{ days_left }} dagen zal de december kalender beginnen
    </Card>
    <Card v-if="days_left <= 0" center>
      <p>Het is vandaag</p>
      <p class="monthday">{{ monthday }}</p>
      <p>december</p>
      <Button v-on:click="get_beer()" v-bind:disabled="loading"
        >Laat met het bier van de dag zien!</Button
      >
    </Card>
    <Card center v-if="beer_loaded">
      <p><b>Cheers!</b></p>
      <Button style="background-color: #ffc000" v-on:click="open_untappd()"
        >Check je bier in op Untappd</Button
      >
    </Card>
    <Card center>
      <p><b>Gezelligheid</b></p>
      <Button style="margin-right: 10px" v-on:click="rest('white')">Wit</Button>
      <Button style="margin-right: 10px" v-on:click="rest('red')">Rood</Button>
      <Button style="margin-right: 10px" v-on:click="rest('green')"
        >Groen</Button
      >
      <Button style="margin-right: 10px" v-on:click="rest('blue')"
        >Blauw</Button
      >
      <Button v-on:click="rest('yellow')">Geel</Button>
    </Card>
    <Card v-if="days_left < -1" center>
      <b>Vorige dagen</b>
      <div class="history">
        <div class="day"></div>
        <div class="day"></div>
        <div
          v-for="day in days"
          :key="day"
          class="day"
          v-on:click="get_beer(day)"
        >
          {{ day }}
        </div>
      </div>
    </Card>
  </div>
</template>

<script>
import Card from "./components/Card.vue";
import Button from "./components/Button.vue";
import axios from "axios";

export default {
  name: "App",
  data: function () {
    return {
      loading: false,
      beer_loaded: false,
      beer: undefined,
      link: undefined,
    };
  },
  components: {
    Card,
    Button,
  },
  methods: {
    open_untappd: function () {
      if (this.link) {
        window.open(this.link, "_blank").focus();
      }
    },
    rest: function (color) {
      axios.get("/rest/" + color);
    },
    get_beer: function (beer = null) {
      this.loading = true;

      // Local this
      let vt = this;

      axios
        .get("http://dstark.nl/advent2021/get.php", {
          params: {
            day: beer,
          },
        })
        .then(function (res) {
          // TODO: Set beer details
          vt.beer = res.data.beer;
          vt.link = res.data.link;

          // Make sure the correct light lights up
          axios.get("/led/" + (vt.beer - 1));

          // Set 'loaded' to true
          vt.beer_loaded = true;
        })
        .catch(function () {
          alert("Er ging iets fout!!");
        })
        .then(function () {
          // Done!
          vt.loading = false;
        });
    },
  },
  computed: {
    days_left: function () {
      const date = new Date();
      const start_date = new Date("11/01/2021");
      let diff = Math.floor(
        (start_date.getTime() - date.getTime()) / (1000 * 3600 * 24)
      );
      return diff;
    },
    monthday: function () {
      const date = new Date();
      return date.getDate();
    },
    days: function () {
      let day_numbers = new Array();
      for (let i = 1; i < this.monthday; i++) {
        day_numbers[i - 1] = i;
      }
      return day_numbers;
    },
  },
};
</script>

<style>
body {
  background-color: #2f5d62;
}

div#center {
  display: flex;
  flex-direction: column;
  align-items: center;
}

p {
  margin: 0px;
}

p.monthday {
  margin: 20px 0 20px 0;
  font-size: 32px;
  font-weight: bold;
}

div.history {
  display: flex;
  flex-wrap: wrap;
  margin-top: 24px;
}

div.day {
  display: inline-block;
  width: 14%;
  padding-top: 20px;
  padding-bottom: 20px;
  flex-grow: 0;
}

div.day:hover {
  background-color: #2fbece;
  cursor: pointer;
}
</style>
