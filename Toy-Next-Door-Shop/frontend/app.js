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

            // Product Category (show only on product.html)
            if (window.location.pathname.includes("product.html")) {
                if (product.cat) {
                    const productCategory = document.createElement("p");
                    productCategory.textContent = `Category: ${product.cat.name}`;
                    productContainer.appendChild(productCategory);
                } else {
                    const productCategory = document.createElement("p");
                    productCategory.textContent = "Category: Not specified";
                    productContainer.appendChild(productCategory);
                }
            }

            // Product Description (show only on product.html)
            if (window.location.pathname.includes("product.html")) {
                const productDescription = document.createElement("p");
                productDescription.textContent = product.description;
                productContainer.appendChild(productDescription);
            }

            // Product Price
            const productPrice = document.createElement("p");
            productPrice.textContent = `${product.price.toLocaleString()} บาท`;
            productPrice.style.fontSize = "1.7em";
            productPrice.style.color = "#00a2ff";
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
