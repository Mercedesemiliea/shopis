
const express = require('express');
const path = require('path');
const app = express();
const port = process.env.PORT || 3000;

const productRouter = require('../server/routes/productRouter');

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'server', 'index.php'));
});

app.use('/products', productRouter);

app.use(express.static(path.join(__dirname, '..', 'public')));

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

module.exports = app;