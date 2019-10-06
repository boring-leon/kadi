<template>
  <article class="text-center">
    <HeaderCenter>Twoje posiłki</HeaderCenter>
    <p class="lead" v-if="customMeals.length > 0">
      Aby usunąć posiłek, naciśnij na przycisk
      <b>dwukrotnie</b>
    </p>
    <div class="card" v-if="customMeals.length > 0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="meal in customMeals" :key="meal.templateKey">
          {{ meal.name }}
          <button class="btn btn-danger float-right" @dblclick="remove(meal)">usuń</button>
        </li>
      </ul>
    </div>
    <template v-else>
      <hr>
      <p class="lead">Nie masz jeszcze żadnych posiłków. Aby jakiś dodać, zapisz go w kroku trzecim</p>
    </template>
  </article>
</template>

<script>
export default {
  name: "UserMeals",
  methods: {
    remove(meal) {
      this.$store.dispatch("CustomMeal/removeMeal", { meal: meal });
      this.makeInfo(`<b>${meal.name}</b> - usunięto z posiłków`);
    }
  },
  computed: {
    customMeals() {
      return this.$store.state.CustomMeal.meals;
    }
  }
};
</script>