const express = require("express");
const app = express();
const fs = require("fs");
const hbs = require("hbs");
let port = process.env.port || 3000;
const jsonParser = express.json();
const jsonparser = require('json-parser');

app.set("view engine", "hbs");
app.use(express.static(__dirname + "/public"));

app.post("/post/decrypt", jsonParser, (req, res) => {
    if (!req.body) return res.status(400);
    let textEncrypt = req.body.textEncrypt;
    let key = req.body.key;
    let crypt = req.body.crypt;

    console.log(textEncrypt);

    res.send(key);
});

app.use("/", (req, res) => {
    let content = fs.readFileSync("crypt-in.txt", "utf8");
    res.render("index.hbs", {
        contentData: content
    });
});

app.listen(port, () => console.log("listening..."));