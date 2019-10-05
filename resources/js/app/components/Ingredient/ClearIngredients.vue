<template>
  <button class="btn btn-lg btn-block btn-danger" style="margin-top:30px;" 
  @click="$store.commit('Plate/removeAll')">
    Usuń wszystkie dodane
  </button>
</template>

<script>
export default {
  name: "ClearIngredients"
};
</script>