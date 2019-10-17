<template>
<div class="video-container" v-once>
  <iframe
    width="560"
    height="315"
    :src="`https://www.youtube.com/embed/${link}`"
    frameborder="0"
    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
  ></iframe>
</div>
</template>

<script>
export default {
  name: "YTEmbed",
  props: {
    link: {
      type: String,
      required: true
    }
  }
};
</script>