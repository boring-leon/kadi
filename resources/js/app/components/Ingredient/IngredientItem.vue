<template>
  <li :class="itemClass" style="cursor:pointer;" @click="handleClick">{{ ingredient.name }}</li>
</template>

<script>
export default {
  name: "IngredientItem",
  props: {
    ingredient: {
      type: Object,
      required: true
    }
  },
  methods: {
    handleClick() {
      if (this.isActive) {
        this.$store.commit("Plate/removeIngredient", this.ingredient);
      } 
      else if(this.notAlreadyOnPlate) {
        this.$store.commit("Plate/addIngredient", this.ingredient);
      }
    }
  },
  computed: {
    itemClass() {
      const active = this.isActive ? "active" : "";
      return "list-group-item list-group-item-action " + active;
    },

    notAlreadyOnPlate(){
      return !this.$store.getters['Plate/find'](this.ingredient.templateKey);
    },

    isActive() {
      return this.$store.getters['Plate/find'](this.ingredient.templateKey);
    }
  }
};
</script>

