import React from "react";
import Footer from "../Footer";
import { FiChevronDown, FiSearch } from "react-icons/fi";
import { BsPersonCircle } from "react-icons/bs";
import { AiFillHome } from "react-icons/ai";
import medicineback from "../../../../assets/images/medicine/Rectangle 11869.png";
import { inputimg } from "../../../../assets/images/medicine/Rectangle 11875.png";

function Medicine() {
    return (
        <div>
            <div className="content">
                <div className="home">
                    <button className="btn3">
                        <AiFillHome size={"21px"} />
                        Home
                        <FiChevronDown />
                    </button>
                    <div className="profile">
                        <BsPersonCircle size={"21px"} />
                    </div>
                </div>
                <div className="input4 input-group mb-3 d-flex border-0">
                    <input
                        className="input5 form-control"
                        type="text"
                        placeholder="What do you want to order?"
                        aria-label="Recipient's username"
                        aria-describedby="basic-addon2"
                    />
                    <span className="input6 input-group-text" id="basic-addon2">
                        <FiSearch />
                    </span>
                </div>
                <div>
                    <img src={medicineback} alt="" />
                    {/* <img src={"../../../../assets/images/medicine/Rectangle 11875.png"} alt="" /> */}
                </div>
            </div>
            <Footer active="medicine" />

        </div>
    );
}

export default Medicine;
