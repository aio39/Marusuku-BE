import axios from "axios";
import React, { useRef, useState } from "react";
import { useForm } from "react-hook-form";
import { useRecoilState } from "recoil";
import { userDataState } from "../../recoil/userState";


const ProfilePage = () => {
    const [uploadImageUrl, setUploadImageUrl] = useState<string>('')
    const [userData, setUserData] = useRecoilState(userDataState);

    const {register,handleSubmit,watch,getValues} = useForm()
    const imageRef = useRef<HTMLInputElement>();

    const setUrl = () => {
        const objectURL = URL.createObjectURL(getValues('photo')[0]);
        console.log(objectURL);
        setUploadImageUrl(objectURL);
    }

    const { ref, ...rest } = register("photo",{
        onChange: (e) => {
            process.nextTick(()=>{
                setUrl()
            })
        }
    });

    const onSubmit = (data:any) => {
        console.log(data.photo[0]);
        const {email,name} = data
        const formData = new FormData();
        formData.append('email',email)
        formData.append('name',name)
        formData.append('photo',data.photo[0])
        formData.append("_method ",  'PUT');
        // console.log(formData.get('photo'));
        axios
            .post("/api/user/register/" + userData?.id, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                // setUserData(res.data);
            })
            .catch((err) => {
                // console.error(err);
            });
    }
    
    console.log(watch());
    return (
        <div className="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-gray-100">
            <div className="md:grid md:grid-cols-3 md:gap-6">
                <div className="md:col-span-1 flex justify-between">
                    <div className="px-4 sm:px-0">
                        <h3 className="text-lg font-medium text-gray-900">
                            Profile Information
                        </h3>
                        <p className="mt-1 text-sm text-gray-600">
                            Update your account's profile information and email
                            address.
                        </p>
                    </div>
                    <div className="px-4 sm:px-0"></div>
                </div>

                <div className="mt-5 md:mt-0 md:col-span-2">
                    <form onSubmit={handleSubmit(onSubmit)}>
                        <div className="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div className="grid grid-cols-6 gap-6">
                                <div className="col-span-6 sm:col-span-4">
                                    <input
                                        type="file"
                                        id="photo"
                                        className="hidden"
                                        {...rest}
                                        ref={(e) => {
                                            ref(e);
                                            imageRef.current =
                                                e as HTMLInputElement;
                                        }}
                                    />
                                    <label
                                        className="block font-medium text-sm text-gray-700"
                                        htmlFor="photo"
                                    >
                                        <span>Photo</span>
                                    </label>
                                    <div
                                        className="mt-2"
                                        style={{
                                            display: uploadImageUrl == ''
                                                ? ""
                                                : "none",
                                        }}
                                    >
                                        <img
                                            src={userData.photo ? `/storage/${userData.photo}` :  "https://ui-avatars.com/api/?name=a&amp;color=7F9CF5&amp;background=EBF4FF"}
                                            alt="a"
                                            className="rounded-full h-20 w-20 object-cover"
                                        />
                                    </div>
                                    <div
                                        className="mt-2"
                                        style={{
                                            display: uploadImageUrl == ''
                                                ? "none"
                                                : "",
                                        }}
                                    >
                                        <span
                                            className="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                            style={{
                                                backgroundImage: `url("${uploadImageUrl}")`,
                                            }}
                                        ></span>
                                    </div>
                                    <button
                                        type="button"
                                        className="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2"
                                        onClick={() =>
                                            imageRef.current?.click()
                                        }
                                    >
                                        Select A New Photo
                                    </button>
                                    <div
                                        className="mt-2"
                                        style={{ display: "none" }}
                                    >
                                        <p className="text-sm text-red-600"></p>
                                    </div>
                                </div>

                                <div className="col-span-6 sm:col-span-4">
                                    <label
                                        className="block font-medium text-sm text-gray-700"
                                        htmlFor="name"
                                    >
                                        <span>Name</span>
                                    </label>
                                    <input
                                        className="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name"
                                        type="text"
                                        {...register("name")}
                                    />
                                    <div
                                        className="mt-2"
                                        style={{ display: "none" }}
                                    >
                                        <p className="text-sm text-red-600"></p>
                                    </div>
                                </div>
                                <div className="col-span-6 sm:col-span-4">
                                    <label
                                        className="block font-medium text-sm text-gray-700"
                                        htmlFor="email"
                                    >
                                        <span>Email</span>
                                    </label>
                                    <input
                                        className="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="email"
                                        type="email"
                                        {...register("email")}
                                    />
                                    <div
                                        className="mt-2"
                                        style={{ display: "none" }}
                                    >
                                        <p className="text-sm text-red-600"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <div className="mr-3">
                                <div
                                    className="text-sm text-gray-600"
                                    style={{ display: "none" }}
                                >
                                    Saved.
                                </div>
                            </div>
                            <button
                                type="submit"
                                className="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div className="hidden sm:block">
                <div className="py-8">
                    <div className="border-t border-gray-200"></div>
                </div>
            </div>
        </div>
    );
}


export default ProfilePage
