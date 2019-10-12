<template>
  <form @submit="$event.preventDefault()">
    <div class="row">
      <div class="col-12 col-md-4 mb-2">
        <input
          type="text"
          class="form-control"
          id="food"
          aria-describedby="food"
          placeholder="Nazwa"
          @keyup="$emit('update:ingredientName', $event.target.value.trim())"
        />
      </div>
      <div class="col-6 col-md-4">
        <select :id="typeSelectID" class="form-control" @change="$emit('update:ingredientType', $event.target.value)">
          <option selected value="*">rodzaj</option>
          <option v-for="option in options" :key="option.id">{{ option.name }}</option>
        </select>
      </div>
      <div class="col-6 col-md-4">
        <select class="form-control" @change="loadPlate($event.target.value)">
          <option selected value>mój posiłek</option>
          <option v-for="meal in customMeals" :key="meal.templateKey" :value="meal.id"
          >{{ meal.name }}</option>
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
      default: () => baseState.ingredient_types
    },
    typeSelectID:{
      default: 'ingredient_types_select'
    }
  },
  methods: {
    loadPlate(plateId) {
      if(Number(plateId) > 0){
        const plate = this.$store.getters["CustomMeal/find"](plateId);
        plate.ingredients.forEach(i => this.pushOnGeneralPlate(i));
      }
      else {
        this.$store.commit("Plate/removeAll");
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
  watch:{
    ingredientType(v){
      const isWildcard = v == '*';
      if(isWildcard){
        $('#' + this.typeSelectID).prop('selectedIndex', 0);
      }
    }
  },
  computed: {
    customMeals() {
      return this.$store.state.CustomMeal.meals;
    }
  }
};
</script>

