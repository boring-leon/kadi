<template>
    <article class="text-center" v-once>
    <HeaderCenter>Jak korzystać z aplikacji?</HeaderCenter>
    <section>
      <header>
        <h4 class="display-4">Podstawy</h4>
      </header>
      <YTEmbed link="0Q3BxRJ-o0o" />
      <p class="lead"> 
        Aby dodać składnik naciśnij na niego <b>raz</b>. 
        Dodane składniki świecą sie na niebiesko. <br>
        Aby usunąć dodany składnik, naciśnij na niego <b>raz</b>.
      </p>
    </section>
    <hr>
    <section>
      <header>
        <h4 class="display-4">Dodawanie i edycja składników </h4>
      </header>
      <YTEmbed link="0gAbp1FnaMg" />
      <p class="lead">
        Edycja składnika umożliwa zmianę każdej jego właściwości.
      </p>
    </section>
    <hr>
    <section>
      <header>
        <h4 class="display-4">Dodawanie i edycja posiłków</h4>
      </header>
      <YTEmbed link="z3QQQ_oRd4o" />  
      <p class="lead">
        Edycja posiłku umożliwa dodanie/usunięcie składników oraz zmianę ich wagi.
      </p>
    </section>
  </article>
</template>

<script>
import YTEmbed from '../components/UI/Embed.vue';
export default {
  name: "TutorialView",
  components: { YTEmbed }
}
</script>

<style scoped>
section{
  margin-bottom: 20px;
}
h4{
  margin-bottom:20px;
}
</style>