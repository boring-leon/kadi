<template>
  <div>
    <IngredientNotFound
      @resetSearchRequest="resetSearch"
      :searchName="$parent.search.name"
      v-if="!anyIngredientsMatchedByNameExist"
    />
    <FilterAlert
      :searchType="$parent.search.type"
      @clearFilters="clearFilters"
      v-else-if="searchTypeFilterExists"
    />
  </div>
</template>

<script>
import IngredientNotFound from "../../../../components/Search/IngredientNotFound.vue";
import FilterAlert from "../../../../components/Search/FilterAlert.vue";

export default {
  name: "FailedSearch",
  components: { IngredientNotFound, FilterAlert },
  props:{
    searchTypeFilterExists:{
      type: Boolean,
      required: true
    },
    anyIngredientsMatchedByNameExist:{
      type: Boolean,
      required: true
    }
  },
  mounted(){
    this.syncAbsoluteBottom(55);
  },
  updated(){
    this.syncAbsoluteBottom(55);
  },
  methods: {
    clearFilters() {
      this.$parent.search.type = '*';
    },
    resetSearch(){
      this.$parent.searchFailed = false;
    }
  }
};
</script>