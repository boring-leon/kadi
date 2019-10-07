<template>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">nazwa</th>
        <th scope="col">waga</th>
        <th scope="col">WW</th>
        <th scope="col">kcal</th>
        <th scope="col">IG</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(ingredient, index) in ingredients" :key="ingredient.templateKey">
        <td>{{ index + 1 }}</td>
        <td>{{ingredient.name }}</td>
        <td>{{ ingredient.weight | round() }}g</td>
        <td>{{ ingredient.exchanger | round()}}</td>
        <td>{{ ingredient.kcal | round() }}</td>
        <td :style="{color: getTdColor(ingredient) }">{{ ingredient.glycemic_index || "-" }}</td>
      </tr>
      <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>
          <b>{{ totalExchangers | round() }}</b>
        </td>
        <td>
          <b>{{ totalKcal | round() }}</b>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "SummaryTable",
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
    }
  }
};
</script>

