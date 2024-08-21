const express = require('express');
const fs = require('fs');
const app = express();
const productRouter = require('./routes/productRouter');
const port = process.env.PORT || 3000;

app.use(express.json());

app.use('/products', productRouter);

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});