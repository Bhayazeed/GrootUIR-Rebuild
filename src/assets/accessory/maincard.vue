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
        <p class="card-description">{{ truncateText(description, 150) }}</p>
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
</template>

<script setup>
import { useRouter } from "vue-router";
import { defineProps } from "vue";

const router = useRouter();

const props = defineProps({
  image: { type: String, default: "" },
  day: { type: String, default: "01" },
  month: { type: String, default: "Jan" },
  title: { type: String, default: "Default Title" },
  description: { type: String, default: "Default description goes here." },
  buttonText: { type: String, default: "" },
  customClass: { type: String, default: "" },
  showDateBadge: { type: Boolean, default: true },
  id_activity: { type: [String, Number], required: true }
});

// Fungsi untuk memotong teks deskripsi
const truncateText = (text, maxLength) => {
  if (!text) return ""; // Pastikan tidak error jika deskripsi kosong
  return text.length > maxLength ? text.slice(0, maxLength) + "..." : text;
};

function onButtonClick() {
  router.push({ name: "View", params: { id: props.id_activity } });
}
</script>



<style scoped>
/* Card Container */
.card {
  width: 720px;
  height: auto;
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
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Card Footer (Button Section) */
.card-footer {
  margin-left: 20px;
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
  margin-bottom: 30px;
}

.read-more-btn:hover {
  background-color: #f9a61d;
  color: #ffffff;
}

/* Responsiveness for smaller screens (mobile) */
@media (max-width: 768px) {
  .card {
    width: 330px; /* Make the card take up the full width on smaller screens */
    height: auto; /* Adjust height automatically to fit content */
    right: 25px;
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

/* Further responsiveness for very small screens (e.g., mobile phones in portrait mode) */
@media (max-width: 480px) {
  .card-title {
    font-size: 20px; /* Make the title even smaller for very small screens */
  }

  .card-description {
    font-size: 14px; /* Further reduce description size */
  }

  .read-more-btn {
    font-size: 14px; /* Smaller button font */
    padding: 8px 16px; /* Adjust button padding for very small screens */
    margin-bottom: 15px;
  }
}

</style>
