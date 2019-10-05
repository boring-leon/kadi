<template>
  <article class="text-center" v-once>
    <HeaderCenter>Wsparcie</HeaderCenter>
    <section>
      <div class="separator">
        <h4>Polub stronę na facebooku</h4>
        <iframe
          src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkalkulatorkadi%2F&tabs=timeline&width=340&height=127&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId"
          width="340"
          height="127"
          style="border:none;overflow:hidden"
          scrolling="no"
          frameborder="0"
          allowtransparency="true"
          allow="encrypted-media"
        ></iframe>
      </div>
      <hr />

      <div class="seprator">
        <h4>Bezpośrednia dotacja</h4>
        <div>
          BGŻ BNP Paribas
          <br />Leon Czerwiński
          <br />12 1600 1462 1831 5848 6000 0002
        </div>
      </div>
    </section>
  </article>
</template>

<script>
export default {
  name: "SupportView"
};
</script>

<style scoped>
h4 {
  margin-bottom: 15px;
  padding: 0;
}
.separator {
  margin-bottom: 30px;
}
</style>