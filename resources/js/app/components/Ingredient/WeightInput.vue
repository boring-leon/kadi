<template>
  <div>
    <form>
      <p class='lead' :style="{marginBottom: '10px', color: ingredientColor}">
        <b>{{ ingredient.name }} </b>-
        <template v-if='ingredient.weight > 0'>{{ ingredient.weight }}g</template>
        <template v-else> wybierz wagę </template>
      </p>
      <div class="form-group">
        <input
          type="number"
          class="form-control"
          :placeholder="portionPlaceholder"
          @keyup="handleKeyup($event, 'portions')"
          @change="handleKeyup($event, 'portions')"
          step='0.1'
        />
      </div>
      <div class="form-group">
        <input
          type="number"
          class="form-control"
          placeholder="ilość gramów"
          @keyup="handleKeyup($event, 'weight')"
          @change="handleKeyup($event, 'weight')"
          :value="weight || ''"
        />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "WeightInput",
  props: {
    ingredient: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      weight: 0,
      portions: 0
    };
  },
  methods: {
    handleKeyup(e, index) {
      const number = Number.parseFloat(e.target.value.trim().replace(/\s/g, ""));
      if (!Number.isNaN(number) && number > 0) {
        this.$set(this, index, number);
      }
    }
  },

  watch: {
    weight(n) {
      this.$store.commit("Plate/setProps", {
        ingredient: this.ingredient,
        data: { weight: Math.round(n * 10) /10 }
      });
    },
    portions(n) {
      this.weight = this.ingredient.portion.weight * n;
    }
  },
  computed: {
    portionPlaceholder() {
      return `ilość porcji (${this.ingredient.portion.name} = ${this.ingredient.portion.weight}g)`;
    },
    ingredientColor(){
      return this.ingredient.weight > 0 ? "green" : "red";
    }
  }
};
</script>

