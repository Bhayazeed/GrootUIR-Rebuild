<template>
  <div class="search-bar">
    <div class="input-container">
      <input
        type="text"
        placeholder="Search Keyword"
        class="search-input"
        v-model="query"
        @input="clearHighlights"
      />
      <button class="search-icon" @click="searchKeyword">
        <i class="fa fa-search" aria-hidden="true"></i>
      </button>
    </div>
    <button class="search-button" @click="searchKeyword">Search</button>
  </div>
</template>

<script setup>
import { ref } from "vue";

const query = ref(""); // Search query

// Function to clear highlights
const clearHighlights = () => {
  const highlights = document.querySelectorAll(".highlight");
  highlights.forEach((highlight) => {
    const parent = highlight.parentNode;
    parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
    parent.normalize(); // Merge adjacent text nodes
  });
};

// Function to search and highlight text on the page
const searchKeyword = () => {
  clearHighlights();

  if (!query.value.trim()) {
    alert("Please enter a keyword to search.");
    return;
  }

  const keyword = query.value.trim().toLowerCase();
  const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, null);

  while (walker.nextNode()) {
    const currentNode = walker.currentNode;
    if (currentNode.nodeValue.toLowerCase().includes(keyword)) {
      highlightText(currentNode, keyword);
    }
  }
};

// Helper function to highlight matching text
const highlightText = (textNode, keyword) => {
  const parent = textNode.parentNode;
  const content = textNode.nodeValue;
  const regex = new RegExp(`(${keyword})`, "gi");

  // Create a document fragment with highlighted matches
  const fragment = document.createDocumentFragment();
  let lastIndex = 0;

  content.replace(regex, (match, p1, offset) => {
    // Add text before the match
    if (offset > lastIndex) {
      fragment.appendChild(document.createTextNode(content.slice(lastIndex, offset)));
    }

    // Add the highlighted match
    const span = document.createElement("span");
    span.textContent = match;
    span.className = "highlight";
    fragment.appendChild(span);

    lastIndex = offset + match.length;
  });

  // Add any remaining text
  if (lastIndex < content.length) {
    fragment.appendChild(document.createTextNode(content.slice(lastIndex)));
  }

  // Replace the original text node with the fragment
  parent.replaceChild(fragment, textNode);
};
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

/* Highlighted text styles */
.highlight {
  background-color: yellow;
  color: black;
  font-weight: bold;
}
</style>
