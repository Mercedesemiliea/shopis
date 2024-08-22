// server.js
const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();
app.use(bodyParser.json());

// Hämta alla produkter (GET)
app.get('/products', (req, res) => {
  const data = fs.readFileSync('database.json');
  const products = JSON.parse(data);
  res.json(products);
});

// Skapa en ny produkt (POST)
app.post('/products', (req, res) => {
  const newProduct = req.body;
  const data = fs.readFileSync('database.json');
  const products = JSON.parse(data);

  products.push(newProduct);
  fs.writeFileSync('database.json', JSON.stringify(products));
  res.status(201).json(newProduct);
});

// Uppdatera en produkt (PUT)
app.put('/products/:id', (req, res) => {
  const productId = req.params.id;
  const updatedProduct = req.body;
  const data = fs.readFileSync('database.json');
  let products = JSON.parse(data);

  products = products.map(product =>
    product.id == productId ? updatedProduct : product
  );

  fs.writeFileSync('database.json', JSON.stringify(products));
  res.json(updatedProduct);
});

// Ta bort en produkt (DELETE)
app.delete('/products/:id', (req, res) => {
  const productId = req.params.id;
  const data = fs.readFileSync('database.json');
  let products = JSON.parse(data);

  products = products.filter(product => product.id != productId);

  fs.writeFileSync('database.json', JSON.stringify(products));
  res.status(204).end();
});

// Export till CSV (GET)
app.get('/export/csv', (req, res) => {
  const data = fs.readFileSync('database.json');
  const products = JSON.parse(data);
  const csv = products.map(product => `${product.id},${product.name},${product.price},${product.description}`).join('\n');

  res.header('Content-Type', 'text/csv');
  res.attachment('products.csv');
  res.send(csv);
});

const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Server running on port ${port}`));
