<template>
  <div class="admin-page">
    <div class="admin-container">
      <h1>Post Project</h1>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label>Upload Gambar</label>
          <input type="file" @change="handleFileUpload" />
        </div>

        <div class="form-group">
          <label>Title</label>
          <input 
            type="text" 
            v-model="formData.title" 
            placeholder="Masukkan title..." 
            required 
          />
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <input 
            type="text" 
            v-model="formData.description" 
            placeholder="Masukkan deskripsi..." 
            required 
          />
        </div>

        <div class="form-group">
          <label>Pilih Tags:</label>
          <select id="tags" name="tags" v-model="formData.tags" required>
            <option value="" disabled>Pilih Tags</option>
            <option value="AI">AI</option>
            <option value="IOT">IOT</option>
            <option value="ROBOTICS">ROBOTICS</option>
            <option value="AUTOMATION">AUTOMATION</option>
          </select>
        </div>

        <button type="submit" :disabled="isSubmitting">
          📝 {{ isSubmitting ? 'Menyimpan...' : 'Simpan' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const token = localStorage.getItem("authToken");
const isSubmitting = ref(false);

const formData = ref({
  image: null,
  title: '',
  description: '',
  tags: '',
});

const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  const validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
  if (!validExtensions.includes(file.type)) {
    alert('Hanya gambar dengan format JPEG, JPG, atau PNG yang diperbolehkan.');
    return;
  }

  formData.value.image = file;
};

const validateForm = () => {
  if (!formData.value.image) {
    alert("Silakan upload gambar.");
    return false;
  }
  if (!formData.value.title || !formData.value.description || !formData.value.tags) {
    alert("Semua field wajib diisi.");
    return false;
  }
  return true;
};

const submitForm = async () => {
  if (!validateForm()) return;
  isSubmitting.value = true;

  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/admin/projects`;
    const formDataToSend = new FormData();

    formDataToSend.append('image', formData.value.image);
    formDataToSend.append('title', formData.value.title);
    formDataToSend.append('description', formData.value.description);
    formDataToSend.append('tags', formData.value.tags);

    const response = await fetch(apiUrl, {
      method: "POST",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        "Authorization": `Bearer ${token}`,
        'Accept': 'application/json',
      },
      body: formDataToSend,
    });

    if (!response.ok) {
      const errorData = await response.json();
      throw new Error(errorData.message || "Terjadi kesalahan pada server.");
    }

    const result = await response.json();
    alert("Post berhasil dibuat: " + result.message);
  } catch (error) {
    console.error("Terjadi kesalahan:", error.message);
    alert("Error: " + error.message);
  } finally {
    isSubmitting.value = false;
  }
};
</script>

<style scoped>
.admin-page {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.admin-container {
  width: 400px;
  padding: 25px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  text-align: center;
}

h1 {
  color: #33308e;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
  text-align: left;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #33308e;
}

input, select {
  width: 100%;
  padding: 10px;
  border: 2px solid #33308e;
  border-radius: 5px;
  outline: none;
  transition: all 0.3s ease;
}

input:focus, select:focus {
  border-color: #f9a61d;
}

button {
  width: 100%;
  background-color: #f9a61d;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
}

button:hover {
  background: #d88b18;
}

button:disabled {
  background: #ccc;
  cursor: not-allowed;
}
</style>
