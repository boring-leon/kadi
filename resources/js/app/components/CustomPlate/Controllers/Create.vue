<template>
  <div :id="id" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form @submit.prevent="saveMeal">
            <div class="form-group">
              <input class="form-control" type="text" v-model="name" />
            </div>
            <div class="form-group" v-if="customPlates.length > 0">
              <select class="form-control" v-model="override">
                <option selected value>edytuj posiłek</option>
                <option v-for='plate in customPlates' :key='plate.id' :value='plate.id'>
                  {{ plate.name }}
                </option>
              </select>
            </div>

            <button class="btn btn-lg btn-block btn-success" type="submit"
            :disabled="!canSubmit">{{ btnMessage }} </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import uuid from "uuid";
import modalMixin from "../../../mixins/modal";

export default {
  name: "CreateMeal",
  mixins: [modalMixin],
  data() {
    return {
      name: "",
      override: ""
    };
  },

  methods: {
    saveMeal() {
      if(this.override){
        this.$store.dispatch("CustomPlate/updatePlate", {plate: this.plate, id: this.override, name:this.name });
      }
      else{
        this.$store.dispatch("CustomPlate/createPlate", {plate: this.plate, name: this.name });
      }
      this.closeModal();
    },

    beforeModalClose() {
      let message = this.override 
      ? `Zapisano zmiany do posiłku <b>${this.name}</b>` 
      : `Zapisano nowy posiłek - <b>${this.name}</b>`;
      this.makeInfo(message)
    }
  },

  watch:{
    override(v){
      if(v){
        this.name = this.customPlates.find(p => p.id == this.override).name
      }
    }
  },

  computed: {
    plate() {
      return this.$store.state.Plate;
    },
    customPlates(){
      return this.$store.state.CustomPlate.plates;
    },
    btnMessage(){
      return this.override ? `Zapisz zmiany do ${this.name}` : `Zapisz ${this.name}`;
    },
    canSubmit(){
      return this.name.trim().length > 0;
    }
  }
};
</script>