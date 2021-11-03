import axios from "axios";
import useSWR from "swr";
import { LoginData, User } from "../types/User";
import fetcher from './fetcher';

const URL_USER = "/api/user";
const URL_LOGIN = "/api/login";
const URL_LOGOUT = "/api/logout";



const useUser = () => {
    const { data, error } = useSWR<User>(URL_USER, fetcher);
    return { data, error };
};

const useLogin = async (loginData: LoginData) => {
    try {
        const { data, status } = await axios.post(
            `${URL_LOGIN}`,
            loginData
        );
        return  data
    } catch (error) {
        console.log(error);
        return false;
    }
};

const useLogOut = async () => {
        try {
            const { data, status } = await axios.get(
                `${URL_LOGOUT}`,
            );
            return true
        } catch (error) {
            console.log(error);
            return false;
        }
};
export { useLogin, useUser, useLogOut };
