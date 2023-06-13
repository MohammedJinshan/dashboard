import React from "react";
import Footer from "../Footer";
import { FiChevronDown, FiSearch } from "react-icons/fi";
import { AiFillHome } from "react-icons/ai";
import { BsPersonCircle } from "react-icons/bs";
import foodback from "../../../../assets/images/food/Rectangle 11869 (1).png";

function Food() {
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
                    <img src={foodback} alt="" />
                </div>
            </div>
            <Footer active="food" />
        </div>
    );
}

export default Food;
