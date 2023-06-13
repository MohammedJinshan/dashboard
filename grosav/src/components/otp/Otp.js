import React, { useState } from "react";
import OtpInput from "react-otp-input";
import { IoIosArrowBack } from "react-icons/io";
import { Link } from "react-router-dom";

function Otp(props) {
    const [otp, setOtp] = useState("");
    const [active, setActive] = useState("");

    return (
        <React.Fragment>
            <div className="main">
                <div className="otpbackgrondimg">
                    <div className="backbtn">
                        {/* <Link to="/">
                            <button className="btn1">
                                <IoIosArrowBack
                                    className="icon"
                                    color="#DA6317"
                                />
                            </button>
                        </Link> */}
                    </div>
                </div>
                {props?.active === "otp" ? (
                    <div>
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
                        <div className="font3">
                            <p>
                                Code send to +6282045**** . <br /> This code
                                will expired in 01:30
                            </p>
                        </div>
                        <div className="otp">
                            <OtpInput
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
                    </div>
                ) : (
                    <div></div>
                )}

                <div className="button1">
                    <Link to="/signup">
                        <button className="btn">Explore</button>
                    </Link>
                </div>
            </div>
        </React.Fragment>
    );
}

export default Otp;
