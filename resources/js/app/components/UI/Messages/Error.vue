<template>
  <div class="alert alert-danger vue-alert" id="vue-dynamic-error" @click="fadeOut">
    <span v-html="message" class="vue-alert-msg"></span>
  </div>
</template>

<script>
import messageMixin from '../../../mixins/message';
export default {
  name: "ErrorView",
  mixins: [messageMixin],
  beforeCreate() {
    this.namespace = "error";
  }
};
</script>