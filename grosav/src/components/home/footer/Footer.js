import React, {useState} from "react";
import { IoStorefrontSharp } from "react-icons/io5";
import { MdFoodBank } from "react-icons/md";
import { AiFillMedicineBox } from "react-icons/ai";
import { IoMdBookmarks } from "react-icons/io";
import { Link } from "react-router-dom";


function Footer(props) {
    const [active, setActive] = useState("");
    return (
        <div>
            <div className="footr-bodr position-fixed bottom-0 left-0 w-100 d-flex justify-content-around ">
                {/* store */}
                <Link to="/home">
                    <>
                        {props?.active === "home" ? (
                            <div className="rect d-flex ">
                                <div className="Store mt-2 ms-2 mb-2 ">
                                    <IoStorefrontSharp
                                        color={"fd8814"}
                                        size={"1.7rem"}
                                    />
                                </div>
                                <div className="store-font ">Store</div>
                            </div>
                        )
                        :
                        (
                            <div>
                                <IoStorefrontSharp
                                    className=" mt-3 ms-2 mb-2"
                                    color={"fd8814"}
                                    size={"1.6rem"}
                                />
                            </div>
                        )
                        }
                    </>
                </Link>
                {/* food */}
                <Link to="/food">
                    <>
                        {props?.active === "food" ? (
                            <div className="rect d-flex ">
                                <div className="Store mt-2 ms-2 mb-2">
                                    <MdFoodBank
                                        color={"fd8814"}
                                        size={"1.7rem"}
                                    />
                                </div>
                                <div className="store-font ">food</div>
                            </div>
                        ) : (
                            <div>
                                <MdFoodBank
                                    className=" mt-3  mb-2"
                                    color={"fd8814"}
                                    size={"1.7rem"}
                                />
                            </div>
                        )}
                    </>
                </Link>
                {/* medicine */}
                <Link to="/medicine">
                    <>
                        {props?.active === "medicine" ? (
                            <div className="rect d-flex mt-2 ms-1 mb-3">
                                <div className="Store mt-2 ms-2 mb-2">
                                    <AiFillMedicineBox
                                        color={"fd8814"}
                                        size={"1.7rem"}
                                    />
                                </div>
                                <div className="store-font ">Medicine</div>
                            </div>
                        ) : (
                            <div>
                                <AiFillMedicineBox
                                    className=" mt-3 ms-2 mb-2"
                                    color={"fd8814"}
                                    size={"1.7rem"}
                                />
                            </div>
                        )}
                    </>
                </Link>
                {/* cart */}
                <Link to="/cart">
                    <>
                        {props?.active === "cart" ? (
                            <div className="rect d-flex mt-2 ms-1 mb-3">
                                <div className="Store mt-2 ms-2  mb-2">
                                    <IoMdBookmarks
                                        color={"fd8814"}
                                        size={"1.7rem"}
                                    />
                                </div>
                                <div className="store-font ">cart</div>
                            </div>
                        ) : (
                            <div>
                                <IoMdBookmarks
                                    className=" mt-3 ms-2 mb-3"
                                    color={"fd8814"}
                                    size={"1.7rem"}
                                />
                            </div>
                        )}
                    </>
                </Link>
            </div>
        </div>
    );
}

export default Footer;
