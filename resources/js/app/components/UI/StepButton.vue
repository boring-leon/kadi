<template>
  <button type="button" class="btn btn-success btn-lg btn-block" @click="redirect"
    :disabled="isDisabled" >Krok {{ step +2 }}
  </button>
</template>

<script>
export default {
  name: "StepButton",
  props: {
    step: {
      type: Number,
      required: true
    }
  },
  methods: {
    redirect() {
      const routes = ["Two", "Three"];
      this.$router.push({ name: "Step" + routes[this.step] });
    }
  },

  computed: {
    isDisabled() {
      return this.plateIsNotEmpty == false || (this.allIngredientsHaveWeight == false && this.step > 0)
    },
    plateIsNotEmpty(){
      return this.plateIngredients.length > 0;
    },
    allIngredientsHaveWeight(){
      return this.plateIsNotEmpty 
      ? this.plateIngredients.every(m => m.hasOwnProperty('weight'))
      : false;
    },
    plateIngredients(){
      return this.$store.state.Plate.ingredients;
    }
  }
};
</script>

