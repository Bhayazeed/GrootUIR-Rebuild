<template>
  <div class="card" :class="customClass">
    <!-- Top Image Section -->
    <div
      class="card-header"
      :style="{ backgroundImage: image ? `url(${image})` : 'none' }"
    >
      <slot name="header"></slot>
    </div>

    <!-- Title, Creator, Date, and Description -->
    <div class="card-content">
      <slot name="title">
        <h2 class="card-title">{{ title }}</h2>
      </slot>

      <div class="card-meta">
        <slot name="creator">
          <p v-if="creator" class="card-creator"> By {{ creator }}</p>
          <div v-if="creator" class="divider"></div>
        </slot>

        <slot name="date">
          <div class="card-date">
            <i class="fa-solid fa-calendar-days"></i>
            <p>{{ date }}</p>
          </div>
        </slot>
      </div>

      <slot name="description">
        <div class="card-description">
          <p v-for="(paragraph, index) in formattedDescription" :key="index">
            {{ paragraph }}
          </p>
        </div>
      </slot>
      
      <!-- Related Articles Section -->
    </div>
    
    <button class="back-button" @click="goBack">Kembali</button>
  </div>
</template>

<script setup>
import { defineProps, computed } from "vue";
import { useRouter } from 'vue-router';

const router = useRouter();
const goBack = () => {
  router.back();
};

const props = defineProps({
  image: {
    type: String,
    default: "", // Default image (empty string)
  },
  title: {
    type: String,
    default: "Default Title", // Default title
  },
  creator: {
    type: String,
    default: "", // Default creator
  },
  date: {
    type: String,
    default: "Unknown Date", // Default date
  },
  description: {
    type: String,
    default: "Default description goes here.", // Default description
  },
  customClass: {
    type: String,
    default: "", // Custom class for styling
  },
});

// Format description into paragraphs
const formattedDescription = computed(() => {
  if (!props.description) return [];
  return props.description.split(/\r\n\r\n/).filter(p => p.trim() !== '');
});
</script>

<style scoped>
/* Card Container */
.card {
  width: 100%;
  max-width: 800px;
  height: auto;
  border-radius: 16px;
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  border: 1px solid #e5e5e5;
  background-color: white;
  position: relative;
  display: flex;
  flex-direction: column;
  margin: 16px auto;
}

/* Top Image Section */
.card-header {
  height: 275px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

/* Card Content */
.card-content {
  padding: 20px 40px;
  text-align: left;
  flex-grow: 1;
}

.card-title {
  font-size: 1.5rem;
  font-weight: bold;
  margin: 0 0 10px 0;
  color: #33308e;
}

.card-meta {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.card-creator {
  font-size: 0.9rem;
  font-style: italic;
  color: #888888;
  margin: 0;
}

.divider {
  width: 2px;
  height: 20px;
  background-color: #888888;
}

.card-date {
  display: flex;
  align-items: center;
  gap: 8px;
}

.card-date p {
  font-size: 0.9rem;
  color: #888888;
  margin: 0;
}

.card-description {
  font-size: 1rem;
  margin: 0;
  line-height: 1.5;
  word-wrap: break-word;
  text-align: justify;
}

.card-description >>> p {
  color: #1a1a1a;
}

/* Responsiveness */
@media (max-width: 768px) {
  .card-header {
    height: 200px;
  }

  .card-title {
    font-size: 1.25rem;
  }

  .card-meta {
    flex-direction: row; /* Tetap row */
    align-items: center; /* Agar sejajar */
    flex-wrap: wrap;     /* Jika space tidak cukup, otomatis turun */
  }

  .card-date p,
  .card-creator {
    font-size: 0.85rem;
  }

  .card-description >>> p {
    font-size: 12px;
  }
  
}

@media (max-width: 480px) {
  .card-header {
    height: 150px;
  }

  .card-title {
    font-size: 1rem;
  }

  .card-meta {
    gap: 5px;
  }

  .card-date p,
  .card-creator {
    font-size: 0.8rem;
  }

  .card-description {
    font-size: 0.85rem;
  }
}
</style>