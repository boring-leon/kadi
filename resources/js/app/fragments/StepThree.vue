<template>
  <article class="text-center">
    <HeaderCenter>Podsumowanie</HeaderCenter>

    <SummaryTable
      :ingredients="ingredients"
      :totalExchangers="totalExchangers"
      :totalKcal="totalKcal"
    />
    <hr />
    <section>
      <ExchangerModal id="exchanger_modal" />
      <ActivitiesModal id="activities_modal" :kcal="totalKcal" />
      <CreateMeal id="meal_modal" />

      <div class="alert alert-info total-units" style="margin-bottom:5;">
        <h4 style="margin:0; padding:0;">Sugerowana ilość jednostek {{ totalUnits | round(2) }}</h4>
      </div>
      <div class="alert alert-danger" style="margin-bottom:40px;">
        <span style="font-size:1.1rem;">
          Sprawdź przelicznik -
          <b>może być inny w zależności od pory dnia</b> !
        </span>
      </div>
    </section>
    <hr />
    <footer>
      <div class="absolute-bottom btn-block-container">
        <button
          class="btn btn-block btn-lg btn-danger mb-2"
          @click="displayModal('exchanger_modal')"
        >Zmień przelicznik J/WW ({{ userExchanger }})</button>
        <button
          class="btn btn-info btn-lg btn-block"
          @click="displayModal('activities_modal')"
        >Jak to spalić?</button>
        <button
          class="btn btn-success btn-lg btn-block"
          @click="displayModal('meal_modal')"
        >Zapisz danie</button>
      </div>
    </footer>
  </article>
</template>

<script>
import SummaryTable from "../components/Summary/SummaryTable.vue";
import ExchangerModal from "../components/Summary/ExchangerModal.vue";
import ActivitiesModal from "../components/Summary/ActivitiesModal.vue";
import CreateMeal from "../components/CustomMeal/Controllers/Create.vue";

import PropertyCalculator from "../../domain/plate/PropertyCalculator";

export default {
  name: "StepThreeFragment",
  components: { SummaryTable, ExchangerModal, ActivitiesModal, CreateMeal },

  mounted() {
    this.syncAbsoluteBottom(-20, 50);
  },
  updated() {
    this.syncAbsoluteBottom(-20, 50);
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
    ingredients() {
      return this.$store.state.Plate.ingredients.map(i => {
        const calculator = new PropertyCalculator(i, this.$store);
        return {
          ...i,
          exchanger: calculator.exchanger,
          kcal: calculator.kcal,
        };
      });
    }
  }
};
</script>

