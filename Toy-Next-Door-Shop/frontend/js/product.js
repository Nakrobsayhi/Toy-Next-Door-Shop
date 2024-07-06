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