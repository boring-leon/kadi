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
                v-model="formIngredient.name"
              />
            </div>
            <div class="form-group">
              <select class="form-control" name="type" v-model="formIngredient.type">
                <option selected value>rodzaj składnika</option>
                <option v-for="type in types" :key="type.id">{{ type.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                required
                placeholder="kcal/porcja"
                v-model.number="formIngredient.kcal"
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                required
                placeholder="WW/porcja"
                step="0.01"
                v-model.number="formIngredient.exchanger"
              />
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="nazwa porcji - domyślna 1 porcja"
                v-model='formIngredient.portion_name'
              />
            </div>
            <div class="form-group">
              <input
                type="number"
                class="form-control"
                placeholder="waga porcji - domyślna 100g"
                :value='formIngredient.portion_weight'
                @change="formIngredient.portion_weight = Number.parseInt($event.target.value)"
              />
            </div>

            <button
              class="btn btn-block btn-lg btn-success"
              type="submit"
              :disabled="!canSubmit"
            >Edytuj składnik</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { cloneDeep } from "lodash";
import modalMixin from '../../../mixins/modal';

export default {
  name: "EditIngredient",
  mixins: [modalMixin],
  props: {
    ingredient: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
      formIngredient: {
        portion_name: "1 porcja",
        portion_weight: 100
      }
    };
  },

  created(){
    this.setFormIngredient();
    this.$parent.$on('requestedEdit', this.setFormIngredient);
  },

  methods: {
    saveIngredient() {
      return this.$store.dispatch("CustomIngredient/updateIngredient", {
        ingredient: this.ingredient,
        newIngredient: this.formIngredient
      });
    },
    handleSubmit() {
      this.ingredient.kcal = Math.round(this.ingredient.kcal);
      this.saveIngredient().then(() => this.closeModal());
    },

    beforeModalClose(){
      this.makeInfo(`Edytowano <b>${this.ingredient.name}</b>`);
    },

    setFormIngredient(){
      this.formIngredient = cloneDeep(this.ingredient);
      this.formIngredient.portion_name = cloneDeep(this.ingredient.portion.name);
      this.formIngredient.portion_weight = cloneDeep(this.ingredient.portion.weight);
    }
  },
  computed: {
    types() {
      return baseState.meal_types;
    },
    canSubmit() {
      return (
        this.formIngredient.name.trim().length > 0 &&
        this.formIngredient.kcal > 0 &&
        this.formIngredient.exchanger >= 0 && 
        this.formIngredient.portion_weight >= 0
      );
    }
  }
};
</script>