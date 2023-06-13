import React from "react";
import Logo3 from "../../assets/images/New folder/logo 1.png";
import { Link } from "react-router-dom";

function Signup() {
    return (
        <React.Fragment>
            <div>
                <div className="signupbackground">
                    <div className="logo1">
                        <img src={Logo3} alt="" />
                    </div>
                    <div className="px-3 mb-3 mt-5">
                        <input
                            type="text"
                            className="input1 px-2"
                            placeholder="Name"
                        />
                    </div>
                    <div className="px-3">
                        <input
                            type="email"
                            className="input1 px-2"
                            placeholder=" E-mail"
                        />
                    </div>
                    <div className="button1">
                        <Link to="/home">
                            <button className="btn">Get Started</button>
                        </Link>
                    </div>
                </div>
            </div>
        </React.Fragment>
    );
}

export default Signup;
