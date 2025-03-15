<template>
  <div class="admin-page">
    <div class="admin-container">
      <h1>Post Activity</h1>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label>Upload Gambar</label>
          <input type="file" @change="handleFileUpload" accept="image/*" />
        </div>

        <div class="form-group">
          <label>Title</label>
          <input type="text" v-model="formData.title" placeholder="Masukkan title..." />
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <input type="text" v-model="formData.description" placeholder="Masukkan deskripsi..." />
        </div>

        <div class="form-group">
          <label>Category</label>
          <input type="text" v-model="formData.category" placeholder="Masukkan kategori..." />
        </div>

        <div class="form-group">
          <label>Pembuat</label>
          <input type="text" v-model="formData.created_by" placeholder="Masukkan pembuat..." />
        </div>

        <button type="submit" :disabled="isSubmitting">
          {{ isSubmitting ? "Mengirim..." : "📝 Simpan" }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const formData = ref({
  image: null,
  title: "",
  description: "",
  category: "",
  created_by: "",
});

const token = localStorage.getItem("authToken");
const isSubmitting = ref(false);

const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  const validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
  const maxSize = 500 * 1024; // 500KB dalam bytes

  if (!validExtensions.includes(file.type)) {
    alert('Hanya gambar dengan format JPEG, JPG, atau PNG yang diperbolehkan.');
    return;
  }

  if (file.size > maxSize) {
    alert('Ukuran file terlalu besar! Maksimum 500KB.');
    return;
  }

  formData.value.image = file;
};

const validateForm = () => {
  if (
    !formData.value.title.trim() ||
    !formData.value.description.trim() ||
    !formData.value.category.trim() ||
    !formData.value.created_by.trim()
  ) {
    alert("Semua field wajib diisi!");
    return false;
  }
  return true;
};

const submitForm = async () => {
  if (!validateForm()) return;
  isSubmitting.value = true;

  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/admin/activities`;
    const formDataToSend = new FormData();

    formDataToSend.append("image", formData.value.image);
    formDataToSend.append("title", formData.value.title);
    formDataToSend.append("description", formData.value.description);
    formDataToSend.append("category", formData.value.category);
    formDataToSend.append("created_by", formData.value.created_by);

    const response = await fetch(apiUrl, {
      method: "POST",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        "Authorization": `Bearer ${token}`, // Gunakan Bearer jika API memerlukannya
        "Accept": "application/json",
      },
      body: formDataToSend,
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();
    if (result.success) {
      console.log("Data berhasil disimpan:", result.message);
      alert("Post berhasil dibuat!");
    } else {
      alert(result.message || "Gagal menyimpan data.");
    }
  } catch (error) {
    console.error("Terjadi kesalahan:", error.message);
    alert("Terjadi kesalahan: " + error.message);
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
input {
  width: 100%;
  padding: 10px;
  border: 2px solid #33308e;
  border-radius: 5px;
  outline: none;
  transition: all 0.3s ease;
}
input:focus {
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
