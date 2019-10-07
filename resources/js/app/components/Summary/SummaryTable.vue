<template>
<section>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">nazwa</th>
        <th scope="col">waga</th>
        <th scope="col">WW</th>
        <th scope="col">kcal</th>
        <th scope="col">IG</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="ingredient in ingredients" :key="ingredient.templateKey">
        <td>{{ingredient.name }}</td>
        <td>{{ ingredient.weight | round() }}g</td>
        <td>{{ ingredient.exchanger | round()}}</td>
        <td>{{ ingredient.kcal | round() }}</td>
        <td :style="{color: getTdColor(ingredient) }"><b>{{ ingredient.glycemic_index || "-" }}</b></td>
      </tr>
      <tr>
        <td>-</td>
        <td>-</td>
        <td>
          <b>{{ totalExchangers | round() }}</b>
        </td>
        <td>
          <b>{{ totalKcal | round() }}</b>
        </td>
        <td>-</td>
      </tr>
    </tbody>
  </table>
  <GlycemicAlert v-if='highlyGlycemicIngredients.length >0' 
    :highlyGlycemicIngredients='highlyGlycemicIngredients' 
  />
</section>
</template>

<script>
import GlycemicAlert from './GlycemicAlert.vue';
export default {
  name: "SummaryTable",
  components: { GlycemicAlert },
  props: {
    ingredients: {
      type: Array,
      required: true
    },
    totalExchangers: {
      type: Number,
      required: true
    },
    totalKcal: {
      type: Number,
      required: true
    },
    colors: {
      required: false,
      default: () => ['green', 'orange', 'red']
    }
  },
  methods: {
    getTdColor(i) {
      return i.glycemic_index == null ? null : this.color(i.glycemic_index)
    },
    color(index) {
      if (index <= 55) {
        return this.colors[0];
      } 
      else if (index > 55 && index <= 69) {
        return this.colors[1];
      } 
      return this.colors[2];
    }
  },
  computed:{
    highlyGlycemicIngredients(){
      return this.$store.state.Plate.ingredients.filter(i => i.glycemic_index > 69);
    }
  }
};
</script>

