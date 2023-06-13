import React, { useEffect, useState } from "react";



import { IoStorefrontSharp } from "react-icons/io5";
import { FaStar } from "react-icons/fa";
import { AiFillStar } from "react-icons/ai";

import vegan from "../../../assets/images/New folder (2)/new.png";
import axios from "axios";
import { data } from "autoprefixer";

function AllRestuarant() {
    const [allstores, setAllstores] = useState([]);

    useEffect(() => {
        axios
            .post("http://127.0.0.1:8000/api/all-stores")
            .then(function (response) {
                if (response && response.data && response.data.sucess) {
                    setAllstores(response?.data?.data);
                    console.log(
                        response?.data?.data,
                        allstores.length,
                        "sdsdsd"
                    );
                }
            });
    }, []);
    return (
        <React.Fragment>
            <div
                style={{
                    paddingBottom: "5.5rem",
                    gridTemplateColumns: "repeat(4,1fr)",
                    overflowX: "scroll",
                }}
            >
                <div className="d-flex ">
                    <IoStorefrontSharp
                        size={"1.2rem"}
                        className="ms-3 mt-4"
                        style={{ right: "30px", color: "#fd8814" }}
                    />
                    <div className="font mt-4 ms-2">
                        All Stores For You
                    </div>
                </div>
                <div></div>

                <div
                    className="d-flex scroll flex-column"
                    style={{
                        gridTemplateColumns: "repeat(1,1fr)",
                        overflowX: "scroll",
                    }}
                >
                    {console.log(allstores)}
                    {allstores?.map((store) => (
                        <div>
                            <div className="d-flex position-relative">
                                <img
                                    src={'http://localhost:8000' + store?.image}
                                    alt=""
                                    className="mt-3 ms-3"
                                    height="100px"
                                    width="100px"
                                />

                                <div className="vegan-resto ms-3 mt-3">
                                    {store.name}
                                    <div className="d-flex">
                                        <div
                                            className="ms-2"
                                            style={{ color: "#FF9012" }}
                                        >
                                            {store.rating}<AiFillStar size={"10px"} />
                                        </div>


                                    </div>
                                    <div className="Rest-font ms-2 mt-1">
                                            25min - 3km
                                            {/* {store.store_category_id} */}
                                        </div>
                                    <div className="desert-font ms-2 mt-1">
                                        {store.description}
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

                {/* second Restaurant */}

                {/* <div
                    className="d-flex scroll"
                    style={{
                        gridTemplateColumns: "repeat(3,1fr)",
                        overflowX: "scroll",
                    }}
                >
                    <div>
                        <div className="d-flex position-relative">
                            <img src={vegan} alt="" className="mt-3 ms-3" height="100px" width="100px" />

                            <div className="vegan-resto ms-3 mt-3">
                                Vegan Resto and Cafe
                                <div className="d-flex">
                                    <div
                                        className="ms-2"
                                        style={{ color: "#FF9012" }}
                                    >
                                        4<AiFillStar size={"10px"} />
                                    </div>

                                    <div className="Rest-font ms-2 mt-1">
                                        25min - 3km
                                    </div>
                                </div>
                                <div className="desert-font ms-2 mt-1"  >
                                        Desserts, Bakery, Snacks <br/> and Byculla
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> */}

                {/* third Restaurant */}

                {/* <div
                    className="d-flex scroll"
                    style={{
                        gridTemplateColumns: "repeat(3,1fr)",
                        overflowX: "scroll",
                    }}
                >
                    <div>
                        <div className="d-flex position-relative">
                            <img src={vegan} alt="" className="mt-3 ms-3" height="100px" width="100px" />

                            <div className="vegan-resto ms-3 mt-3">
                                Vegan Resto and Cafe
                                <div className="d-flex">
                                    <div
                                        className="ms-2"
                                        style={{ color: "#FF9012" }}
                                    >
                                        4<AiFillStar size={"10px"} />
                                    </div>

                                    <div className="Rest-font ms-2 mt-1">
                                        25min - 3km
                                    </div>
                                </div>
                                <div className="desert-font ms-2 mt-1">
                                        Desserts, Bakery, Snacks <br/> and Byculla
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> */}
            </div>
        </React.Fragment>
    );
}

export default AllRestuarant;
