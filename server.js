import express from "express";
import bodyParser from "body-parser";
import axios from "axios";
import cors from "cors";

const app = express();
app.use(cors());
app.use(bodyParser.json());
app.post('/register', async (req, res) => {
    console.log("Received data:", req.body); 
    try {
        const response = await axios.post('http://localhost/php_program/register.php', req.body);
        console.log("PHP Response:", response.data);  
        res.json({ message: response.data.message });
    } catch (error) {
        console.error('Error forwarding to PHP:', error.message);  
        res.status(500).json({ message: 'Error forwarding to PHP: ' + error.message });
    }
});

app.listen(3000, () => {
    console.log('Server is running on http://localhost:3000');
});
