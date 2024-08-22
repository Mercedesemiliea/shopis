const express = require('express');
const path = require('path');
const app = express();
const port = process.env.PORT || 8000;

// Servera statiska filer från 'public' mappen
app.use(express.static(path.join(__dirname, '..', 'public')));

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});

module.exports = app;