<template>
  <article>
    <component :is="activeComponent" style="margin-top:14px;"></component>
    <footer class='absolute-bottom btn-block-container' v-if="step < 2">
      
      <template v-if='step == 0'>
        <DisplayPlateIngredients v-if='shouldShowSelected' :displaySelected.sync="displaySelectedIngredients" />
        <ClearIngredients v-else-if='shouldShowClearIngredientsBtn' />
      </template>
      
      <StepButton :step="step"  />
      <div style='min-height:3px;'></div>
    </footer>
  </article>
</template>

<script>
import StepOne from "../fragments/StepOne/StepOne.vue";
import StepTwo from "../fragments/StepTwo.vue";
import StepThree from "../fragments/StepThree.vue";
import StepButton from "../components/UI/StepButton.vue";
import DisplayPlateIngredients from '../components/Ingredient/DisplayPlateIngredients.vue';
import ClearIngredients from '../components/Ingredient/ClearIngredients.vue';

export default {
  name: "DynamicStepView",
  components: { StepOne, StepTwo, StepButton, StepThree, DisplayPlateIngredients, ClearIngredients },
  props: {
    activeComponent: {
      type: String,
      default: "StepOne"
    },
    step: {
      type: Number
    }
  },
  data(){
    return{
      displaySelectedIngredients: false
    }
  },
  updated() {
    if(this.step == 0){
      this.syncAbsoluteBottom(this.syncExtraTop);
    }
  },
  beforeRouteEnter(to, from, next) {
    next(vm => {
      if (vm.$store.state.Plate.ingredients.length == 0 && vm.step > 0) {
        vm.$router.push({ name: "StepOne" });
      }
    });
  },
  computed:{
    plateIngredients(){
      return this.$store.state.Plate.ingredients;
    },
    shouldShowSelected(){
      return !this.displaySelectedIngredients && this.plateIngredients.length > 0;
    },
    shouldShowClearIngredientsBtn(){
      return this.displaySelectedIngredients && this.plateIngredients.length > 0;
    },
    syncExtraTop(){
      return 50;
    }
  }
};
</script>

<style>
h1 {
  margin-bottom: 50px;
}
</style>

