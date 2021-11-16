<template>
  <button>
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "Button",
};
</script>

<style scoped>
button {
  margin-top: 25px;
  padding: 12px;
  border: 0px;
  box-shadow: rgb(0 0 0 / 25%) 0px 7px 14px, rgb(0 0 0 / 22%) 0px 9px 10px;
  background-color: #2fbece;
}

button:hover {
  background-color: #1c717a;
  cursor: pointer;
}
</style>
