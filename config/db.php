<?php
session_start();

const HOST = "localhost";
const USERNAME = "root";
const PASS = "";
const DB = "jobtex";

$conn = mysqli_connect(HOST, USERNAME, PASS, DB);

if(!$conn){
    die("Connection Failed");
}