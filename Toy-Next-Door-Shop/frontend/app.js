async function fetchAndDisplayProducts() {
    const API_BASE_URL = "http://localhost:8000/api";
    const productList = document.getElementById("product-list");
    const productList2 = document.getElementById("product-list2"); // New product list container

    try {
        const response = await fetch(`${API_BASE_URL}/products`);
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const products = await response.json();

        // Clear existing lists
        productList.innerHTML = "";
        productList2.innerHTML = "";

        // Iterate through products
        products.forEach((product) => {
            const productContainer = document.createElement("div");
            productContainer.classList.add("product-item");

            // Product Image
            if (product.image) {
                const productLink = document.createElement("a");
                productLink.href = "product.html";

                productLink.addEventListener("click", (event) => {
                    event.preventDefault();
                    localStorage.setItem("selectedProduct", JSON.stringify(product));
                    window.location.href = productLink.href;
                });

                const productImage = document.createElement("img");
                // Construct the full image URL
                productImage.src = `http://localhost:8000/backend/product/${product.image}`;
                productImage.alt = product.name;
                productImage.style.width = "100%";

                productLink.appendChild(productImage);
                productContainer.appendChild(productLink);
            }

            // Product Name
            const productName = document.createElement("h4");
            productName.textContent = product.name;
            productName.style.color = "black";
            productName.style.fontSize = "1.5em";
            productName.style.textTransform = "uppercase";
            productContainer.appendChild(productName);

            // Product Price
            const productPrice = document.createElement("p");
            productPrice.textContent = `${product.price.toLocaleString()} บาท`;
            productPrice.style.fontSize = "1.7em";
            productPrice.style.color = "#00a2ff";
            productContainer.appendChild(productPrice);

            // Product Stock (only on product.html)
            if (window.location.pathname.includes("product.html")) {
                const productStock = document.createElement("p");
                productStock.textContent = `${product.stock} in stock`;
                productContainer.appendChild(productStock);
            }

            // Determine which list to append based on category
            if (product.cat && product.cat.name === "Model Kits") {
                productList.appendChild(productContainer);
            } else if (product.cat && product.cat.name === "Figurines") {
                productList2.appendChild(productContainer);
            } else {
                // Handle products without category or unknown category
                productList.appendChild(productContainer);
            }
        });
    } catch (error) {
        console.error("Error fetching products:", error);
    }
}

// Call the function to fetch and display products
document.addEventListener("DOMContentLoaded", fetchAndDisplayProducts);
