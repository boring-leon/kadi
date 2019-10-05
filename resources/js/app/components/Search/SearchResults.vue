<template>
  <div class="card">
    <ul class="list-group list-group-flush">
      <IngredientItem v-for="ingredient in ingredients" :ingredient="ingredient" :key="ingredient.templateKey" />
    </ul>
  </div>
</template>

<script>
import IngredientItem from "../Ingredient/IngredientItem.vue";

export default {
  name: "SearchResultsList",
  components: { IngredientItem },
  props: {
    ingredients: {
      type: Array,
      required: true
    }
  }
};
</script>

