<template>
  <article>
    <HeaderCenter>Krok 2 - wybierz ilość</HeaderCenter>
    <section>
      <div class="text-center">
        <WeightInput v-for="ingredient in ingredients" :key="ingredient.templateKey" :ingredient="ingredient" />
      </div>
    </section>
  </article>
</template>

<script>
import { mapState } from "vuex";
import WeightInput from "../components/Ingredient/WeightInput.vue";

export default {
  name: "StepTwoFragment",
  components: { WeightInput },
  data() {
    return {
      number: 100
    };
  },

  mounted(){
    this.syncAbsoluteBottom(this.$parent.syncExtraTop);
  },

  computed: {
    ...mapState("Plate", ["ingredients"])
  }
};
</script>

