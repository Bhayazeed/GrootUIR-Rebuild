<template>
    <div class="login-container">
      <h1 class="login-title">Access Login</h1>
      <div class="input-container">
        <input
          type="text"
          placeholder="Enter email or user name"
          class="login-input"
        />
      </div>
      <div class="input-container password-container">
        <input
          :type="passwordVisible ? 'text' : 'password'"
          placeholder="Password"
          class="login-input"
        />
        <button class="toggle-password" @click="togglePassword">
          <span>{{ passwordVisible ? '🙈' : '👁️' }}</span>
        </button>
      </div>
      <button class="login-button">Login</button>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const passwordVisible = ref(false);
  
  const togglePassword = () => {
    passwordVisible.value = !passwordVisible.value;
  };
  </script>
  
  <style scoped>
  .login-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* justify-content: center; */
    height: 100vh;
    background-color: #ffffff;
    padding: 20px;
  }
  
  .login-title {
    font-size: 24px;
    font-weight: bold;
    color: #f9a61d;
    margin-bottom: 40px;
  }
  
  .input-container {
    width: 100%;
    max-width: 400px;
    margin-bottom: 20px;
    color: #33308E;
  }
  
  .login-input {
    width: 100%;
    height: 50px;
    border: none;
    border-radius: 10px;
    padding: 0 15px;
    background-color: #F0EFFF;
    font-size: 16px;
    color: #33308E;
    outline: none;
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
  }
  
  .password-container {
    position: relative;
  }
  
  .toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: #33308E;
  }
  
  .login-button {
    width: 100%;
    max-width: 400px;
    height: 50px;
    border: none;
    border-radius: 10px;
    background-color: #5a4ee8;
    color: white;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  /* .login-button:hover {
    background-color: #33308e;
  } */
  </style>
  