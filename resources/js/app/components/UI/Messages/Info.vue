<template>
  <div class="alert alert-info vue-alert" id="vue-dynamic-info" @click="fadeOut">
    <span class="vue-alert-msg" v-html="message"></span>
  </div>
</template>

<script>
import messageMixin from '../../../mixins/message';
export default {
  name: "InfoView",
  mixins: [messageMixin],
  beforeCreate() {
    this.namespace = "info";
  }
};
</script>