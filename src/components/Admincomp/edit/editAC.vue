<template>
  <div class="admin-page">
    <div class="admin-container">
      <h1>Edit Activity</h1>
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
          <textarea
            v-model="formData.description"
            placeholder="Masukkan deskripsi..."
            class="scrollable-textarea"
            rows="4"
          ></textarea>
        </div>

        <div class="form-group">
          <label>Category</label>
          <input type="text" v-model="formData.category" placeholder="Masukkan kategori..." />
        </div>
        
        <button type="submit" :disabled="isSubmitting">
          {{ isSubmitting ? "Mengirim..." : "📝 Simpan" }}
        </button>
        <button type="button" @click="back">
          Batal
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";

const router = useRouter();
const route = useRoute();
const id = route.params.id;

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

  const validExtensions = ["image/jpeg", "image/png", "image/jpg"];
  if (!validExtensions.includes(file.type)) {
    alert("Hanya gambar dengan format JPEG, JPG, atau PNG yang diperbolehkan.");
    return;
  }

  formData.value.image = file;
};

const fetchActivity = async () => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/activities/${id}`;
    
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
    formData.value = { ...result.data, image: null };
  } catch (error) {
    console.error("Error fetching data:", error.message);
    alert("Gagal memuat data.");
  }
};

const submitForm = async () => {
  isSubmitting.value = true;

  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/admin/activities/${id}`;
    const formDataToSend = new FormData();

    // Hanya tambahkan data yang tidak kosong
    if (formData.value.image) {
      formDataToSend.append("image", formData.value.image);
    }
    if (formData.value.title.trim()) {
      formDataToSend.append("title", formData.value.title);
    }
    if (formData.value.description.trim()) {
      formDataToSend.append("description", formData.value.description);
    }
    if (formData.value.category.trim()) {
      formDataToSend.append("category", formData.value.category);
    }
    if (formData.value.created_by.trim()) {
      formDataToSend.append("created_by", formData.value.created_by);
    }
    formDataToSend.append("_method", "PUT");

    const response = await fetch(apiUrl, {
      method: "POST",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        "Authorization": `Bearer ${token}`,
        "Accept": "application/json",
      },
      body: formDataToSend,
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();
    if (result.success) {
      console.log("Data berhasil diperbarui:", result.message);
      alert("Data berhasil diperbarui!");
      router.push({ name: 'AdminAC' });
    } else {
      alert(result.message || "Gagal memperbarui data.");
    }
  } catch (error) {
    console.error("Terjadi kesalahan:", error.message);
    alert("Terjadi kesalahan: " + error.message);
  } finally {
    isSubmitting.value = false;
  }
};

onMounted(() => {
  fetchActivity(); 
});

function back() {
  router.push({ name: 'AdminAC' });
}
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
  margin-top: 10px;
}
button:hover {
  background: #d88b18;
}
button:disabled {
  background: #ccc;
  cursor: not-allowed;
}


textarea {
  width: 100%;
  padding: 10px;
  border: 2px solid #33308e;
  border-radius: 5px;
  outline: none;
  resize: vertical;
  transition: all 0.3s ease;
  font-family: inherit;
  font-size: 1rem;
}

textarea:focus {
  border-color: #f9a61d;
}

.scrollable-textarea {
  width: 100%;
  padding: 10px;
  border: 2px solid #33308e;
  border-radius: 5px;
  outline: none;
  resize: both; /* biar bisa diubah manual */
  overflow: auto;
  white-space: pre; /* penting: agar spasi, enter, dan horizontal scroll tetap terlihat */
  font-family: inherit;
  font-size: 1rem;
}
.scrollable-textarea:focus {
  border-color: #f9a61d;
}

</style>
