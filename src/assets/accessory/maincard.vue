<template>
  <div class="card" :class="customClass">
    <!-- Top Image Section -->
    <div
      class="card-header"
      :style="{ backgroundImage: image ? `url(${image})` : 'none' }"
    >
      <slot name="header"></slot>
    </div>

    <!-- Date Badge -->
    <div v-if="showDateBadge" class="date-badge">
      <p class="date-day">{{ day }}</p>
      <p class="date-month">{{ month }}</p>
    </div>

    <!-- Title and Description -->
    <div class="card-content">
      <slot name="title">
        <h2 class="card-title">{{ title }}</h2>
      </slot>
      <slot name="description">
        <p class="card-description">{{ description }}</p>
      </slot>
    </div>

    <!-- Read More Button -->
    <div class="card-footer">
      <slot name="button">
        <button v-if="buttonText" class="read-more-btn" @click="handleClick">
          {{ buttonText }}
        </button>
      </slot>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({
  image: {
    type: String,
    default: "", // Default image (empty string)
  },
  day: {
    type: String,
    default: "01", // Default day
  },
  month: {
    type: String,
    default: "Jan", // Default month
  },
  title: {
    type: String,
    default: "Default Title", // Default title
  },
  description: {
    type: String,
    default: "Default description goes here.", // Default description
  },
  buttonText: {
    type: String,
    default: "", // Default button text
  },
  customClass: {
    type: String,
    default: "", // Custom class for styling
  },
  showDateBadge: {
    type: Boolean,
    default: true, // Whether to show the date badge
  },
  customAction: {
    type: Function,
    default: () => {}, // Default to an empty function if no custom action is passed
  },
});

const handleClick = () => {
  props.customAction(); // Call the custom action passed as prop
};
</script>

<style scoped>
/* Card Container */
.card {
  width: 720px;
  height: 520px;
  border-radius: 16px;
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  border: 1px solid #e5e5e5;
  background-color: white;
  position: relative;
  margin: 20px;
}

/* Top Image Section */
.card-header {
  height: 275px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

/* Date Badge */
.date-badge {
  position: absolute;
  top: 210px;
  left: 24px;
  background-color: #33308e;
  color: white;
  width: 70px;
  height: 80px;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.date-day {
  font-size: 20px;
  font-weight: bold;
  margin: 0;
}

.date-month {
  font-size: 14px;
  text-transform: uppercase;
  margin: 0;
}

/* Card Content */
.card-content {
  padding: 40px 24px 24px;
  text-align: left;
}

.card-title {
  font-size: 28px;
  font-weight: bold;
  margin: 0 0 20px 0;
  color: #33308e;
}

.card-description {
  font-size: 18px;
  color: #666666;
  margin: 0;
  line-height: 1.5;
  max-height: 120px;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Card Footer (Button Section) */
.card-footer {
  padding: 24px;
  text-align: left;
}

/* Read More Button */
.read-more-btn {
  padding: 12px 24px;
  font-size: 18px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid #f9a61d;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

.read-more-btn:hover {
  background-color: #f9a61d;
  color: #ffffff;
}

/* Responsiveness for smaller screens (mobile) */
@media (max-width: 768px) {
  .card {
    width: 100%; /* Make the card take up the full width on smaller screens */
    height: auto; /* Adjust height automatically to fit content */
    margin: 10px; /* Reduce margins for smaller screens */
  }

  .card-header {
    height: 200px; /* Reduce the image height */
  }

  .date-badge {
    top: 160px; /* Adjust the position of the date badge */
    width: 60px; /* Reduce the size of the date badge */
    height: 70px;
  }

  .card-title {
    font-size: 24px; /* Reduce title font size */
  }

  .card-description {
    font-size: 16px; /* Reduce description font size */
  }

  .read-more-btn {
    font-size: 16px; /* Reduce button font size */
    padding: 10px 20px; /* Adjust padding for the button */
  }
}
</style>
