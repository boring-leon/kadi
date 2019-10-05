<template>
<div style='margin-top:30px;'>
    <p class="lead" style='color:red;'>
      Nie znaleziono składnika <b>{{ searchName }}</b>
    </p>

    <p class='lead-info'> 
      Możesz dodać go do własnych składników, widocznych tylko dla Ciebie. <br>
      Aby nimi zarządzać, przejdź do zakładki <i>moje składniki</i> z paska nawigacji.
    </p>

    <div>
      <button class='btn btn-block btn-success btn-lg' @click="displayModal('add-custom-ingredient')"> 
        Dodaj {{ searchName }}
      </button>
      <button class='btn btn-block btn-danger btn-lg' @click="$emit('resetSearchRequest')"> 
        Szukaj innych składników
      </button>
      <CreateIngredient id='add-custom-ingredient' :searchName='searchName' />
    </div>
</div>
</template>

<script>
import CreateIngredient from '../Ingredient/Controllers/Create.vue';

export default {
  name: "IngredientNotFound",
  components: { CreateIngredient },
  props: {
    searchName: {
      type: String,
      required: true
    }
  }
};
</script>