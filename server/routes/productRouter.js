const fs = require('fs');

const readDatabase = () => {
    const data = fs.readFileSync('server/database.json', 'utf8');
    return JSON.parse(data);
};

const writeDatabase = (data) => {
    fs.writeFileSync('server/database.json', JSON.stringify(data, null, 2));
};

exports.getAllProducts = (req, res) => {
    const db = readDatabase();
    res.json(db.products);
};

exports.getProductById = (req, res) => {
    const db = readDatabase();
    const product = db.products.find(p => p.id === parseInt(req.params.id));
    if (!product) return res.status(404).send('Product not found');
    res.json(product);
};

exports.createProduct = (req, res) => {
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
};

exports.updateProduct = (req, res) => {
    const db = readDatabase();
    const product = db.products.find(p => p.id === parseInt(req.params.id));
    if (!product) return res.status(404).send('Product not found');
    product.name = req.body.name;
    product.price = req.body.price;
    product.image = req.body.image;
    writeDatabase(db);
    res.json(product);
};

exports.deleteProduct = (req, res) => {
    const db = readDatabase();
    const index = db.products.findIndex(p => p.id === parseInt(req.params.id));
    if (index === -1) return res.status(404).send('Product not found');
    const deletedProduct = db.products.splice(index, 1);
    writeDatabase(db);
    res.json(deletedProduct);
};
