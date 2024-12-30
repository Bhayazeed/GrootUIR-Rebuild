<template>
  <div class="frame">
    <!-- Slot for Custom Content (Default to Image) -->
    <slot>
      <img :src="src" :alt="alt" class="frame-image" v-if="src" />
    </slot>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({
  src: {
    type: String,
    default: null, // Optional image source
  },
  alt: {
    type: String,
    default: "Image", // Default alt text
  },
});
</script>

<style scoped>
/* Frame Container */
.frame {
  display: inline-block;
  padding: 10px; /* Padding inside the border */
  border: 5px solid #ffa500; /* Yellow border */
  border-radius: 12px; /* Rounded corners */
  background-color: white; /* Background inside the frame */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

/* Image Inside the Frame */
.frame-image {
  display: block;
  max-width: 100%;
  height: auto;
  border-radius: 8px; /* Slightly rounded corners for the image */
}
</style>
