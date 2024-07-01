async function fetchAndDisplayProducts() {
  const API_BASE_URL = "http://localhost:8000/api";
  const productList = document.getElementById("product-list");

  try {
    const response = await fetch(`${API_BASE_URL}/products`);
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const products = await response.json();

    productList.innerHTML = "";

    // Display products on the frontend
    products.forEach((product) => {
      const productContainer = document.createElement("div");
      productContainer.classList.add("product-item"); // Add product-item class

      if (product.image) {
        const productLink = document.createElement("a");
        productLink.href = "product.html"; // Set href to product.html

        productLink.addEventListener("click", (event) => {
          event.preventDefault(); // Prevent the default link behavior
          localStorage.setItem("selectedProduct", JSON.stringify(product)); // Store product data in localStorage
          window.location.href = productLink.href; // Redirect to product.html
        });

        const productImage = document.createElement("img");
        productImage.src = product.image;
        productImage.alt = product.name;
        productImage.style.width = "100%"; // Set width

        productLink.appendChild(productImage); // Append image to link
        productContainer.appendChild(productLink); // Append link to product container
      }

      // Product Name
      const productName = document.createElement("h4");
      productName.textContent = product.name;
      productContainer.appendChild(productName);

      // Product Price
      const productPrice = document.createElement("p");
      productPrice.textContent = `$${product.price}`;
      productContainer.appendChild(productPrice);

      // Append product container to product list
      productList.appendChild(productContainer);
    });
  } catch (error) {
    console.error("Error fetching products:", error);
  }
}

// Call the function to fetch and display products
document.addEventListener("DOMContentLoaded", fetchAndDisplayProducts);
