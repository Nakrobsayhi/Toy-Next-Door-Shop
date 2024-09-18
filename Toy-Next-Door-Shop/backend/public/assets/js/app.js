async function fetchAndDisplayProducts() {
    const API_BASE_URL = "http://127.0.0.1:8000/api/products";

    const productList = document.getElementById("product-list");
    const productList2 = document.getElementById("product-list2");
    const productList3 = document.getElementById("product-list3");
    const productList4 = document.getElementById("product-list4");

    try {
        const response = await fetch(API_BASE_URL);

        if (!response.ok) {
            throw new Error("Network response was not ok");
        }

        const products = await response.json();

        // Clear existing lists
        productList.innerHTML = "";
        productList2.innerHTML = "";
        productList3.innerHTML = "";
        productList4.innerHTML = "";

        // Counters for each category
        let modelKitCount = 0;
        let figurineCount = 0;
        let actionFigureCount = 0;
        let toolCategoryCount = 0;

        // Iterate through products
        products.forEach((product) => {
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
                productImage.style.width = "90%";
                productLink.appendChild(productImage);
                productContainer.appendChild(productLink);
            }

            // Product Name
            const productName = document.createElement("h4");
            productName.textContent = product.name;
            productName.style.marginTop = "10px";
            productName.style.fontSize = "16px";
            productName.style.fontWeight = "400";
            productName.style.width = "233px";
            productContainer.appendChild(productName);

            // Product Price
            const productPrice = document.createElement("p");
            productPrice.textContent = `฿ ${product.price.toLocaleString()}`;
            productPrice.style.textAlign = "left";
            productPrice.style.fontSize = "18px";
            productPrice.style.fontWeight = "500";
            productContainer.appendChild(productPrice);

            // Determine which list to append based on category and limit to 4 items
            if (
                product.cat &&
                product.cat.name === "Model kit" &&
                modelKitCount < 5
            ) {
                productList.appendChild(productContainer);
                modelKitCount++;
            } else if (
                product.cat &&
                product.cat.name === "Figurine" &&
                figurineCount < 5
            ) {
                productList2.appendChild(productContainer);
                figurineCount++;
            } else if (
                product.cat &&
                product.cat.name === "Action figure" &&
                actionFigureCount < 5
            ) {
                productList3.appendChild(productContainer);
                actionFigureCount++;
            } else if (
                product.cat &&
                product.cat.name === "Tool" &&
                toolCategoryCount < 5
            ) {
                productList4.appendChild(productContainer);
                toolCategoryCount++;
            }
        });
    } catch (error) {
        console.error("Error fetching products:", error);
    }
}

// Call the function to fetch and display products
document.addEventListener("DOMContentLoaded", fetchAndDisplayProducts);
