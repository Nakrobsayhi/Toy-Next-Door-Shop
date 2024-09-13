async function fetchAndDisplayProducts(category = "all", ready = "all") {
  const API_BASE_URL = "http://localhost:8000/api";
  const productList = document.getElementById("shop-list");

  try {
    const response = await fetch(`${API_BASE_URL}/products`);
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const products = await response.json();

    // Clear existing list
    productList.innerHTML = "";

    // Iterate through products
    products.forEach((product) => {
      // Check if the product category and ready status match the selected filters
      const matchesCategory =
        category === "all" || (product.cat && product.cat.name === category);
      const matchesReady = ready === "all" || ready === product.ready;

      if (matchesCategory && matchesReady) {
        const productContainer = document.createElement("div");
        productContainer.classList.add("product-item");

        // Product Image
        if (product.image) {
              const productLink = document.createElement("a");
              // Assuming `product` is an object containing the `product_id`
              productLink.href = `http://localhost:8000/product/${product.product_id}`;
              
              productLink.addEventListener("click", () => {
                localStorage.setItem("selectedProduct", JSON.stringify(product));
                // The link will naturally redirect to the new URL
              });

          const productImage = document.createElement("img");
          productImage.src = `http://localhost:8000/backend/product/${product.image}`;
          productImage.alt = product.name;
          productImage.style.width = "230px";
          productLink.appendChild(productImage);
          productContainer.appendChild(productLink);
        }

        // Product Name
        const productName = document.createElement("h4");
        productName.textContent = product.name;
        productName.style.fontSize = "16px";
        productName.style.fontWeight = "normal";
        productName.style.width = "210px";
        productContainer.appendChild(productName);

        // Product Price
        const productPrice = document.createElement("p");
        productPrice.textContent = `${product.price.toLocaleString()} บาท`;
        productPrice.style.color = "black";
        productPrice.style.textAlign = "left";
        productPrice.style.fontSize = "18px";
        productPrice.style.fontWeight = "normal";
        productContainer.appendChild(productPrice);

        // Product Stock (only on product.html)
        if (window.location.pathname.includes("product.html")) {
          const productStock = document.createElement("p");
          productStock.textContent = `${product.amount} in stock`;
          productContainer.appendChild(productStock);
        }

        // Append to the product list
        productList.appendChild(productContainer);
      }
    });
  } catch (error) {
    console.error("Error fetching products:", error);
  }
}

// Function to get query parameters
function getQueryParameter(name) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(name);
}

// Function to set query parameters
function setQueryParameter(name, value) {
  const urlParams = new URLSearchParams(window.location.search);
  urlParams.set(name, value);
  history.replaceState(null, null, `?${urlParams.toString()}`);
}

// Function to handle category filter clicks
function setupCategoryFilter() {
  const categoryLinks = document.querySelectorAll(".category-link");

  categoryLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const category = link.dataset.category;
      const ready = getQueryParameter("ready") || "all"; // Include the ready parameter
      setQueryParameter("category", category);
      fetchAndDisplayProducts(category, ready);
    });
  });
}

// Function to handle ready filter clicks
function setupReadyFilter() {
  const readyLinks = document.querySelectorAll(".ready-link");

  readyLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const ready = link.dataset.ready;
      const category = getQueryParameter("category") || "all"; // Include the category parameter
      setQueryParameter("ready", ready);
      fetchAndDisplayProducts(category, ready);
    });
  });
}

// Call the function to fetch and display products initially
document.addEventListener("DOMContentLoaded", () => {
  const category = getQueryParameter("category") || "all";
  const ready = getQueryParameter("ready") || "all";
  fetchAndDisplayProducts(category, ready);
  setupCategoryFilter();
  setupReadyFilter();
});
