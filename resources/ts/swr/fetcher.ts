import axios from "axios";
import { LOCAL_URL } from "../const";

axios.defaults = {
    baseURL: LOCAL_URL,
    withCredentials:true
};

const fetcher = (url: string) => axios.get(url).then((res) => res.data);

export default fetcher;
