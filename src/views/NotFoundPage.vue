<template>
    <div class="not-found">
      <div class="not-found-container">
        <h1>404</h1>
        <p>Oops! Halaman yang kamu cari tidak ditemukan.</p>
        <router-link to="/">🏠 Kembali ke Beranda</router-link>
      </div>
    </div>
  </template>
  
  <style scoped>
  .not-found {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #33308e, #1d1b6a);
    color: white;
    text-align: center;
  }
  .not-found-container {
    max-width: 400px;
    padding: 30px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }
  h1 {
    font-size: 5rem;
    margin: 0;
  }
  p {
    font-size: 1.4rem;
  }
  a {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background: #f9a61d;
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
  }
  a:hover {
    background: #d88b18;
  }
  </style>
  