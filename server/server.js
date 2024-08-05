const express = require('express');
const fs = require('fs');
const app = express();
const productRouter = require('./routes/productRouter');
const port = 3000;

app.use(express.json());

app.use('/products', productRouter);

const readDatabase = () => {
  const data = fs.readFileSync('database.json', 'utf8');
  return JSON.parse(data);
};

const writeDatabase = (data) => {
  fs.writeFileSync('database.json', JSON.stringify(data, null, 2));
};

// GET all products
app.get('/products', (req, res) => {
  const db = readDatabase();
  res.json(db.products);
});

// GET a single product
app.get('/products/:id', (req, res) => {
  const db = readDatabase();
  const product = db.products.find(p => p.id === parseInt(req.params.id));
  if (!product) return res.status(404).send('Product not found');
  res.json(product);
});

// POST a new product
app.post('/products', (req, res) => {
  const db = readDatabase();
  const newProduct = {
    id: db.products.length ? db.products[db.products.length - 1].id + 1 : 1,
    name: req.body.name,
    price: req.body.price,
    image: req.body.image
  };
  db.products.push(newProduct);
  writeDatabase(db);
  res.json(newProduct);
});

// PUT (update) a product
app.put('/products/:id', (req, res) => {
  const db = readDatabase();
  const product = db.products.find(p => p.id === parseInt(req.params.id));
  if (!product) return res.status(404).send('Product not found');
  product.name = req.body.name;
  product.price = req.body.price;
  product.image = req.body.image;
  writeDatabase(db);
  res.json(product);
});

// DELETE a product
app.delete('/products/:id', (req, res) => {
  const db = readDatabase();
  const index = db.products.findIndex(p => p.id === parseInt(req.params.id));
  if (index === -1) return res.status(404).send('Product not found');
  const deletedProduct = db.products.splice(index, 1);
  writeDatabase(db);
  res.json(deletedProduct);
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
