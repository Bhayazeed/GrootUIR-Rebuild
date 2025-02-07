<template>
  <div class="admin-page">
    <div class="admin-container">
      <h1>Edit Project</h1>
      <form @submit.prevent="editProject">
        <div class="form-group">
          <label>Upload Gambar</label>
          <input type="file" @change="handleFileUpload" />
        </div>

        <div class="form-group">
          <label>Title</label>
          <input 
            type="text" 
            v-model="projectForm.title" 
            placeholder="Masukkan title (opsional)..." 
          />
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <input 
            type="text" 
            v-model="projectForm.description" 
            placeholder="Masukkan deskripsi (opsional)..." 
          />
        </div>

        <div class="form-group">
          <label>Pilih Tags:</label>
          <select id="tags" name="tags" v-model="projectForm.tags">
            <option value="" disabled>Pilih Tags (opsional)</option>
            <option value="AI">AI</option>
            <option value="IOT">IOT</option>
            <option value="ROBOTICS">ROBOTICS</option>
            <option value="AUTOMATION">AUTOMATION</option>
          </select>
        </div>

        <button type="submit" :disabled="isSubmitting">
          📝 {{ isSubmitting ? 'Menyimpan...' : 'Simpan' }}
        </button>
        <button type="button" @click="back">
          Batal
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';

const token = localStorage.getItem('authToken');
const isSubmitting = ref(false);
const router = useRouter();
const route = useRoute();

// Ambil ID proyek dari parameter route
const projectId = route.params.id;
console.log('ID yang digunakan:', projectId);

// Reactive object untuk menyimpan data form
const projectForm = ref({
  image: null,
  title: '',
  description: '',
  tags: '',
});

// Fungsi untuk menangani upload file
const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  const validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
  if (!validExtensions.includes(file.type)) {
    alert('Hanya gambar dengan format JPEG, JPG, atau PNG yang diperbolehkan.');
    return;
  }

  projectForm.value.image = file;
};

// Fungsi untuk mengambil data proyek yang akan diedit
onMounted(async () => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/projects/${projectId}`;
    const response = await fetch(apiUrl, {
      method: "GET",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    });
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();
    projectForm.value = { ...result.data, image: null };
  } catch (error) {
    console.error("Error fetching data:", error.message);
    alert("Gagal memuat data.");
  }
});

// Fungsi untuk mengirim data edit ke server
const editProject = async () => {
  isSubmitting.value = true;

  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/admin/projects/${projectId}`;
    const payload = new FormData();

    // Hanya tambahkan field jika ada nilai
    if (projectForm.value.image) {
      payload.append('image', projectForm.value.image);
    }
    if (projectForm.value.title) {
      payload.append('title', projectForm.value.title);
    }
    if (projectForm.value.description) {
      payload.append('description', projectForm.value.description);
    }
    if (projectForm.value.tags) {
      payload.append('tags', projectForm.value.tags);
    }

    // Tambahkan _method: PUT untuk melakukan override method (jika API menggunakan teknik ini)
    payload.append('_method', 'PUT');

    const response = await fetch(apiUrl, {
      method: 'POST',
      headers: {
        'x-api-key': import.meta.env.VITE_API_KEY,
        'Authorization': `Bearer ${token}`,
        'Accept': 'application/json',
      },
      body: payload,
    });

    if (!response.ok) {
      const errorData = await response.json();
      throw new Error(errorData.message || 'Terjadi kesalahan pada server.');
    }

    const result = await response.json();
    alert('Proyek berhasil diperbarui: ' + result.message);

    // Redirect ke halaman daftar proyek
    router.push({ name: 'AdminPJ' });
  } catch (error) {
    console.error('Terjadi kesalahan:', error.message);
    alert('Error: ' + error.message);
  } finally {
    isSubmitting.value = false;
  }
};

function back() {
  router.push({ name: 'AdminPJ' });
}
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
  margin-top: 10px;
}

button:hover {
  background: #d88b18;
}

button:disabled {
  background: #ccc;
  cursor: not-allowed;
}
</style>
