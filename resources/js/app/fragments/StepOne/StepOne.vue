<template>
  <article>
    <HeaderCenter>Krok 1 - wybierz składniki</HeaderCenter>
    <section>
      <SearchBox :ingredientName.sync="search.name" :ingredientType.sync="search.type" />
    </section>

    <section style="margin-top:25px;" class="text-center">
      <p class="lead" style="font-size:1.3rem" v-once>
        <router-link :to="{name: 'tutorial'}">Zobacz</router-link>
        jak korzystać z aplikacji
      </p>
      <template v-if="searchSuccessful">
        <hr />
        <SearchResults :ingredients="ingredients" />
      </template>

      <FailedSearch v-if="searchFailed" 
        :searchTypeFilterExists="search.type != '*'"
        :anyIngredientsMatchedByNameExist="getSearchService().filterIngredientsByName().length > 0"
      />

      <template v-else-if="selectedIngredientsDisplayRequested">
        <hr />
        <SearchResults :ingredients="plateIngredients" />
      </template>

      <AppSupportInfo v-if="displaySupportInfo" />
    </section>
  </article>
</template>

<script>
import SearchBox from "../../components/Search/SearchBox.vue";
import SearchResults from "../../components/Search/SearchResults.vue";
import FailedSearch from "./fragments/search/FailedSearch.vue";
import AppSupportInfo from "./fragments/info/AppSupport.vue";
import { debounce } from "lodash";
import SearchService from "../../../domain/SearchService";

export default {
  name: "StepOneFragment",
  components: { SearchBox, SearchResults, FailedSearch, AppSupportInfo },
  data() {
    return {
      search: {
        name: "",
        type: "*"
      },
      ingredients: [],
      searchFailed: false,
      displaySupportInfo: true
    };
  },
  beforeMount() {
    this.displaySupportInfo = this.plateIngredients.length == 0;
  },
  mounted() {
    this.syncAbsoluteBottom(this.$parent.syncExtraTop);
    this.$parent.displaySelectedIngredients = false;
  },
  updated() {
    this.displaySupportInfo = false;
    this.syncAbsoluteBottom(this.$parent.syncExtraTop + 14);
  },
  methods: {
    setIngredientsDebounced: debounce(function() {
      this.setIngredients();
    }, 380),

    setIngredients() {
      if (this.searchNameInputed) {
        this.$parent.displaySelectedIngredients = false;
        this.ingredients = this.getSearchService().filterIngredientsByAll();
        this.searchFailed = this.getSearchFailed();
      } 
      else {
        this.searchFailed = false;
      }
    },

    getSearchFailed() {
      return this.searchFailed =
        this.ingredients.length == 0 &&
        !this.$parent.displaySelectedIngredients &&
        !this.searchNameIsAlreadyOnPlate;
    },

    getSearchResults() {
      return this.getSearchService().filterIngredientsByAll();
    },

    getSearchResultsMatchByName() {
      return this.getSearchService().filterIngredientsByName();
    },

    getSearchService(){
      const ingredients = this.storeIngredients.filter(i => !this.$store.getters["Plate/find"](i.templateKey));
      return new SearchService({ingredients: ingredients, search: this.search});
    }
  },

  watch: {
    "search.type": {
      handler: "setIngredients"
    },
    "search.name": {
      handler: "setIngredientsDebounced"
    },
    storeIngredients: {
      handler: "setIngredients"
    }
  },

  computed: {
    storeIngredients() {
      return this.$store.state.ingredients;
    },
    plateIngredients() {
      return this.$store.state.Plate.ingredients;
    },
    searchSuccessful() {
      return this.ingredients.length > 0 && !this.$parent.displaySelectedIngredients;
    },
    searchNameInputed() {
      return this.search.name.trim().length > 0;
    },
    searchNameIsAlreadyOnPlate() {
      return this.plateIngredients.filter(m =>
        m.name.trim().toUpperCase() == this.search.name.trim().toUpperCase()
      ).length > 0;
    },
    selectedIngredientsDisplayRequested() {
      return this.plateIngredients.length > 0 && this.$parent.displaySelectedIngredients;
    }
  }
};
</script>