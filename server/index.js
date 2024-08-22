import express, { json, urlencoded } from 'express';
const app = express();
const port = process.env.PORT || 8000;



import productRouter from './routes/productRouter';


app.use(json());
app.use(urlencoded({ extended: true }));

app.use('/products', productRouter);

// Servera statiska filer från 'public' mappen
//app.use(express.static(path.join(__dirname, '..', 'public')));

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

export default app;