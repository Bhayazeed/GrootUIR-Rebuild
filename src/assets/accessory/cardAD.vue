<template>
  <div class="card" :class="customClass">
    <!-- Top Section -->
    <div
      class="card-header"
      :style="{ backgroundColor: headerColor, backgroundImage: image ? `url(${image})` : 'none' }"
    ></div>

    <!-- Date Badge -->
    <div v-if="showDateBadge" class="date-badge">
      <p class="date-day">{{ day }}</p>
      <p class="date-month">{{ month }}</p>
    </div>

    <div class="card-body">
      <!-- Title and Description -->
    <div class="card-content">
      <slot name="title">
        <h2 class="card-title">{{ title }}</h2>
      </slot>
      <slot name="description">
        <p class="card-description">{{ truncatedDescription }}</p>
      </slot>
    </div>

    <!-- Read More Button -->
    <div class="card-footer">
      <slot name="button">
        <button v-if="buttonText" class="read-more-btn" @click="onButtonClick">
          {{ buttonText }}
        </button>
      </slot>
    </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";
import { defineProps, defineEmits } from "vue";

const props = defineProps({
  day: {
    type: String,
    default: "01",
  },
  month: {
    type: String,
    default: "Jan",
  },
  title: {
    type: String,
    default: "Default Title",
  },
  description: {
    type: String,
    default: "Default description goes here.",
  },
  buttonText: {
    type: String,
    default: "Read More",
  },
  customClass: {
    type: String,
    default: "",
  },
  headerColor: {
    type: String,
    default: "#1e3a8a",
  },
  image: {
    type: String,
    default: "",
  },
  showDateBadge: {
    type: Boolean,
    default: true,
  },
});

const emit = defineEmits(["button-click"]);

// Computed property untuk memendekkan deskripsi
const truncatedDescription = computed(() => {
  const maxLength = 73; // Atur jumlah karakter maksimal sesuai kebutuhan
  return props.description.length > maxLength
    ? props.description.slice(0, maxLength) + "..."
    : props.description;
});

function onButtonClick() {
  emit("button-click");
}
</script>

<style scoped>
/* (Style komponen Card tetap sama seperti sebelumnya) */
.card {
  display: flex;
  width: 600px;
  height: 150px;
  border-radius: 12px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  border: 1px solid #e5e5e5;
  background-color: white;
}

.card-header {
  height: 100%;
  width: 400px;
  background-size: cover;
  background-position: center;
}

.card-body {
  flex: 2;
  display: flex;
  flex-direction: column;
  padding: 16px;
  position: relative;
}

.date-badge {
  position: absolute;
  top: 30px;
  left: 140px;
  background-color: #33308e;
  color: #ffffff;
  width: 48px;
  height: 60px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.date-day {
  font-size: 14px;
  font-weight: bold;
  margin: 0;
}

.date-month {
  font-size: 10px;
  text-transform: uppercase;
  margin: 0;
}

.card-content {
  width: 390px;
  height: 100%;
  text-align: left;
}

.card-title {
  font-size: 16px;
  font-weight: bold;
  margin: 0 0 8px 0;
  color: #33308e;
}

.card-description {
  font-size: 14px;
  color: #1c1c1c;
  margin: 0;
}

.card-footer {
  margin-top: auto;
  text-align: center;
}

.read-more-btn {
  font-size: 50px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid #f9a61d;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

.read-more-btn:hover {
  background-color: #f9a61d;
  color: #ffffff;
}
</style>
