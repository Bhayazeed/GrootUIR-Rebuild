<template>
  <button class="custom-btn" @click="handleClick">
    {{ buttonText }} <span class="arrow">{{ arrow }}</span>
  </button>
</template>

<script setup>
import { defineProps } from 'vue';

// Define props to make the button customizable
const props = defineProps({
  buttonText: {
    type: String,
    default: 'Read More',
  },
  arrow: {
    type: String,
    default: '↓',
  },
  customAction: {
    type: Function,
    default: () => {}, // Default to an empty function if no custom action is passed
  },
});

// Handle click event, trigger the custom action if provided
const handleClick = () => {
  props.customAction(); // Call the custom action passed as prop
};
</script>

<style scoped>
.custom-btn {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  background-color: #f9a825; /* Yellow background */
  color: white;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: -5px -5px 0px #2a3eb1; /* Blue shadow on the top */
  transition: all 0.3s ease;
}

.custom-btn .arrow {
  margin-left: 5px;
  font-size: 14px;
}

.custom-btn:hover {
  transform: translateY(-3px);
}

.custom-btn:active {
  transform: translateY(2px);
  box-shadow: -3px -3px 0px #2a3eb1;
}
</style>
