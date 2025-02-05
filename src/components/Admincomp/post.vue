<template>
    <div class="admin-page">
      <div class="admin-container">
        <h1>Admin Panel</h1>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label>Upload Gambar</label>
            <input type="file" @change="handleFileUpload" />
          </div>
  
          <div class="form-group">
            <label>Pilih Tanggal</label>
            <input type="date" v-model="formData.date" />
          </div>
  
          <div class="form-group">
            <label>Nomor</label>
            <input type="number" v-model="formData.number" />
          </div>
  
          <div class="form-group">
            <label>String</label>
            <input type="text" v-model="formData.text" placeholder="Masukkan teks..." />
          </div>
  
          <button type="submit">📝 Simpan</button>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const formData = ref({
    image: null,
    date: '',
    number: '',
    text: '',
  });
  
  const handleFileUpload = (event) => {
    formData.value.image = event.target.files[0];
  };
  
  const submitForm = () => {
    console.log("Data Tersimpan:", formData.value);
  };
  </script>
  
  <style scoped>
  .admin-page {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #33308e, #1d1b6a);
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
  </style>
  