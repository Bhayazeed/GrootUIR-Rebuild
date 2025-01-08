<template>
    <div class="search-bar">
      <div class="input-container">
        <input type="text" placeholder="Search Keyword" class="search-input" />
        <button class="search-icon">
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </div>
      <button class="search-button">Search</button>
    </div>
  </template>
  
  <script setup>
  // No additional logic is needed for this static component
  </script>
  
  <style scoped>
  .search-bar {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    background-color: #f2f0ff; /* Light purple background */
    padding: 20px;
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
  }
  
  .input-container {
    display: flex;
    align-items: center;
    width: 100%;
    background-color: #fff;
    overflow: hidden;
  }
  
  .search-input {
    flex: 1;
    border: 1px solid #ccc;
    outline: none;
    padding: 10px 15px;
    font-size: 16px;
    color: #7d7d7d;
  }
  
  .search-input::placeholder {
    color: #c0c0c0;
  }
  
  .search-icon {
    background-color: #33308e; /* Dark purple for the icon background */
    color: #ffffff;
    border: none;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #33308e;
  }
  
  .search-icon i {
    font-size: 18px;
  }
  
  .search-button {
    width: 100%;
    padding: 12px 20px;
    background-color: #f9a61d; /* Orange background */
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    text-align: center;
  }
  
  </style>
  