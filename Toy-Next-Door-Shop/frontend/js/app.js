async function fetchAndDisplayProducts() {
    const API_BASE_URL = "http://localhost:8000/api/products"; // Adjusted API endpoint
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
                productLink.href = "product.html";

                productLink.addEventListener("click", (event) => {
                    event.preventDefault();
                    localStorage.setItem("selectedProduct", JSON.stringify(product));
                    window.location.href = productLink.href;
                });

                const productImage = document.createElement("img");
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

            // Determine which list to append based on category and limit to 4 items
            if (product.cat && product.cat.name === "Model kit" && modelKitCount < 4) {
                productList.appendChild(productContainer);
                modelKitCount++;
            } else if (product.cat && product.cat.name === "Figurine" && figurineCount < 4) {
                productList2.appendChild(productContainer);
                figurineCount++;
            } else if (product.cat && product.cat.name === "Action figure" && actionFigureCount < 4) {
                productList3.appendChild(productContainer);
                actionFigureCount++;
            } else if (product.cat && product.cat.name === "Tool" && toolCategoryCount < 4) {
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
