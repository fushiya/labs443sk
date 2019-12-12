const express = require("express");
const app = express();
const fs = require("fs");
const hbs = require("hbs");
let port = process.env.port || 3000;
const jsonParser = express.json();

app.set("view engine", "hbs");
app.use(express.static(__dirname + "/public"));

app.post("/upload", (req, res, next) => {
    let fileContent = fs.readFileSync("encrypto.txt");
    res.send(fileContent);
});

app.use("/", (req, res) => res.render("index.hbs"));

app.listen(port, () => console.log("listening..."));