import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import Login from "./components/login/Login";
import Otp from "./components/otp/Otp";
import Signup from "./components/signup/Signup";
import Home from "./components/home/Home";
import Food from "./components/home/footer/food/Food";
import Cart from "./components/home/footer/cart/Cart";
import Medicine from "./components/home/footer/medicine/Medicine";
import reportWebVitals from "./reportWebVitals";
import "./assets/css/custome.css";
import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
    <React.StrictMode>
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Login />} />
                <Route path="/otp" element={<Otp />} />
                <Route path="/signup" element={<Signup />} />
                <Route path="/home" element={<Home />} />
                <Route path="/food" element={<Food />} />
                <Route path="/cart" element={<Cart />} />
                <Route path="/medicine" element={<Medicine />} />
            </Routes>
        </BrowserRouter>
    </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
