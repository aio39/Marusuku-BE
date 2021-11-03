import React from "react";
import Header from "./components/Header";
import Nav from "./components/Nav";

const Layout = (props: { children: React.ReactNode }) => {
    return (
        <div className="min-h-screen bg-gray-100">
            <Nav />
            <Header />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        {props.children}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Layout;
