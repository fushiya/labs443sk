const express = require("express");
const app = express();
const fs = require("fs");
const hbs = require("hbs");
let port = process.env.port || 3000;

app.set("view engine", "hbs");
app.use(express.static(__dirname + "/public"));

app.use("/", (req, res) => res.render("index.hbs"));

app.listen(port, () => console.log("listening..."));