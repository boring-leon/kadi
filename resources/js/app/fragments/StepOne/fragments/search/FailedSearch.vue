<template>
  <div>
    <IngredientNotFound
      @resetSearchRequest="resetSearch"
      :searchName="$parent.search.name"
      v-if="!anyIngredientsFound"
    />
    <FilterAlert
      :searchType="$parent.search.type"
      @clearFilters="clearFilters"
      v-else-if="activeSearchFilterExists"
    />
  </div>
</template>

<script>
import IngredientNotFound from "../../../../components/Search/IngredientNotFound.vue";
import FilterAlert from "../../../../components/Search/FilterAlert.vue";

export default {
  name: "FailedSearch",
  components: { IngredientNotFound, FilterAlert },
  mounted(){
    this.syncAbsoluteBottom(55);
  },
  updated(){
    this.syncAbsoluteBottom(55);
  },
  methods: {
    clearFilters() {
      this.$parent.search.type = "*";
    },
    resetSearch(){
      this.$parent.searchFailed = false;
    }
  },
  computed: {
    activeSearchFilterExists() {
      return this.$parent.search.type != "*";
    },
    anyIngredientsFound(){
      return this.$parent.getMatchedByName().length > 0;
    }
  }
};
</script>