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
  name: "YTEmbe",
  props: {
    link: {
      type: String,
      required: true
    }
  }
};
</script>

<style>
.video-container {
position: relative;
padding-bottom: 56.25%;
padding-top: 30px; height: 0; overflow: hidden;
}

.video-container iframe,
.video-container object,
.video-container embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
</style>