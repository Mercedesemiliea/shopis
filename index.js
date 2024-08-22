import { listen } from './server/server';
const port = process.env.PORT || 8000;

listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});