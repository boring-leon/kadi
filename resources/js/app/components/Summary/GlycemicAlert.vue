<template>
  <p style="color:red; font-size: 1.1rem;">
    Wykryto
    <template v-if="highlyGlycemicIngredients.length == 1">
      1 składnik  - {{highlyGlycemicIngredients[0].name }}
    </template>
    
    <template v-else-if="highlyGlycemicIngredients.length >=2 && highlyGlycemicIngredients.length <5">
      {{ highlyGlycemicIngredients.length }} składniki
    </template>

    <template v-else>
      {{ highlyGlycemicIngredients.length }} składników
    </template>
    
    o <b>wysokim indeksie glikemicznym</b>
  </p>
</template>

<script>
export default {
  name: "GlycemicAlert",
  props: {
    highlyGlycemicIngredients: {
      type: Array,
      required: true
    }
  }
};
</script>