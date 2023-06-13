import React from "react";
import { AiFillHome } from "react-icons/ai";
import { FiChevronDown } from "react-icons/fi";
import { BsPersonCircle } from "react-icons/bs";
import { FiSearch } from "react-icons/fi";

import Footer from "./footer/Footer";
import Pagefooter from "./pagefooter/Pagefooter";
import AllRestuarant from "./all restorent/AllRestaurants";

function Home() {
    return (
        <React.Fragment>
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
            </div>
            {/* <Pagefooter /> */}
            <AllRestuarant/>

            <Footer active="home" />
        </React.Fragment>
    );
}

export default Home;
