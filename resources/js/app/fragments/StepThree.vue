<template>
  <article class="text-center">
    <HeaderCenter>Podsumowanie</HeaderCenter>

    <section>
      <SummaryTable :ingredients="ingredients" :totalExchangers="totalExchangers" :totalKcal='totalKcal' />
    </section>

    <section>
      <ExchangerModal id="exchanger_modal" />
      <ActivitiesModal id="activities_modal" :kcal ='totalKcal' />
      <CreatePlate id="plate_modal" />

      <div class="alert alert-info total-units" style='margin-bottom:35px;'>
        <h4 style="margin:0; padding:0;">Sugerowana ilość jednostek {{ totalUnits | round(2) }}</h4>
      </div>
    </section>

    <div class="alert alert-danger" style='margin-bottom:40px;'>
      Sprawdź przelicznik - <b> może być inny w zależności od pory dnia </b> !
    </div>

    <footer>
      <div class="absolute-bottom btn-block-container">
        <button class="btn btn-block btn-lg btn-danger mb-2" @click="displayModal('exchanger_modal')">
          Zmień przelicznik J/WW ({{ userExchanger }})
        </button>
        <button class='btn btn-info btn-lg btn-block' @click="displayModal('activities_modal')">
          Jak to spalić?
        </button>
        <button class='btn btn-success btn-lg btn-block' @click="displayModal('plate_modal')">
          Zapisz danie
        </button>
      </div>
    </footer>
  </article>
</template>

<script>
import { mapState } from "vuex";
import SummaryTable from "../components/Summary/SummaryTable.vue";
import ExchangerModal from "../components/Summary/ExchangerModal.vue";
import ActivitiesModal from "../components/Summary/ActivitiesModal.vue";
import CreatePlate from "../components/CustomPlate/Controllers/Create.vue";

export default {
  name: "StepThreeFragment",
  components: { SummaryTable, ExchangerModal, ActivitiesModal, CreatePlate },
  
  created() {
    this.ingredients.forEach(m => {
      this.$store.commit("Plate/setProps", { ingredient: m, data: {
        exchanger: this.getExchanger(m),
        kcal: this.getKcal(m)
      }});
    });
  },

  mounted(){
    this.syncAbsoluteBottom(-20, 50);
  },
  updated(){
    this.syncAbsoluteBottom(-20, 50);
  },
  
  methods: {
    getExchanger(plateIngredient) {
      return this.getStoreIngredient(plateIngredient).exchanger * this.getPortions(plateIngredient);
    },

    getKcal(plateIngredient) {
      return this.getStoreIngredient(plateIngredient).kcal * this.getPortions(plateIngredient);
    },

    getPortions(plateIngredient) {
      return plateIngredient.weight / this.getStoreIngredient(plateIngredient).portion.weight;
    },

    getStoreIngredient(plateIngredient) {
      return this.$store.getters['find'](plateIngredient.templateKey);
    }
  },
  computed: {
    userExchanger() {
      return this.$store.state.User.exchanger;
    },
    totalExchangers() {
      return Object.keys(this.ingredients)
        .map(key => this.ingredients[key].exchanger)
        .reduce((previous, current) => previous + current);
    },
    totalUnits() {
      return this.totalExchangers * this.userExchanger;
    },
    totalKcal() {
      return Object.keys(this.ingredients)
        .map(key => this.ingredients[key].kcal)
        .reduce((previous, current) => previous + current);
    },
    ...mapState("Plate", ["ingredients"])
  }
};
</script>

