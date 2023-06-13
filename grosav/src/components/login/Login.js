import React, { useState } from "react";
import logo from "../../assets/images/New folder/logo 1.png";
import { Link } from "react-router-dom";
import Otp from "../otp/Otp";
import OTPInput from "react-otp-input";
import Logo3 from "../../assets/images/New folder/logo 1.png";
import axios from "axios";

function Login() {
    const [otp, setOtp] = useState("");
    const [active, setActive] = useState("login");
    const [phone, setPhone] = useState("");
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");

    const register = (ev) => {
        ev.preventDefault();
        const formData = new FormData();
        formData.append("phone", phone);
        axios
            .post("http://127.0.0.1:8000/api/get-otp", formData)
            .then(function (response) {
                console.log(response);
                if (response.data.success) {
                    setActive("otp");
                }
            });
    };
    const confirmotp = () => {
        const formData = new FormData();
        formData.append("phone", phone);
        formData.append("otp", otp);
        axios
            .post("http://127.0.0.1:8000/api/confirm-otp", formData)
            .then(function (response) {
                console.log(response);
                if (response.data.success) {
                    if (response.data.user) {
                        window.location.replace("/home");
                    } else {
                        setActive("signup");
                    }
                }
            });
    };
    const signup = () => {
        const formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("phone", phone);
        axios
            .post("http://127.0.0.1:8000/api/signup", formData)
            .then(function (response) {
                console.log(response);
                if (response.data.success) {
                    window.location.replace("/home");
                    // setActive("signup");
                }
            });
    };

    return (
        <React.Fragment>
            <div>
                {/* <div class="input-group mt-3">
                        <input
                            type="text"
                            className="input2 form-control"
                            placeholder=" Enter referal Id"
                            aria-label="referal Id"
                            aria-describedby="basic-addon2"
                        />
                        <span
                            className="input-group-text"
                            style={{
                                color: "#f68926",
                                border: "none",
                                backgroundColor: "#ffffff",
                            }}
                            id="basic-addon2"
                        >
                            optinal
                        </span>
                    </div> */}
                {active === "login" ? (
                    <React.Fragment>
                        <div className="logo1">
                            <img src={logo} />
                        </div>

                        <div className="font1">
                            <p>Login To Your Account</p>
                        </div>
                        <form onSubmit={register}>
                            <div className="px-3">
                                <input
                                    type="tel"
                                    pattern="[0-9]{10}"
                                    className="input1 px-2"
                                    placeholder=" Enter Mobile Number"
                                    onChange={(e) => setPhone(e.target.value)}
                                />
                            </div>
                            <div className="button2">
                                <button className="btn" type="submit">
                                    Get OTP
                                </button>
                            </div>
                        </form>
                    </React.Fragment>
                ) : active === "otp" ? (
                    <React.Fragment>
                        <div className="font2">
                            Enter 4-digit <br />
                            Verification code
                        </div>
                        <div className="font3">
                            <p>
                                Code send to +6282045**** . <br /> This code
                                will expired in 01:30
                            </p>
                        </div>
                        <div className="otp">
                            <OTPInput
                                value={otp}
                                onChange={setOtp}
                                numInputs={4}
                                renderSeparator={
                                    <span style={{ margin: "0 10px" }}></span>
                                }
                                renderInput={(props) => <input {...props} />}
                                inputStyle={{
                                    height: "4em",
                                    width: "3em",
                                    padding: "5px 5px 5px 5px",
                                    boxShadow:
                                        "4px 5px 10px rgba(255, 144, 18, 0.4)",
                                    borderRadius: "15px",
                                    border: "none",
                                    justifyContent: "space-between",
                                }}
                                inputContainerStyle={{
                                    display: "inline-flex",
                                    justifyContent: "space-between",
                                    width: "200px",
                                }}
                            />
                        </div>
                        <div className="button2">
                            <button
                                className="btn"
                                onClick={() => {
                                    confirmotp();
                                }}
                            >
                                Cofirm OTP
                            </button>
                        </div>
                    </React.Fragment>
                ) : active === "signup" ? (
                    <React.Fragment>
                        <div className="signupbackground">
                            <div className="logo1">
                                <img src={Logo3} alt="" />
                            </div>
                            <form onSubmit={signup}>
                                <div className="px-3 mb-3 mt-5">
                                    <input
                                        type="text"
                                        className="input1 px-2"
                                        placeholder="Name"
                                        onChange={(e) =>
                                            setName(e.target.value)
                                        }
                                    />
                                </div>
                                <div className="px-3">
                                    <input
                                        type="email"
                                        className="input1 px-2"
                                        placeholder=" E-mail"
                                        onChange={(e) =>
                                            setEmail(e.target.value)
                                        }
                                    />
                                </div>
                                <div className="button1">
                                    <button className="btn" type="submit">
                                        Get Started
                                    </button>
                                </div>
                            </form>
                        </div>
                    </React.Fragment>
                ) : (
                    <div></div>
                )}
            </div>
        </React.Fragment>
    );
}

export default Login;
