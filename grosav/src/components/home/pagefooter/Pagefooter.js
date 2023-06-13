import React from "react";
import pagefooterimg from "../../../assets/images/home/Delivery014 2.png";
import { BsDoorOpen, BsFillTagFill } from "react-icons/bs";
import { FaCity } from "react-icons/fa";

function Pagefooter() {
    return (
        <div className="position-relative">
            <div className="" style={{ width: "70%" }}>
                <div className="d-flex align-items-center ">
                    <div
                        className="iconhome  p-3"
                        style={{ width: "30px", height: "30px" }}
                    >
                        <BsDoorOpen color="white"  className=""/>
                    </div>
                    <div>as as dasd asdas</div>
                </div>
                <div className="d-flex align-items-center ">
                    <div
                        className="iconhome  p-3"
                        style={{ width: "30px", height: "30px" }}
                    >
                        <FaCity color="white" />
                    </div>
                    <div>as as dasd asdas</div>
                </div>
                <div className="d-flex align-items-center ">
                    <div
                        className="iconhome  p-3"
                        style={{ width: "30px", height: "30px" }}
                    >
                        <BsFillTagFill color="white" />
                    </div>
                    <div>as as dasd asdas</div>
                </div>
            </div>
            <div
                className="position-absolute"
                style={{ top: "20px", right: "10px" }}
            >
                <img className="pagefooter" src={pagefooterimg} alt="" />
            </div>
        </div>
    );
}

export default Pagefooter;
