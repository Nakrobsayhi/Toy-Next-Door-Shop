document.addEventListener("DOMContentLoaded", () => {
    const productDetailsContainer = document.getElementById("product-details");
    const productImgContainer = document.getElementById("product-img");
    const productPriceContainer = document.getElementById("product-price");
    const productCategoryContainer = document.getElementById("product-category");
    const productDescriptionContainer = document.getElementById("product-desc");
    const productStockContainer = document.getElementById("product-stock");
    const productData = localStorage.getItem("selectedProduct");

    if (productData) {
        const product = JSON.parse(productData);

        // Clear the previous content
        productDetailsContainer.innerHTML = "";
        productImgContainer.innerHTML = "";
        productPriceContainer.innerHTML = "";
        productCategoryContainer.innerHTML = "";
        productDescriptionContainer.innerHTML = "";

        // Create and append product name
        const productName = document.createElement("h4");
        productName.textContent = product.name;
        productName.style.fontSize = "2em";
        productName.style.marginTop = "-25px";
        productDetailsContainer.appendChild(productName);

        // Create and append product ID
        const productId = document.createElement("h6");
        productId.textContent = `SKU ${product.product_id}`;
        productId.style.fontSize = "1.2em";
        productId.style.color = "grey";
        productDetailsContainer.appendChild(productId);

        // Create and append product category
        const productCategory = document.createElement("p");
        productCategory.textContent = `${product.cat.name}`;
        productCategory.style.fontSize = "1em";
        productCategory.style.color = "black";
        productCategoryContainer.appendChild(productCategory);

        // Create and append product price
        const productPrice = document.createElement("p");
        productPrice.textContent = `${product.price.toLocaleString()} บาท`; // Format price with commas
        productPrice.style.fontSize = "2.4em";
        productPrice.style.color = "black";
        productPriceContainer.appendChild(productPrice);

        // Create and append product image
        const productImage = document.createElement("img");
        productImage.src = `http://localhost:8000/backend/product/${product.image}`;
        productImage.alt = product.name;
        productImage.style.width = "90%"; // Set width
        productImgContainer.appendChild(productImage);

        // Create and append product description
        if (product.description) {
            const productDescriptionHeader = document.createElement("p");
            productDescriptionHeader.textContent = "Product Description";
            productDescriptionHeader.style.color = "black";
            productDescriptionHeader.style.textTransform = "uppercase";
            productDescriptionHeader.style.fontWeight = "bold";
            productDescriptionContainer.appendChild(productDescriptionHeader);

            const descriptionLines = product.description.split("\n");
            descriptionLines.forEach((line) => {
                const productDescriptionLine = document.createElement("p");
                productDescriptionLine.textContent = line.trim();
                productDescriptionContainer.appendChild(productDescriptionLine);
            });
        }

        const productStock = document.createElement("p");
        productStock.textContent = `${product.amount} in stock`;
        productStock.style.color = "gray";
        productStockContainer.appendChild(productStock);
    }
});

async function fetchAndDisplayProducts() {
    const API_BASE_URL = "http://localhost:8000/api";
    const productList = document.getElementById("product-list");

    try {
        const response = await fetch(`${API_BASE_URL}/products`);
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const products = await response.json();

        // Clear existing lists
        productList.innerHTML = "";

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
                productStock.textContent = `${product.amount} in stock`;
                productContainer.appendChild(productStock);
            }
        });
    } catch (error) {
        console.error("Error fetching products:", error);
    }
}
