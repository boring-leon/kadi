<template>
  <article class="text-center">
    <HeaderCenter>Twoje składniki</HeaderCenter>

    <p class="lead" v-if="customIngredients.length > 0">
      Aby usunąć składnik, naciśnij na przycisk
      <b>dwukrotnie</b>
    </p>
    <div class="card" v-if="customIngredients.length > 0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="ingredient in customIngredients" :key="ingredient.templateKey">
          {{ ingredient.name }}
          <button class="btn btn-danger float-right" @dblclick="remove(ingredient)">usuń</button>
          <button
            class="btn btn-info float-right"
            style="margin-right:10px;"
            @click="edit(ingredient)"
          >edytuj</button>
          <EditIngredient :id="`edit-custom-ingredient-${ingredient.templateKey}`" :ingredient="ingredient" />
        </li>
      </ul>
    </div>
    <template v-else>
      <hr >
      <p class="lead">
        Nie masz jeszcze żadnych składników. Aby jakiś dodać, wyszukaj jego nazwę w
        <router-link :to="{name: 'StepOne'}">kroku pierwszym</router-link>
      </p>
    </template>
  </article>
</template>

<script>
import EditIngredient from "../components/Ingredient/Controllers/Edit.vue";
export default {
  name: "IngredientsView",
  components: { EditIngredient },
  methods: {
    edit(ingredient) {
      this.$emit("requestedEdit");
      $(`#edit-custom-ingredient-${ingredient.templateKey}`).modal("toggle");
    },
    remove(ingredient) {
      this.$store.dispatch("CustomIngredient/deleteIngredient", {ingredient: ingredient });
      this.makeInfo(`Usunięto <b> ${ingredient.name} </b>`);
    }
  },
  computed: {
    customIngredients() {
      return this.$store.getters["getCustom"];
    }
  }
};
</script>