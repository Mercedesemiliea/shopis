const express = require('express');
const router = express.Router();
const fs = require('fs');

// Hämta alla produkter
router.get('/', (req, res) => {
    const data = fs.readFileSync('database.json');
    const products = JSON.parse(data);
    res.json(products);
});

// Skapa en ny produkt
router.post('/', (req, res) => {
    const data = fs.readFileSync('database.json');
    const products = JSON.parse(data);
    const newProduct = req.body;
    products.push(newProduct);
    fs.writeFileSync('database.json', JSON.stringify(products));
    res.status(201).json(newProduct);
});

module.exports = router;