<template>
  <div>
    <div class="alert alert-danger">
      Szukane składniki istnieją, ale nie w kategorii <b>{{ searchType }}</b>!
    </div>
    <button
      class="btn btn-lg btn-success btn-block"
      @click="$emit('clearFilters')"
    >Wyczyść filtr i pokaż rezultaty</button>
  </div>
</template>

<script>
export default {
  name: "FiltersAlert",
  props: {
    searchType: {
      required: true,
      type: String
    }
  }
};
</script>