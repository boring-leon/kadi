<template>
  <div :id="id" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form @submit.prevent="invokeOn(handleSubmit, canSubmit)">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                required
                placeholder="nazwa składnika"
                v-model="ingredient.name"
              />
            </div>
            <div class="form-group">
              <select class="form-control" name="type" v-model="ingredient.type">
                <option selected value>rodzaj składnika - domyślnie "{{ defaultIngredientType }}"</option>
                <option v-for="type in types" :key="type.id">{{ type.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                required
                placeholder="kcal/porcja"
                v-model.number="ingredient.kcal"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                placeholder="IG"
                v-model.number="ingredient.glycemic_index"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                placeholder="WW/porcja"
                step="0.01"
                v-model.number="ingredient.exchanger"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                placeholder="węglowodany w 100g (wpisz, aby automatycznie obliczyć WW porcji)"
                step="0.01"
                v-model.number="customExchanger"
              />
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="nazwa porcji - domyślna 1 porcja"
                v-model="ingredient.portion_name"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                placeholder="waga porcji - domyślna 100g"
                @keyup="ingredient.portion_weight = Number.isNaN($event.target.value) ? 100 : Number($event.target.value)"
              />
            </div>

            <button
              class="btn btn-block btn-lg btn-success"
              type="submit"
              :disabled="!canSubmit"
            >Dodaj składnik</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ExchangerCalculator from "../../../../domain/plate/PortionExchangerCalculator";
import uuid from "uuid";
import modalMixin from "../../../mixins/modal";

export default {
  name: "CreateIngredient",
  mixins: [modalMixin],
  props: {
    searchName: {
      type: String,
      required: true
    }
  },

  data() {
    return {
      ingredient: {
        id: "",
        name: "",
        type: "",
        exchanger: "",
        kcal: "",
        glycemic_index: null,
        portion_name: "1 porcja",
        portion_weight: 100,
        templateKey: "",
        isCustom: true
      },
      customExchanger: ""
    };
  },

  beforeMount() {
    this.ingredient.id = uuid.v4();
    this.ingredient.templateKey = uuid.v4();
  },

  methods: {
    saveIngredient() {
      return this.$store.dispatch("CustomIngredient/createIngredient", { ingredient: this.ingredient });
    },
    handleSubmit() {
      this.ingredient.kcal = Math.round(this.ingredient.kcal);
      this.ingredient.type = this.ingredient.type.trim() || this.defaultIngredientType;
      this.ingredient.portion_name = this.ingredient.portion_name.trim() || "1 porcja";
      this.ingredient.portion_weight = this.ingredient.portion_weight || 100;
      this.ingredient.exchanger = Number(this.ingredient.exchanger);
      this.saveIngredient().then(() => this.closeModal());
    },

    beforeModalClose() {
      this.makeInfo(`
        <b>${this.ingredient.name}</b>  - dodano do prywatnych składników<br>`
      );
    },
    setIngredientExchanger() {
      const calculator = new ExchangerCalculator({
        portionWeight: this.ingredient.portion_weight || 100,
        customExchanger: this.customExchanger
      });
      this.ingredient.exchanger = calculator.portionExchanger;
    }
  },

  watch: {
    searchName: {
      handler: function() {
        this.ingredient.name = this.searchName;
      },
      immediate: true
    },
    customExchanger() {
      this.setIngredientExchanger();
    },
    "ingredient.portion_weight": {
      handler: "setIngredientExchanger"
    }
  },

  computed: {
    types() {
      return baseState.ingredient_types;
    },
    defaultIngredientType() {
      return this.types.find(t => t.name.includes("moje")).name;
    },
    canSubmit() {
      return (
        this.ingredient.name.trim().length > 0 &&
        this.ingredient.kcal > 0 &&
        this.ingredient.exchanger >= 0 &&
        this.ingredient.portion_weight >= 0
      );
    }
  }
};
</script>