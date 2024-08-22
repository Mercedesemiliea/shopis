const express = require('express');
//const fs = require('fs');
const { createProxyMiddleware } = require('http-proxy-middleware');
const path = require('path');
const app = express();
const productRouter = require('./routes/productRouter');
const port = process.env.PORT || 3000;

app.use(express.json());


app.use(express.static(path.join(__dirname, '..', 'public')));

app.use('/products', productRouter);

app.use('/php', createProxyMiddleware({
  target: 'http://localhost:8000',
  changeOrigin: true
}));

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});

module.exports = app;