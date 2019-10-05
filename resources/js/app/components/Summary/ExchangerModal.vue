<template>
  <div :id="id" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <input class="form-control" type="number" step="0.01" v-model="exchanger" >
        </div>
        <div class="text-center" style="margin-top:5px; margin-bottom:5px;">
          <span style="color:red" v-if='!canSave'>
            Wymiennik musi być liczbą większą od 0 !
          </span>
          <hr>
          <button type="button" class="btn btn-success" @click="saveAndClose" :disabled="!canSave">
            Zapisz dla konta
          </button>
          <button type="button" class="btn btn-primary" @click="useAndClose" style='margin: 10px'
          :disabled="!canSave">
           Zastosuj teraz (bez zapisywania)
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import modalMixin from '../../mixins/modal';
export default {
  name: "ExchangerModal",
  mixins: [modalMixin],
  data(){
    return {
      exchanger: ""
    }
  },
  
  beforeMount(){
    this.exchanger = this.storeExchanger;
  },

  methods: {
    saveAndClose() {
      this.$store.dispatch("User/setExchanger", {exchanger: this.exchanger });
      this.closeModal();
    },

    useAndClose(){
      this.$store.commit('User/setExchanger', this.exchanger);
      this.closeModal();
    }, 

    beforeModalClose(){
      this.makeInfo('Edytowano wartość wymiennika J/WW');
      this.exchanger = this.storeExchanger;
    }
  },
  computed: {
    canSave(){
      return this.exchanger > 0;
    },

    storeExchanger(){
      return this.$store.state.User.exchanger;
    }
  }
};
</script>
