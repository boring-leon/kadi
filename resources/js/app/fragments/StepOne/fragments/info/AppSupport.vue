<template>
  <div style="margin-top:30px;">
    <p class="lead">
      <router-link :to="{name: 'support'}">Zobacz </router-link>jak możesz wesprzeć aplikację ❤️
      <br />
      <i style="margin-top:10px; font-size:89%">
        (polubienie
        <a href="https://www.facebook.com/kalkulatorkadi/" target="_blank">facebooka</a>
        to już dużo, nie trzeba wyciągać sakiewki z monetami, aby pomóc)
      </i>
    </p>
  </div>
</template>

<script>
export default {
  name: "AppSupportInfo"
};
</script>