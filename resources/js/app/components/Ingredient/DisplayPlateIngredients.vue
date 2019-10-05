<template>
  <button class="btn btn-lg btn-block btn-info"
    @click="$emit('update:displaySelected', true)">Pokaż wybrane składniki ({{ ingredients.length }})
  </button>
</template>

<script>
import { mapState } from 'vuex';

export default {
  name: "DisplayPlateIngredientsBtn",
  props:{
    displaySelected:{
      type: Boolean,
      required: true
    }
  },
  computed: mapState("Plate", ["ingredients"])
};
</script>


