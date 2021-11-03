import { atom } from "recoil";
import { User } from "../types/User";

const isLoginState = atom({
    key: "isLogin", // unique ID (with respect to other atoms/selectors)
    default: false, // default value (aka initial value)
});

const userDataState = atom<User | null>({
    key: "userData", // unique ID (with respect to other atoms/selectors)
    default: null, // default value (aka initial value)
});


export {
    isLoginState,
    userDataState
};
