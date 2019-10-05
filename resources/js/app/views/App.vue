<template>
  <main>
    <section class="app-dynamic-errors">
      <InfoAlert v-if="displayInfo" />
      <ErrorAlert v-if="displayError" />
    </section>
    <router-view></router-view>
  </main>
</template>

<script>
import InfoAlert from "../components/UI/Messages/Info.vue";
import ErrorAlert from "../components/UI/Messages/Error.vue";
export default {
  name: "App",
  components: { InfoAlert, ErrorAlert },
  computed: {
    displayInfo() {
      return this.$store.state.Messages.active_info.display;
    },
    displayError() {
      return this.$store.state.Messages.active_error.display;
    }
  }
};
</script>