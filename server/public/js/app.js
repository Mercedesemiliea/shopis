document.addEventListener('DOMContentLoaded', () => {
    fetch('/api/products')
        .then(response => response.json())
        .then(products => {
            const productsDiv = document.getElementById('products');
            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.textContent = product.name;
                productsDiv.appendChild(productElement);
            });
        });
});