<template>
  <div v-bind:class="['card', { center: center }]">
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    center: Boolean,
  },
};
</script>

<style scoped>
div.card {
  width: 512px;
  font-size: 11pt;
  max-width: 100%;
  background-color: #dfeeea;
  margin-top: 24px;
  font-weight: 200;
  font-family: "Fira Sans", sans-serif;
  box-sizing: border-box;
  padding: 20px;
  box-shadow: rgb(0 0 0 / 25%) 0px 14px 28px, rgb(0 0 0 / 22%) 0px 10px 10px;
}

div.card.center {
  text-align: center;
}
</style>
