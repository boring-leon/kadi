<template>
  <article class="text-center">
    <HeaderCenter>Twoje posiłki</HeaderCenter>
    <p class="lead" v-if="plates.length > 0">
      Aby usunąć posiłek, naciśnij na przycisk
      <b>dwukrotnie</b>
    </p>
    <div class="card" v-if="plates.length > 0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="plate in plates" :key="plate.templateKey">
          {{ plate.name }}
          <button class="btn btn-danger float-right" @dblclick="remove(plate)">usuń</button>
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
  name: "UserPlates",
  methods: {
    remove(plate) {
      this.$store.dispatch("CustomPlate/removePlate", { plate: plate });
      this.makeInfo(`<b>${plate.name}</b> - usunięto z posiłków`);
    }
  },
  computed: {
    plates() {
      return this.$store.state.CustomPlate.plates;
    }
  }
};
</script>