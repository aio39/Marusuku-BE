import React, { useState } from "react";
import { Link, useLocation } from "react-router-dom";
import { useRecoilState } from "recoil";
import { navList } from "../const";
import { isLoginState, userDataState } from "../recoil/userState";
import { useLogOut } from "../swr/useUser";




const Nav = () => {
    const [menuView, setMenuView] = useState(false)
    const [userData , setUserData] = useRecoilState(userDataState);
      const [isLogin, setIsLogin] = useRecoilState(isLoginState);
    const {pathname} =useLocation()
    if (!userData) return <div>loading</div>

    return (
        <nav className="bg-white border-b border-gray-100">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex justify-between h-16">
                    <div className="flex">
                        <div className="flex-shrink-0 flex items-center">
                            <a href="dashboard">
                                <svg
                                    viewBox="0 0 48 48"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="block h-9 w-auto"
                                >
                                    <path
                                        d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z"
                                        fill="#6875F5"
                                    ></path>
                                    <path
                                        d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z"
                                        fill="#6875F5"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                        <div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            {navList.map((item) => (
                                <Link
                                    key={item.url}
                                    to={item.url}
                                    className={`inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition ${
                                        pathname == item.url &&
                                        "border-indigo-400 "
                                    }`}
                                >
                                    {item.name}
                                </Link>
                            ))}
                        </div>
                    </div>
                    <div className="hidden sm:flex sm:items-center sm:ml-6">
                        <div className="ml-3 relative"></div>
                        <div className="ml-3 relative">
                            <div className="relative">
                                <div
                                    onClick={() => {
                                        setMenuView((p) => !p);
                                    }}
                                >
                                    <span className="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition"
                                        >
                                            {userData.name}
                                            <svg
                                                className="ml-2 -mr-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clipRule="evenodd"
                                                ></path>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                                <div
                                    className={`absolute z-50 mt-2 rounded-md shadow-lg w-48 origin-top-right right-0  ${
                                        menuView ? "" : "hidden"
                                    }`}
                                >
                                    <div className="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                        <div className="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account{" "}
                                        </div>
                                        <div>
                                            <Link
                                                className="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                                to="/user/profile"
                                            >
                                                Profile{" "}
                                            </Link>
                                        </div>
                                        <div className="border-t border-gray-100"></div>
                                        <button
                                            className="block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                            onClick={async () => {
                                                const success =
                                                    await useLogOut();
                                                if (success) {
                                                    setUserData(null);
                                                    setIsLogin(false);
                                                }
                                            }}
                                        >
                                            Log Out{" "}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    );
}

export default Nav
