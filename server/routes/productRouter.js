const express = require('express');
const fs = require('fs');
const router = express.Router();

const readDatabase = () => {
    const data = fs.readFileSync('database.json', 'utf8');
    return JSON.parse(data);
};

const writeDatabase = (data) => {
    fs.writeFileSync('database.json', JSON.stringify(data, null, 2));
};

const getAllProducts = (req, res) => {
    const db = readDatabase();
    res.json(db.products);
};

const getProductById = (req, res) => {
    const db = readDatabase();
    const product = db.products.find(p => p.id === parseInt(req.params.id));
    if (!product) return res.status(404).send('Product not found');
    res.json(product);
};

const createProduct = (req, res) => {
    const db = readDatabase();
    const newProduct = {
        id: db.products.length + 1,
        name: req.body.name,
        price: req.body.price,
        image: req.body.image
    };
    db.products.push(newProduct);
    writeDatabase(db);
    res.status(201).json(newProduct);
};

const updateProduct = (req, res) => {
    const db = readDatabase();
    const product = db.products.find(p => p.id === parseInt(req.params.id));
    if (!product) return res.status(404).send('Product not found');
    product.name = req.body.name;
    product.price = req.body.price;
    product.image = req.body.image;
    writeDatabase(db);
    res.json(product);
};

const deleteProduct = (req, res) => {
    const db = readDatabase();
    const index = db.products.findIndex(p => p.id === parseInt(req.params.id));
    if (index === -1) return res.status(404).send('Product not found');
    const deletedProduct = db.products.splice(index, 1);
    writeDatabase(db);
    res.json(deletedProduct);
};

router.get('/export/csv', (req, res) => {
    const products = readDatabase();
    let csv = 'id,name,price,description\n';
    products.forEach(product => {
        csv += `${product.id},${product.name},${product.price},${product.description}\n`;
    });
    res.header('Content-Type', 'text/csv');
    res.attachment('products.csv');
    res.send(csv);
});

// Define routes
router.get('/', getAllProducts);
router.get('/:id', getProductById);
router.post('/', createProduct);
router.put('/:id', updateProduct);
router.delete('/:id', deleteProduct);

module.exports = router;