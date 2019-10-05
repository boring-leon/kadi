<template>
  <form @submit="$event.preventDefault()">
    <div class="row">
      <div class="col s6">
        <input
          type="text"
          class="form-control"
          id="food"
          aria-describedby="food"
          placeholder="Nazwa"
          @keyup="$emit('update:ingredientName', $event.target.value.trim())"
        />
      </div>
      <div class="col s3">
        <select class="form-control" @change="$emit('update:ingredientType', $event.target.value)">
          <option selected value="*">wszystkie rodzaje</option>
          <option v-for="option in options" :key="option.id">{{ option.name }}</option>
        </select>
      </div>
      <div class="col s3" v-if="customPlates.length > 0">
        <select class="form-control" @change="loadPlate($event.target.value)">
          <option selected value>wybierz posiłek</option>
          <option
            v-for="plate in customPlates"
            :key="plate.templateKey"
            :value="plate.id"
          >{{ plate.name }}</option>
        </select>
      </div>
    </div>
  </form>
</template>

<script>
import { cloneDeep } from 'lodash';

export default {
  name: "SearchBox",
  props: {
    ingredientName: {
      type: String,
      required: true
    },
    ingredientType: {
      type: String,
      required: true
    },
    options: {
      default: () => baseState.meal_types
    }
  },
  methods: {
    loadPlate(plateId) {
      if(Number(plateId) > 0){
        const plate = this.$store.getters["CustomPlate/find"](plateId);
        plate.ingredients.forEach(i => this.pushOnGeneralPlate(i));
      }
    },

    pushOnGeneralPlate(ingredient){
      if(!this.isAlreadyOnPlate(ingredient)){
        this.$store.commit("Plate/addIngredient", this.getIngredientForCommit(ingredient));
      }
    },

    getIngredientForCommit(plateIngredient){
      return {
        ...cloneDeep(plateIngredient),
        templateKey: this.$store.getters["findById"](plateIngredient.id).templateKey
      };
    },

    isAlreadyOnPlate(ingredient){
      return this.$store.getters["Plate/findById"](ingredient.id)
    }
  },
  computed: {
    customPlates() {
      return this.$store.state.CustomPlate.plates;
    }
  }
};
</script>

