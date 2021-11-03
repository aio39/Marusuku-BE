import axios from "axios";
import React, { FC } from "react";
import { useForm } from "react-hook-form";
import { Redirect } from "react-router";
import { useRecoilState } from "recoil";
import { isLoginState, userDataState } from "../../recoil/userState";
import { CreteUserData } from "../../types/User";

const RegisterPage: FC = () => {
    const { register, handleSubmit } = useForm<CreteUserData>();
       const [isLogin, setIsLogin] = useRecoilState(isLoginState);
       const [userData, setUserData] = useRecoilState(userDataState);

    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            {isLogin && <Redirect to="/" />}
            <a href="/">
                <svg
                    className="w-16 h-16"
                    viewBox="0 0 48 48"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
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
            <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form
                    onSubmit={handleSubmit(async (data) => {
                        axios.post('api/user',data).then(res => {
                            if (res.data) {
                                setIsLogin(true);
                                setUserData(res.data);
                            }
                        }).catch(err => {
                            console.log(err)
                            setIsLogin(false);
                        })
                    })}
                >
                    <div>
                        <label
                            htmlFor="name"
                            className="block font-medium text-sm text-gray-700"
                        >
                            Name
                        </label>
                        <input
                            id="name"
                            type="text"
                            className="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full p-2"
                            {...register("name")}
                            required
                            autoFocus
                        />
                    </div>

                    <div>
                        <label
                            htmlFor="email"
                            className="block font-medium text-sm text-gray-700"
                        >
                            Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            className="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full p-2"
                            {...register("email")}
                            required
                        />
                    </div>

                    <div className="mt-4">
                        <label
                            htmlFor="password"
                            className="block font-medium text-sm text-gray-700"
                        >
                            Password{" "}
                        </label>
                        <input
                            id="password"
                            type="password"
                            className="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full  p-2"
                            {...register("password")}
                            required
                        />
                    </div>

                    <div className="mt-4">
                        <label
                            htmlFor="confirm"
                            className="block font-medium text-sm text-gray-700"
                        >
                            Confirm Password
                        </label>
                        <input
                            id="confirm"
                            type="password"
                            className="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full  p-2"
                            {...register("confirm")}
                            required
                        />
                    </div>

                    <div className="block mt-4">
                        <label className="flex items-center">
                            <input
                                type="checkbox"
                                name="remember"
                                className="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            />
                            <span className="ml-2 text-sm text-gray-600">
                                Remember me
                            </span>
                        </label>
                    </div>

                    <div className="flex items-center justify-end mt-4">
                        <a className="underline text-sm text-gray-600 hover:text-gray-900">
                            Forgot your password?
                        </a>
                        <button
                            type="submit"
                            className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4"
                        >
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default RegisterPage;
